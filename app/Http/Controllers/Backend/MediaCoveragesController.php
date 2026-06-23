<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Models\ManageMediaCoverage;


class MediaCoveragesController extends Controller
{

    public function index()
    {
        $mediaCoverages = ManageMediaCoverage::orderBy('id', 'desc')->wherenull('deleted_by')->get();
        return view('backend.media_coverages.index', compact('mediaCoverages'));
    }

    public function create()
    {
        return view('backend.media_coverages.create');
    }

    public function store(Request $request)
    {
        // ✅ Validation Rules
        $request->validate([
            'media_heading'           => 'nullable|string|max:255',
            'media_publication'       => 'nullable|string|max:255',
            'media_type'              => 'nullable|string|max:255',
            'media_publication_date'  => 'nullable|string|max:255',
            'description'             => 'nullable|string',

            'image'                   => 'required|image|mimes:jpg,jpeg,png,webp,svg|max:2048',

            'media_image'             => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'media_video'             => 'nullable|mimes:mp4,webm,ogg|max:5120',
            'url'                     => 'nullable|url',
        ], [
            'image.required' => 'Thumbnail image is required.',
        ]);


        // Count how many media inputs are provided
        $mediaInputs = 0;

        if ($request->hasFile('media_image')) {
            $mediaInputs++;
        }

        if ($request->hasFile('media_video')) {
            $mediaInputs++;
        }

        if (!empty($request->url)) {
            $mediaInputs++;
        }

        // Must be exactly ONE
        if ($mediaInputs !== 1) {
            return redirect()
                ->back()
                ->withInput()
                ->with('message', 'Please upload either an image OR a video OR provide a URL (only one).');
        }


        // ✅ Upload Path
        $uploadPath = public_path('uploads/media');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // ============================
        // THUMBNAIL IMAGE UPLOAD
        // ============================

        $thumbnailName = null;

        if ($request->hasFile('image')) {
            $img = $request->file('image');
            $thumbnailName = time() . '_' . rand(1000, 9999) . '_thumbnail.' . $img->getClientOriginalExtension();
            $img->move($uploadPath, $thumbnailName);
        }

        // ============================
        // MEDIA IMAGE UPLOAD
        // ============================

        $mediaImageName = null;

        if ($request->hasFile('media_image')) {
            $img = $request->file('media_image');
            $mediaImageName = time() . '_' . rand(1000, 9999) . '_media.' . $img->getClientOriginalExtension();
            $img->move($uploadPath, $mediaImageName);
        }

        // ============================
        // MEDIA VIDEO UPLOAD
        // ============================

        $mediaVideoName = null;

        if ($request->hasFile('media_video')) {
            $video = $request->file('media_video');
            $mediaVideoName = time() . '_' . rand(1000, 9999) . '_video.' . $video->getClientOriginalExtension();
            $video->move($uploadPath, $mediaVideoName);
        }

        // ============================
        // SAVE TO DATABASE
        // ============================

        ManageMediaCoverage::create([
            'media_heading'          => $request->media_heading,
            'media_publication'      => $request->media_publication,
            'media_type'             => $request->media_type,
            'media_publication_date' => $request->media_publication_date,
            'description'            => $request->description,

            'thumbnail_image'        => $thumbnailName,
            'media_image'            => $mediaImageName,
            'media_video'            => $mediaVideoName,
            'url'                    => $request->url,
            'created_by'  => Auth::id(),
            'created_at'  => Carbon::now(),
        ]);

        return redirect()->route('admin.manage-media-coverages.index')->with('message', 'Media coverage added successfully.');
    }

    public function edit($id)
    {
        $media_coverages = ManageMediaCoverage::findOrFail($id);
        return view('backend.media_coverages.edit', compact('media_coverages'));
    }

    public function update(Request $request, $id)
    {
        $media = ManageMediaCoverage::findOrFail($id);

        // ======================================
        // VALIDATION
        // ======================================

        $request->validate([
            'media_heading'           => 'nullable|string|max:255',
            'media_publication'       => 'nullable|string|max:255',
            'media_type'              => 'nullable|string|max:255',
            'media_publication_date'  => 'nullable|string|max:255',
            'description'             => 'nullable|string',

            'image'        => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'media_image'  => 'nullable|image|mimes:jpg,jpeg,png,webp,svg|max:2048',
            'media_video'  => 'nullable|mimes:mp4,webm,ogg|max:5120',
            'url'          => 'nullable|url',
        ]);

        // ======================================
        // UPLOAD PATH
        // ======================================

        $uploadPath = public_path('uploads/media');
        if (!file_exists($uploadPath)) {
            mkdir($uploadPath, 0755, true);
        }

        // ======================================
        // DETERMINE FINAL MEDIA STATE
        // ======================================

        $removeImage = $request->remove_media_image == 1;
        $removeVideo = $request->remove_media_video == 1;

        $hasNewImage = $request->hasFile('media_image');
        $hasNewVideo = $request->hasFile('media_video');
        $hasNewUrl   = !empty($request->url);

        $finalImage = $hasNewImage ? true : (!$removeImage && $media->media_image);
        $finalVideo = $hasNewVideo ? true : (!$removeVideo && $media->media_video);
        $finalUrl   = $hasNewUrl ? true : (!$hasNewUrl && empty($request->url) ? false : $media->url);

        $mediaCount = ($finalImage ? 1 : 0) + ($finalVideo ? 1 : 0) + ($finalUrl ? 1 : 0);

        if ($mediaCount !== 1) {
            return back()
                ->withInput()
                ->with('message', 'Please keep exactly ONE media type (Image OR Video OR URL).');
        }

        // ======================================
        // DELETE OLD FILES IF SWITCHING
        // ======================================

        $mediaImageName = $media->media_image;
        $mediaVideoName = $media->media_video;
        $url            = $media->url;

        // ----- If uploading new IMAGE -----
        if ($hasNewImage) {

            if ($media->media_image && file_exists($uploadPath.'/'.$media->media_image)) {
                unlink($uploadPath.'/'.$media->media_image);
            }

            if ($media->media_video && file_exists($uploadPath.'/'.$media->media_video)) {
                unlink($uploadPath.'/'.$media->media_video);
            }

            $file = $request->file('media_image');
            $mediaImageName = time().'_'.rand(1000,9999).'_media.'.$file->getClientOriginalExtension();
            $file->move($uploadPath, $mediaImageName);

            $mediaVideoName = null;
            $url = null;
        }

        // ----- If uploading new VIDEO -----
        elseif ($hasNewVideo) {

            if ($media->media_video && file_exists($uploadPath.'/'.$media->media_video)) {
                unlink($uploadPath.'/'.$media->media_video);
            }

            if ($media->media_image && file_exists($uploadPath.'/'.$media->media_image)) {
                unlink($uploadPath.'/'.$media->media_image);
            }

            $file = $request->file('media_video');
            $mediaVideoName = time().'_'.rand(1000,9999).'_video.'.$file->getClientOriginalExtension();
            $file->move($uploadPath, $mediaVideoName);

            $mediaImageName = null;
            $url = null;
        }

        // ----- If using URL -----
        elseif ($hasNewUrl) {

            if ($media->media_image && file_exists($uploadPath.'/'.$media->media_image)) {
                unlink($uploadPath.'/'.$media->media_image);
            }

            if ($media->media_video && file_exists($uploadPath.'/'.$media->media_video)) {
                unlink($uploadPath.'/'.$media->media_video);
            }

            $mediaImageName = null;
            $mediaVideoName = null;
            $url = $request->url;
        }

        // ======================================
        // THUMBNAIL UPDATE
        // ======================================

        $thumbnailName = $media->thumbnail_image;

        if ($request->hasFile('image')) {

            if ($media->thumbnail_image && file_exists($uploadPath.'/'.$media->thumbnail_image)) {
                unlink($uploadPath.'/'.$media->thumbnail_image);
            }

            $thumb = $request->file('image');
            $thumbnailName = time().'_'.rand(1000,9999).'_thumbnail.'.$thumb->getClientOriginalExtension();
            $thumb->move($uploadPath, $thumbnailName);
        }

        // ======================================
        // UPDATE DATABASE
        // ======================================

        $media->update([
            'media_heading'          => $request->media_heading,
            'media_publication'      => $request->media_publication,
            'media_type'             => $request->media_type,
            'media_publication_date' => $request->media_publication_date,
            'description'            => $request->description,

            'thumbnail_image'        => $thumbnailName,
            'media_image'            => $mediaImageName,
            'media_video'            => $mediaVideoName,
            'url'                    => $url,

            'modified_by'            => Auth::id(),
            'modified_at'            => Carbon::now(),
        ]);

        return redirect()
            ->route('admin.manage-media-coverages.index')
            ->with('message', 'Media coverage updated successfully.');
    }

    public function destroy(string $id)
    {
        $data['deleted_by'] =  Auth::user()->id;
        $data['deleted_at'] =  Carbon::now();
        try {
            $industries = ManageMediaCoverage::findOrFail($id);
            $industries->update($data);

            return redirect()->route('admin.manage-media-coverages.index')->with('message', 'Details deleted successfully!');
        } catch (Exception $ex) {
            return redirect()->back()->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }
    
}
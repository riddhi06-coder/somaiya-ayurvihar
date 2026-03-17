<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GalleryController extends Controller
{

    public function index()
    {
        return view('backend.gallery.index');
    }

    public function create()
    {
        return view('backend.gallery.create');
    }
}
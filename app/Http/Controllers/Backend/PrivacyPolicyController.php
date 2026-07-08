<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\PrivacyPolicy;
use Carbon\Carbon;

class PrivacyPolicyController extends Controller
{
    public function index()
    {
        $policies = PrivacyPolicy::whereNull('deleted_by')
            ->latest('id')
            ->paginate(15);

        return view('backend.policies.privacy.index', compact('policies'));
    }

    public function create()
    {
        return view('backend.policies.privacy.create');
    }

    public function store(Request $request)
    {
        $data = $this->validatePolicy($request);

        PrivacyPolicy::create([
            'privacy_policy'  => $data['privacy_policy'],
            'questions'       => array_values($data['questions']),
            'contact_details' => $data['contact_details'],
            'created_at'      => Carbon::now(),
            'created_by'      => Auth::id(),
        ]);

        return redirect()
            ->route('admin.manage-privacy-policy.index')
            ->with('message', 'Privacy policy created successfully.');
    }

    public function edit(PrivacyPolicy $manage_privacy_policy)
    {
        $policy = $manage_privacy_policy;

        return view('backend.policies.privacy.edit', compact('policy'));
    }

    public function update(Request $request, PrivacyPolicy $manage_privacy_policy)
    {
        $data = $this->validatePolicy($request);

        $manage_privacy_policy->update([
            'privacy_policy'  => $data['privacy_policy'],
            'questions'       => array_values($data['questions']),
            'contact_details' => $data['contact_details'],
            'modified_at'     => Carbon::now(),
            'modified_by'     => Auth::id(),
        ]);

        return redirect()
            ->route('admin.manage-privacy-policy.index')
            ->with('message', 'Privacy policy updated successfully.');
    }

    public function destroy(string $id)
    {
        try {
            $policy = PrivacyPolicy::findOrFail($id);
            $policy->update([
                'deleted_by' => Auth::id(),
                'deleted_at' => Carbon::now(),
            ]);

            return redirect()
                ->route('admin.manage-privacy-policy.index')
                ->with('message', 'Details deleted successfully!');
        } catch (\Exception $ex) {
            return redirect()->back()
                ->with('error', 'Something Went Wrong - ' . $ex->getMessage());
        }
    }

    /**
     * Normalise empty CKEditor content, then validate.
     * CKEditor sends blank fields as "<p>&nbsp;</p>" or "", which would
     * otherwise sneak past `required`, so we null those out first.
     */
    private function validatePolicy(Request $request): array
    {
        $clean = function ($v) {
            $text = trim(str_replace('&nbsp;', '', strip_tags((string) $v)));
            return $text === '' ? null : $v;
        };

        $questions = $request->input('questions', []);
        if (is_array($questions)) {
            foreach ($questions as $i => $q) {
                if (isset($q['answer'])) {
                    $questions[$i]['answer'] = $clean($q['answer']);
                }
            }
        }

        $request->merge([
            'privacy_policy'  => $clean($request->input('privacy_policy')),
            'contact_details' => $clean($request->input('contact_details')),
            'questions'       => $questions,
        ]);

        return $request->validate(
            [
                'privacy_policy'       => ['required', 'string'],
                'contact_details'      => ['required', 'string'],
                'questions'            => ['required', 'array', 'min:1'],
                'questions.*.question' => ['required', 'string', 'max:500'],
                'questions.*.answer'   => ['required', 'string'],
            ],
            [
                'privacy_policy.required'       => 'The privacy policy is required.',
                'contact_details.required'      => 'The contact details are required.',
                'questions.required'            => 'Please add at least one question.',
                'questions.min'                 => 'Please add at least one question.',
                'questions.*.question.required' => 'Each question is required.',
                'questions.*.answer.required'   => 'Each answer is required.',
            ]
        );
    }
}
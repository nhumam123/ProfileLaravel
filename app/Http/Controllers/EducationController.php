<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EducationController extends Controller
{
    public function index()
    {
        $educations = Education::orderBy('start_date', 'asc')->paginate(10);
        return view('educations.index', compact('educations'));
    }

    public function create()
    {
        return view('educations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'institution_name' => 'required',
            'field_of_study' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after_or_equal:start_date',
            'logo' => 'nullable|image|max:2048',
        ]);

        $education = new Education([
            'institution_name' => $request->input('institution_name'),
            'field_of_study' => $request->input('field_of_study'),
            'start_date' => $request->input('start_date') . '-01',
            'end_date' => $request->input('end_date') . '-01',
        ]);

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->storeAs('uploads/education_logos', $logoName, 'public');
            $education->education_logo = $logoName;
        }
        $education->save();

        return redirect()->route('educations.index')
            ->with('status', 'Education created successfully.');
    }




    public function show(Education $education)
    {
        return view('educations.show', compact('education'));
    }

    public function edit(Education $education)
    {
        return view('educations.edit', compact('education'));
    }

    public function update(Request $request, Education $education)
    {
        $request->validate([
            'institution_name' => 'required',
            'field_of_study' => 'required',
            'start_date' => 'required|date_format:Y-m',
            'end_date' => 'required|date_format:Y-m|after_or_equal:start_date',
            'logo' => 'nullable|image|max:2048',
        ]);

        $startDate = $request->input('start_date') . '-01';
        $endDate = $request->input('end_date') . '-01';
        $oldLogo = $education->education_logo;

        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logoName = time() . '_' . $logo->getClientOriginalName();
            $logo->storeAs('uploads/education_logos', $logoName, 'public');
            $education->education_logo = $logoName;
            if ($oldLogo) {
                Storage::delete('public/education_logos/' . $oldLogo);
            }
        }

        $education->update([
            'institution_name' => $request->input('institution_name'),
            'field_of_study' => $request->input('field_of_study'),
            'start_date' => $startDate,
            'end_date' => $endDate,
            'education_logo' => $logoName ?? $oldLogo,
        ]);

        return redirect()->route('educations.index')->with('success', 'Education has been updated successfully.');
    }




    public function destroy(Education $education)
    {
        $education->delete();

        return redirect()->route('educations.index')->with('success', 'Education has been deleted successfully.');
    }
}

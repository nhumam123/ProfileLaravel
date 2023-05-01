<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::orderBy('start_date','asc')->paginate(10);
        return view('experiences.index', compact('experiences'));
    }

    public function create()
    {
        return view('experiences.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'start_date' => 'required|date_format:Y-m',
            'end_date' => 'required|date_format:Y-m|after_or_equal:start_date',
            'paragraph' => 'required',
        ]);

        $experience = new Experience([
            'title' => $request->input('title'),
            'subtitle' => $request->input('subtitle'),
            'start_date' => $request->input('start_date') . '-01',
            'end_date' => $request->input('end_date')  . '-01',
            'paragraph' => $request->input('paragraph'),
        ]);

        $experience->save();

        return redirect()->route('experiences.index')->with('success','Experience has been created successfully.');
    }

    public function show(Experience $experience)
    {
        return view('experiences.show',compact('experience'));
    }

    public function edit(Experience $experience)
    {
        return view('experiences.edit',compact('experience'));
    }
    public function update(Request $request, Experience $experience)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'required',
            'paragraph' => 'required',
        ]);

        $experience->fill($request->post())->save();

        return redirect()->route('experiences.index')->with('success','Experience Has Been updated successfully');
    }

    public function destroy(Experience $experience)
    {
        $experience->delete();
        return redirect()->route('experiences.index')->with('success','Experience has been deleted successfully');
    }
}

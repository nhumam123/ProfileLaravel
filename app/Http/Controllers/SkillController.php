<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index() {
        $skills = Skill::orderBy('id','asc')->paginate(10);
        return view('skills.index', compact('skills'));
    }
    public function create() {
        return view('skills.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'value' => 'required',
        ]);

        Skill::create($request->post());

        return redirect()->route('skills.index')->with('success','Skill has been created successfully.');
    }

    public function show(Skill $skill)
    {
        return view('skills.show',compact('skill'));
    }

    public function edit(Skill $skill)
    {
        return view( 'skills.edit',compact('skill'));
    }

    public function update(Request $request, Skill $skill)
    {
        $request->validate([
            'name' => 'required',
            'value' => 'required',
        ]);

        $skill->fill($request->post())->save();

        return redirect()->route('skills.index')->with('success','Skill Has Been updated successfully');
    }

    public function destroy(Skill $skill)
    {
        $skill->delete();
        return redirect()->route('skills.index')->with('success','Skill has been deleted successfully');
    }
}

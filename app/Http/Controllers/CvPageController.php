<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class CvPageController extends Controller
{
    public function index()
    {
        $profile = DB::table('profiles')->first();;
        $skills = DB::table('skills')->get();
        $education = DB::table('educations')->orderBy('start_date', 'asc')->get();
        $experience = DB::table('experiences')->orderBy('start_date', 'asc')->get();
        return view('welcome', compact('profile','skills', 'education', 'experience'));
    }
}

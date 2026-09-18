<?php

namespace App\Http\Controllers;


use App\Models\Profile;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $profile = Profile::first();
        $education = Education::orderBy('sort_order')->get();
        $experiences = Experience::orderBy('sort_order')->get();
        $projects = Project::orderBy('sort_order')->get();
        
        $skills = Skill::orderBy('sort_order')->get();
        $groupedSkills = [
            'languages' => $skills->where('category', 'programming_language'),
            'frameworks' => $skills->where('category', 'framework'),
            'databases' => $skills->where('category', 'database'),
            'tools' => $skills->where('category', 'tools'),
        ];

        $categories = $projects->pluck('category')->unique()->values();

        return view('portfolio.index', compact(
            'profile',
            'education',
            'experiences',
            'projects',
            'groupedSkills',
            'categories'
        ));
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Profile;
use App\Models\Project;
use App\Models\Skill;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        $stats = [
            'projects_count' => Project::count(),
            'experiences_count' => Experience::count(),
            'education_count' => Education::count(),
            'skills_count' => Skill::count(),
            'messages_count' => ContactMessage::count(),
            'unread_messages' => ContactMessage::where('is_read', false)->count(),
        ];

        $profile = Profile::first();
        $recentMessages = ContactMessage::latest()->take(5)->get();
        $recentProjects = Project::orderBy('sort_order')->take(4)->get();

        return view('admin.dashboard', compact('stats', 'profile', 'recentMessages', 'recentProjects'));
    }
}

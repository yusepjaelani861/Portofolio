<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PublicController extends Controller
{
    public function home()
    {
        $projects = Project::with('tags')->orderBy('created_at', 'desc')->get()->take(4);

        return $this->sendResponse($projects, 'Getting data success');
    }

    public function projects()
    {
        $projects = Project::with('tags')->orderBy('created_at', 'desc')->get();

        return Inertia::render('Projects', [
            'projects' => $projects,
        ]);
    }


}

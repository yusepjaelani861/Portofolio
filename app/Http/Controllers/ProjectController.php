<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectTag;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class ProjectController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | GET Method
    |--------------------------------------------------------------------------
    */
    public function list(Request $request)
    {
        $request->validate([
            'tags[]' => 'nullable|integer|exists:tags,slug'
        ]);

        $projects = Project::with('tags');
        if ($request->has('tags')) {
            $projects->whereHas('tags', function ($query) use ($request) {
                $query->whereIn('slug', $request->tags);
            });
        }

        $projects = $projects->paginate(10);
        
        return Inertia::render('Admin/ListProjects', [
            'projects' => $projects,
        ]);
    }

    public function view(int $id)
    {
        $project = Project::with('tags')->findOrFail($id);

        return Inertia::render('Project', [
            'project' => $project,
        ]);
    }


    /*
    |--------------------------------------------------------------------------
    | POST Method
    |--------------------------------------------------------------------------
    */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'thumbnail' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'tags' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 'VALIDATION_ERROR', 422);
        }

        try {
            //code...
            DB::beginTransaction();
            $project = Project::create([
                'user_id' => auth()->user()->id,
                'name' => $request->name,
                'thumbnail' => $request->thumbnail,
                'description' => $request->description,
                'url' => $request->url,
            ]);

            $tags = explode(',', $request->tags);
            foreach ($tags as $tag) {
                $slug = str_replace(' ', '-', strtolower($tag));
                while (Tag::where('slug', $slug)->exists()) {
                    $slug = $slug . '-' . rand(1, 100);
                }
                $tagg = Tag::firstOrCreate(['name' => $tag, 'slug' => $slug]);
                ProjectTag::create([
                    'project_id' => $project->id,
                    'tag_id' => $tagg->id,
                ]);
            }

            DB::commit();

            $project = Project::with('tags')->find($project->id);

            return $this->sendResponse($project, 'Project created successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->sendError($th->getMessage(), $th->getTrace(), 'SERVER_ERROR', 500);
        }
    }

    public function edit(int $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'thumbnail' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'tags' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors(), 'VALIDATION_ERROR', 422);
        }

        try {
            //code...
            DB::beginTransaction();
            $project = Project::find($id);
            $project->update([
                'name' => $request->name,
                'thumbnail' => $request->thumbnail,
                'description' => $request->description,
                'url' => $request->url,
            ]);

            $projectTag = ProjectTag::where('project_id', $project->id)->get();
            foreach ($projectTag as $pt) {
                $pt->delete();
            }

            $tags = explode(',', $request->tags);
            foreach ($tags as $tag) {
                $slug = str_replace(' ', '-', strtolower($tag));
                while (Tag::where('slug', $slug)->exists()) {
                    $slug = $slug . '-' . rand(1, 100);
                }
                $tagg = Tag::firstOrCreate(['name' => $tag, 'slug' => $slug]);
                ProjectTag::create([
                    'project_id' => $project->id,
                    'tag_id' => $tagg->id,
                ]);
            }

            DB::commit();

            $project = Project::with('tags')->find($project->id);

            return $this->sendResponse($project, 'Project updated successfully.');
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            return $this->sendError($th->getMessage(), $th->getTrace(), 'SERVER_ERROR', 500);
        }
    }


    /*
    |--------------------------------------------------------------------------
    | DELETE Method
    |--------------------------------------------------------------------------
    */
    public function delete(int $id)
    {
        $project = Project::find($id);
        if (!$project) {
            return $this->sendError('Project not found.', [], 'NOT_FOUND', 404);
        }

        $project->delete();

        return $this->sendResponse([], 'Project deleted successfully.');
    }

    
}

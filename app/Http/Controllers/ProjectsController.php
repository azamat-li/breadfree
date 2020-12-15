<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;


class ProjectsController extends Controller
{
    /**
     * Display a listing of projects.
     *
     * @return Appication|Foctory|View
     */
    public function main()
    {
        $projects = Project::all();

        return view('projects.main', compact('projects'));
    }

    /**
     * Store a newly created project in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Response|Redirector
     */
    public function store(Request $request)
    {
        $attributes = request()->validate(['title' => 'required', 'description' => 'required']);

        Project::create($attributes);

        return redirect('/projects');
    }


    /**
     * Display the project.
     *
     * @param int $id
     * @return Application|Factory|View|Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Update the specified project in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified project from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

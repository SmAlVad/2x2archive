<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        return view('admin.projects.index', [
            'projects' => Project::orderBy('sort','DESK')->get()
        ]);
    }

    public function create()
    {
        return view('admin.projects.create');
    }

    public function store(Request $request)
    {
        Project::create($request->all());

        return redirect()
            ->route('admin.project.index')
            ->with('success', 'Новый проект успешно добавлен');
    }

    public function edit($id)
    {
        $project = Project::find($id);

        return view('admin.projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $project = Project::find($id);

        $project->name = $request->get('name');
        $project->slug = $request->get('slug');
        $project->sort = $request->get('sort');
        $project->save();

        return redirect()
            ->route('admin.project.index')
            ->with('success', 'Данные успешно обновлены');
    }

    public function destroy($id)
    {
        $rate = Project::find($id);

        $rate->delete();

        return redirect()
            ->route('admin.project.index')
            ->with('success', 'Проект успешно удален');
    }
}

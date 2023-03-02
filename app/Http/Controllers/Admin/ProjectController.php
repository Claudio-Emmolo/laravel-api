<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Dotenv\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{

    public $validator = [
        "type_id" => "nullable|exists:types,id",
        "title" => "required|unique:Projects|string|min:2|max:100",
        "url" => "required|url",
        "date" => "required|date",
        "preview_img" => "nullable|image",
        "difficulty" => "required|numeric|between:1,5",
        "tecnologies" => "array|exists:technologies,id",
    ];

    public $errorMessage = [
        "type_id.exists" => 'Il tipo selezionato non esiste!',

        "title.required" => 'Inserire un titolo',
        "title.unique" => 'Il titolo è già stato usato! Inserisci un titolo diverso',
        "title.string" => 'Il campo deve contenere una stringa',
        "title.min" => 'Inserisci almeno due caratteri',
        "title.max" => 'Limite di carettiri superato (100)',



        "url.required" => 'Inserire un URL',
        "url.url" => 'URL non valido',


        "date.required" => 'Inserire una data',
        "date.date" => 'Data non valida o scritta non correttamente',

        "preview_img.image" => 'Immagine non corretta',

        "difficulty.required" => 'Inserire la difficoltà dell\'esercizio',
        "difficulty.numeric" => 'Il campo può contenere sono numeri',
        "difficulty.between" => 'Il numero deve essere compreso tra 1 e 5',



        "tecnologies.required" => 'Inserire almeno una tecnologia usata per il progetto',
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $projectList = Project::orderBy('date', 'desc')->paginate(8);

        $trashCount = Project::onlyTrashed()->count();
        return view('admin.project.index', compact('projectList', 'trashCount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.project.create', ["project" => new Project(), "typeList" => Type::all(), "technologyList" => Technology::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate($this->validator, $this->errorMessage);
        $newProject = new Project();
        $newProject->fill($data);

        //Upload IMG
        if (isset($data['preview_img'])) {
            $newProject->preview_img = Storage::put('uploads', $data['preview_img']);
        }

        $newProject->save();

        if (isset($data['tecnologies'])) {
            $newProject->technologies()->sync($data['tecnologies']);
        }


        return redirect()->route('admin.projects.index', compact('newProject'));
    }

    /**
     * Display the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('admin.project.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $typeList = Type::all();
        $technologyList = Technology::all();
        return view('admin.project.edit', compact('project', 'typeList', 'technologyList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $rules = $this->validator;
        $rules['title'] = ['required', 'string', 'min:1', 'max:100', Rule::unique('projects')->ignore($project->id)];

        $editData = $request->validate($rules, $this->errorMessage);


        //remove exist img
        if ($request->hasFile('preview_img')) {
            //Check if IMG or URL
            if (!$project->isImageUrl()) {
                Storage::delete($project->preview_img);
            }
        };

        //Upload IMG
        $editData['preview_img'] = Storage::put('uploads', $editData['preview_img']);

        $project->update($editData);

        if (isset($data['tecnologies'])) {
            $project->technologies()->sync($editData['tecnologies']);
        } else {
            $project->technologies()->sync([]);
        }


        return redirect()->route('admin.projects.index', compact('project'))->with('message', 'Project has been modified')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Project $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return redirect()->route('admin.projects.index')->with('message', 'Project has been delete')->with('type', 'warning');
    }

    // Trash Route

    public function trash()
    {
        $projectList = Project::onlyTrashed()->get();
        return view('admin.project.trash', compact('projectList'));
    }


    /**
     * Returns the restored item
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Project::where('id', $id)->withTrashed()->restore();
        return redirect()->route('admin.projects.index')->with('message', 'Project has been restored')->with('type', 'success');
    }


    /**
     * Returns the restored item
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Project $project)
    {
        //Check if IMG or URL
        if (!$project->isImageUrl()) {
            // Delete Img
            Storage::delete($project->preview_img);
        }
        $project->forceDelete();
        return redirect()->route('admin.projects.index')->with('message', 'Project has been permanently deleted')->with('type', 'warning');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{

    public $validation = [
        "name" => 'required|string|max:100',
        "color_tag" => 'required|string',
    ];

    public $errorMsg = [
        "name.required" => "Inserire un nome",
        "name.string" => "Il campo deve contenere una stringa",
        "name.max" => "Limite di carettiri superato (100)",

        "color_tag.required" => "Inserire un colore",
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnologyList = Technology::all();
        return view('admin.technology.index', compact('tecnologyList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technology.create', ["technology" => new Technology()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validation);

        $newtechnology = new Technology();
        $newtechnology->fill($data);
        $newtechnology->save();


        return redirect()->route('admin.technologies.index', compact('newtechnology'))->with('message', 'Project has been created')->with('type', 'success');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
        return view('admin.technology.edit', compact('technology'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Technology $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $editData = $request->validate($this->validation);

        $technology->update($editData);

        return redirect()->route('admin.technologies.index', compact('technology'))->with('message', 'Project has been modified')->with('type', 'success');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->route('admin.technologies.index')->with('message', 'Project has been permanently deleted')->with('type', 'warning');;
    }
}

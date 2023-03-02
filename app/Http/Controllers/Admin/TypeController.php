<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public $validator = [
        "name" => "required|string|max:200",
    ];

    public $errorMsg = [
        "name.required" => "Inserisci un type",
        "name.max" => 'Hai superato il limite di caratteri (200)'
    ];

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeList = Type::all();
        return view('admin.type.index', compact('typeList'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate($this->validator, $this->errorMsg);


        $newType = new Type();
        $newType->fill($data);
        $newType->save();

        return redirect()->route('admin.types.index', compact('newType'))->with('message', 'Type Aggiungo')->with('type', 'success');
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
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        // $typeElement = Type::all();
        return view('admin.type.edit', compact("type"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Type $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->validate($this->validator, $this->errorMsg);

        $type->update($data);

        return redirect()->route('admin.types.index', compact('type'))->with('message', 'Elemento Modificato')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();

        return redirect()->route('admin.types.index')->with('message', 'Elemento Eliminato')->with('type', 'warning');
    }
}

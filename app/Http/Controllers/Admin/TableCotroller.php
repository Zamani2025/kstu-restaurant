<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TableStoreRequest;
use Illuminate\Http\Request;
use App\Models\Table;

class TableCotroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = Table::all();
        return view("admin.tables.index", compact("tables"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.tables.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableStoreRequest $request)
    {
        Table::create([
            "name" => $request->name,
            "guest_number" => $request->guest_number,
            "status" => $request->status,
            "location" => $request->location,
        ]);

        session()->flash("success_message", "{$request->name} successfully created");
        
        return redirect()->route("admin.tables.index");
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        return view("admin.tables.edit", compact("table"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TableStoreRequest $request, Table $table)
    {

        $table->update($request->validated());
        session()->flash("success_message", "{$request->name} successfully updated");
        
        return redirect()->route("admin.tables.index");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        $table->delete();
        $table->reservations()->delete();
        session()->flash("success_message", "{$table->name} successfully deleted");
        
        return redirect()->route("admin.tables.index");
    }
}

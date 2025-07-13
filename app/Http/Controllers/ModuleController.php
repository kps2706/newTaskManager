<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $modules = Module::all();
        return view('layouts.module.index', compact('modules'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('layouts.module.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validating Request

        $valid_module = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Module::create([
            'name' => $valid_module['name'],
        ]);

        return redirect()->route('module.index')->with('success', 'Module created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $module = Module::findorfail($id);
        return view('layouts.module.edit', compact('module'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $module_for_update = Module::findorfail($id);

        $valid_module = $request->validate([
            'name' => 'required|string|unique:modules,name,'. $module_for_update->id,
        ]);

        $module_for_update->name=$valid_module['name'];

        $module_for_update->save();

        return redirect()->route('module.index')->with('success', 'Module Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $module = Module::findOrFail($id);
        $module->delete();

        return redirect()->route('module.index')->with('success', 'Module deleted successfully.');
    }
}

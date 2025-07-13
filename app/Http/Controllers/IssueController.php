<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Issue;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();

        if ($user->role === 'admin') {
            $issues = Issue::with('module', 'reporter')->latest()->get();
        } elseif ($user->role === 'vendor') {
            $issues = Issue::with('module', 'reporter')
                ->whereHas('module', function ($query) use ($user) {
                    $query->where('assigned_vendor_id', $user->id);
                })->latest()->get();
        } else {
            $issues = Issue::with('module')->where('reporter_id', $user->id)->latest()->get();
        }

        return view('layouts.issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $modules = Module::all();
        return view('layouts.issues.create', compact('modules'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'module_id' => 'required|exists:modules,id',
            'priority' => 'required',
        ]);

        Issue::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'priority' => $validated['priority'],
            'status' => 'new',
            'reported_date' => $request->reported_date ?? now(), // ✅ add this
            'sla_due_date' => $request['sla_due_date'],
            'module_id' => $validated['module_id'],
            'reporter_id' => Auth::id(),
        ]);

        return redirect()->route('issue.index')->with('success', 'Incident reported successfully.');
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
        $issue_for_edit = Issue::findorfail($id);
        $modules = Module::all();
        $users = User::all();
        return view('layouts.issues.edit', compact('issue_for_edit','modules','users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $issue_for_update = Issue::findorfail($id);

       $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'module_id' => 'required|exists:modules,id',
            'priority' => 'required',
            'sla_due_date' => 'required|date',
            'reported_date' => 'required|date',
            'assigned_to' => 'nullable|exists:users,id',
            'status' => 'required|string',
        ]);

        $issue_for_update->update([
            'title'         => $validated['title'],
            'description'   => $validated['description'],
            'module_id'     => $validated['module_id'],
            'priority'      => $validated['priority'],
            'sla_due_date'  => $request->sla_due_date,
            'reported_date' => $request->reported_date,
            'assigned_to'   => $request->assigned_to,
            'status'        => $request->status ?? $issue_for_update->status,
            ]);

            return redirect()->route('issue.index')->with('success', 'Issue updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

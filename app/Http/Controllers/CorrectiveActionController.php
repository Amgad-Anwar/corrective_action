<?php

namespace App\Http\Controllers;

use App\Models\CorrectiveAction;
use Illuminate\Http\Request;


class CorrectiveActionController extends Controller
{
    public function index()
    {
        $actions = CorrectiveAction::all();
        return view('actions.index', compact('actions'));
    }

    public function create()
    {
        return view('actions.create_edit');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'document_name' => 'required|string|max:255',
            'issue_date' => 'nullable|date',
            'revision_date' => 'nullable|date',
            'certificate_number' => 'nullable|string|max:255',
            'nonconformance_details' => 'nullable|string',
            'action_required' => 'nullable|string',
            'requested_by' => 'nullable|string|max:255',
            'request_date' => 'nullable|date',
            'factory_manager' => 'nullable|string|max:255',
            'operation_manager' => 'nullable|string|max:255',
            'production_manager' => 'nullable|string|max:255',
            'qar_signature' => 'nullable|string|max:255',
            'follow_up_corrective' => 'nullable|boolean',
            'follow_up_preventive' => 'nullable|boolean',
            'additional_notes' => 'nullable|string',
        ]);

        CorrectiveAction::create($data);
        return redirect()->route('actions.index');
    }

    public function show(CorrectiveAction $action)
    {
        return view('actions.show', compact('action'));
    }

    public function edit(CorrectiveAction $action)
    {
        return view('actions.create_edit', compact('action'));
    }

    public function update(Request $request, CorrectiveAction $action)
    {
        $data = $request->validate([
            'document_name' => 'required|string|max:255',
            'issue_date' => 'nullable|date',
            'revision_date' => 'nullable|date',
            'certificate_number' => 'nullable|string|max:255',
            'nonconformance_details' => 'nullable|string',
            'action_required' => 'nullable|string',
            'requested_by' => 'nullable|string|max:255',
            'request_date' => 'nullable|date',
            'factory_manager' => 'nullable|string|max:255',
            'operation_manager' => 'nullable|string|max:255',
            'production_manager' => 'nullable|string|max:255',
            'qar_signature' => 'nullable|string|max:255',
            'follow_up_corrective' => 'nullable|boolean',
            'follow_up_preventive' => 'nullable|boolean',
            'additional_notes' => 'nullable|string',
        ]);

        $action->update($data);
        return redirect()->route('actions.index');
    }

    public function destroy(CorrectiveAction $action)
    {
        $action->delete();
        return redirect()->route('actions.index');
    }
}


<?php

namespace App\Http\Controllers;

use App\DataTables\CorrectiveActionDataTable;
use App\Models\CorrectiveAction;
use Illuminate\Http\Request;


class CorrectiveActionController extends Controller
{

    public function index( CorrectiveActionDataTable $dataTable){
        return $dataTable->render('dashboard.actions.index');
    }


    public function create()
    {
        return view('dashboard.actions.create_edit');
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
        alert()->success(__('Success'),__('Create Successfully'));
        return redirect()->back();
    }

    // public function show($id)
    // {
    //     $document = CorrectiveAction::findOrFail($id);

    //     return view('dashboard.actions.show', compact('document'));
    // }

    public function edit($id)
    {

        $document = CorrectiveAction::findOrFail($id);
        return view('dashboard.actions.create_edit', compact('document'));
    }

    public function update(Request $request, $id)
    {
        $document = CorrectiveAction::findOrFail($id);

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

        $document->update($data);
        alert()->success(__('Success'),__('Update Successfully'));
        return redirect()->back();
    }

    public function destroy($id)
    {
      
        $document = CorrectiveAction::findOrFail($id);
        $document->delete();
        return response()->json(['success'=>true]);
    }
}


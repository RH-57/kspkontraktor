<?php

namespace App\Http\Controllers\Admin;

use App\Models\Procedure;
use Illuminate\Http\Request;

class ProcedureController
{
    public function index() {
        $procedures = Procedure::orderBy('no')->get();

        return view('admin.procedures.index', compact('procedures'));
    }

    public function create() {
        return view('admin.procedures.create');
    }

    public function store(Request $request) {
        $request->validate([
            'no'            => 'required|string|unique:procedures,no',
            'title'         => 'required|string|max:50',
            'description'   => 'required|string',
        ]);

        Procedure::create([
            'no'            => $request->no,
            'title'         => $request->title,
            'description'   => $request->description,
        ]);

        return redirect()->route('procedures.index')->with('success', 'Procedure Created Successfully');

    }

    public function edit($id) {
        $procedure = Procedure::findOrFail($id);

        return view('admin.procedures.edit', compact('procedure'));
    }

    public function update(Request $request, $id) {
        $procedure = Procedure::where('id', $id)->firstOrFail();

        $request->validate([
            'no'            => 'required|string|unique:procedures,no,' . $id,
            'title'         => 'required|string|max:50',
            'description'   => 'required|string',
        ]);

        $procedure->update([
            'no'            => $request->no,
            'title'         => $request->title,
            'description'   => $request->description,
        ]);

        return redirect()->route('procedures.edit', $id)->with('success', 'Procedure Updated Successfully');

    }

    public function destroy($id) {
        $procedure = Procedure::findOrFail($id);
        $procedure->delete();

        return redirect()->route('procedures.index')->with('success', 'Procedure Deleted Successfully');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mda;

class SuperAdminController extends Controller
{
    public function mdaIndex()
    {
        $mdas = Mda::all();
        return view('superadmin.mdamanager', compact('mdas'));
    }

    public function storeMda(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:mdas',
            'description' => 'nullable|string'
        ]);

        Mda::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', 'MDA created successfully');
    }

    public function updateMda(Request $request, $id)
    {
        $mda = Mda::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255|unique:mdas,name,' . $id,
            'description' => 'nullable|string'
        ]);

        $mda->update([
            'name' => $request->name,
            'description' => $request->description
        ]);

        return redirect()->back()->with('success', 'MDA updated successfully');
    }

    public function deleteMda($id)
    {
        $mda = Mda::findOrFail($id);
        $mda->delete();
        return response()->json(['message' => 'MDA deleted successfully']);
    }
}
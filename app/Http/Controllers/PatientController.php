<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use App\Models\Patient;

class PatientController extends Controller
{

    public function show($id)
    {
        $patient = Patient::find($id);

        if ($patient) {
            return response()->json($patient);
        } else {
            return response()->json(['message' => 'Patient not found'], 404);
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPatient(Request $request)
{

    $patients = Patient::where('user_id', Auth::id())->get();
    //$patients = Patient::query(); 
    //$patients = $patients->get();
    return response()->json(['data' => $patients]);
}

    /**
     * Store a newly created patient record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function patient(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|string',
            'sampletype' => 'required|string',
            'clinicalhistory' => 'required|string',
            'diagnosis' => 'required|string',
            'user_id' => 'integer',
        ]);

        $validatedData['user_id'] = Auth::id();

        // Create a new patient record associated with the authenticated user (if needed)
        $patient = Patient::create($validatedData);

        return response()->json(['message' => 'Patient added successfully', 'patient' => $patient], 201);
    }
}

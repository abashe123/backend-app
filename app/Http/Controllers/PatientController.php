<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;

class PatientController extends Controller
{
    public function patient(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'age' => 'required|integer|min:0',
            'gender' => 'required|string',
            'sampleType' => 'required|string',
            'clinicalHistory' => 'required|string',
            'diagnosis' => 'required|string',
        ]);

        $patient = Patient::create($validatedData);

        return response()->json(['message' => 'Patient added successfully', 'patient' => $patient], 201);
    }

    public function getPatient(){
        $patient = Patient::get();

        return response()->json(['data' => $patient]);
    }
}



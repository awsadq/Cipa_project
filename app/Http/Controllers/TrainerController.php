<?php

namespace App\Http\Controllers;

use App\Models\Trainer;

class TrainerController extends Controller
{
    // GET /trainers
    public function index()
    {
        return response()->json(Trainer::all());
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Configuration;
use Illuminate\Http\Request;

class ConfigurationController extends Controller
{
    public function index()
    {
        $configurations = Configuration::all();
        return view('configurations.index', compact('configurations'));
    }

    public function create()
    {
        return view('configurations.create');
    }

    public function edit(Configuration $configuration)
    {
        return view('configurations.edit', compact('configuration'));
    }
}

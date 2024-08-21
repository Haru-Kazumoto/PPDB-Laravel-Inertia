<?php

namespace App\Http\Controllers;

use App\Models\RegistrationPath;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class RegistrationPathController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $registrationPaths = RegistrationPath::all();

        return Inertia::render('Admin/RegistrationPaths', [
            'pathData' => $registrationPaths
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/RegistrationPaths');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

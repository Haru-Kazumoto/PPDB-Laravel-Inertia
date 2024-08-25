<?php

namespace App\Http\Controllers;

use App\Enum\PathType;
use App\Models\RegistrationPath;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rules\Enum;
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

        return Inertia::render('Admin/RegistrationPath/RegistrationPaths', [
            'pathData' => $registrationPaths
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): Response
    {
        return Inertia::render('Admin/RegistrationPath/CreateRegistrationPath');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'path_name' => ['required', 'string'],
            'path_type' => ['required', new Enum(PathType::class)],
        ]);

        DB::beginTransaction();

        try {
            RegistrationPath::create([
                'path_name' => $request->path_name,
                'path_type' => $request->path_type,
            ]);

            DB::commit();

            return redirect()->route('registration-path.index')->with('success', 'New registration path has created!');
        } catch(\Exception $err) {
            DB::rollBack();
            return redirect()->back()->withErrors('An error occurred: ' . $err->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): Response
    {
        $dataShow = RegistrationPath::with('registrationBatches')
            ->findOrFail($id);

        return Inertia::render('Admin/RegistrationPath/ShowRegistrationPath', compact('dataShow'));
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

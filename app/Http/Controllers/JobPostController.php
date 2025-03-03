<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class JobPostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Job::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => ['required', 'string'],
                'description' => ['required','string', 'max:255'],
                'requirements' => ['required', 'string', 'max:255'],
                'salary' => ['required', 'string'],
                'location' => ['required', 'string'],
                'schedule' => ['required'],
                'tags' => ['required'],
                'department' => ['required'],
            ]);
            
            $job = Job::create(Arr::except($validatedData, 'tags'));

            // $job = Job::create(Arr::except($data, 'tags'));

            if(!empty($data['tags']))
            {
                foreach (explode(',', strtolower($validatedData['tags'])) as $requirement) {
                    $job->tag(trim($requirement));
                }
            }

            return response()->json([
                'message' => 'Job successfully created!',
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed!',
                'errors' => $e->errors()
            ], 422);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($job)
    {
        if(Job::where('id', $job)->exists())
        {
            return Job::find($job);
            
            return response()->json([
                'message' => 'Employee Found.'
            ], 200);
        }
        else
        {
            return response()->json([
                'message' => 'Employee Not Found.'
            ], 404);
        }
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
    public function update($job, Request $request)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        if(Job::where('id', $job)->exists())
        {
            $jobinfo = Job::find($job);

            $jobinfo->update([
                'status' => $validatedData['status'],
            ]);
            
            return response()->json([
                'message' => 'Employee Updated.'
            ], 200);
        }
        else
        {
            return response()->json([
                'message' => 'Employee Not Found.'
            ], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

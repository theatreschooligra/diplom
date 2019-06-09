<?php

namespace App\Http\Controllers\Admin;

use App\Homework;
use App\Http\Requests\HomeworkRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class HomeworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $homework = Homework::all();
        return view('admin.homework.index', compact('homework'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.homework.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param HomeworkRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HomeworkRequest $request)
    {
        $file = $request->file('file');

        $file_name = time() . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('/homework');
        $file->move($destinationPath, $file_name);

        Homework::create([
            'name' => $request->name,
            'file' => $file_name
        ]);

        return redirect()->route('admin.homework.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Homework $homework
     * @return \Illuminate\Http\Response
     */
    public function edit(Homework $homework)
    {
        return view('admin.homework.edit', compact('homework'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param HomeworkRequest $request
     * @param Homework $homework
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(HomeworkRequest $request, Homework $homework)
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');

            $file_name = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/homework');
            $file->move($destinationPath, $file_name);
            if (File::exists('homework/' . $homework->file)) {
                File::delete('homework/'. $homework->file);
            }
            $homework->file = $file_name;
        }

        $homework->name = $request->name;
        $homework->save();

        return redirect()->route('admin.homework.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Homework $homework
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Homework $homework)
    {
        if (File::exists('homework/' . $homework->file)) {
            File::delete('homework/'. $homework->file);
        }
        $homework->delete();

        return redirect()->route('admin.homework.index');
    }
}

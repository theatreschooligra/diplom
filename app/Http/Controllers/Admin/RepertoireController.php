<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RepertoireRequest;
use App\Repertoire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class RepertoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $repertoire = Repertoire::all();
        return view('admin.repertoire.index', compact('repertoire'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.repertoire.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param RepertoireRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RepertoireRequest $request)
    {
        $image = $request->file('image');

        $img = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/img');
        $image->move($destinationPath, $img);

        Repertoire::create([
            'name'      => $request->name,
            'image'     => $img,
            'age_limit' => $request->age_limit,
            'time'      => $request->time,
            'price'     => $request->price
        ]);
        return redirect()->route('admin.repertoire.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Repertoire $repertoire
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Repertoire $repertoire)
    {
        return view('admin.repertoire.edit', compact('repertoire'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param RepertoireRequest $request
     * @param Repertoire $repertoire
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RepertoireRequest $request, Repertoire $repertoire)
    {
        $img = $repertoire->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image');

            $img = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/img');
            $image->move($destinationPath, $img);
            if (File::exists('img/' . $repertoire->image)) {
                File::delete('img/' . $repertoire->image);
            }
        }

        $repertoire->update([
            'name'      => $request->name,
            'image'     => $img,
            'age_limit' => $request->age_limit,
            'time'      => $request->time,
            'price'     => $request->price
        ]);
        return redirect()->route('admin.repertoire.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Repertoire $repertoire
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Repertoire $repertoire)
    {
        $repertoire->delete();
        return redirect()->route('admin.repertoire.index');
    }
}

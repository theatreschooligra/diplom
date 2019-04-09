<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $company = Company::first();
        return view('admin.company.index', compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateCompanyRequest  $request
     * @param  Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->only([
            'email', 'about', 'address', 'phone_number', 'map',
            'url_to_youtube', 'url_to_facebook', 'url_to_instagram'
        ]));

        return view('admin.company.index', compact('company'));
    }
}

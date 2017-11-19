<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use Auth;
use Route;
class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Request $request)
    {
        $this->middleware('owner:'.Route::current()->company, ['only'=>'show', 'edit', 'update']);
        $this->middleware('role:superadmin', ['only'=>'index', 'create', 'store', 'destroy']);

    }

    public function index(Request $request)
    {
        $companies = Company::All();

        if($request->ajax())
            return response()->json($companies->all());  
    
        return view('companies.index')->withCompanies($companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(\App\Http\Requests\CompanyRequest $request)
    {
        $request['slug'] = str_slug($request->name);
        Company::firstOrCreate(array_except($request->all(), '_token'));
        return redirect()->back()->withSuccess("L'entreprise a été ajouté avec succes");
    }

  
    public function show(Request $request, $id)
    {
        $company = Company::slug($id);
        if($request->ajax())
            return response()->json($company);
        return view('companies.show')->withCompany($company);
    }

    public function edit(Request $request, $id)
    {
        $company  = Company::slug($id);
        if($request->ajax())
            return response()->json($company);
        return view('companies.edit')->withCompany($company);
    }

    public function update(Request $request, $id)
    {
        $company = Company::slug($id);
        $company->update($request->all());
        if($request->ajax())
            return response()->json(['response'=>'success', 'message'=>"L'entreprise a été modifié avec success"]);
        return redirect()->back()->withSuccess("L'entreprise a été modifié avec success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

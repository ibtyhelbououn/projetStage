<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;

class OrganizationController extends Controller
{
    //

    public function index()
    {
        $organizations = Organization::all();
        return view('/organizations',compact('organizations'));
    }

    public function add()
    {
        return view('/add-organization');
    }

    public function store(Request $request)
    {
        Organization::create($request->all());
        return redirect('/organizations');
    }

    public function edit(Organization $organization)
    {
        return view('/edit-organization',compact('organization'));
    }

    public function update(Request $request,Organization $organization)
    {
        $input=$request->all();

        $organization->name=$input['name'];

        $organization->save();

        return redirect('/organizations');
    }

    public function delete($organization)
    {
        Organization::find($organization)->delete();

        return redirect()->back();
    }
}

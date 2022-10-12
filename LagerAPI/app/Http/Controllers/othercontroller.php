<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//väg
use App\Models\otherlibrary;

class othercontroller extends Controller
{
    public function index()
    {
        
   //skapa för anrop GET: hämta alla
   return otherlibrary::all();
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
                //skapa GET för specifik ID
                return otherlibrary::find($id);
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}

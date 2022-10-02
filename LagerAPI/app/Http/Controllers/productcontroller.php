<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//lägg till modellväg
use App\Models\productlibrary;

class productcontroller extends Controller
{
    public function index()
    {
        //skapa för anrop GET: hämta alla
        return productlibrary::all();
    }

    public function store(Request $request)
    {

         //VALIDARE-metod innan det skickas för att se till data
        //fyllts i korrekt i JSON i POST
        $request->validate([
            'product_title' => 'required'
        ]);

        //ta emot information vid ALL lagring efter vad som lagrats
        //vid POST
        return productlibrary::create($request->all());
    }

    public function show($id)
    {
        //skapa GET för specifik ID
        return productlibrary::find($id);
    }

    public function update(Request $request, $id)
    {
            //skapa PUT-anropsvar
              $product = productlibrary::find($id);
        
              if($product == null) {
                  return response()->json([
                      'Product not found'
                  ], 404);
              } else {
                  $product->update($request->all());
                  return $product;
              }
    }

    public function destroy($id)
    {
        //skapa en DELETE-ansropsvar
        $product = productlibrary::find($id);

        if($product == null) {
            return response()->json([
                'Product not found'
            ], 404);
        } else {
            $product->delete();
            return response()->json([
                'Product deleted'
            ]);
        }        
    }
}

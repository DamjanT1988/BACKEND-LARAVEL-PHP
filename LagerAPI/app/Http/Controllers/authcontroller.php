<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//skapa use för respons och validation och hash för lösenord; user
use Illuminate\Http\Reponse;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class authcontroller extends Controller
{
        //skapa registration
        public function register (Request $request) {
            //använd validatorn direkt
            $validatedUser = Validator::make(
               //alla
               $request->all(),
               [
                   //kolla efter
                   'name' => 'required',
                   //unik email endast, kolla i specika tabell också
                   //med unique:users,email
                   'email' => 'required|email|unique:users,email',
                   'password' => 'required'
               ]
               );
   
               //fel värden slås is:om ingen användare, anropa fail-metod
               if($validatedUser->fails()) {
                   return response()->json([
                       'message' => 'Valideringsfel',
                       'error' => $validatedUser->errors()
                   ], 401);
               }
           //rätta värden slås in - lagra användare & returnera token
            //skapa användar
            $user = User::create([
                'name' => $request['name'],
                'email' => $request['email'],
                //lagra lösen som är hashat
                'password' => bcrypt($request['password']) 
            ]);     
            
            //registrera token direkt
            $token = $user->createToken('APITOKEN')->plainTextToken;
            
            //lagra i variabel responsen
            $response = [
                'message' => 'Användare skapad!',
                'user' => $user,
                'token' => $token
            ];

            //returnera av funktion
            return response($response, 201);
    }

    ////////////////////////////////
    //gör en inloggning - inte behöva registrera för att få token/använda API
    public function login(Request $request){
        $validatedUser = Validator::make(
            $request->all(),
            [
                'email' => 'required|email',
                'password' => 'required'
            ]
            );

            if($validatedUser->fails()) {
                return response()->json([
                    'message' => 'Valideringsfel',
                    'error' => $validatedUser->errors()
                ], 401);
            }

            //fel inlogguppgifter
            if(!auth()->attempt($request->only('email', 'password'))) {
                //vid fel
                return response()->json ([
                    'message' => 'Fel emejl/lösenord'
                ], 401);
            }

            //rätt inlogguppgifter; returnera token
            $user = User::where('email', $request->email)->first();

            return response()->json([
                'message' => 'Användare inloggad!',
                'token' => $user->createToken('APITOKEN')->plainTextToken
            ], 200);
    }  

    ///////////////////////////////
    //S4-10. skapa en utlogg
    public function logout(Request $request) {
        //S4-10-1 använd request för att se vilken användare är
        // och förstör den i SQL-databasen = utlogg
        $request->user()->currentAccessToken()->delete();

        $response = [
            'message' => 'User logged out'
        ];

        return response($response, 200);
    }


}
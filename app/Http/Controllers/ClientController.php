<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Session;

class ClientController extends Controller
{
     // Create a client
     public function saveClient(Request $request)
     {
         // Validate the request data here

         // Create a new client

         $client = new Client();
         $client->fname = $request->fname;
         $client->mname = $request->mname;
         $client->lname = $request->lname;
         $client->address = $request->address;
         $client->email = $request->email;
         $client->phone = $request->phone;
         $client->mmsu_affiliated = $request->mmsu_affiliated;
         $client->university_id = $request->university_id; //maybe a unique identifier?? idk
         $client->college = $request->college;
         $client->department = $request->department;
         $client->officeAgency = $request->officeAgency;
 
         // Save the client
         $client->save();

         Session::put('client_id', $client['id']);
 
         // Return a response
         return response()->json(['message' => 'Client created successfully', 'client' => $client], 201);
     }
     // Add other methods for updating, deleting, and retrieving clients
}

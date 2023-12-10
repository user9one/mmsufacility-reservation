<?php

namespace App\Http\Controllers;
use App\Models\Service;

use Illuminate\Http\Request;

class ServicesController extends Controller
{
    public function fetchServices()
        {
            $services = Service::all();
                return response()->json($services);

        }

        public function index()
        {
            $services = Service::all();
            return response()->json($services);
        }
    
        public function store(Request $request)
        {
            $service = Service::create($request->all());
            return response()->json($service, 201);
        }
    
        public function destroy(Service $service)
        {
            $service->delete();
            return response()->json(null, 204);
        }
}
<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceResource;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;

class ServiceController extends Controller
{
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return ServiceResource::collection(Service::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
       // return ServiceResource::collection(Service::all());
       $service = Service::create($request->validated());
       return ServiceResource::make($service);

    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        return ServiceResource::make($service);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        $service->update($request->validated());
        return ServiceResource::make($service);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
       $service->delete();

       return response()->noContent();
    }
}

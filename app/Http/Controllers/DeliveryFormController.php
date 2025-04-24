<?php

namespace App\Http\Controllers;

use App\Models\DeliveryForm;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DeliveryFormController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deliveries = DeliveryForm::orderBy('created_at', 'desc')->paginate(10);

        return Inertia::render('Deliveries/Index', [
            'deliveries' => $deliveries
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pickup_address' => 'required|string',
            'pickup_name' => 'required|string',
            'pickup_contact' => 'required|string',
            'pickup_email' => 'required|email',

            'delivery_address' => 'required|string',
            'delivery_name' => 'required|string',
            'delivery_contact' => 'required|string',
            'delivery_email' => 'required|email',

            'type_of_good' => 'required|in:Document,Parcel',
            'delivery_provider' => 'required|in:DEHL,STARTRACK,ZOOM2U,TGE',
            'priority' => 'required|in:Standard,Express',
            'pickup_date' => 'required|date',
            'pickup_time' => 'required',

            'package_description' => 'required|string',
            'length' => 'required|numeric',
            'height' => 'required|numeric',
            'width' => 'required|numeric',
            'weight' => 'required|numeric',
        ]);

        $delivery = DeliveryForm::create($validated);

        return response()->json([
            'message' => 'Delivery created successfully',
            'delivery' => $delivery
        ], 201);
    }

    public function updateStatus(Request $request, DeliveryForm $delivery)
    {
        $validated = $request->validate([
            'status' => 'required|in:Pending,Shipped,Cancelled'
        ]);

        if ($delivery->status === 'Shipped' && $validated['status'] === 'Cancelled') {
            return response()->json(['message' => 'Cannot cancel a shipped delivery.'], 403);
        }

        $delivery->update(['status' => $validated['status']]);

        return response()->json(['message' => 'Status updated successfully']);
    }


    /**
     * Display the specified resource.
     */
    public function show(DeliveryForm $deliveryForm)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DeliveryForm $deliveryForm)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DeliveryForm $deliveryForm)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DeliveryForm $deliveryForm)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ShippingAddressRequest;
use App\Http\Resources\ShippingAddressResource;
use App\Models\Province;
use App\Models\ShippingAddress;
use Illuminate\Http\Request;

class ShippingAddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $shippingAddresses = ShippingAddress::query()->where('user_id', auth()->id())->get();

        return inertia('ShippingAddresses/Index', [
            'shipping_addresses' => ShippingAddressResource::collection($shippingAddresses),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('ShippingAddresses/Form', [
            'shipping_address' => new ShippingAddress,
            'location' => [
                'provinces' => Province::query()->get()->map->only('id', 'name'),
            ],
            'page_setting' => [
                'method' => 'post',
                'url' => route('shipping-addresses.store'),
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ShippingAddressRequest $request)
    {
        $request->user()->shippingAddresses()->create([
            'province_id' => $request->province,
            'city_id' => $request->city,
            // 'subdistrict_id' => $request->subdistrict,
            'address' => $request->address,
            'is_default' => $request->boolean('is_default'),
        ]);

        return redirect()->route('shipping-addresses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ShippingAddress $shippingAddress)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ShippingAddress $shippingAddress)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ShippingAddress $shippingAddress)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ShippingAddress $shippingAddress)
    {
        //
    }
}

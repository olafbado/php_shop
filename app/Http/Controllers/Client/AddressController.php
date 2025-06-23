<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    public function index()
    {
        $addresses = Auth::user()->addresses;
        return view('client.addresses.index', compact('addresses'));
    }

    public function create()
    {
        return view('client.addresses.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'line1' => 'required',
            'city' => 'required',
            'postcode' => 'required',
        ]);

        Auth::user()->addresses()->create($data);

        return redirect()->route('addresses.index');
    }

    public function edit(Address $address)
    {
        $this->authorize('update', $address);
        return view('client.addresses.edit', compact('address'));
    }

    public function update(Request $request, Address $address)
    {
        $this->authorize('update', $address);
        $data = $request->validate([
            'line1' => 'required',
            'city' => 'required',
            'postcode' => 'required',
        ]);

        $address->update($data);

        return redirect()->route('addresses.index');
    }

    public function destroy(Address $address)
    {
        $this->authorize('delete', $address);
        $address->delete();
        return redirect()->route('addresses.index');
    }
}

<?php
namespace App\Http\Controllers;

use App\Models\Transport;
use Illuminate\Http\Request;

class TransportController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $transports = Transport::all();
        return view('transports.index', compact('transports'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('transports.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'location' => 'required',
            'date' => 'required|date',
            'description' => 'nullable',
            'company' => 'nullable',
        ]);

        Transport::create($request->all());

        return redirect()->route('transports.index')->with('success', 'Transport created successfully.');
    }

    // Display the specified resource.
    public function show(Transport $transport)
    {
        return view('transports.show', compact('transport'));
    }

    // Show the form for editing the specified resource.
    public function edit(Transport $transport)
    {
        return view('transports.edit', compact('transport'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, Transport $transport)
    {
        $request->validate([
            'name' => 'required',
            'type' => 'required',
            'location' => 'required',
            'date' => 'required|date',
            'description' => 'nullable',
            'company' => 'nullable',
        ]);

        $transport->update($request->all());

        return redirect()->route('transports.index')->with('success', 'Transport updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy(Transport $transport)
    {
        $transport->delete();

        return redirect()->route('transports.index')->with('success', 'Transport deleted successfully.');
    }
}

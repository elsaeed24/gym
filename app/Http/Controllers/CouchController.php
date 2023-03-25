<?php

namespace App\Http\Controllers;

use App\Http\Requests\CouchRequest;
use App\Models\Couch;
use App\Models\Gym;
use Illuminate\Http\Request;

class CouchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $couches = Couch::paginate();
        $gyms = Gym::all();
        return view('dashboard.couches.index',compact('couches','gyms'));
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
    public function store(CouchRequest $request)
    {
        $data = $request->validated();  // validated() replace all()

        Couch::create($data);

        return redirect()->route('couches.index')->with('success', 'Couch Created Successfully') ;
    }

    /**
     * Display the specified resource.
     */
    public function show(Couch $couch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Couch $couch)
    {
        $gyms = Gym::all();
        return view('dashboard.couches.edit',compact('couch','gyms'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CouchRequest $request, Couch $couch)
    {


            $couch->update($request->all());

               return redirect()->route('couches.index')->with('info', 'Couch Updated Successfully!') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Couch $couch)
    {
        $couch->delete();

        return redirect()->route('couches.index')->with('danger', 'Couch deleted successfully!');
    }
}

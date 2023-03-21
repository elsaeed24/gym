<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manager;

class ManagersController extends Controller
{

    public function index()
    {
        $managers = Manager::paginate(6);
        return view('dashboard.manager.index1',compact('managers'));
    }


    public function create()
    {
        return view('dashboard.manager.create');
    }


    public function store(Request $request)
    {
        $request_data = $request->validate([
            'name'          => 'required|string|max:191',
            'email'         => 'required|email',
            'password'      => 'required',
            'national_id'   => 'required|integer',
            'gender'        => 'required',
            'birth_date'    => 'required|date',
            'image'         => 'nullable'
        ]);

        $request_data['password'] = bcrypt($request_data['password']);

        Manager::create($request_data);

        return redirect( route('manager.index') );


    }


    public function show(string $id)
    {
        //
    }


    public function edit(Manager $manager) {

        return view('dashboard.manager.edit', compact('manager'));

    }



    public function update(Request $request, Manager $manager)
    {
        $request_data = $request->validate([
            'name'          => 'required|string|max:191',
            'email'         => 'required|email',
            'password'      => 'required',
            'national_id'   => 'required|integer',
            'gender'        => 'required',
            'birth_date'    => 'required|date',
            'image'         => 'nullable'
        ]);

        $request_data['password'] = bcrypt($request_data['password']);

        $manager->update($request_data);

        return redirect( route('manager.index') );
    }

    
    public function destroy(string $id)
    {
        //
    }
}

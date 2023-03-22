<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ManagersController extends Controller
{

    public function index()
    {
        $managers = Manager::paginate();
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
            'email'         => 'required|email|unique:managers,email',
            'password'      => 'required',
            'national_id'   => 'required|integer',
            'gender'        => 'required',
            'birth_date'    => 'required|date',
            'avatar'         => 'nullable|image'
        ]);

        $request_data['password'] = bcrypt($request_data['password']);

         $request_data['avatar'] = $this->uploadImage($request,'avatar','Managers');

        Manager::create($request_data);

        return redirect()->route('manager.index');


    }


    public function show(string $id)
    {
        //
    }


    public function edit(Manager $manager)
    {

        return view('dashboard.manager.edit', compact('manager'));

    }



    public function update(Request $request, Manager $manager)
    {

        $request_data = $request->validate([
            'name'          => 'required|string|max:191',
            'email'         => 'required',Rule::unique('managers')->ignore($manager->id),
            'password'      => 'required',
            'national_id'   => 'required|integer',
            'gender'        => 'required',
            'birth_date'    => 'required|date',
            'avatar'         => 'nullable|image'
        ]);

        $old_image = $manager->avatar;

        $request_data['password'] = bcrypt($request_data['password']);

        $new_image = $this->uploadImage($request,'avatar','Managers');
        if($new_image){
            $request_data['avatar'] = $new_image ;
        }

        $manager->update($request_data);
        // Delete Old Image
        if($old_image ){
            Storage::disk('uploads')->delete($old_image);
           }


        return redirect()->route('manager.index') ;
    }


    public function destroy($id)
    {
        Manager::destroy($id);
        return redirect()->route('manager.index');
    }

    public function uploadImage(Request $request,$name,$title){
        if(!$request->hasFile($name)){
            return ;
        }
            $file= $request->file($name);
            $path = $file->store($title,[
                'disk' => 'uploads'
            ]);
            return $path;
    }
}

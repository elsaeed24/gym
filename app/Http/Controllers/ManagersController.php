<?php

namespace App\Http\Controllers;

use App\Http\Requests\ManagerRequest;
use App\Models\Manager;
use App\Repositories\Managers\InterfaceManagerRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Storage;

class ManagersController extends Controller
{

    protected $manager;

    public function __construct(InterfaceManagerRepository $manager){

        $this->manager = $manager;
    }

    public function index()
    {

        return view('dashboard.manager.index1',[
            'managers' => $this->manager,
            'count_of_managers' => $this->manager->countOfManagers()
        ]);
    }


    public function create()
    {
        return view('dashboard.manager.create');
    }


    public function store(ManagerRequest $request)
    {
        $this->manager->add($request);

        return redirect()->route('manager.index')->with('success', 'Manager Created');


       /* $request_data = $request->validate([
            'name'          => 'required|string|max:191',
            'email'         => 'required|email|unique:managers,email',
            'password'      => 'required',
            'national_id'   => 'required|integer',
            'gender'        => 'required',
            'birth_date'    => 'required|date',
            'avatar'         => 'nullable|image|mimes:jpg,jpeg,png'
        ]);

        $data = $request->validated();   // validated() replace all()

        $data['password'] = bcrypt($data['password']);

         $data['avatar'] = uploadImage($request,'avatar','Managers');


        Manager::create($data);*/

    }


    public function show(string $id)
    {
        //
    }


    public function edit(Manager $manager)
    {

        return view('dashboard.manager.edit', compact('manager'));

    }



    public function update(ManagerRequest $request, Manager $manager)
    {
        $this->manager->update($request, $manager);

        return redirect()->route('manager.index')->with('info', 'Manager Updated Successfully!') ;
    //     $request_data = $request->validate([
    //         'name'          => 'required|string|max:191',
    //         'email'         => 'required',Rule::unique('managers')->ignore($manager->id),
    //         'password'      => 'required',
    //         'national_id'   => 'required|integer',
    //         'gender'        => 'required',
    //         'birth_date'    => 'required|date',
    //         'avatar'         => 'nullable|image'
    //     ]);

    //     $old_image = $manager->avatar;

    //     $request_data['password'] = bcrypt($request_data['password']);

    //     $new_image = uploadImage($request,'avatar','Managers');
    //     if($new_image){
    //         $request_data['avatar'] = $new_image ;
    //     }

    //     $manager->update($request_data);

    //     // Delete Old Image
    //     if($old_image ){
    //         Storage::disk('uploads')->delete($old_image);
    //        }


    }


    public function destroy(Manager $manager)
    {
        $this->manager->delete($manager);
        return redirect()->route('manager.index')->with('danger', 'Manager deleted successfully!');
    }

    // public function uploadImage(Request $request,$name,$title){
    //     if(!$request->hasFile($name)){
    //         return ;
    //     }
    //         $file= $request->file($name);
    //         $path = $file->store($title,[
    //             'disk' => 'uploads'
    //         ]);
    //         return $path;
    // }
}

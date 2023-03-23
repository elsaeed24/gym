<?php

namespace App\Repositories\Managers;

use App\Models\Manager;
use App\Http\Requests\ManagerRequest;
use Illuminate\Support\Facades\Storage;

class DbManagerRepository implements InterfaceManagerRepository
{
    public function all()
    {

        return Manager::paginate();

    }

    public function add(ManagerRequest $request)
    {
        $data = $request->validated();   // validated() replace all()

        $data['password'] = bcrypt($data['password']);

         $data['avatar'] = uploadImage($request,'avatar','Managers');


         Manager::create($data);
    }

    public function update(ManagerRequest $request, Manager $manager)
    {
        $data = $request->validated();   // validated() replace all()

        $data['password'] = bcrypt($data['password']);


         $old_image = $manager->avatar;


        $new_image = uploadImage($request, 'avatar', 'Managers');

        if($new_image){

            $data['avatar'] = $new_image ;

        }

        $manager->update($data);

        // Delete Old Image
        if($old_image ){

            Storage::disk('uploads')->delete($old_image);

        }

    }

    public function delete(Manager $manager)
    {
        $old_image = $manager->avatar;

        // Delete Old Image
        if($old_image ){

            Storage::disk('uploads')->delete($old_image);

        }

        $manager->forceDelete();
    }

    public function countOfManagers()
    {
        return Manager::count();
    }
}

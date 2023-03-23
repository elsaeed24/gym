<?php

namespace App\Repositories\Managers;

use App\Models\Manager;
use App\Http\Requests\ManagerRequest;

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

    public function update($id)
    {

    }

    public function delete($id)
    {

    }
}

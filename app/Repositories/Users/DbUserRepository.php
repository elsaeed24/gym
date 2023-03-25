<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Storage;
use App\Repositories\Users\InterfaceUserRepository;

class DbUserRepository implements InterfaceUserRepository
{
    public function all()
    {

        return User::paginate();

    }

    public function add(UserRequest $request)
    {
        $data = $request->validated();   // validated() replace all()

        $data['password'] = bcrypt($data['password']);

         $data['avatar'] = uploadImage($request,'avatar','Users');


         User::create($data);
    }

    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();   // validated() replace all()

        $data['password'] = bcrypt($data['password']);


         $old_image = $user->avatar;


        $new_image = uploadImage($request, 'avatar', 'Users');

        if($new_image){

            $data['avatar'] = $new_image ;

        }

        $user->update($data);

        // Delete Old Image
        if($old_image ){

            Storage::disk('uploads')->delete($old_image);

        }

    }

    public function delete(User $user)
    {
        $old_image = $user->avatar;

        // Delete Old Image
        if($old_image ){

            Storage::disk('uploads')->delete($old_image);

        }

        $user->forceDelete();
    }

    public function countOfUsers()
    {
        return User::count();
    }
}

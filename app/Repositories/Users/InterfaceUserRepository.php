<?php

namespace App\Repositories\Users;

use App\Models\User;
use App\Http\Requests\UserRequest;

interface InterfaceUserRepository
{
    public function all();

    public function add(UserRequest $request);

    public function update(UserRequest $request, User $user);

    public function delete(User $user);

    public function countOfUsers();

}

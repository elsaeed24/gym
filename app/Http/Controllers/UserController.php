<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Repositories\Users\InterfaceUserRepository;

class UserController extends Controller
{

    protected $user;

    public function __construct(InterfaceUserRepository $user){

        $this->user = $user;
    }


    public function index() {

        return view('dashboard.users.index', [
            'users' => $this->user,
            'count_of_users' => $this->user->countOfUsers()
        ]);

    }

    public function create() {

        return view('dashboard.users.create');

    }

    public function store(UserRequest $request) {

        $this->user->add($request);

        return redirect()->route('users.index')->with('success', 'User Created Succefully');

    }

    public function edit(User $user) {

        return view('dashboard.users.edit', compact('user'));

    }

    public function update(UserRequest $request, User $user) {

        $this->user->update($request, $user);

        return redirect()->route('users.index')->with('info', 'User Updated Successfully!') ;
    }

    public function destroy(User $user) {

        $this->user->delete($user);
        return redirect()->route('users.index')->with('danger', 'User deleted successfully!');

    }
}

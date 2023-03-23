<?php

namespace App\Repositories\Managers;

use App\Http\Requests\ManagerRequest;

interface InterfaceManagerRepository
{
    public function all();

    public function add(ManagerRequest $request);

    public function update($id);

    public function delete($id);

}

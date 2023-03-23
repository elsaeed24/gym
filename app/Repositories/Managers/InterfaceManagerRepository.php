<?php

namespace App\Repositories\Managers;

use App\Models\Manager;
use App\Http\Requests\ManagerRequest;

interface InterfaceManagerRepository
{
    public function all();

    public function add(ManagerRequest $request);

    public function update(ManagerRequest $request, Manager $manager);

    public function delete(Manager $manager);

    public function countOfManagers();

}

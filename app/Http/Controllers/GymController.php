<?php

namespace App\Http\Controllers;

use App\Http\Requests\GymRequest;
use App\Models\Gym;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GymController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gyms = Gym::paginate();
        $managers = Manager::all();

        return view('dashboard.gyms.index',compact('gyms','managers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GymRequest $request)
    {
        $data = $request->validated();  // validated() replace all()

         $data['avatar'] = uploadImage($request,'avatar','Gyms');

         Gym::create($data);

         return redirect()->route('gyms.index')->with('success', 'Gym Created Successfully') ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gym $gym)
    {
        $managers = Manager::all();
        return view('dashboard.gyms.edit',compact('gym','managers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GymRequest $request, Gym $gym)
    {

        $data = $request->validated();

        $old_image = $gym->avatar;
            $new_image = uploadImage($request,'avatar','Gyms');
            if($new_image){
                $data['avatar'] = $new_image ;
            }

            $gym->update($data);

            // Delete Old Image
            if($old_image ){
                Storage::disk('uploads')->delete($old_image);
               }

               return redirect()->route('gyms.index')->with('info', 'Gym Updated Successfully!') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gym $gym)
    {
        $old_image = $gym->avatar;
        // Delete Old Image
        if($old_image ){
            Storage::disk('uploads')->delete($old_image);
        }
        $gym->forceDelete();

        return redirect()->route('gyms.index')->with('danger', 'Gym deleted successfully!');
    }
}

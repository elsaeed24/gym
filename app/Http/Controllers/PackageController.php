<?php

namespace App\Http\Controllers;

use App\Http\Requests\PackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{

     /**
    * Display a listing of the resource.
    */
   public function index()
   {
       $packages = Package::paginate();

       return view('dashboard.packages.index',compact('packages'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       //
   }

   /**
    * Store a newly created resource in storage.
    */
   public function store(PackageRequest $request)
   {
       $data = $request->validated();  // validated() replace all()

       Package::create($data);

       return redirect()->route('packages.index')->with('success', 'Package Created Successfully') ;
   }

   /**
    * Display the specified resource.
    */
   public function show(Package $package)
   {
       //
   }

   /**
    * Show the form for editing the specified resource.
    */
   public function edit(Package $package)
   {
       return view('dashboard.packages.edit',compact('package'));
   }

   /**
    * Update the specified resource in storage.
    */
   public function update(PackageRequest $request, Package $package)
   {


           $package->update($request->all());

              return redirect()->route('packages.index')->with('info', 'Package Updated Successfully!') ;
   }

   /**
    * Remove the specified resource from storage.
    */
   public function destroy(Package $package)
   {
       $package->delete();

       return redirect()->route('packages.index')->with('danger', 'Package deleted successfully!');
   }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\UserDevice;
use Illuminate\Support\Facades\Validator;
use DB;

class UserDevicesController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
     public function index()
     {
         $data = DB::table('userdevices')
         ->join('products','products.id','=','userdevices.device') 
         ->join('users','users.id','=','userdevices.owner') 
         ->select('products.*','products.name as devicename','users.*','users.name as ownername')
         ->get();

         $data2 = DB::table('users')
         ->get();

         $data3 = DB::table('products')
         ->get();

         return Inertia::render('ProductUsers', ['data' => $data, 'users' => $data2, 'devices' => $data3]);
     }
   
     /**
      * Show the form for creating a new resource.
      *
      * @return Response
      */
     public function store(Request $request)
     {
         Validator::make($request->all(), [
             'name' => ['required'],
             'category' => ['required'],
             'description' => ['required'],
         ])->validate();
   
         UserDevice::create($request->all());
   
         return redirect()->back()
            ->with('message', 'Post Created Successfully.');
     }
   
     /**
      * Show the form for creating a new resource.
      *
      * @return Response
      */
     public function update(Request $request)
     {
         Validator::make($request->all(), [
            'name' => ['required'],
            'category' => ['required'],
            'description' => ['required'],
         ])->validate();
   
         if ($request->has('id')) {
             UserDevice::find($request->input('id'))->update($request->all());
             return redirect()->back()
                     ->with('message', 'Post Updated Successfully.');
         }
     }
   
     /**
      * Show the form for creating a new resource.
      *
      * @return Response
      */
     public function destroy(Request $request)
     {
         if ($request->has('id')) {
             UserDevice::find($request->input('id'))->delete();
             return redirect()->back();
         }
     }
}
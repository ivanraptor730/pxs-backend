<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;

class ProductsController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
     public function index()
     {
         $data = Product::all();
         return Inertia::render('Products', ['data' => $data]);
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
   
         Product::create($request->all());
   
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
             Product::find($request->input('id'))->update($request->all());
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
             Product::find($request->input('id'))->delete();
             return redirect()->back();
         }
     }
}
<?php

namespace App\Http\Controllers;

use App\Models\CategoryConfiguration;
use Illuminate\Http\Request;
use App\Models\CategoryConfigurationKey;
use App\Http\Requests\StoreCategoryConfigurationKeyRequest;
use App\Http\Requests\UpdateCategoryConfigurationKeyRequest;

class CategoryConfigurationKeyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $keys=CategoryConfigurationKey::query()->get();
        $name=$request->input('name');
        if($name){
            $keys=CategoryConfigurationKey::query()->where("name","LIKE","%{$name}%")->get();
        }
        return view('keys.index', ['keys' => $keys]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // public function create()
    {
        //


        return view('keys.create');


    }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryConfigurationKeyRequest $request)
    {
        //create record

         $name = $request->get('name');
         $data = CategoryConfigurationKey::query()
          ->where('name', $name)
          ->first();

         if($data)
         {
          $uniqueError='This name already exists !';

          return view("keys.create",compact('uniqueError'));
         }

        else {
        CategoryConfigurationKey::create([
            'name'=>$request->name,
            'extra'=>$request->extra

        ]);

                //store the submitted task
                return redirect()->route('keys.index')->with('created', 'Category configuration key created successfully!');

    }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CategoryConfigurationKey $key)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(CategoryConfigurationKey $key)
    {
        //
        return view('keys.edit',compact('key'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryConfigurationKeyRequest $request, CategoryConfigurationKey $key)
    {
        //

        $key->extra=$request->extra;
        $key->save();
        return redirect()->route('keys.index')->with('edited', 'Category configuration key editted successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Request $request )
    {

$keys=CategoryConfigurationKey::query()->whereNull('deleted_at')->get();

$key=CategoryConfigurationKey::find($request->id);

$keyName=$key->name;

$configurations=CategoryConfiguration::query()->where('key',$keyName)->first();

if($configurations)
{
    $deleteError="You cannot delete this key, as it already has configurations.";

    return view("keys.index",['deleteError'=>$deleteError,'keys'=>$keys]);

}
else
       {
            $key->delete();
            return redirect()->route('keys.index')->with('deleted', 'Category configuration key deleted successfully!');;

    }
}

public function getKeyById(CategoryConfigurationKey $key){
return response()->json($key);
}

}

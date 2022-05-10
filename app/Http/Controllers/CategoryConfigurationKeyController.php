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
    public function index()
    {
        //
        $keys=CategoryConfigurationKey::query()->whereNull('deleted_at')->get();
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
          ->where('name','==', $name)
          ->get();
         if($data)
         {
          $uniqueError='This name already exists !';

          return view("keys.create",compact('uniqueError'));
         }

        else {
        CategoryConfigurationKey::create([
            'name'=>$request->name,
            'extra'=>json_encode([$request->extra,])

        ]);

                //store the submitted task
                return redirect()->route('keys.index');

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

        $key->extra=json_encode([$request->extra,]);

        $key->save();
        return redirect()->route('keys.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( CategoryConfigurationKey $key )
    {dd($key);
        //
$configurations=CategoryConfiguration::query()->where('key','==',$key->name)->get();
if($configurations)
{
    $deleteError="You cannot delete this key, as it already has configurations.";
    $keys=CategoryConfigurationKey::query()->whereNull('deleted_at')->get();
    return view("keys.index",compact('deleteError','keys'));

}
else
        {$key->delete();


      return redirect()->route('keys.index');

    }}



}

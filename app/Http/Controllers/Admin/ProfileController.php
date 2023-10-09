<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateProfile;
use App\Models\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $repository;

    public function __construct(Profile $profile){
        $this->repository = $profile;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $profiles= $this->repository->paginate();
        return view('admin.pages.plans.profiles.index', compact('profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.plans.profiles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProfile $request)
    {
        //
        $profile = new Profile;
        
        
        $profile->name = $request->name;
        $profile->description =$request->description;
        $profile->save();
 
        return redirect()->route('profiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profiles = profile::find($id);
       return view('admin.pages.plans.profiles.show', compact('profiles'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profiles = profile::find($id);
        if(!isset($profiles)){
            redirect()->back();
        }else{
            
            return view('admin.pages.plans.profiles.edit', compact('profiles'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProfile $request, $id)
    {
        profile::where('id' , $id)
        ->update(['name' => $request->name,
                  'description' => $request->description]);
       
        return redirect()->route('profiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profile = profile::find($id);
        if(!isset($profile)){
            return redirect()->back();
        }
        $profile->delete();
        return redirect()->route('profiles.index');
    }
    public function search(request $request){
        $filters = $request->only('filter');

        $profiles= $this->repository
        ->where(function($query) use ($request){
            if($request->filter){
                $query->where('name', 'LIKE' , "%{$request->filter}%")
                      ->orWhere('description', 'LIKE' , "%{$request->filter}%");
            }
        })
        ->paginate();
        return view('admin.pages.plans.profiles.index', compact('profiles' , 'filters'));
        
    }
}
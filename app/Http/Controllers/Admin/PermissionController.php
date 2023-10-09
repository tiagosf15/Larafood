<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $repository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(Permission $permission)
    {
        $this->repository = $permission;
    }
    public function index()
    {
        $permissions = $this->repository->paginate();
        return view('admin.pages.plans.permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pages.plans.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $flight = new Permission;
        $flight->name = $request->name;
        $flight->description = $request->description;
        $flight->save();
        return redirect()->route('permission.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $permissions = Permission::find($id);
        return view('admin.pages.plans.permission.show', compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $permissions = Permission::find($id);
        return view('admin.pages.plans.permission.edit', compact('permissions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $permissions = Permission::find($id);
        $permissions->name = $request->name;
        $permissions->description = $request->description;
        $permissions->save();
        return redirect()->route('permission.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permissions = Permission::find($id);
        $permissions->delete();
        return redirect()->route('permission.index');
    }

    public function search(request $request){
        $filters = $request->only('filter');

        $permissions= $this->repository
        ->where(function($query) use ($request){
            if($request->filter){
                $query->where('name', 'LIKE' , "%{$request->filter}%")
                      ->orWhere('description', 'LIKE' , "%{$request->filter}%");
            }
        })
        ->paginate();
        return view('admin.pages.plans.permission.index', compact('permissions' , 'filters'));
        
    }
}
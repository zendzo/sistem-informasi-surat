<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use App\Http\Controllers\Controller;
use App\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::all();

        $page_title = Lang::get('application.role setting');

        $page_desc = Lang::get('application.role desc');

        return view('administrator.role.index',compact(['roles','page_title','page_desc']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Role $role)
    {
        $input = $request->all();

        try{
            $role->create($input);
        }catch(\Exception $e){
            return redirect('/admin/role')
                ->with('message', $e->getMessage())
                ->with('status','error')
                ->with('type','error');
        }

        return redirect('/admin/role')
            ->with('message', 'Data Telah Tersimpan!')
            ->with('status','success')
            ->with('type','success');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Role $role)
    {
        try{

            $role->update($request->all());

            return redirect()->route('admin.role.index')
                    ->with('message', 'Data Telah Tersimpan!')
                    ->with('status','success')
                    ->with('type','success');
        }catch(\Exception $e){
            return redirect()->back()
                    ->with('message', $e->getMessage()())
                    ->with('status','error')
                    ->with('type','error');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

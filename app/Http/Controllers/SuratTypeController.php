<?php

namespace App\Http\Controllers;

use App\SuratType;
use Illuminate\Http\Request;

class SuratTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suratTypes = SuratType::all();

        return view('administrator.type-surat.index', compact('suratTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{
           SuratType::create($request->all());

           return redirect()->back()
                ->with('message', 'Data Telah Tersimpan!')
                ->with('status','success')
                ->with('type','success');

        }catch(\Exception $e){
            return redirect()->back()
                ->with('message', $e->getMessage())
                ->with('status','error')
                ->with('type','error');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SuratType  $suratType
     * @return \Illuminate\Http\Response
     */
    public function show(SuratType $suratType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SuratType  $suratType
     * @return \Illuminate\Http\Response
     */
    public function edit(SuratType $suratType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SuratType  $suratType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $suratType = SuratType::findOrfail($id);
        try{
            $suratType->update($request->all());
 
            return redirect()->back()
                 ->with('message', 'Data Telah Tersimpan!')
                 ->with('status','success')
                 ->with('type','success');
 
         }catch(\Exception $e){
             return redirect()->back()
                 ->with('message', $e->getMessage())
                 ->with('status','error')
                 ->with('type','error');
         }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SuratType  $suratType
     * @return \Illuminate\Http\Response
     */
    public function destroy(SuratType $suratType)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disposisi;
use App\SuratType;
use App\User;

class DisposisiController extends Controller
{

    public function inbox()
    {
        $incomingDisposisis = auth()->user()->incomingDisposisis;

        return view('disposisi.mail_box', compact(['incomingDisposisis']));
    }

    public function sent()
    {
        $sentDisposisis = auth()->user()->sentDisposisis;

        return view('disposisi.mail_box', compact(['sentDisposisis']));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $disposisis = Disposisi::all();

        return view('disposisi.index', compact(['disposisis']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();

        $suratTypes = SuratType::all();

        return view('disposisi.mail_box', compact(['users','suratTypes']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        // return $request;

        try{
            $disposisi = Disposisi::create([
                'letter_type_id' => $request->get('surat_type_id'),
                'sender_id' => auth()->id(),
                'letter_date' => $request->get('letter_date'),
                'recived_date' => $request->get('recived_date'),
                'letter_number' => $request->get('letter_number'),
                'agenda_number' => $request->get('agenda_number'),
                'subject' => $request->get('subject'),
                'original_sender_name' => $request->get('original_sender_name'),
                'summary' => $request->get('summary'),
                'letter_instruction' => $request->get('letter_instruction'),
                'sender_id' => auth()->id(),
            ]);

            $disposisi->recipient()->attach($request->get('letter_recipient'));

            $disposisi->suratAttachments()->attach($request->get('surat'));

            if ($request->hasFile('attachment')) {
                $disposisi->addMediaFromRequest('attachment')->toMediaCollection('attachment');
            }

            return redirect()->route('disposisi.keluar')->with('message', 'Disposisi Telah Terkirim!')
                ->with('status','Data Successfully Saved!')
                ->with('type','success');

            }catch (\Exception $e){
                return redirect()->route('admin.dashboard')->with('message', $e->getMessage())
                        ->with('status','Failed to Save Data!')
                        ->with('type','error')
                        ->withInput();
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Disposisi $disposisi)
    {
        return view('disposisi.mail_box', compact('disposisi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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

    public function approvedList()
    {
        $disposisis = Disposisi::where('confirmed',true)->orderBy('created_at','DESC')->get();

        return view('disposisi.index', compact(['disposisis']));
    }

    public function rejectedList()
    {
        $disposisis = Disposisi::where('confirmed',false)->orderBy('created_at','DESC')->get();

        return view('disposisi.index', compact(['disposisis']));
    }
}

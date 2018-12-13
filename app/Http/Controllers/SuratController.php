<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surat;
use App\User;
use App\SuratType;

class SuratController extends Controller
{

    public function inbox()
    {
        $incomingLetters = auth()->user()->incomingLetters;

        return view('surat.mail_box', compact('incomingLetters'));
    }

    public function sent()
    {
        $sentLetters = auth()->user()->sentLetters;

        return view('surat.mail_box', compact('sentLetters'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surats = Surat::all();

        return view('surat.index', compact(['surats']));
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

        return view('surat.mail_box', compact(['users','suratTypes']));
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

        try{
            $surat = Surat::create([
                'angenda_number' => $request->get('angenda_number'),
                'letter_date' => $request->get('letter_date'),
                'send_date' => $request->get('send_date'),
                'original_sender_id' => $request->get('original_sender_id'),
                'number' => $request->get('number'),
                'summary' => $request->get('summary'),
                'letter_instruction' => $request->get('letter_instruction'),
                'sender_id' => auth()->id(),
                'surat_type_id' => $request->get('surat_type_id'),
                'subject' => $request->get('subject'),
            ]);

            $surat->recipient()->attach($request->get('letter_recipient'));

            if ($request->hasFile('attachment')) {
                $surat->addMediaFromRequest('attachment')->toMediaCollection('attachment');
            }

            return redirect()->route('surat.masuk')->with('message', 'Surat Telah Dikirim!')
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
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function show(Surat $surat)
    {
        return view('surat.mail_box', compact('surat'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function edit(Surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Surat $surat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Surat  $surat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Surat $surat)
    {
        //
    }
}

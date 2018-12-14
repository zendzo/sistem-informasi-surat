<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Disposisi;

class DisposisiApprovalController extends Controller
{
    public function approved($id)
    {
        $disposisi = Disposisi::findOrfail($id);

        if ($disposisi->recipient->first()->id === auth()->id()) {

            $disposisi->confirmed = true;
            $disposisi->save();
            
            return redirect()->back()
                ->with('message', 'Disposisi Disetujui!')
                ->with('status','Data Successfully Saved!')
                ->with('type','success');
        }else{
            return redirect()->back()
                        ->with('message', 'Disposisi Gagal!')
                        ->with('status','Anda Tidak Memiliki Autoritas!')
                        ->with('type','error')
                        ->withInput();
        }
    }

    public function reject($id)
    {
        $disposisi = Disposisi::findOrfail($id);

        if ($disposisi->recipient->first()->id === auth()->id()) {

            $disposisi->confirmed = false;
            $disposisi->save();
            
            return redirect()->back()
                ->with('message', 'Disposisi Ditolak!')
                ->with('status','Data Successfully Saved!')
                ->with('type','warning');
        }else{
            return redirect()->back()
                        ->with('message', 'Disposisi Gagal!')
                        ->with('status','Anda Tidak Memiliki Autoritas!')
                        ->with('type','error')
                        ->withInput();
        }
    }
}

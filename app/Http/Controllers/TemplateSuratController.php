<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\SuratType;

class TemplateSuratController extends Controller
{
    public function notaDinas()
    {
        $users = User::all();

        $suratTypes = SuratType::all();

        return view('surat.mail_box', compact(['users','suratTypes']));
    }
}

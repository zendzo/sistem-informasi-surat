<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Carbon\Carbon;

class Disposisi extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'agenda_number',
        'recived_date',
        'letter_date',
        'orignial_sender_id',
        'letter_number',
        'summary',
        'letter_instruction',
        'sender_id',
        'letter_type_id',
        'subject',
        'original_sender_name'
    ];

    protected $dates = ['letter_date','recived_date'];

    public function setLetterDateAttribute($letter_date)
    {
        $this->attributes['letter_date'] = Carbon::createFromFormat('m/d/Y',$letter_date)->toDateString();
    }

    public function setRecivedDateAttribute($send_date)
    {
        $this->attributes['recived_date'] = Carbon::createFromFormat('m/d/Y',$send_date)->toDateString();
    }

    public function sender()
    {
        return $this->belongsTo(User::class,'sender_id');
    }

    public function recipient()
    {
        return $this->belongsToMany(User::class, 'disposisi_reciver');
    }

    public function suratAttachments()
    {
        return $this->belongsToMany(Surat::class, 'disposisi_surat');
    }

    public function letterType()
    {
        return $this->belongsTo(SuratType::class, 'letter_type_id');
    }

}

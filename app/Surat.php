<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Carbon\Carbon;

class Surat extends Model implements HasMedia
{
    use HasMediaTrait;

    protected $fillable = [
        'surat_type_id',
        'sender_id',
        'letter_date',
        'send_date',
        'number',
        'subject',
        'summary',
    ];

    protected $dates = ['letter_date','send_date'];

    public function setLetterDateAttribute($letter_date)
    {
        $this->attributes['letter_date'] = Carbon::createFromFormat('m/d/Y',$letter_date)->toDateString();
    }

    public function setSendDateAttribute($send_date)
    {
        $this->attributes['send_date'] = Carbon::createFromFormat('m/d/Y',$send_date)->toDateString();
    }

    public function sender()
    {
        return $this->belongsTo(User::class,'sender_id');
    }

    public function recipient()
    {
        return $this->belongsToMany(User::class, 'letter_reciver');
    }

    public function type()
    {
        return $this->belongsTo(SuratType::class,'surat_type_id');
    }
}

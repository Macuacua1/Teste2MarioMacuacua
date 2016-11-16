<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inbox extends Model
{
    protected $table='inboxes';
    protected $fillable = [
        'destinatario', 'assunto', 'corpo','user_id','emissor','tipo',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}

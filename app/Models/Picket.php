<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picket extends Model
{
    protected $fillable = ['day_id','guru_id'];
    
    public function guru() {
        return $this->belongsTo('App\Models\Guru');
    }

    public function day() {
        return $this->belongsTo('App\Models\Day');
    }
}

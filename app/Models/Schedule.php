<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Schedule extends Model
{
    protected $fillable = ['subject_id','day_id','guru_id','kelas_id', 'start_time','end_time'];

    public function subject() {
        return $this->belongsTo('App\Models\Subject');
    }

    public function day() {
        return $this->belongsTo('App\Models\Day');
    }
      public function guru() {
        return $this->belongsTo('App\Models\Guru');
    }
      public function kelas() {
        return $this->belongsTo('App\Models\Kelas');
    }
    public function user():BelongsTo{
        return $this->belongsTo(User::class,'kode_guru','id');
    }
}

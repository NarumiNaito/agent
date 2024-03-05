<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Work;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'work_id',
        'subject',
        'content',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function work(){
        return $this->belongsTo(Work::class);
    }
}

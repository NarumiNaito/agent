<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class Work extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'workName',
        'user_id',
        'price',
        'deadline',
        'content',
        'skill',
        'memo',
        'status'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

//     protected static function boot()
// {
//     parent::boot();
//     // 保存時user_idをログインユーザーに設定
//     self::saving(function($work) {
//         $work->user_id = Auth::id();
//     });
// }
}

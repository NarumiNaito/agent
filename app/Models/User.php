<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Work;
use App\Models\Contact;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'tel',
        'postcode',
        'address',
        'detail'
    ];

    public function work(){
        return $this->hasMany(Work::class);
    }

    public function contact(){
        return $this->hasMany(Contact::class);
    }

    public function scopeSearchUsers($query, $input = null)
    {
        if(!empty($input)){
        if(User::where('name', 'like', $input . '%' )->exists()){
            return $query->where('name', 'like', $input . '%' );
            }
        }
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}

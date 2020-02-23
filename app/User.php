<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;
/*
use App\Notifications\ResetPassword;
use App\Notifications\VerifiesEmails;
*/

/*
 * if enable email verification use this code
 *implements MustVerifyEmail
*/
class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function relTutorsProfile()
    {
        return $this->hasOne('App\TutorProfile', 'user_id', 'id');
    }

    public function relGuardianProfile()
    {
        return $this->hasOne('App\GuardianProfile', 'user_id', 'id');
    }

    /*
    public function RegistersUsers($token)
    {
       $this->notify(new VerifiesEmails($token));
    }

    public function VerifiesEmails($token)
    {
       $this->notify(new VerifiesEmails($token));
    }
    */
}

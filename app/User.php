<?php

namespace App;
use App\Models\UserRole;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
  use Notifiable;

  
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */


    

    public function role()
    {
        return $this->hasOne('App\UserRole', 'user_id', 'id');
    }

    public function user_id()
    {
        return $this->belongsTO('App\UserRole', 'user_id', 'id');
    }

    public function admin()
    {
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_id', $userId)->first();
        if($userRole->role_id == 1)
        {
            return true;
        }
        return false;
    }

    public function cs()
    {
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_id', $userId)->first();
        if($userRole->role_id == 2)
        {
            return true;
        }
        return false;
    }

    public function mahasiswa()
    {
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_id', $userId)->first();
        if($userRole->role_id == 3)
        {
            return true;
        }
        return false;
    }

    public function dosen()
    {
        $userId = Auth::user()->id;
        $userRole = UserRole::where('user_id', $userId)->first();
        if($userRole->role_id == 4)
        {
            return true;
        }
        return false;
    }

    public function UserForum()
    {
      return $this->hasMany(Forum::class,'id','id_user');
  }

  public function UserGrubKelas()
  {
      return $this->hasMany(GrubKelas::class,'id','id_user');
  }

  public function UserJawabEssai()
  {
      return $this->hasMany(JawabEssai::class,'id','id_user');
  }

  public function UserJawabGanda()
  {
      return $this->hasMany(JawabEssai::class,'id','id_user');
  }

  public function UserKelas()
  {
      return $this->hasMany(Kelas::class,'id','id_user');
  }

  public function UserJawabKuis ()
  {
    return $this->hasMany(JawabKuis::class,'id','id_user');
}

public function pengguna()
{
    return $this->hasOne(Pengguna::class, 'id_user', 'id');
}


}

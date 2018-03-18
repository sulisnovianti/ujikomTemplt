<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
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

    public function pinjam(Barang $barang)
    {
        if ($barang->stock<1)
        {
            throw new BarangException("Barang Sedang Tidak Tersedia");
            
        }
        
    }

    public function borrowLogs()
    {
        return $this->hasMany('App\BorrowLog');
    }

    public function getCreatedAtAttribute()
{
    return \Carbon\Carbon::parse($this->attributes['created_at'])
       ->format('d, M Y H:i');
}

     public function getUpdatedAtAttribute()
{
    return \Carbon\Carbon::parse($this->attributes['updated_at'])
       ->diffForHumans();
}

}

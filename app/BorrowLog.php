<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BorrowLog extends Model
{
    //
    protected $fillable = ['barangs_id', 'users_id','is_returned'];

    public function Barang()
    {
    	return $this->belongsTo('App\Barang');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    protected $casts = ['is_returned'=>'boolean'];
    public function scopeReturned($query)
    {
        return $query->where('is_returned',1);
    }
    public function scopeBorrowed($query)
    {
        return $query->where('is_returned',0);
    }
}

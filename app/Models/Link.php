<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['original_url', 'short_url', 'user_id'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

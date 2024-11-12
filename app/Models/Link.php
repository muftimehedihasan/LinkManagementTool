<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    protected $fillable = ['user_id', 'original_url', 'shortened_url', 'custom_domain'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

}

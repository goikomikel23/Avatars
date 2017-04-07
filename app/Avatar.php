<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class avatar extends Model
{
    protected $hidden = ['url'];
    protected $appends = ['download_url'];

    public function getDownloadUrlAttribute($value)
    {
        return route('downloadAvatarApi', ['email' => $this->email]);
    }

    public function User() {
        return $this->belongsTo(User::class);
    }
}

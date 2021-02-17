<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = array('title', 'content', 'is_admin', 'user_id');
    protected $guarded = [];

    public function user()
    {
        $this->belongsTo('App\Models\User');
    }
}

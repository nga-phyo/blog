<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Work extends Model
{
    use HasFactory;



public function isownWork()
{
    return Auth::check() && $this->user_id == Auth::id();
}

public function user()
{
    return $this->belongsTo(User::class);
}
}


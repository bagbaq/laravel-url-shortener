<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'main_url',
        'shortened_url',
        'send_email'
    ];

    public function User() {
        return $this->belongsTo(User::class);
    }
}

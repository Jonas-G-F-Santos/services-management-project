<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table= "clients";

    protected $fillable = [
        'name',
        'email',
        'address',
        'phone_1',
        'phone_2',
        'user_id',
    ];

    protected $hidden = [
        'user_id'
    ];

    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function services() {
        return $this->hasMany(Service::class);
    }
}

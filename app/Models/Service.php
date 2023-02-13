<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table= "services";

    protected $fillable = [
        'name',
        'desc',
        'file',
        'status',
        'pricing',
        'client_id',
        'client_name',
        'user_id'
    ];

    protected $hidden = [
        'client_id',
        'user_id'
    ];

    use HasFactory;

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}

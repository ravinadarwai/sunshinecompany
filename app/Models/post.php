<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class post extends Model
{
    use HasFactory;

    protected $table = 'post_image';
    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'image',
        'like_count',
        'description', // Added 'description' to fillable
    ];

    public function getuser()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-M-Y H:i:s');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Click extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'url_id',
        'clicked_at',
    ];

    public function url()
    {
        return $this->belongsTo(Url::class);
    }
} 
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image',
        'description',
        'admin_id'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
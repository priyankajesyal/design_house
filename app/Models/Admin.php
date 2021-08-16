<?php

namespace App\Models;

use App\Models\Banner;
use App\Models\Portfolio;
use App\Models\AdminProposal;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;

    protected $table = 'admins';
    protected $guarded = array();

    public function adminproposal(){
        return $this->hasMany(AdminProposal::class);
    }

    public function banner(){
        return $this->hasMany(Banner::class);
    }

    public function portfolio(){
        return $this->hasMany(Portfolio::class);
    }
}
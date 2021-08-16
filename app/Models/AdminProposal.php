<?php

namespace App\Models;

use App\Models\Admin;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminProposal extends Model
{
    use HasFactory;

    protected $fillable = ['proposal_id','admin_id','price','comments','status'];

    public function adminproposalimages()
    {
        return $this->hasMany(AdminProposalImage::class,'admin_proposal_id');
    }

    public function proposal(){
        return $this->belongsTo(Proposal::class);
    }

    public function admin(){
        return $this->belongsTo(Admin::class);
    }
}
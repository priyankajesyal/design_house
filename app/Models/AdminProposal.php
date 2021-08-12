<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
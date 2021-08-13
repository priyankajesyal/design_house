<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Proposal;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProposalResource;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Api\ApiController;

class ProposalController extends ApiController
{



    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        $data = Proposal::with(['proposalImages'])->paginate(5);
        return ProposalResource::collection($data);
        // $proposals = Proposal::all();
        // return $this->successResponse($proposals);
        // return Proposal::with('proposalImages')->paginate(5);
    }
    public function show($id)
    {
        return Proposal::where(['user_id' => auth()->user()->id, 'id' => $id])->get();
    }
    public function store(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'portfolio_id' => 'required',
            'description' => 'required',
            'image' => 'required',
        ]);

        if ($validate->fails()) {
            return response(['status' => 'error', 'message' => $validate->errors()->all()], 401);
        }

        $data = $request->merge(['user_id' => auth()->user()->id])->except(['image']);
        $proposal = Proposal::create($data);
        if($proposal){
            $portfolio = Portfolio::where('id', $request->portfolio_id)->update(['proposal_status'=>1]);
        }

        if ($request->hasFile('image')) {
            foreach ($request->image as $image) {
                $resp = $proposal->proposalImages()->create(['images' => $image]);
            }
        }

        return response(['status' => 'success'], 200);
    }
}
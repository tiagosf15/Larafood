<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreUpdateDetailPlan;
use App\Http\Controllers\Controller;
use App\Models\Models\DetailPlan;
use App\Models\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DetailPlanController extends Controller
{
    protected $repository , $plan;

    public function __construct(DetailPlan $detailPlan, Plan $plan)
    {
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    public function index($urlPlan){
        if(!$plan = $this->plan->where('url',$urlPlan)->first()){
            return redirect()->back();
        }
        //$details = $plan->details();
        $details = $plan->details()->paginate();
        return view('admin.pages.plans.details.index',[
            'plan' => $plan,
            'details' => $details
        ]);
    }
    public function createdetail($urlPlan)
    { 
        if(!$plan = $this->plan->where('url',$urlPlan)->first()){
            return redirect()->back();
        }
        return view('admin.pages.plans.details.create',[
            'plan' => $plan,
        ]);
    }

    public function store(StoreUpdateDetailPlan $request , $urlPlan){
        
        if(!$plan = $this->plan->where('url',$urlPlan)->first()){
            return redirect()->back();
        }
        
        DB::table('detail_plans')->insert([
            'plan_id'=>$plan['id'],
            'name' => $request->input('name'),
        ]);
        return redirect()->route('details.plans.index',$plan['url']);
    }

    public function show($urlPlan,$idDetail){
        $plan = $this->plan->where('url',$urlPlan)->first();
        $details = $this->repository->find($idDetail);
       
        if(!$plan || !$details){
            return redirect()->back();
        }

     
        return view('admin.pages.plans.details.show',[
            'plan' => $plan,
            'details' => $details,
            
        ]);
    }
    public function edit($urlPlan, $idDetail){
        $plan = $this->plan->where('url',$urlPlan)->first();
        $details = $this->repository->find($idDetail);
       
        if(!$plan || !$details){
            return redirect()->back();
        }
        return view('admin.pages.plans.details.edit',[
            'plan'=> $plan,
            'details'=> $details,
        ]);
    }

     public function update(StoreUpdateDetailPlan $request, $url, $idDetail){
        
        $plan = $this->plan->where('url',$url)->first();
        $details = $this->repository->find($idDetail);
       
        if(!$plan || !$details){
            return redirect()->back();
        }
       
        $details->update($request->only(['name']));
        return redirect()->route('details.plans.index',$url);
        
     }

     public function destroy($urlPlan,$idDetail)
    {
        $plan = $this->plan->where('url',$urlPlan)->first();
        $details = $this->repository->find($idDetail);
       
        $details = $this->repository->where('id',$idDetail)->first();
        
       if(!$details){
           return redirect()->back();
        }
        $details->delete();
        return redirect()->route('details.plans.index', $plan->url);
    }
}

<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
   protected $fillable = ['name', 'url','price', 'description'];

   public function Details(){
      return $this->hasMany(DetailPlan::class);
   }

   public function search($filter = null){
      $result = $this->where('name','LIKE',"%{$filter}%")
      ->orWhere('description','LIKE',"%{$filter}%")
      ->paginate(1);
      return $result;
   }
}

 

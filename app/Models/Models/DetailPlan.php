<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPlan extends Model
{
    protected $table="detail_Plans";
    protected $fillable = ['name'];

    public function plan(){
        return $this->belongsTo(Plan::class);
    }

    public function rules(){
        return[
            'name' => 'required|min:3|max:255'
        ];
    }
}

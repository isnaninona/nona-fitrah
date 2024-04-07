<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use HasFactory;
    protected $guarded = [];

    /**
     * Get the user that uploaded the material.
     */
    public function guruMateri(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    public $table='category';
    protected $primarykey ='id';
    public function music(){
        return $this->hasMany('App\Models\Music');
    }
    protected $fillable= [
        'name','category_description'
    ]   ;
}


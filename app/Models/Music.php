<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Music extends Model
{
    use HasFactory;
    public $table='music';
    protected $primarykey ='id';
    public function category(){
        return $this->belongsTo('App\Models\Category','category_id');
    }
    protected $fillable= [
        'name','lyrics','image','audio','price','description','singer','category_id'
    ]   ;
}

<?php

namespace App\Models;

use Clockwork\Request\Request;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Routing\Route;

class Listing extends Model
{
    use HasFactory;
   protected $fillable=['user_id','title','logo','company','location','email'
   ,'website','description','tags'];
  public function scopeFilter($query,array $filters){
    if($filters['tag'] ?? false){
        $query->where('tags','like','%' . request('tag') . '%');
    }
     if($filters['search'] ?? false){
        $query->where('title','like','%' . request('search') . '%')
        ->orwhere('description','like','%' . request('search') . '%')
        ->orwhere('tags','like','%' . request('search') . '%');

     }


  }
  public function user(){
    return $this->belongsTo(User::class,'user_id');
  }



    
}

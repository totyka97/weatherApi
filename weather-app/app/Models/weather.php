<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\location;

class weather extends Model
{
    use HasFactory;
    protected $table = 'weather';
    protected $primaryKey = 'id';
    protected $fillable =['id','zipcode','reportdate','celsius'];


    
    public function location(){
        return $this->belongsTo(location::class,'zipcode',);
    }






}

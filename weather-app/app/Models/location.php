<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use  App\Models\weather;

class location extends Model
{
    use HasFactory;


    protected $table = 'location';
    protected $primaryKey = 'zipcode';
    protected $fillable =['zipcode','City','Country'];


    public function weather(){
        return $this->hasMany(location::class,'zipcode','zipcode');


    }

}

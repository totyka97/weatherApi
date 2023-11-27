<?php

namespace App\Http\Controllers;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\weather;
use App\Models\location;
use DB;

class weatheApiController extends Controller
{
    public function getList(){


     return weather::select('*')->join('location','weather.zipcode','=','location.zipcode')->get();  
      
    }
    public function getRecord($record){

        return weather::select('*')->join('location','weather.zipcode','=','location.zipcode')->where('id',$record)->get();  
         
       }
    public function getIrsz($irsz){

        return weather::select('*')->join('location','weather.zipcode','=','location.zipcode')->where('weather.zipcode',$irsz)->get();  
         
       }

    public function insertRecord(Request $request){
        $request->validate([
            
            'zipcode' => 'required',
            'reportdate' => 'required',
            'celsius' => 'required',
            'City' => 'required',
            'Country' => 'required',
        ]);
        $lekerdez =location::where('zipcode','=',$request ->zipcode)->first();
        if ($lekerdez) {
            
        }else{
            location::create([
                'zipcode' => $request->zipcode,
                'City' => $request->City,
                'Country' => $request->Country
    
            ]);

           

        }

        weather::create([
            'zipcode' => $request->zipcode,
            'reportdate' => $request->reportdate,
            'celsius' => $request->celsius

        ]);
        return response()->json(['success' => 'success'], 201); 

    }
    
    public function deleteRecord(weather $record){

        $success = $record->delete();

        if($success) return response()->json(['success' => $success], 201);
        else  return response()->json(['success' => false], 401);
        
         
       }
    

       public function updateWeatherRecord(Request $request, weather $record){
       $record ->update($request->all());
       return $record;
       }


       public function updateIrszRecord(Request $request, weather $record){
        $record ->update($request->all());
        return $record;
        }




}

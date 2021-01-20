<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Worker;


class CompanyController extends Controller
{
    function add(Request $request){

        $company = new Company();
        $company->name=$request->name;
        $company->nip=$request->nip;
        $company->address=$request->address;
        $company->city=$request->city;
        $company->postcode=$request->postcode;
        $company->save();
 
        $prac = $request->prac;
        

        foreach($prac as $item) {  
            
        $w = new Worker();
        $w->forename=$request->forename;
        $w->surname=$request->surname;
        $w->email=$request->email;
        $w->phone=$request->phone;

        $worker = $company->workers()->save($w);
          
        }
        
 

    }
}

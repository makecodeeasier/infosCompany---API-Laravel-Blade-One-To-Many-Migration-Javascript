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
 
        $prac = json_decode($request->prac);
          
        foreach($prac as $item) {         
        $w = new Worker();
        $w->forename=$item->forename;
        $w->surname=$item->surname;
        $w->email=$item->email;
        $w->phone=$item->phone;
        $worker = $company->workers()->save($w);     
        }
        
 

    }
}

<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model_Customer;



use Carbon\Carbon;
/**
* 
*/
class KetuaController extends Controller
{
	
	public function home()
	{
		
		return view('admin_ketua.home');
	}

	

	
}
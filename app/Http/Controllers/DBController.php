<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PdfReceived;
use Barryvdh\DomPDF\Facade as PDF;

use App\order;

class DBController extends Controller
{
    public function index(Request $request)
    {
    	$description = $request['description'];
    	$date = $request['date']; 

    	if($description != null)
    	{
    		\Session::put('description',$description);
    	}

    	if($date != null)
    	{
    		\Session::put('date',$date);
    	}

    	$description = \Session::get('description');
    	$date = \Session::get('date');

    	
   

    	$orders = order::orderby('id','DESC')
    		->description($description)
    		->date($date)
    		->paginate(10);

    	return view('database',[
    		'orders' => $orders,
    		'date' => $date,
    		'description' => $description,
    	]);
    }

    public function prueba(Request $request)
    {

        \Session::forget('description');
        \Session::forget('date');
    	
   
        return redirect()->route('DB.index');
    	
    }

    public function store()
    {
    	$msg = request()->validate([
    		'emailTo' => 'required|email',
    	]);

        //datos para el pdf

        $description = \Session::get('description');
        $date = \Session::get('date');


        //Enviar Email

        Mail::to($msg['emailTo'])->queue(new PdfReceived($msg,$description,$date));

        return back()->with('status','Messeage Send');
    	
    }


}

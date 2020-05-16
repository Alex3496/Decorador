<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MisClases\{HouseBlend,DarkRoast,Espresso,Decaf,Milk,Mocha,Soy,Whip};
use App\order;
use Barryvdh\DomPDF\Facade as PDF;

class CajaController extends Controller
{
    //variable que puede ser cualquier producto
    private $c;

    /**
     * Muestra la vista de la caja 
     *
     * 
     */
    public function index()
    {
        //dd(\Session::get('orderList'));

        if(\Session::get('orderList'))
        {
            $orderList = \Session::get('orderList');
        }else{
            $orderList = array();
        }

        return view('caja',[
            'orderList' => $orderList,
        ]);
    }

    /*
    *  Añade un pedido a la varaible de sesion orderList  
    */
    public function add(Request $request)
    {
        //dd($request->all());

        $this->setOrder($request);

        $orderList = (object)array(
            'description' => $this->c->getDescription(),
            'cost' => $this->c->getCost(),  
        );

        \Session::push('orderList',$orderList);

        $orderList = \Session::get('orderList');

        //dd($orderList);

        $subTotal = 0;
        foreach ($orderList as $order_inSession) {
            $subTotal += $order_inSession->cost;
        }
        $tax = $subTotal * .16;
        $total = $subTotal + $tax;

       return back()->withInput()->with([
            'subTotal' => $subTotal,
            'tax' => $tax,
            'total' => $total,
        ]);
    }

    /**
     * Guarda en la base de datos los pedido que estan en la 
     * variable de sesion orderList
     */
   
    public function store(Request $request)
    {
        $orderList = \Session::get('orderList');

        //dd($orderList);

        foreach ($orderList as $order_inSession) {
            $order = new order;
            $order->description = $order_inSession->description;
            $order->cost = $order_inSession->cost;
            $order->save();
        }

        \Session::forget('orderList');

        return back()->withInput();
    }


    public function setOrder($request)
    {
        if ($request->beverage == 'espresso') {
            $this->c = new Espresso();
        }elseif ($request->beverage == 'houseblend') {
            $this->c = new HouseBlend();
        }elseif ($request->beverage == 'darkroast') {
            $this->c = new DarkRoast();
        }elseif ($request->beverage == 'decaf') {
            $this->c = new Decaf();
        }

        if($request->mocha > 0){
            for ($i=0; $i < $request->mocha; $i++) { 
                $this->c = new Mocha($this->c);
            }
        }
        if($request->milk > 0){
            for ($i=0; $i < $request->milk; $i++) { 
                $this->c = new Milk($this->c);  
            }
        }
        if($request->soy > 0){
            for ($i=0; $i < $request->soy; $i++) { 
                $this->c = new Soy($this->c);  
            }
        }
        if($request->milk > 0){
            for ($i=0; $i < $request->whip; $i++) { 
                $this->c = new Whip($this->c);  
            }
        }
    }

    public function exportPDF()
    {

        
        $orderList = \Session::get('orderList');

        $subTotal = 0;
        foreach ($orderList as $order_inSession) {
            $subTotal += $order_inSession->cost;
        }
        $tax = $subTotal * .16;
        $total = $subTotal + $tax;

        $pdf = PDF::loadView('pdf.receipt',[
            'orderList' => $orderList,
            'subTotal' => $subTotal,
            'tax' => $tax,
            'total' => $total,
        ]);

        return $pdf->download('receipt.pdf');

    }
}

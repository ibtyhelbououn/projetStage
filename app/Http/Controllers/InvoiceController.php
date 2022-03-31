<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Organization;
use App\Models\Product;
use App\Models\InvoiceProducts;



class InvoiceController extends Controller
{

    public function index()
    {
        $invoices = Invoice::all();
        $products = Product::all();

         return view('invoices',compact('invoices','products'));

    }

    public function add(Request $request)
    {
        $organizations = Organization::all();
        $products = Product::all();
       
        return view('add-invoice',compact('organizations','products'));
    }

    public function create(Request $request)
    {
        // dump($request->input('organizationID'));
        // dump($request->input('total'));
        $invoice = Invoice::create(
            [
                'organizationID' => $request->input('organizationID'),
                'total' => $request->input('total')
            ]
        );
        foreach((array)$request->input('productID') as $id){
                $product = Product::find($id);
                $invoice->products()->attach($product,['quantity'=>$request->input('quantity')]);
        }
        // dump($invoice);
        $invoice->save();
        return redirect('/invoices');


    }

    public function details($id)
    {
        $invoice = Invoice::find($id);
        $products = InvoiceProducts::where('invoice_id', $id )->get();

        $allproducts = Product::all();
        return view('/invoice-details',compact('invoice','products','allproducts'));
    }


    
    public function delete($invoice)
    {
        Invoice::find($invoice)->delete();
        return redirect()->back();
    }


}


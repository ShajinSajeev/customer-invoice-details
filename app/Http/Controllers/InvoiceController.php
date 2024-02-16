<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(){
        $invoiceList = Invoice::leftjoin('customers','customers.id','invoices.customer')
        ->select('invoices.*','customers.name as customerName')->get();
        return view('invoice.index',compact('invoiceList'));
    }

    public function create(){
        $customerList = Customer::all();
        return view('invoice.create',compact('customerList'));
    }

    public function store(Request $request){
        $input = $request->all();
        $invoice = new Invoice();
        $invoice->customer = $input['name'];
        $invoice->date = $input['date'] ?? null;
        $invoice->amount = $input['amount'] ?? null;
        $invoice->status = $input['status'] ?? null;
        $invoice->save();

        return redirect()->route('invoice.list');
    }

    public function edit($id){
        $customerList = Customer::all();
        $invoiceDetails = Invoice::find($id);
        return view('invoice.edit',compact('invoiceDetails','customerList'));
    }

    public function update(Request $request){

        $invoice = Invoice::find($request->invoice_id);
        $invoice->customer = $request->name;
        $invoice->date = $request->date;
        $invoice->amount = $request->amount;
        $invoice->status = $request->status;
        $invoice->save();
        return redirect()->route('invoice.list');
    }
    

    public function destroy($id){
        Invoice::find($id)->delete();
        return redirect()->route('invoice.list');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{

    public function detailListing(Request $request){
        $type = $request->type;
        if($type == 1){

            $customerDetails = Customer::all();
            return response()->json([
                'customerDetails' => $customerDetails
            ]);
        }elseif($type == 2){

            $invoiceDetails = Invoice::leftjoin('customers','customers.id','invoices.customer')->select('invoices.id','customers.name as cutomerName','invoices.date','invoices.amount','invoices.status','invoices.created_at','invoices.updated_at')->get();
            return response()->json([
                'invoiceDetails' => $invoiceDetails
            ]);
        }else{
            return response()->json([
                'status'=>false,
                'message' => 'choose type 1 for customer list and type 2 for invoice listing'
            ]);
        }
    }

    public function dataCreation(Request $request){

        $validator = Validator::make($request->all(), [
            'type' => 'required|in:1,2',
            'name' => 'required_if:type,1',
            'customer_id' => 'required_if:type,2',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => $validator->errors()->first(),
            ]);
        }

        $type = $request->type;

        if ($type == 1) {
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->phone = $request->phone ?? null;
            $customer->email = $request->email ?? null;
            $customer->address = $request->address ?? null;
            $customer->save();

            return response()->json([
                'status' => true,
                'message' => 'Customer created successfully!',
            ]);

        } elseif ($type == 2) {
            $invoice = new Invoice();
            $invoice->customer = $request->customer_id;
            $invoice->date = $request->date ?? null;
            $invoice->amount = $request->amount ?? null;
            $invoice->status = $request->status ?? null;
            $invoice->save();

            return response()->json([
                'status' => true,
                'message' => 'Invoice created successfully!',
            ]);

        } else {
            return response()->json([
                'status' => false,
                'message' => 'Choose type 1 for customer list and type 2 for invoice listing',
            ]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Type;
use Illuminate\Support\Arr;

class ModularController extends Controller
{
  public function index(Request $request, $type){

    $list=('App\Models\\'.(ucfirst($type)))::orderBy('id','Desc')->get();
    $labels = Type::where('type',$type)->pluck('label');
    return view('modular.index',compact('list','type','labels'));  
  }

  public function create(Request $request, $type){

    $customerList = Customer::orderBy('id','Desc')->get();
    $labels = Type::where('type',$type)->get();
    return view('modular.create',  compact('customerList','type','labels'));
  }

  public function store(Request $request, $type){

    $model = new ('App\Models\\'.(ucfirst($type)));
    $model->fill(Arr::only($request->all(), $model->getFillable()));
    $model->save();
    return redirect()->route('data.list',$type);
  }

  public function edit($type,$id){

    $customerList = Customer::all();
    $data = ('App\Models\\'.(ucfirst($type)))::find($id);
    $labels = Type::where('type',$type)->get();
    return view('modular.edit',compact('data','customerList','type','labels'));
  }

    public function update(Request $request,$type){

      $model = ('App\Models\\'.(ucfirst($type)))::find($request->id);
      $model->update(Arr::only($request->all(), $model->getFillable()));
      return redirect()->route('data.list',$type);
    }


    public function destroy($type,$id){
      ('App\Models\\'.(ucfirst($type)))::find($id)->delete();
      return redirect()->route('data.list',$type);
    }
}

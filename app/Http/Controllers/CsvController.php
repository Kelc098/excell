<?php

namespace App\Http\Controllers;


/* use App\Http\Request\ValidacionRequest; */
use App\Models\Product;
use App\Imports\ProductImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class CsvController extends Controller
{
    //
    public function index(){
        $product = Product::all();
        return view('index', compact('product'));
    }
   /*  public function store(ValidacionRequest $request){
        /* $validate=$request->validate(); */


    public function import(Request $request){


            /* $request->validate([
                'document_csv'=>'required|mimes:csv']); */

            $file = $request->file('document_csv');
            Excel::import(new ProductImport, $file);
            return redirect()->route('index');

    }

}

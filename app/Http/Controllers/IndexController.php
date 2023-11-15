<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Imports\ProductImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class IndexController extends Controller
{
    public function welcome()
    {
        $products = Product::orderByDesc('id')->simplePaginate(10);
        return view('welcome', compact('products'));
    }

    public function export(Request $request){
        return Excel::download(new ProductExport([
            $request->date_start, $request->date_end
        ]), sprintf('products_%s_%s.xls', $request->date_start, $request->date_end));
    }

    public function import(Request $request)
    {
        //dd($request->all());
        Excel::import(new ProductImport(), $request->document);
        return redirect()->route('welcome')->with('success', 'Imported successfully!');
    }
}

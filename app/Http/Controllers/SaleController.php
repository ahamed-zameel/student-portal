<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Sale;
use DB;
use PDF;
use Redirect;
use Picqer;
use Validator;
// use Rap2hpoutre\FastExcel\FastExcel;
use Rap2hpoutre\FastExcel\Facades\FastExcel;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SaleImport;
use Carbon\Carbon;


use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function salesList()
    {
        $sales = Sale::with('product')->get();// Fetch sales with associated products
        return view('sales-list', compact('sales'));
    }

    
    public function salesadd(Request $request)
    {
        // Check if the request is a POST method
        if ($request->isMethod('post')) {
            // Validate incoming request
            $validatedData = $request->validate([
                'product_id' => 'required|exists:products,id',
            'sold_quantity' => 'required|integer|min:1',
            'sale_date' => 'required|date', // Ensure expiry date is after manufacture date
            ]);

            // Find the product by ID
        $product = Product::findOrFail($validatedData['product_id']);
    

        // Check if enough quantity is available
        if ($product->quantity < $validatedData['sold_quantity']) {
            // Redirect back with an error message if not enough quantity
            return redirect()->back()->withErrors([
                'sold_quantity' => 'Not enough product quantity available. Available quantity: ' . $product->quantity
            ])->withInput();
        }


            // Save the product to the database
            sale::create($validatedData);


            $product->quantity -= $validatedData['sold_quantity'];
            $product->save();
           
    
            // Redirect with success message
            return redirect()->route('sales.add')->with('success', 'Product added successfully!');
        }

        $products = Product::all();
    
        // Display the form on GET request
        return view('sales-add', compact('products'));
    }
    public function destroy($id)
{
    $sale = Sale::findOrFail($id);
    $sale->delete();

    return redirect()->route('sales.list')->with('success', 'Sale deleted successfully!');
}



public function export()
{
    // Get all sales along with the related product information
    $sales = Sale::with('product')->get();

    // Prepare the data for export
    $exportData = $sales->map(function ($sale) {
        return [
            'product_name' => $sale->product ? $sale->product->name : 'N/A',// Get product ID
            'sold_quantity' => $sale->quantity, // Assuming you have a quantity field for sold quantity
            'sale_date' => $sale->created_at->format('Y-m-d'), // Format sale date (assuming created_at is the sale date)
        ];
    });

    // Download the data as an Excel file
    return (new FastExcel($exportData))->download('sales.xlsx');
}

public function Importview()
{
    return view('import');
}

public function Import(Request $request)
{
    $request-> validate([
        'import_file'=>[
            'required',
            'file'
        ],
    ]);

    Excel::import(new SaleImport, $request->file('import_file'));
    return redirect()->back()->with('status', 'imported successfully');
}

}

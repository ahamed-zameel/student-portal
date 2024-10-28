<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Rap2hpoutre\FastExcel\Facades\FastExcel;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ProductImport;
use Carbon\Carbon; // Correct the casing, should be Product, not product
use DB;
use PDF;
use Redirect;
use Picqer;
use Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        return view('index-home');
    }


    public function productList()
    {
        // Fetch all products from the database
        $products = Product::all();

        // Pass the products to the view
        return view('product-list', compact('products'));
    }


    public function productadd(Request $request)
    {
        // Check if the request is a POST method
        if ($request->isMethod('post')) {
            // Validate incoming request
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'quantity' => 'required|integer|min:0',
                'batchcard_id' => 'required|integer', // Ensure this is an integer
                'manufacture_date' => 'required|date',
                'expiry_date' => 'required|date|after:manufacture_date', // Ensure expiry date is after manufacture date
            ]);
    
            // Save the product to the database
            Product::create($validatedData);
    
            // Redirect with success message
            return redirect()->route('product.add')->with('success', 'Product added successfully!');
        }
    
        // Display the form on GET request
        return view('product-add');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('product-edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'batchcard_id' => 'required|integer',
            'manufacture_date' => 'required|date',
            'expiry_date' => 'required|date|after:manufacture_date',
        ]);

        $product = Product::findOrFail($id);
        $product->update($validatedData);

        return redirect()->route('product.list')->with('success', 'Product updated successfully!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('product.list')->with('success', 'Product deleted successfully!');
    }
    
    
    
    
    
}


<?php

namespace App\Imports;
use App\Models\Sale;
use App\Models\Product;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            // Check if the product already exists
            $product = Product::where('name', $row[0])->first();
    
            // If the product exists, update it; otherwise, create a new one
            if ($product) {
                // Update the existing product
                $product->description = $row[1];
                $product->quantity = $row[2];
                $product->batchcard_id = $row[3];
                $product->manufacture_date = \Carbon\Carbon::parse($row[4])->format('Y-m-d');
                $product->expiry_date = \Carbon\Carbon::parse($row[5])->format('Y-m-d');
                $product->save(); // Save the updated product
            } else {
                // Create a new product
                Product::create([
                    'name' => $row[0],  // Assuming this is the product name
                    'description' => $row[1],
                    'quantity' => $row[2],
                    'batchcard_id' => $row[3],
                    'manufacture_date' => \Carbon\Carbon::parse($row[4])->format('Y-m-d'),
                    'expiry_date' => \Carbon\Carbon::parse($row[5])->format('Y-m-d'),
                ]);
            }
        }
    }
}

<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Sale;
use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToCollection;

class SaleImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) 
        {
            // Fetch product ID using product name
            $product = Product::where('name', $row[0])->first(); // Assuming 'name' is the column storing the product name

            if ($product) {
                Sale::create([
                    'product_id' => $product->id,    // Insert the correct product ID
                    'sold_quantity' => $row[1],
                    'sale_date' => $row[2],
                ]);
            } else {
                // Handle case where product is not found, e.g., log error or skip the row
            }
        }
    }
}

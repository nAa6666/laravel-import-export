<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ProductImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $k=>$row){
            if ($k == 0) continue;
            Product::create([
                'name' => $row[1],
                'price' => $row[2],
                'description' => $row[3],
            ]);
        }
    }
}

<?php

namespace App\Exports;

use App\Models\Product;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromArray;

class ProductExport implements FromArray
{
    public $date;
    public function __construct($date)
    {
        $this->date = $date;
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function array(): array
    {
        $products = Product::whereDate('created_at', '>', Carbon::parse($this->date[0])->toDateString())
            ->whereDate('created_at', '<', Carbon::parse($this->date[1])->toDateString())
            ->orderByDesc('id')->get();

        $products_result[] = ['id', 'name', 'price', 'description', 'created_at'];

        if ($products->count() < 1) return [];

        foreach ($products as $product){
            $products_result[] = [
                $product->id,
                $product->name,
                $product->price,
                $product->description,
                $product->created_at
            ];
        }
        return $products_result;
    }
}

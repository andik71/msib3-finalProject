<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class ProductExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $product = DB::table('products')
                ->join('category','category.id','=','products.category_id')
                ->join('store','store.id','=','products.store_id')
                ->select('products.id','products.code','products.name AS product','products.desc','products.price','products.stok',
                        'products.sold','products.photo','category.name AS category','store.name AS shop')->get();

        return $product;
    }

    public function headings(): array
    {
        return ['No', 'Code', 'Product', 'Description', 'Price', 'Stok', 'Sold', 'Image', 'Category', 'Store'  ];
    }
}

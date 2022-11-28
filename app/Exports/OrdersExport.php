<?php

namespace App\Exports;

use App\Models\Orders;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class OrdersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        $product = DB::table('orders')
        ->join('products', 'products.id', '=', 'orders.products_id')
        ->join('checkout', 'checkout.id', '=', 'orders.checkout_id')
        ->select(
            'orders.id',
            'checkout.code',
            'products.name',
            'orders.order_quantity',
            'orders.total_price',
        )->get();

        return $product;
    }

    public function headings(): array
    {
        return ['No', 'Order ID', 'Product Purchased', 'Total Order', 'Total Price'];
    }
}

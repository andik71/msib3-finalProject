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

        $order = DB::table('orders')
        ->join('users', 'orders.users_id', '=', 'users.id')
        ->join('products', 'orders.products_id', '=', 'products.id')
        ->select('orders.id', 'users.name', 'products.name as product','orders.order_quantity','orders.total_price')
        ->orderBy('orders.id', 'DESC')->get();

        return $order;
    }

    public function headings(): array
    {
        return ['Order ID', 'Billed TO', 'Product Purchased', 'Total Order', 'Total Price'];
    }
}

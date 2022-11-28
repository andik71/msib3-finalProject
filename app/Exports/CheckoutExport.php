<?php

namespace App\Exports;

use App\Models\Checkout;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class CheckoutExport implements FromCollection,WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {

        $checkouts = DB::table('checkout')
        ->join('users', 'users.id', '=', 'checkout.users_id')
        ->select('checkout.id','checkout.code','users.name','users.address', 'checkout.total_price', 'checkout.status')
        ->get();


        return $checkouts;
    }

    public function headings(): array
    {
        return ['No', 'Transaction ID', 'Billed To', 'Shipped To', 'Total Price', 'Status'];
    }
}

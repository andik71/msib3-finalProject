
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Download PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <p>{{ $date }}</p>
    <h4 class="text-center mb-3">List Data Orders</h4>

    <table class="table table-bordered">
        <tr>
                <th>#</th>
                <th>Order ID</th>
                <th>Product Purchased</th>
                <th>Total Order</th>
                <th>Total Price</th>
        </tr>
            @foreach ($orders as $order)
                <tr>
                    <th scope="row">{{ $order->id }}</></th>
                    <th scope="row">{{ $order->checkout->code }}</></th>
                    <td>{{ $order->products->name }}</td>
                    <th scope="row">{{ $order->order_quantity }}</></td>
                    <td>Rp. {{ number_format($order->total_price) }}</td>
                </tr>
            @endforeach
    </table>
  
</body>
</html>
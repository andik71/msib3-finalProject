
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Download PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <p>{{ $date }}</p>
    <h4 class="text-center mb-3">List Data Transaction</h4>

    <table class="table table-bordered">
        <tr>
                <th>#</th>
                <th>Transaction ID</th>
                <th>Billed To</th>
                <th>Shipped To</th>
                <th>Total Price</th>
                <th>Status</th>
        </tr>
            @foreach ($checkouts as $checkout)
                <tr>
                    <td scope="row">{{ $checkout->id }}</></td>
                    <td scope="row">{{ $checkout->orders_id }}</></td>
                    <td scope="row">{{ $checkout->name }}</></td>
                    <td scope="row">{{ $checkout->address }}</></td>
                    <td scope="row">{{ number_format($checkout->total_price) }}</></td>
                    <td scope="row">{{ $checkout->status}}</></td>
                </tr>
            @endforeach
    </table>
  
</body>
</html>
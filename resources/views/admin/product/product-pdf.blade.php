
</html>
<!DOCTYPE html>
<html>
<head>
    <title>Download PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <p>{{ $date }}</p>
    <h4 class="text-center mb-3">List Data Products</h4>
  
    <table class="table table-bordered">
        <tr>
                <th>#</th>
                <th>Code</th>
                <th>Category</th>
                <th>Product</th>
                <th>Price</th>
                <th>Stok</th>
                <th>Sold</th>
        </tr>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</></th>
                    <th scope="row">{{ $product->code }}</></th>
                    <td>{{ $product->category->name }}</td>
                    {{-- <td><a href="#" class="text-primary">{{ $product->desc }}</a></td> --}}
                    <th scope="row">{{ $product->name }}</></td>
                    <td>Rp. {{ number_format($product->price) }}</td>
                    <td>{{ $product->stok }}</td>
                    <td>{{ $product->sold }}</td>
    
                </tr>
            @endforeach
    </table>
  
</body>
</html>
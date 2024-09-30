<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</head>
<body>

    <div class="container">
        <table class="table table-table-stripe table-bordered" border = "2" cellspacing = "5" cellpadding = "3">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Product_name</th>
                <th scope="col">Product_price</th>
                <th scope="col">Phone</th>
                <th scope="col">Address</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">{{ $pdf->id }}</th>
                <td>{{ $pdf->product->product_title }}</td>
                <td>{{ $pdf->price }}</td>
                <td>{{ $pdf->phone }}</td>
                <td>{{ $pdf->user->address }}</td>
              </tr>
             
            </tbody>
          </table>
    </div>
<br><br>
    <div class="container">
        <div class="card" style="width: 18rem;">
            <img src="products_images/{{$pdf->product->image}}" class="card-img-top" alt="...">
    </div>
</body>
</html>
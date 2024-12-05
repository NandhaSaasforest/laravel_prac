<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Routing</title>
</head>
<body>
    @foreach ($products as $product )
        <div class="post">
            <h1>{{ $product->name }}</h1>
            <div class="content">
                Price: {{$product->price}}
                Quantity: {{$product->quantity}}{{$product->type}}
                
            </div>
        </div>
    @endforeach

    
    @if($product)
        <div class="post">
            <h1>{{ $product->name }}</h1>
            <div class="content">
                Price:{{$product->price}}
                Quantity: {{$product->quantity}}{{$product->type}}         
            </div>
        </div>
    @endif
 
    
</body>
</html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Routing</title>
</head>
<body>
    @isset($products)
        @foreach ($products as $product )
            <div class="post">
                <h1>{{ $product->name }}</h1>
                <div class="content">
                    Price: {{$product->price}}
                    Quantity: {{$product->quantity}}{{$product->type}}
                    
                </div>
            </div>
        @endforeach
    @endisset

    
    @isset($product)
        <div class="post">
            <h1>{{ $product->name }}</h1>
            <div class="content">
                Price:{{$product->price}}
                Quantity: {{$product->quantity}}{{$product->type}}         
            </div>
        </div>
    @endisset
 
    
</body>
</html>
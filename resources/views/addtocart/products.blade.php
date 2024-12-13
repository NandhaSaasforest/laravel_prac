<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    
</head>
<body>

    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <a href="#" class="text-lg font-semibold text-gray-900 hover:text-blue-500">Home</a>
        <a href="#" class="text-lg font-semibold text-blue-500 hover:text-blue-500">Products</a>
        <a href="#" class="text-lg font-semibold text-gray-900 hover:text-blue-500">Account</a>
        <a href="/addtocart" class="text-lg font-semibold text-gray-900 hover:text-blue-500">Cart</a>
    </nav>

    <hr>

    <div class="mx-auto max-w-2xl">
        <h2 class="mt-10 text-2xl font-semibold text-indigo-600 lg:text-center">PRODUCTS</h2>
    </div>

    <div x-data="{cart:$persist([]),
                    find(id) {
                    this.cart.push(id);
                    console.log(this.cart)
                    }
        }">

  
    
    @foreach ($products as $product)
    <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">

        <div class="flex items-center justify-between mb-6">
            <div class="flex items-center">
                <img src="https://via.placeholder.com/100" alt="Item Image" class="w-24 h-24 rounded-md">
                <div class="ml-4">
                    <h2 class="font-semibold text-lg">{{$product->name}}</h2>
                    <p class="text-gray-500 text-sm">Oversized T-Shirts</p>
                    <div class="mt-2">
                        <label for="size" class="text-sm">Size:</label>
                        <div id="size" class="inline-block ml-2 p-1 border rounded text-sm w-8 text-center">{{$product->size}}
                        </div>
                        <label for="qty" class="ml-4 text-sm">Qty:</label>
                        <div id="qty" class="inline-block p-1 border rounded text-sm w-8 text-center">{{$product->quantity}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-right">
                <p class="text-lg font-bold">₹{{$product->price}}</p>
            </div>
        </div>

        <!-- Billing Details -->
        <div class="border-t pt-4 mt-6">
            <button x-on:click="find({{json_encode($product->toArray())}})" class="w-full bg-green-500 text-white font-bold py-2 mt-4 rounded-lg hover:bg-green-600">
                <p x-text="cart.some(item => item.id == {{$product->id}}) ? 'Go to Cart':'Add to Cart'" >Add to Cart</p>
            </button>
        </div>

    </div>
    @endforeach
</div>
</body>
</html>
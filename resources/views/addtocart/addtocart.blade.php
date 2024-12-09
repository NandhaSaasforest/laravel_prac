<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/persist@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    @vite('resources/css/app.css')
    <title>Add to cart</title>
</head>

<body>

    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <a href="#" class="text-lg font-semibold text-gray-900 hover:text-blue-500">Home</a>
        <a href="/addtocart/products" class="text-lg font-semibold text-gray-900 hover:text-blue-500">Products</a>
        <a href="#" class="text-lg font-semibold text-gray-900 hover:text-blue-500">Account</a>
        <a href="#" class="text-lg font-semibold text-blue-500 hover:text-blue-500">Cart</a>
    </nav>

    <hr>

    <div class="mx-auto max-w-2xl">
        <h2 class="mt-10 text-2xl font-semibold text-indigo-600 lg:text-center">ADD TO CART</h2>
    </div>


    <div x-data="{
        cart: $persist([]),
        sum: 0,
        total()
        {
            sum = 0;
            this.cart.forEach((item) => {
    
                sum += parseInt(item.quantity) * parseInt(item.price)
    
            });
            this.sum = sum;
        },
        remove(id) 
        {
            this.cart.pop(id);
            console.log(this.cart)
        }
    }" x-init="total(); $watch('cart', value => total())">



        <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg mt-10">

            <template x-for="item in cart">

                <div class="flex items-center justify-between mb-6" x-data="{ open: true }" x-show="open">
                    <div class="flex items-center">
                        <img src="https://via.placeholder.com/100" alt="Item Image" class="w-24 h-24 rounded-md">
                        <div class="ml-4">
                            <h2 class="font-semibold text-lg" x-text="item.name"></h2>
                            <p class="text-gray-500 text-sm">Oversized T-Shirts</p>
                            <div class="mt-2">
                                <label for="size" class="text-sm">Size:</label>
                                <div id="size" class="inline-block ml-2 p-1 border rounded text-sm w-8 text-center"
                                    x-text="item.size">
                                </div>
                                <label for="qty" class="ml-4 text-sm">Qty:</label>
                                <button x-on:click="item.quantity == 1 ? remove('item.name') : item.quantity-- " class="border rounded text-sm w-6 ">-</button>
                                <div id="qty" class="inline-block p-1 border rounded text-sm w-8 text-center"
                                    x-text="item.quantity">1</div>
                                    <button @click="item.quantity++" class="border rounded text-sm w-5 ml-2">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <p>₹<span class="text-lg font-bold" x-text="item.quantity * item.price"></span></p>
                            <button class="text-red-500 text-sm mt-2 hover:underline" @click="remove('item.name')">Remove</button>
                        </div>
                    </div>
                </div>

            </template>

            <template x-if="cart.length==0? open=false: open=true">

                <!-- Billing Details -->
                <div class="border-t pt-4 mt-6" x-show = 'open'>
                    <h2 class="text-lg font-semibold mb-2">Billing Details</h2>
                    <div class="flex justify-between">
                        <span>Cart Total (Excl. of all taxes):</span>
                        <p>₹<span x-text="sum"></span></p>
                    </div>

                    <div class="flex justify-between">
                        <span>GST:</span>
                        <span class=" text-red-600">10%</span>
                    </div>

                    <div class="flex justify-between">
                        <span>Shipping Charges:</span>
                        <span class="text-green-600">Free</span>
                    </div>


                    <div class="flex justify-between font-bold mt-2">
                        <span>Total Amount:</span>
                        <p>₹<span x-text="sum + ( sum / 100 * 10) "></span></p>

                    </div>
                    <button @click="open=false"
                        class="w-full bg-green-500 text-white font-bold py-2 mt-4 rounded-lg hover:bg-green-600">
                        PLACE ORDER
                    </button>
                </div>
            </template>
            <template x-if = "cart.length==0 ? show = true : show = false">
                <div class="text-center" x-show='show'>Your Cart has been Cleared</div>
            </template>


        </div>

    </div>







</body>

</html>

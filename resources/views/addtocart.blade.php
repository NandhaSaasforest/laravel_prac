<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    @vite('resources/css/app.css')
    <title>Add to cart</title>
</head>

<body>

    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <a href="#" class="text-lg font-semibold text-gray-900 hover:text-blue-500">Home</a>
        <a href="#" class="text-lg font-semibold text-gray-900 hover:text-blue-500">Products</a>
        <a href="#" class="text-lg font-semibold text-gray-900 hover:text-blue-500">Account</a>
        <a href="#" class="text-lg font-semibold text-blue-500 hover:text-blue-500">Cart</a>
    </nav>

    <hr>

    <div class="mx-auto max-w-2xl">
        <h2 class="mt-10 text-2xl font-semibold text-indigo-600 lg:text-center">ADD TO CART</h2>
    </div>

    <div x-data="{ quantity: 1, open: true }">

        <div class="container mx-auto p-6 bg-white rounded-lg shadow-lg mt-10" x-show="open">

            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/100" alt="Item Image" class="w-24 h-24 rounded-md">
                    <div class="ml-4">
                        <h2 class="font-semibold text-lg">Naruto Shippuden: Leaf</h2>
                        <p class="text-gray-500 text-sm">Oversized T-Shirts</p>
                        <div class="mt-2">
                            <label for="size" class="text-sm">Size:</label>
                            <div id="size" class="inline-block ml-2 p-1 border rounded text-sm w-8 text-center">L
                            </div>
                            <label for="qty" class="ml-4 text-sm">Qty:</label>
                            <button @click="quantity++" class="border rounded text-sm w-5 ml-2">+</button>
                            <div id="qty" class="inline-block p-1 border rounded text-sm w-8 text-center"
                                x-text="quantity">1</div>
                            <button @click="quantity--" class="border rounded text-sm w-6 ">-</button>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <p class="text-lg font-bold">₹1299</p>
                    <button class="text-red-500 text-sm mt-2 hover:underline" @click="open=false">Remove</button>
                </div>
            </div>

            <!-- Billing Details -->
            <div class="border-t pt-4 mt-6">
                <h2 class="text-lg font-semibold mb-2">Billing Details</h2>
                <div class="flex justify-between">
                    <span>Cart Total (Excl. of all taxes):</span>
                    <span>₹1159.82</span>
                </div>
                <div class="flex justify-between">
                    <span>GST:</span>
                    <span>₹139.18</span>
                </div>
                <div class="flex justify-between">
                    <span>Shipping Charges:</span>
                    <span class="text-green-600">Free</span>
                </div>
                <div class="flex justify-between font-bold mt-2">
                    <span>Total Amount:</span>
                    <span>₹1299.00</span>
                </div>
                <button @click="open=false"
                    class="w-full bg-green-500 text-white font-bold py-2 mt-4 rounded-lg hover:bg-green-600">
                    PLACE ORDER
                </button>
            </div>

        </div>

        <template x-if="!open">
            <div class="text-center ">Your cart has been cleared!</div>
        </template>

    </div>





</body>

</html>

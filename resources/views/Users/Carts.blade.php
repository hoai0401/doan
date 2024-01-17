<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            padding: 15px;
            color: #fff;
            text-align: center;
        }

        #cart-container {
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
            padding: 20px;
        }

        .product {
            border: 1px solid #ccc;
            border-radius: 8px;
            margin: 10px;
            padding: 15px;
            text-align: center;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        #cart {
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 15px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        button {
            padding: 10px;
            background-color: #333;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <header>
        <h1>Shopping Cart</h1>
    </header>

    <div id="cart-container">
        <div class="product" data-name="Product 1" data-price="20">
            <h2>Product 1</h2>
            <p>Price: $20</p>
            <button onclick="addToCart(this)">Add to Cart</button>
        </div>

        <div class="product" data-name="Product 2" data-price="30">
            <h2>Product 2</h2>
            <p>Price: $30</p>
            <button onclick="addToCart(this)">Add to Cart</button>
        </div>

        <div id="cart">
            <h2>Shopping Cart</h2>
            <div id="cart-items"></div>
            <p>Total: $<span id="total">0</span></p>
            <button onclick="checkout()">Checkout</button>
        </div>
    </div>

    <script>
        function addToCart(button) {
            const product = button.parentNode;
            const productName = product.dataset.name;
            const productPrice = parseFloat(product.dataset.price);

            const cartItems = document.getElementById("cart-items");
            const totalElement = document.getElementById("total");

            const cartItem = document.createElement("div");
            cartItem.classList.add("cart-item");

            const itemName = document.createElement("span");
            itemName.textContent = productName;

            const itemPrice = document.createElement("span");
            itemPrice.textContent = `$${productPrice}`;

            cartItem.appendChild(itemName);
            cartItem.appendChild(itemPrice);

            cartItems.appendChild(cartItem);

            const currentTotal = parseFloat(totalElement.textContent);
            const newTotal = currentTotal + productPrice;
            totalElement.textContent = newTotal.toFixed(2);
        }

        function checkout() {
            alert("Thank you for your purchase!");
            // You can add more logic here, such as sending the order to a server.
        }
    </script>
</body>
</html>

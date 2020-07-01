<?php require_once('views/templates/header.php') ?>

<body>
<?php require_once('views/templates/navbar.php') ?>

    <div class="container my-5">
        <div class="row">
            <div class="col-md-12">
                <table class="table">
                    <thead class="table-primary">
                        <tr>
                        <th scope="col">Producto</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Cantidad</th>
                        <th scope="col">Subtotal</th>
                        </tr>
                    </thead>
                    <tbody id="products">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
    for(var i = 0; i < localStorage.length; i++){
        var cart = document.getElementById('products')
        
        var o = i+1
        var products = JSON.parse(localStorage['producto'+o]);

    console.log(products);

    cart.innerHTML += `
    <tr>
        <td>${products.name}</td>
        <td>${products.price}</td>
        <td><button class="btn btn-primary">-</button>
            <span class="p-3">${products.quantity}</span>
            <button class="btn btn-primary">+</button></td>
        <td>${products.subTotal}</td>
    </tr>
    `
}
    </script>

<?php require_once('views/templates/footer.php') ?>
</body>
</html>
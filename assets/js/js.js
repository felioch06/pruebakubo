var product = new Object()

function add(id){
    activeMessage()
    var name = document.getElementById('prodName'+id).value
    var price = document.getElementById('prodPrice'+id).value
    var quantity = document.getElementById('prodQuantity'+id).value
    var subTotal = price * quantity
    quantity = parseInt(quantity)
    price = parseInt(price)

    product.id = id
    product.quantity = quantity
    product.name = name
    product.subTotal = subTotal
    product.price = price

    localStorage.setItem("producto"+id, JSON.stringify(product))

}

function activeMessage(){
    var message = document.getElementById('message')

    message.innerHTML =
    `
    <div class="alert alert-success" role="alert">
    Producto agregado correctamente <a href="?class=Carts&view=index">Ver Carrito</a>
    </div>
    `
}



// let arr = {
//     "nombre" : 'felipe',
//     "apellido" : 'chacon'
// }
// localStorage.setItem("producto 1", JSON.stringify(arr));
// localStorage.setItem("producto 2", JSON.stringify(arr));


// console.log(JSON.parse(localStorage.nombre).nombre)
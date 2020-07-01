<!-- Seccion header -->
<?php require_once('views/templates/header.php') ?>

<body>
<!-- barra de navegación -->
<?php require_once('views/templates/navbar.php') ?>

<!-- contenido -->
    <section class="container-fluid mt-4">
        <div class="row">
            <!-- Filtro -->
            <div class="col-md-3">
                <aside class="jumbotron">
                    <h2>FILTRAR</h2>
                    <hr>
                    
                    <!-- Quitar Filtro -->
                    <?php if(isset($_REQUEST['product'])){ ?>
                    <a class="text-danger" href="?class=Products&view=index">Quitar Filtro</a><br><br>
                    <?php } ?>

                    <!-- Filtrar -->
                    <?php  
                        $categories = parent::searchCaregory();
                        foreach($categories as $category){
                    ?>
                        <h5><a href="?class=Products&view=index&product=<?php echo $category->id_category ?>"><?php echo $category->category?></a></h5>
                    <?php } ?>
                </aside>
            </div>

            <!-- productos -->
            <div class="col-md-9">

            <!-- mensaje de confirmación  -->
            <div id="message">

            </div>

                <div class="jumbotron">
                    <h1>PRODUCTOS</h1>
                    <hr>
                    <div class="row row-cols-1 row-cols-md-3">
                        <?php
                            if(!isset($_REQUEST['product'])){

                         $products = parent::searchProducts(); 

                            foreach($products as $product){
                        ?>
                        <div class="col mb-4">
                            <div class="card h-100">
                                <img src="<?php echo $product->image ?>" class="card-img-top" alt="imagen">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product->name ?></h5>
                                    <h5 class="card-text">$<?php echo $product->price ?></h5>
                                    <p class="card-text"><?php echo $product->description ?></p>

                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="prodQuantity<?php echo $product->id_product ?>" value="0" min="1" pattern="^[0-9]+" placeholder="Cantidad">

                                        <input type="hidden" id="prodName<?php echo $product->id_product ?>" value="<?php echo $product->name ?>">

                                        <input type="hidden" id="prodPrice<?php echo $product->id_product ?>" value="<?php echo $product->price ?>">

                                        


                                        <div class="input-group-append">
                                            <button class="btn btn-primary" onclick="add(<?php echo $product->id_product ?>)" type="submit">Agregar</button>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>

                        <?php } }else{  
                            $products = parent::searchProductWithCategory($_REQUEST['product']); 

                            foreach($products as $product){
                            ?>
                            <div class="col mb-4">
                            <div class="card h-100">
                                <img src="<?php echo $product->image ?>" class="card-img-top" alt="imagen">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $product->name ?></h5>
                                    <h5 class="card-text">$<?php echo $product->price ?></h5>
                                    <p class="card-text"><?php echo $product->description ?></p>

                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="prod<?php echo $product->id_product ?>" value="0" min="1" pattern="^[0-9]+" placeholder="Cantidad">

                                        <div class="input-group-append">
                                            <button class="btn btn-primary" onclick="add(<?php echo $product->id_product ?>)" type="submit">Agregar</button>
                                        </div>
                                    </div>                                
                                </div>
                            </div>
                        </div>

                        <?php } }?>


                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- footer -->
<?php require_once('views/templates/footer.php') ?>
</body>
</html>
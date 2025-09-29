<?php if ($products) { ?>
    <?php foreach ($products as $product) { ?>
        <div class="col-md-4 mb-3">
            <div class="card h-100 product_card">
                <img src="../Farmer/assets/uploads/<?php echo $product['product_image']; ?>" 
                     class="card-img-top" alt="image" style="min-height:200px; object-fit:cover">
                <div class="card-body">
                    <h5 class="card-title"><?php echo ucfirst($product['product_name']); ?></h5>
                    <p class="card-text"><?php echo $product['category_name']; ?></p>
                    <p class="h6 text-success">&#8358;<?php echo number_format($product['prod_price'], 2); ?></p>

                    <form action="process/process_cart.php" method="post">
                        <select name="qty" class="btn border border-subtle mb-2">
                            <option value="">QTY</option>
                            <?php for ($i = 1; $i <= 10; $i++): ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="productdetail.php?id=<?php echo $product['prod_id']; ?>" 
                               class="btn btn-secondary col-5">View product</a>

                            <input type="hidden" name="product_name" value="<?php echo $product['product_name']; ?>">
                            <input type="hidden" name="prod_id" value="<?php echo $product['prod_id']; ?>">
                            <button class="btn btn-success col-6" name="cartbtn">
                                <i class="fa-solid fa-cart-shopping"></i> Add to Cart
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    <?php } ?>
<?php }

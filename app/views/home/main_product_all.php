<div class="product-main">
        <div class="product-all">
            <div class="sort-product-all">
                <a href="" >Giá thấp</a>
                <a href="">Giá cao</a>
            </div>
            <div class="div-list">
                <div class="fill-all">
                    <div class="fill-brand">
                        <div></div>
                    </div>
                    <div class="fill-price"></div>
                    <div class="fill-cpu"></div>
                    <div class="fill-ram"></div>
                    <div class="fill-person"></div>
                </div>
                <div class="list-product-all">
                    <?php foreach($data['laptop'] as $laptop): ?>
                    <div class="product-card">
                        <img src="<?php echo 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/' . $laptop['display_image']; ?>"
                            alt="">
                        <h4 class="pd-name"><?php echo $laptop['name']; ?></h4><br>
                        <div class="pd-price">
                            <?php
                            if ($laptop['discount'] != 0) {
                                echo '<span class="pd-price-old">' . $laptop['price'] . ' VND</span><br />';
                                echo '<h3 class="pd-price-new">'.$laptop['price'] - ($laptop['price'] * $laptop['discount'] / 100) . ' VND</h3>';
                            }else{
                                echo '<span class="pd-price-old"></span><br />';
                                echo '<h3 class="pd-price-new">'.$laptop['price'] . ' VND</h3>';
                            }
                        ?>
                        </div>
                        <div class="addcart">
                            <a href="" class="add-to-cart">Add to Cart</a>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
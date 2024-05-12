<div class="product-main">
        <div class="product-deal">
            <div class="intro-product-deal">
                <h2>DEAL SỐC <img src="assets/img/hot-deal.png" style="width: 60px; height: 50px;"></h2>
                <h3><a href="">All Products</a></h3>
            </div>
            <div class="list-product-deal">
                <?php foreach($data['laptop_last'] as $laptop_last): ?>
                    <div class="product-card">
                        <img src="<?php echo 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/' . $laptop_last['display_image']; ?>" alt="">
                        <h4 class="pd-name"><?php echo $laptop_last['name']; ?></h4><br>
                        <div class="pd-price">
                        <?php
                            if ($laptop_last['discount'] != 0) {
                                echo '<span class="pd-price-old">' . $laptop_last['price'] . ' VND</span><br />';
                                echo '<h3 class="pd-price-new">'.$laptop_last['price'] - ($laptop_last['price'] * $laptop_last['discount'] / 100) . ' VND</h3>';
                            }else{
                                echo '<span class="pd-price-old"></span><br />';
                                echo '<h3 class="pd-price-new">'.$laptop_last['price'] . ' VND</h3>';
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
        <div class="product-gaming">
            <div class="intro-product-gaming">
                <h2>GAMING </h2>
                <h3><a href="">All Products</a></h3>
            </div>
            <div class="div-list">
                <div class="gaming-brand">
                        <img src="assets/img/428634403_370767489104299_2721930820984983219_n.jpg" alt="">
                </div>
                <div class="list-product-gaming">
                <?php foreach($data['laptop_gaming'] as $laptop_gaming): ?>
                    <div class="product-card">
                        <img src="<?php echo 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/' . $laptop_gaming['display_image']; ?>" alt="">
                        <h4 class="pd-name"><?php echo $laptop_gaming['name']; ?></h4><br>
                        <div class="pd-price">
                        <?php
                            if ($laptop_gaming['discount'] != 0) {
                                echo '<span class="pd-price-old">' . $laptop_gaming['price'] . ' VND</span><br />';
                                echo '<h3 class="pd-price-new">'.$laptop_gaming['price'] - ($laptop_gaming['price'] * $laptop_gaming['discount'] / 100) . ' VND</h3>';
                            }else{
                                echo '<span class="pd-price-old"></span><br />';
                                echo '<h3 class="pd-price-new">'.$laptop_gaming['price'] . ' VND</h3>';
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
        <div class="product-macbook">
            <div class="intro-product-macbook">
                <h2>MACBOOK </h2>
                <h3><a href="">All Products</a></h3>
            </div>
            <div class="div-list">
                <div class="macbook-brand">
                        <img src="assets/img/290563382_5293918897350716_4760350658010623260_n.jpg" alt="">
                </div>
                <div class="list-product-macbook">
                <?php foreach($data['laptop_macbook'] as $laptop_macbook): ?>
                    <div class="product-card">
                        <img src="<?php echo 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/' . $laptop_macbook['display_image']; ?>" alt="">
                        <h4 class="pd-name"><?php echo $laptop_macbook['name']; ?></h4><br>
                        <div class="pd-price">
                        <?php
                            if ($laptop_macbook['discount'] != 0) {
                                echo '<span class="pd-price-old">' . $laptop_macbook['price'] . ' VND</span><br />';
                                echo '<h3 class="pd-price-new">'.$laptop_macbook['price'] - ($laptop_macbook['price'] * $laptop_macbook['discount'] / 100) . ' VND</h3>';
                            }else{
                                echo '<span class="pd-price-old"></span><br />';
                                echo '<h3 class="pd-price-new">'.$laptop_macbook['price'] . ' VND</h3>';
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
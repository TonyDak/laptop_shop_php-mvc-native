<?php require_once 'app/views/includes/header.php'; ?>
<main class="main">
    <div class="slideshow">
        <img src="assets/img/intel.png" alt="">
        <img src="assets/img/ram.png" alt="">
        <img src="assets/img/msi.png" alt="">
        <img src="assets/img/amd.png" alt="">
        <img src="assets/img/asus.png" alt="">
        <img src="assets/img/hp.png" alt="">
        <img src="assets/img/gaming.png" alt="">
        <img src="assets/img/lenovo.png" alt="">
        <img src="assets/img/acer.png" alt="">
        <img src="assets/img/gigabyte.png" alt="">
        <div class="btnslideshow">
            <div class="prev" onclick="plusSlides(-1)"><i class="fa-solid fa-chevron-left"
                    style="color: #0e83dd; font-size:42px;"></i></div>
            <div class="next" onclick="plusSlides(1)"><i class="fa-solid fa-chevron-right"
                    style="color: #0e83dd; font-size:42px;"></i></div>
        </div>
    </div>
    <div class="product-main">
        <div class="product-deal">
            <div class="intro-product-deal">
                <h2>DEAL SỐC <img src="assets/img/hot-deal.png" style="width: 60px; height: 50px;"></h2>
                <h3><a href="http://localhost/laptop_shop/product_all?brand=Tat_ca&price=Tat_ca&cpu=Tat_ca&ram=Tat_ca&person=Tat_ca&discount">All Products</a></h3>
            </div>
            <div class="list-product-deal">
                <?php foreach($data['laptop_last'] as $laptop_last): ?>
                <div class="product-card">
                    <img src="<?php echo 'https://cdn2.fptshop.com.vn/unsafe/180x0/filters:quality(60)/' . str_replace('/', '_', $laptop_last['display_image']); ?>"
                        alt="">
                    <h4 class="pd-name"><?php echo $laptop_last['name']; ?></h4><br>
                    <div class="pd-price">
                        <?php
                        if ($laptop_last['discount'] != 0) {
                            echo '<span class="pd-price-old">' . number_format($laptop_last['price'], 0, ',', '.') .' <u>đ</u></span><br />';
                            echo '<h3 class="pd-price-new">'. number_format($laptop_last['price'] - ($laptop_last['price'] * $laptop_last['discount'] / 100), 0, ',', '.') .' <u>đ</u></h3>';
                        }else{
                            echo '<span class="pd-price-old"></span><br />';
                            echo '<h3 class="pd-price-new">'. number_format($laptop_last['price'], 0, ',', '.') .' <u>đ</u></h3>';
                        }
                        ?>
                    </div><br>
                    <div class="pd-info" >
                        <span class="pd-info-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gpu-card" viewBox="0 0 16 16" >
                        <title>Đồ họa</title>
                        <path d="M4 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0m7.5-1.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3"/>
                        <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .5.5V4h13.5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5H2v2.5a.5.5 0 0 1-1 0V2H.5a.5.5 0 0 1-.5-.5m5.5 4a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M9 8a2.5 2.5 0 1 0 5 0 2.5 2.5 0 0 0-5 0"/>
                        <path d="M3 12.5h3.5v1a.5.5 0 0 1-.5.5H3.5a.5.5 0 0 1-.5-.5zm4 1v-1h4v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5"/>
                        </svg> <?php echo $laptop_last['gpu']; ?></span><br>
                        <span class="pd-info-item"><i class="fa-solid fa-laptop fa-fw" title="Màn hình"></i> <?php echo $laptop_last['screen_size']; ?></span><br>
                        <span class="pd-info-item"><i class="fa-solid fa-microchip" title="CPU" ></i> <?php echo $laptop_last['cpu_model']; ?></span><br>
                        <span class="pd-info-item"><i class="fa-solid fa-memory" title="RAM" ></i> <?php echo $laptop_last['ram_capacity']; ?></span><br>
                        <span class="pd-info-item"><i class="fas fa-hdd" title="Ổ cứng"></i> <?php echo $laptop_last['storage']; ?></span><br>
                        <span class="pd-info-item"><i class="fas fa-weight-hanging" title="Trọng lượng" ></i> <?php echo $laptop_last['weight_kg']; ?> kg</span><br>
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
                <h3><a href="http://localhost/laptop_shop/product_all?brand=Tat_ca&price=Tat_ca&cpu=Tat_ca&ram=Tat_ca&person=Gaming">All Products</a></h3>
            </div>
            <div class="div-list">
                <div class="gaming-brand">
                    <img src="assets/img/428634403_370767489104299_2721930820984983219_n.jpg" alt="">
                </div>
                <div class="list-product-gaming">
                    <?php foreach($data['laptop_gaming'] as $laptop_gaming): ?>
                    <div class="product-card">
                    <img src="<?php echo 'https://cdn2.fptshop.com.vn/unsafe/180x0/filters:quality(60)/' . str_replace('/', '_', $laptop_gaming['display_image']); ?>"
                    alt="">
                        <h4 class="pd-name"><?php echo $laptop_gaming['name']; ?></h4><br>
                        <div class="pd-price">
                            <?php
                            if ($laptop_gaming['discount'] != 0) {
                                echo '<span class="pd-price-old">' . number_format($laptop_gaming['price'], 0, ',', '.') .' <u>đ</u></span><br />';
                                echo '<h3 class="pd-price-new">'.number_format($laptop_gaming['price'] - ($laptop_gaming['price'] * $laptop_gaming['discount'] / 100), 0, ',', '.') .' <u>đ</u></h3>';
                            }else{
                                echo '<span class="pd-price-old"></span><br />';
                                echo '<h3 class="pd-price-new">'. number_format($laptop_gaming['price'],0, ',', '.') .' <u>đ</u></h3>';
                            }
                        ?>
                        </div><br>
                        <div class="pd-info" >
                            <span class="pd-info-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gpu-card" viewBox="0 0 16 16" >
                            <title>Đồ họa</title>
                            <path d="M4 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0m7.5-1.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3"/>
                            <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .5.5V4h13.5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5H2v2.5a.5.5 0 0 1-1 0V2H.5a.5.5 0 0 1-.5-.5m5.5 4a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M9 8a2.5 2.5 0 1 0 5 0 2.5 2.5 0 0 0-5 0"/>
                            <path d="M3 12.5h3.5v1a.5.5 0 0 1-.5.5H3.5a.5.5 0 0 1-.5-.5zm4 1v-1h4v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5"/>
                            </svg> <?php echo $laptop_gaming['gpu']; ?></span><br>
                            <span class="pd-info-item"><i class="fa-solid fa-laptop fa-fw" title="Màn hình"></i> <?php echo $laptop_gaming['screen_size']; ?></span><br>
                            <span class="pd-info-item"><i class="fa-solid fa-microchip" title="CPU" ></i> <?php echo $laptop_gaming['cpu_model']; ?></span><br>
                            <span class="pd-info-item"><i class="fa-solid fa-memory" title="RAM" ></i> <?php echo $laptop_gaming['ram_capacity']; ?></span><br>
                            <span class="pd-info-item"><i class="fas fa-hdd" title="Ổ cứng"></i> <?php echo $laptop_gaming['storage']; ?></span><br>
                            <span class="pd-info-item"><i class="fas fa-weight-hanging" title="Trọng lượng" ></i> <?php echo $laptop_gaming['weight_kg']; ?> kg</span><br>
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
                <h3><a href="http://localhost/laptop_shop/product_all?brand=Apple-macbook&price=Tat_ca&cpu=Tat_ca&ram=Tat_ca&person=Tat_ca">All Products</a></h3>
            </div>
            <div class="div-list">
                <div class="macbook-brand">
                    <img src="assets/img/290563382_5293918897350716_4760350658010623260_n.jpg" alt="">
                </div>
                <div class="list-product-macbook">
                    <?php foreach($data['laptop_macbook'] as $laptop_macbook): ?>
                    <div class="product-card">
                        <img src="<?php echo 'https://cdn2.fptshop.com.vn/unsafe/180x0/filters:quality(60)/' . str_replace('/', '_', $laptop_macbook['display_image']); ?>"
                        alt="">
                        <h4 class="pd-name"><?php echo $laptop_macbook['name']; ?></h4><br>
                        <div class="pd-price">
                            <?php
                            if ($laptop_macbook['discount'] != 0) {
                                echo '<span class="pd-price-old">' . number_format($laptop_macbook['price'], 0, ',', '.') .' <u>đ</u></span><br />';
                                echo '<h3 class="pd-price-new">'.number_format($laptop_macbook['price'] - ($laptop_macbook['price'] * $laptop_macbook['discount'] / 100), 0, ',', '.') .' <u>đ</u></h3>';
                            }else{
                                echo '<span class="pd-price-old"></span><br />';
                                echo '<h3 class="pd-price-new">'.number_format($laptop_macbook['price'], 0, ',', '.') .' <u>đ</u></h3>';
                            }
                        ?>
                        </div><br>
                        <div class="pd-info" >
                            <span class="pd-info-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gpu-card" viewBox="0 0 16 16" >
                            <title>Đồ họa</title>
                            <path d="M4 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0m7.5-1.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3"/>
                            <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .5.5V4h13.5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5H2v2.5a.5.5 0 0 1-1 0V2H.5a.5.5 0 0 1-.5-.5m5.5 4a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M9 8a2.5 2.5 0 1 0 5 0 2.5 2.5 0 0 0-5 0"/>
                            <path d="M3 12.5h3.5v1a.5.5 0 0 1-.5.5H3.5a.5.5 0 0 1-.5-.5zm4 1v-1h4v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5"/>
                            </svg> <?php echo $laptop_macbook['gpu']; ?></span><br>
                            <span class="pd-info-item"><i class="fa-solid fa-laptop fa-fw" title="Màn hình"></i> <?php echo $laptop_macbook['screen_size']; ?></span><br>
                            <span class="pd-info-item"><i class="fa-solid fa-microchip" title="CPU" ></i> <?php echo $laptop_macbook['cpu_model']; ?></span><br>
                            <span class="pd-info-item"><i class="fa-solid fa-memory" title="RAM" ></i> <?php echo $laptop_macbook['ram_capacity']; ?></span><br>
                            <span class="pd-info-item"><i class="fas fa-hdd" title="Ổ cứng"></i> <?php echo $laptop_macbook['storage']; ?></span><br>
                            <span class="pd-info-item"><i class="fas fa-weight-hanging" title="Trọng lượng" ></i> <?php echo $laptop_macbook['weight_kg']; ?> kg</span><br>
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
</main>
<!-- <script src="assets/js/click_detail.js"></script> -->
<script>
document.querySelectorAll('.product-card').forEach(card => {
    card.addEventListener('click', () => {
        product_name = card.querySelector('.pd-name').textContent;
        console.log(product_name);
        $.ajax({
            url: 'http://localhost/laptop_shop/home/product_detail',
            type: 'POST',
            data: {
                product_name: product_name
            },
            success: function(data) {
                window.location.href = 'http://localhost/laptop_shop/product_detail?' + card.querySelector('.pd-name').textContent;
            },
            error: function(xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
</script>
<script src="assets/js/showSlides.js"></script>
<?php require_once 'app/views/includes/footer.php'; ?>
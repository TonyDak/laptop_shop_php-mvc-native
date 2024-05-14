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
                <h3><a href="">All Products</a></h3>
            </div>
            <div class="list-product-deal">
                <?php foreach($data['laptop_last'] as $laptop_last): ?>
                <div class="product-card">
                    <img src="<?php echo 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/' . $laptop_last['display_image']; ?>"
                        alt="">
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
                        <img src="<?php echo 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/' . $laptop_gaming['display_image']; ?>"
                            alt="">
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
                        <img src="<?php echo 'https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/' . $laptop_macbook['display_image']; ?>"
                            alt="">
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
</main>

<script>
var slideIndex = 0;
showSlides(false);

function plusSlides(n) {
    clearTimeout(autoSlide); // clear the existing timer
    showSlides(slideIndex += n, true);
}

function showSlides(n, manual) {
    var i;
    var slides = document.getElementsByClassName("slideshow")[0].getElementsByTagName("img");
    if (n > slides.length) {
        slideIndex = 1
    }
    if (n < 1) {
        slideIndex = slides.length
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    if (!manual) {
        slideIndex++;
        if (slideIndex > slides.length) {
            slideIndex = 1
        }
    }
    slides[slideIndex - 1].style.display = "block";
    autoSlide = setTimeout(showSlides, 8000); // Change image every 8 seconds
}
</script>
<?php require_once 'app/views/includes/footer.php'; ?>
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
        <div class="product-all">
            <div class="sort-product-all">
                <a href="">Giá thấp</a>
                <a href="">Giá cao</a>
            </div>
            <div class="div-list">
                <div class="fill-all">
                    <div class="fill-brand">
                        <h3>Hãng sản xuất</h3>
                        <div>
                            <input type="checkbox" checked>
                            <label for="">Tất cả</label>
                        </div>
                        <?php foreach($data['brand'] as $brand):  extract($brand) ?>
                        <div>
                            <input type="checkbox">
                            <label for=""><?php echo $brand['name'] ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="fill-price">
                        <h3>Mức giá</h3>
                        <div>
                            <input type="checkbox" checked>
                            <label for="">Tất cả</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">Dưới 10 triệu</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">Từ 10 - 20 triệu</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">Từ 20 - 30 triệu</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">Trên 30 triệu</label>
                        </div>
                    </div>
                    <div class="fill-cpu">
                        <h3>CPU</h3>
                        <div>
                            <input type="checkbox" checked>
                            <label for="">Tất cả</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">Intel</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">AMD</label>
                        </div>
                    </div>
                    <div class="fill-ram">
                        <h3>RAM</h3>
                        <div>
                            <input type="checkbox" checked>
                            <label for="">Tất cả</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">8GB</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">16GB</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">32GB</label>
                        </div>
                    </div>
                    <div class="fill-person">
                        <h3>Nhu cầu</h3>
                        <div>
                            <input type="checkbox" checked>
                            <label for="">Tất cả</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">Gaming</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">Văn phòng</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">Mỏng nhẹ</label>
                        </div>
                    </div>
                </div>
                <div class="list-product-all">
                    <div id="product-content">

                    </div>
                    <div id="pagination">

                    </div>
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

</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
function loadPage(page) {
    $.ajax({
        url: 'http://localhost/laptop_shop/home/pagination',
        type: 'GET',
        data: {
            page: page
        },
        success: function(response) {
            var result = JSON.parse(response);
            var data = result.data;
            console.log(data);
            var total = result.total;
            var limit = 25; // number of rows in page
            var pages = Math.ceil(total / limit);

            // Update page content
            var content = $('#product-content');
            content.empty();
            data.forEach(function(laptop) {
                var productCard = `
                        <div class="product-card">
                            <img src="https://images.fpt.shop/unsafe/fit-in/240x215/filters:quality(90):fill(white)/fptshop.com.vn/Uploads/Originals/${laptop.display_image}" alt="">
                            <h4 class="pd-name">${laptop.name}</h4><br>
                            <div class="pd-price">`;
                if (laptop.discount != 0) {
                    productCard +=
                    `
                            <span class="pd-price-old">${laptop.price} VND</span><br />
                            <h3 class="pd-price-new">${laptop.price - (laptop.price * laptop.discount / 100)} VND</h3>`;
                } else {
                    productCard += `
                            <span class="pd-price-old"></span><br />
                            <h3 class="pd-price-new">${laptop.price} VND</h3>`;
                }
                productCard += `
                            </div>
                            <div class="addcart">
                                <a href="" class="add-to-cart">Add to Cart</a>
                            </div>
                        </div>`;
                content.append(productCard);
            });

            // Update pagination buttons
            var pagination = $('#pagination');
            pagination.empty();
            for (var i = 1; i <= pages; i++) {
                var button = $('<button onclick="loadPage(' + i + ')">' + i + '</button>');
                if (i === page) {
                    button.addClass('active');
                }
                pagination.append(button);
            }
        }
    });
}

// Call loadPage function when page is loaded
$(document).ready(function() {
    loadPage(1);
});
</script>
<script>
function handleCheckboxClick(fillClass) {
    var allCheckbox = document.querySelector(fillClass + ' input[type="checkbox"]');
    var otherCheckboxes = document.querySelectorAll(fillClass + ' div:not(:first-child) input[type="checkbox"]');

    allCheckbox.addEventListener('click', function(event) {
        if (!this.checked) {
            this.checked = true;
        } else {
            otherCheckboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        }
    });

    otherCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            if (this.checked) {
                allCheckbox.checked = false;
            }
            if (Array.from(otherCheckboxes).every(cb => !cb.checked)) {
                allCheckbox.checked = true;
            }
        });
    });
}

document.addEventListener('DOMContentLoaded', function() {
    var fillClasses = ['.fill-brand', '.fill-price', '.fill-cpu', '.fill-ram', '.fill-person'];
    fillClasses.forEach(function(fillClass) {
        handleCheckboxClick(fillClass);
    });
});
</script>
<?php require_once 'app/views/includes/footer.php'; ?>
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
                <button id="fill-price-up" class="filter-button">Giá thấp</button>
                <button id="fill-price-down" class="filter-button">Giá cao</button>
                <button id="fill-price-discount" class="filter-button">Giảm giá</button>
            </div>
            <div class="div-list">
                <div class="fill-all">
                    <div class="fill-brand">
                        <h3>Hãng sản xuất</h3>
                        <div>
                            <input type="checkbox" value="Tất cả">
                            <label for="">Tất cả</label>
                        </div>
                        <?php foreach($data['brand'] as $brand):  extract($brand) ?>
                        <div>
                            <input type="checkbox">
                            <label for=""><?php echo ucfirst($brand['brand_nameAscii']); ?></label>
                        </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="fill-price">
                        <h3>Mức giá</h3>
                        <div>
                            <input type="checkbox" value="Tất cả">
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
                            <input type="checkbox" value="Tất cả">
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
                            <input type="checkbox" value="Tất cả">
                            <label for="">Tất cả</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">8 GB</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">16 GB</label>
                        </div>
                        <div>
                            <input type="checkbox">
                            <label for="">32 GB</label>
                        </div>
                    </div>
                    <div class="fill-person">
                        <h3>Nhu cầu</h3>
                        <div>
                            <input type="checkbox" value="Tất cả">
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

<script src="assets/js/showSlides.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const defaultParams = {
            brand: 'Tat_ca',
            price: 'Tat_ca',
            cpu: 'Tat_ca',
            ram: 'Tat_ca',
            person: 'Tat_ca'
        };

        let needsRedirect = false;

        for (const [key, value] of Object.entries(defaultParams)) {
            if (!urlParams.has(key)) {
                urlParams.set(key, value);
                needsRedirect = true;
            }
        }

        if (needsRedirect) {
            window.location.search = urlParams.toString();
        }
    });
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$('.filter-button').on('click', function() {
    // Check if the clicked button is already active
    if ($(this).hasClass('active')) {
        // Remove 'active' class from the clicked button
        $(this).removeClass('active');
    } else {
        // Remove 'active' class from all filter buttons
        $('.filter-button').removeClass('active');
        // Add 'active' class to the clicked button
        $(this).addClass('active');
    }
    loadPage(1);  // Call loadPage when the filter button is clicked
});

var selectedFilters = {};
function loadPage(page) {
    // Get selected checkboxes
    var brandCheckboxes = document.querySelectorAll('.fill-brand input[type="checkbox"]:checked');
    var priceCheckboxes = document.querySelectorAll('.fill-price input[type="checkbox"]:checked');
    var cpuCheckboxes = document.querySelectorAll('.fill-cpu input[type="checkbox"]:checked');
    var ramCheckboxes = document.querySelectorAll('.fill-ram input[type="checkbox"]:checked');
    var personCheckboxes = document.querySelectorAll('.fill-person input[type="checkbox"]:checked');

    // Store selected checkbox values in an object
    selectedFilters.brand = Array.from(brandCheckboxes).map(function(checkbox) {
        return checkbox.nextElementSibling.textContent;
    });
    selectedFilters.price = Array.from(priceCheckboxes).map(function(checkbox) {
        return checkbox.nextElementSibling.textContent;
    });
    selectedFilters.cpu = Array.from(cpuCheckboxes).map(function(checkbox) {
        return checkbox.nextElementSibling.textContent;
    });
    selectedFilters.ram = Array.from(ramCheckboxes).map(function(checkbox) {
        return checkbox.nextElementSibling.textContent;
    });
    selectedFilters.person = Array.from(personCheckboxes).map(function(checkbox) {
        return checkbox.nextElementSibling.textContent;
    });

    $.ajax({
        url: 'http://localhost/laptop_shop/product_all/pagination',
        type: 'POST',
        data: {
            page: page,
            filters: selectedFilters,
            sortOrder: $('.filter-button.active').attr('id')
        },
        success: function(response) {
            var result = JSON.parse(response);
            var data = result.data;
            var total = result.total;
            var limit = 25; // number of rows in page
            var pages = Math.ceil(total / limit);

            // Update page content
            var content = $('#product-content');
            content.empty();
            if (data.length === 0) {
                $(content).css('flex-direction', 'column');
                $(content).css('align-items', 'center');
                content.append('<span><img width="105px" height="140px" src="assets/img/no-result.png"></img></span><div style="display:flex; align-items:center; flex-direction:column;"><br><h3>Không tìm thấy sản phẩm phù hợp</h3><br><p>Vui lòng điều chỉnh lại bộ lọc</p></div>');
            }else{
                $(content).css('flex-direction', 'row');
                $(content).css('align-items', 'none');
            }
            data.forEach(function(laptop) {
                var productCard = `
                    <div class="product-card">
                        <img src="https://cdn2.fptshop.com.vn/unsafe/180x0/filters:quality(60)/${laptop.display_image.replace(/\//g, '_')}" alt="">
                        <h4 class="pd-name">${laptop.name}</h4><br>
                        <div class="pd-price">`;
                if (laptop.discount != 0) {
                    productCard += `
                        <span class="pd-price-old">${formatNumber(laptop.price)} <u>đ</u></span><br />
                        <h3 class="pd-price-new">${formatNumber(laptop.price - (laptop.price * laptop.discount / 100))} <u>đ</u></h3>`;
                } else {
                    productCard += `
                        <span class="pd-price-old"></span><br />
                        <h3 class="pd-price-new">${formatNumber(laptop.price)} <u>đ</u></h3>`;
                }
                productCard += `
                            </div><br>
                            <div class="pd-info" >
                                <span class="pd-info-item"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gpu-card" viewBox="0 0 16 16" >
                                <title>Đồ họa</title>
                                <path d="M4 8a1.5 1.5 0 1 1 3 0 1.5 1.5 0 0 1-3 0m7.5-1.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3"/>
                                <path d="M0 1.5A.5.5 0 0 1 .5 1h1a.5.5 0 0 1 .5.5V4h13.5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5H2v2.5a.5.5 0 0 1-1 0V2H.5a.5.5 0 0 1-.5-.5m5.5 4a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M9 8a2.5 2.5 0 1 0 5 0 2.5 2.5 0 0 0-5 0"/>
                                <path d="M3 12.5h3.5v1a.5.5 0 0 1-.5.5H3.5a.5.5 0 0 1-.5-.5zm4 1v-1h4v1a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5"/>
                                </svg> ${laptop.gpu}</span><br>
                                <span class="pd-info-item"><i class="fa-solid fa-laptop fa-fw" title="Màn hình"></i> ${laptop.screen_size}</span><br>
                                <span class="pd-info-item"><i class="fa-solid fa-microchip" title="CPU" ></i> ${laptop.cpu_model}</span><br>
                                <span class="pd-info-item"><i class="fa-solid fa-memory" title="RAM" ></i> ${laptop.ram_capacity}</span><br>
                                <span class="pd-info-item"><i class="fas fa-hdd" title="Ổ cứng"></i> ${laptop.storage}</span><br>
                                <span class="pd-info-item"><i class="fas fa-weight-hanging" title="Trọng lượng" ></i> ${laptop.weight_kg} kg</span><br>
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
            if(pages <= 4 && pages > 1){
                for (var i = 1; i <= pages; i++) {
                    var button = $('<button onclick="loadPage(' + i + ')">' + i + '</button>');
                    if (i === page) {
                        button.addClass('active');
                    }
                    pagination.append(button);
                }
            }if(pages > 4){
                var maxButtons = 4;
                var middleButton = Math.ceil(maxButtons / 2);
                var startButton = page - middleButton + 1;
                var endButton = page + middleButton - 1;


                if(page < maxButtons){
                    startButton = 1;
                    endButton = maxButtons;
                }
                if(page == pages - 3){
                    startButton = pages - 4;
                    endButton = pages;
                }

                if (startButton <= 0) {
                    startButton = 1;
                    endButton = maxButtons;
                }
                if (endButton > pages) {
                    endButton = pages;
                    startButton = pages - maxButtons + 1;
                    if (startButton <= 0) {
                        startButton = 1;
                    }
                }
                
                for (var i = startButton; i <= endButton; i++) {
                    var button = $('<button onclick="loadPage(' + i + ')">' + i + '</button>');
                    if (i === page) {
                        button.addClass('active');
                    }
                    pagination.append(button);
                }

                if (startButton > 1) {
                    pagination.prepend('<button disabled>...</button>');
                    pagination.prepend('<button onclick="loadPage(' + 1 + ')">' + 1 + '</button>');
                }
                if (endButton+1 < pages) {    
                    pagination.append('<button disabled>...</button>');
                }
                if (endButton < pages) {    
                    pagination.append('<button onclick="loadPage(' + pages + ')">' + pages + '</button>');
                }
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
    function removeAccents(str) {
        return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "").replace(/\s+/g, '_');
    }
    
    function handleFilterChange() {
        var brand = [];
        var price = [];
        var cpu = [];
        var ram = [];
        var person = [];
        var fillClasses = ['.fill-brand', '.fill-price', '.fill-cpu', '.fill-ram', '.fill-person'];
        fillClasses.forEach(function(fillClass) {
            $(fillClass + ' input[type=checkbox]:checked').each(function() {
                var filter = $(this).next('label').text();
                if (fillClass === '.fill-brand') {
                    brand.push(removeAccents(filter));
                } else if (fillClass === '.fill-price') {
                    price.push(removeAccents(filter));
                } else if (fillClass === '.fill-cpu') {
                    cpu.push(removeAccents(filter));
                } else if (fillClass === '.fill-ram') {
                    ram.push(removeAccents(filter));
                } else if (fillClass === '.fill-person') {
                    person.push(removeAccents(filter));
                }
            });
        });
    
        var newUrl = window.location.origin + window.location.pathname + '?brand=' + brand.join(',') + '&price=' + price.join(',') + '&cpu=' + cpu.join(',') + '&ram=' + ram.join(',') + '&person=' + person.join(',');
        if ($('#fill-price-discount').hasClass('active')) {
            newUrl += '&discount';
        }
        window.history.pushState({}, '', newUrl);
    }
    
    // Gán sự kiện change cho checkbox
    $('input[type=checkbox]').on('change', handleFilterChange);
    
    // Gán sự kiện click cho button, giả sử button có id là 'apply-filters'
    $('#fill-price-discount').on('click', handleFilterChange);
    
    $(document).ready(function() {
        // Get URL parameters
        var urlParams = new URLSearchParams(window.location.search);
    
        // Check if the base URL is the current URL
        if (urlParams.has('brand') || urlParams.has('price') || urlParams.has('cpu') || urlParams.has('ram') || urlParams.has('person')) {
            var brand = urlParams.get('brand').split(',');
            var price = urlParams.get('price').split(',');
            var cpu = urlParams.get('cpu').split(',');
            var ram = urlParams.get('ram').split(',');
            var person = urlParams.get('person').split(',');
    
            // Check the checkboxes based on the URL parameters
            var fillClasses = ['.fill-brand', '.fill-price', '.fill-cpu', '.fill-ram', '.fill-person'];
            fillClasses.forEach(function(fillClass) {
                $(fillClass+' input[type=checkbox]').each(function() {
                    var filter = $(this).next('label').text();
                    if (fillClass === '.fill-brand') {
                        if (brand.includes(removeAccents(filter))) {
                            $(this).prop('checked', true);
                        }
                    } else if (fillClass === '.fill-price') {
                        if (price.includes(removeAccents(filter))) {
                            $(this).prop('checked', true);
                        }
                    } else if (fillClass === '.fill-cpu') {
                        if (cpu.includes(removeAccents(filter))) {
                            $(this).prop('checked', true);
                        }
                    } else if (fillClass === '.fill-ram') {
                        if (ram.includes(removeAccents(filter))) {
                            $(this).prop('checked', true);
                        }
                    } else if (fillClass === '.fill-person') {
                        if (person.includes(removeAccents(filter))) {
                            $(this).prop('checked', true);
                        }
                    }
                });
            });
            
        }
        if (urlParams.has('discount')) {
            $('#fill-price-discount').addClass('active');
        }
        loadPage(1);
    });
    window.addEventListener('popstate', function(event) {
        // Reload the page
        location.reload();
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
        loadPage(1);  // Call loadPage when the checkbox state changes
    });

    otherCheckboxes.forEach(function(checkbox) {
        checkbox.addEventListener('click', function() {
            if (this.checked) {
                allCheckbox.checked = false;
            }
            if (Array.from(otherCheckboxes).every(cb => !cb.checked)) {
                allCheckbox.checked = true;
            }
            loadPage(1);  // Call loadPage when the checkbox state changes
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
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Gán sự kiện click cho phần tử cha bao quanh các .product-card
        document.body.addEventListener('click', function(event) {
            // Kiểm tra nếu phần tử được click là .product-card hoặc con của nó
            const card = event.target.closest('.product-card');
            if (card) {
                const productName = card.querySelector('.pd-name').textContent.trim();
                console.log(productName);

                $.ajax({
                    url: 'http://localhost/laptop_shop/product_all/product_detail',
                    type: 'POST',
                    data: {
                        product_name: productName
                    },
                    success: function(data) {
                        console.log(data);
                        const encodedProductName = encodeURIComponent(productName);
                        window.location.href = `http://localhost/laptop_shop/product_detail?product_name=${encodedProductName}`;
                    },
                    error: function(xhr, status, error) {
                        console.error('Error:', error);
                    }
                });
            }
        });
    });
</script>
<?php require_once 'app/views/includes/footer.php'; ?>
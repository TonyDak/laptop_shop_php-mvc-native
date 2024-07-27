<?php require_once 'app/views/includes/header.php'; ?>
<?php
isset($_SESSION['product_detail']) ? $laptop = $_SESSION['product_detail'] : $laptop = '';
?>
<main class="main">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="product-detail">
                    
                    <h4 class="pd-name"><?php echo $laptop[0]['laptop_id']; ?></h4><br>
                    
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once 'app/views/includes/footer.php'; ?>
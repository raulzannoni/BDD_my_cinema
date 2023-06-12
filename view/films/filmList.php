<?php

ob_start();

if(isset($_SESSION['message']))
    {
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

?>

<div id="filmList">
    <h2>Cinema_BDD</h2>
    <p>Film List</p>
</div>

	

<aside class="col-sm-4">

	
</aside>


<!--- 

<div class="col-md-4 order-md-1 col-lg-3 sidebar-filter">
        <h6 class="text-uppercase font-weight-bold mb-3">Categories</h6>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="category-1">
                    <label class="custom-control-label" for="category-1">Accessories</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="category-2">
                    <label class="custom-control-label" for="category-2">Coats &amp; Jackets</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="category-3">
                    <label class="custom-control-label" for="category-3">Hoodies &amp; Sweatshirts</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="category-4">
                    <label class="custom-control-label" for="category-4">Jeans</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="category-5">
                    <label class="custom-control-label" for="category-5">Shirts</label>
                </div>
            </div>
            <div class="mt-2 mb-2 pl-2">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="category-6">
                    <label class="custom-control-label" for="category-6">Underwear</label>
                </div>
            </div>
            <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Size</h6>
                <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="filter-size-1">
                        <label class="custom-control-label" for="filter-size-1">X-Small</label>
                    </div>
                </div>
                <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="filter-size-2">
                        <label class="custom-control-label" for="filter-size-2">Small</label>
                    </div>
                </div>
                <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="filter-size-3">
                        <label class="custom-control-label" for="filter-size-3">Medium</label>
                    </div>
                </div>
                <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="filter-size-4">
                        <label class="custom-control-label" for="filter-size-4">Large</label>
                    </div>
                </div>
                <div class="mt-2 mb-2 pl-2">
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="filter-size-5">
                        <label class="custom-control-label" for="filter-size-5">X-Large</label>
                    </div>
                </div>
                <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                    <h6 class="text-uppercase mt-5 mb-3 font-weight-bold">Price</h6>
                    <div class="price-filter-control">
                        <input type="number" class="form-control w-50 pull-left mb-2" value="50" id="price-min-control">
                        <input type="number" class="form-control w-50 pull-right" value="150" id="price-max-control">
                    </div>
                    <input id="ex2" type="text" class="slider " value="50,150" data-slider-min="10" data-slider-max="200" data-slider-step="5" data-slider-value="[50,150]" data-value="50,150" style="display: none;">
                    <div class="divider mt-5 mb-5 border-bottom border-secondary"></div>
                        <a href="#" class="btn btn-lg btn-block btn-primary mt-5">Update Results</a>
                    </div>-->


<!--- -->

<div class="row m-3">
    <?php

        foreach ($db_filmList->fetchAll() as $film) 
            { ?>
            <div class="col-lg-2">
                <a class="text-decoration-none text-reset" href="index.php?action=filmDetail&id=<?=$film['id_film']?>">
                    <img src="public/img/placeholder.png" alt="poster <?= $film['title_film'] ?>" style="width: 200px; height: 300px; object-fit: cover;">
                    <h5 class="text-center fw-semibold"><?= $film['title_film'] ?> (<?= $film['year_film']  ?>)</h5>
                </a>
            </div>
    <?php   } ?>
</div>

<?php
$title = "Films List";
$content = ob_get_clean();
require 'view/template.php';
?>


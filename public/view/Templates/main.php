<?php

use Framework\core\Session;

require_once('../public/models/listProducts/list-of-profucts.php');
require_once('../public/models/storage/storage.php')
?>
<div class=" wrapper container-fluid">
    <div class="row">
        <section>
            <h1 class=" text-center">Список товаров</h1>
            <?php
            foreach ($products as $key)
            {
                ?>
                    <div class="products ">
                        <div class="list-items">
                            <div class="products-info">
                                <img src="<?php echo  $key['img'];?>" alt="">
                                <p class="img-description text-center"><?php echo  $key['name'];?></p>
                                <p class="img-description text-center">Ціна: <?php echo  $key['price'];?></p>
                                <a href="/buy" class="btn btn-primary">Купити</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
        </section>
    </div>
</div>
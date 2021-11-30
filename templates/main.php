<?php
require_once ('listProducts/list-of-profucts.php');
require_once ('storage/storage.php')
?>
<div class=" wrapper container-fluid">
    <div class="row">
        <section>
            <h1 class="text-center">Список товаров</h1>
            <?php
            foreach ($products as $key => $items)
            {
                ?>
                <p class="elements"><?php echo "$key"?></p>
                <?php
                foreach ($items as $item){
                    ?>
                    <ul class="rounded">
                        <li><a href="#"><?php echo  "$item";?></a></li>
                    </ul>
                    <?php
                }
                ?>

                <?php
            }
            ?>
        </section>
        <section>
            <h1 class="text-center">Товар и его количество</h1>
            <?php
            foreach ($storage as $key => $items)
            {

                ?>
                <div class="product-amount d-flex">
                    <p><?php echo $key ?></p>
                    <p class="amount"><?php echo $items; ?></p>
                </div>
                <?php
            }
            ?>
        </section>
    </div>
</div>
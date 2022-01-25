<?php

use Framework\core\Session;

?>
<div class="page">
    <div class=" wrapper container-fluid">
        <div class="row">
            <div class="sort-filter" style="d-flex">
                <div class="sort-form">
                    <form action="/sort" method="GET">
                        <button class="sort-button" name="id" value="2">Кольца</button>
                        <button class="sort-button" name="id" value="3">Браслеты</button>
                        <button class="sort-button" name="id" value="1">Серьги</button>
                    </form>
                </div>
                <hr>
            </div>
            <section>
                <?php
                foreach ($params['products'] as $product) {
                    ?>
                    <div class="products ">
                        <div class="list-items">
                            <div class="products-info">
                                <p class="img-description text-center " style="font-size: 20px">
                                    <strong><?php echo $product['title']; ?></strong></p>
                                <img src="<?php echo 'images/' . $product['image']; ?>" alt="">
                                <p class="img-description text-center" style="">
                                    <strong>Описание: </strong><?php echo $product['description']; ?></p>
                                <p class="img-description text-center">
                                    <strong>Цена:</strong> <?php echo $product['price']; ?></p>
                                <a href="/login" class="btn buy btn-primary">Купить</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </section>
        </div>
    </div>
</div>

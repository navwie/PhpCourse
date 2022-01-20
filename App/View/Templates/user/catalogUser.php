<?php

use Framework\core\Session;

?>
<div class="page">
    <div class=" wrapper container-fluid">
        <div class="row">
            <div class="sort-filter" style="d-flex">
                <div class="sort-form">
                    <form action="/sortUserPage" method="GET">
                        <button class="sort-button" name="id" value="2">Кольца</button>
                        <button class="sort-button" name="id" value="3">Браслеты</button>
                        <button class="sort-button" name="id" value="1">Серьги</button>
                    </form>
                </div>
                <hr>
            </div>
            <section>
                <h1 class=" text-center">Список товаров</h1>
                <?php
                foreach ($params['products'] as $product) {
                    ?>
                    <div class="products ">
                        <div class="list-items">
                            <div class="products-info">
                                <p class="img-description text-center " style="font-size: 20px" ><strong><?php echo $product['title']; ?></strong></p>
                                <img src="<?php echo 'images/' . $product['image']; ?>" alt="">
                                <p class="img-description text-center" style=""><strong>Описание: </strong><?php echo $product['description']; ?></p>
                                <p class="img-description text-center"><strong>Цена:</strong> <?php echo $product['price']; ?></p>
                                <form action="/addProductToBasket">
                                    <button class="btn buy btn-primary" name="id" type="submit" value="<?php echo $product['id'] ?>">
                                        Купить
                                    </button>
                                </form>
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

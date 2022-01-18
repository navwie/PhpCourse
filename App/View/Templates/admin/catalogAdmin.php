<?php

use Framework\core\Session;

?>
<div class="page">
    <div class=" wrapper container-fluid">
        <div class="row">
            <section>
                <h1 class=" text-center">Список товаров</h1>
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
                                <div class="form-button">
                                    <form action="/changeJewelry" method="GET">
                                        <button class="btn btn-primary" type="submit" name="id" value="<?php echo $product['id'] ?>">
                                            Обновить
                                        </button>
                                    </form>
                                    <form action="/deleteJewelry" method="POST">
                                        <button href="/adminCatalog" class="btn btn-primary" type="submit" name="id" value="<?php echo $product['id'] ?>">
                                            Удалить
                                        </button>
                                    </form>
                                </div>
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

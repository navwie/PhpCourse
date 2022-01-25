<div class="basket">
    <h2>Корзина</h2>
    <?php if (empty($params['products'])) : ?>
        <div>
            <h2 class="text-center">Корзина пока пуста</h2>
        </div>
    <?php else : ?>
    <?php
    foreach ($params['products'] as $product) {
        //var_dump($product[0]->getTitle());
        ?>
        <div class="basket-item">
            <div class="basket-image">
                <img src="<?php echo 'images/' . $product[0]->getImage(); ?>" alt="">
            </div>
            <div class="basket-element">
                <p><strong><?php echo $product[0]->getTitle(); ?></strong></p>
                <p><strong>Описание:</strong> <?php echo $product[0]->getDescription(); ?></p>
                <p><strong>Цена:</strong> <?php echo $product[0]->getPrice(); ?></p>
                <div class="change-amount">
                    <form action="/buyProductToBasket" method="post">
                    <label for="amount" style="color: black"><strong>Изменить количество</strong></label>
                    <input name="amount" id="amount" type="number" step="1" min="1" max="<?php echo $product[0]->getAmount() ?>"
                           value="<?php echo $product['amount'] ?>">
                    <button class="btn btn-primary" type="submit" name="id" value="<?php echo $product[0]->getId() ?>">
                        купить
                    </button>
                    </form>
                </div>
            </div>
            <div class="basket-buy-elements">
                <form action="/deleteProductToBasket" method="post">
                    <button class="btn btn-danger" name="id" type="submit" value="<?php echo $product[0]->getId(); ?>">
                        удалить
                    </button>
                </form>
            </div>
        </div>
    <?php } ?>
    <?php endif; ?>
</div>
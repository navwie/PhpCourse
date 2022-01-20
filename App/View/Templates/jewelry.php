<div class="page">
    <div class=" wrapper container-fluid">
        <div class="row">
            <section>
                <h1 class=" text-center">Найденный товар:
                    <strong><?php echo $params["jewelry"][0]->getTitle() ?></strong></h1>
                <div class="products " style="margin: -10px 350px; width:700px; height:500px">
                    <div class="jewelry-items">
                        <div class="jewelry-info">
                            <p class="title">  <?php echo $params["jewelry"][0]->getTitle() ?></p>
                            <div class="jewelry-elements">
                                <div class="one-el">
                                    <img class="product-img" <?php echo "src=images/" . $params["jewelry"][0]->getImage() ?>
                                         alt="">
                                </div>
                                <div class="one-el" style="margin-left:100px">
                                    <p> <strong >Тип: </strong><?php echo $params["jewelry"][0]->getType() ?></p>
                                    <p> <strong>Материал:</strong> <?php echo $params["jewelry"][0]->getMaterial() ?></p>
                                    <p> <strong>Цена:</strong> <?php echo $params["jewelry"][0]->getPrice() ?></p>
                                    <p> <strong>Количество:</strong> <?php echo $params["jewelry"][0]->getAmount() ?></p>
                                </div>
                            </div>
                            <p> <strong>Описание:</strong> <?php echo $params["jewelry"][0]->getDescription() ?></p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>

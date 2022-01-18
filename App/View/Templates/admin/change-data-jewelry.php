<div class="page">
    <div class="page-sign-up">
        <div class="d-flex col-12 form-signin container justify-content-center">
            <form action="updateJewelry" method="post">
                <h1 class="h3  fw-normal text-center">Обновить</h1>
                <div class="form-group mt-4">
                    <label for="title">Название</label>
                    <input type="text" id="title" value="<?php echo $params['jewelry'][0]->getTitle() ?>" name="title">
                </div>
                <div class="form-group mt-4">
                    <label for="type_id">Тип</label>
                    <input type="text" id="type_id" name="type_id" value="<?php echo $params['jewelry'][0]->getTypeId(); ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="amount">Количество</label>
                    <input type="number" id="amount" name="amount" value="<?php echo $params['jewelry'][0]->getAmount() ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="description">Описание</label>
                    <textarea type="text" id="description" name="description" style="width: 300px;height: 150px"><?php echo $params['jewelry'][0]->getDescription() ?></textarea>
                </div>
                <div class="form-group mt-4">
                    <label for="price">Цена</label>
                    <input type="number" id="price" name="price" value="<?php echo $params['jewelry'][0]->getPrice() ?>">
                </div>
                <div class="form-group mt-4">
                    <label for="image">Фото</label>
                    <input type="file" id="image" name="image" value="<?php echo $params['jewelry'][0]->getImage() ?>">
                </div>
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-outline-dark" value="<?php echo $params['jewelry'][0]->getId() ?>" name="id">Изменить</button>
                </div>
            </form>
        </div>
    </div>
</div>

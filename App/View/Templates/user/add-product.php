<div class="page">
    <div class="page-sign-up">
        <div class="d-flex col-12 form-signin container justify-content-center">
            <form enctype="multipart/form-data" action="/createJewelry" method="post">
                <h2 class="text-center">Заполните все поля про продукт</h2>
                <div class="form-group el">
                    <div class="el">
                        <label for="name" class="fas fa-user"></label>
                        <input id="name" style="width: 400px" type="text" placeholder="Введите название" name="title" >
                    </div>
                </div>

                <div class="form-group el">
                  <div class="el">
                        <label for="price"></label>
                        <input  id="price" style="width: 400px" type="text" placeholder="Введите цену" name="price">
                    </div>
                </div>

                <div class="form-group el">
                    <div class="el">
                        <label for="amount"></label>
                        <input  id="amount" style="width: 400px" type="text" placeholder="Введите количество" name="amount">
                    </div>
                </div>


                <div class="radio">
                    <div class="form-group">
                        <div class="product">
                            <label  class="fas fa-paw"></label>
                            <p>Тип изделия</p>
                            <div class="radioChoice1">
                                <div class="custom-control custom-radio">
                                    <input type="radio"  class="custom-control-input" value="1" id="type_id1"  name="type_id">
                                    <label class="custom-control-label" for="type_id1">Серьги</label>
                                </div>

                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" value="2" id="type_id2"  name="type_id">
                                    <label class="custom-control-label" for="type_id2">Кольца</label>
                                </div>

                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" value="3" id="type_id3" name="type_id">
                                    <label class="custom-control-label" for="type_id3">Браслет</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="product">
                            <label  class="fas fa-paw"></label>
                            <p>Материал</p>
                            <div class="radioChoice2">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" value="1" id="material_id1"   name="material_id">
                                    <label class="custom-control-label" for="material_id1"> Серебро </label>
                                </div>

                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input"  value="2" id="material_id2"  name="material_id">
                                    <label class="custom-control-label" for="material_id2">Золото</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="product">
                        <label for="form1" class="fas fa-pencil-alt" ></label>
                        <p>Описание изделия</p>
                        <textarea style="width: 450px;height: 100px" type="text" id="form1" class="form-control" name="description"></textarea>
                    </div>
                </div>

                 <div class="form-group">
                  <div class="product">
                    <label for="input-file-id" class="fas fa-file-image" ></label>
                    <p>Фото продукта</p>
                    <input class="ng-hide" id="input-file-id" multiple type="file" name="image"/>
                  </div>
                </div>
                <div class="text-center">
                    <button id="submitButton" type="submit" class="btn btn-primary"
                           >Добавить продукт</button>
                </div>
            </form>
        </div>
    </div>
</div>
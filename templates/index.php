<?php include TEMPLATES_PATH."partials".DIRECTORY_SEPARATOR."header.php";?>
<div class="row">
    <div class="col-2 ">
        <?php echo("Вiтаю, ".$_SESSION['user']) ?>
    </div>

    <div class="col-8">
        <form action="index_action.php" method="post">
            <div class="list-group">
                <?php require_once "topic.php";
                foreach ($topics as $value):?>
                    <div class="card mb-2">
                      <h5 class="card-header"><?php echo $value["title"];?></h5>
                      <div class="card-body">
                        <p class="card-text"><?php echo $value["text"];?></p>
                    </div>
                    <div class="card-footer text-end">
                        <button class="btn btn-success" type="button" id="b1" name="b1">Вподобайка</button>
                        <button class="btn btn-secondary" type="button" id="b2" name="b2">Поділитися</button>
                        <?php if ($_SESSION['user_role']==='admin'): ?>
                            <button class="btn btn-danger" type="submit" id="delete" name="delete">Видалити</button>;
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </form>
</div>

<div class="col-2">
    <form action="topic.php" method="post">
        <select name="select_category" class="form-select" multiple aria-label="multiple select example" id="select_category">
            <?php require_once "category.php";
            foreach ($categories as $key => $value):?>
                <option value='<?php echo $value["id"];?>'><?php echo $value["name"];?></option>
            <?php endforeach; ?>
        </select>

        <input class="btn btn-primary mt-2" type="submit" name="submit" value="Обрати топік"/></div>

    </form>
</div>
</div>
</div>
<?php include TEMPLATES_PATH."partials".DIRECTORY_SEPARATOR."footer.php";?>
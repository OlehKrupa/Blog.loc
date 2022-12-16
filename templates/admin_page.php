<?php include TEMPLATES_PATH."partials".DIRECTORY_SEPARATOR."header.php";?>
<div class="row">
    <div class="col-2 ">
        <?php echo("Адмін: ".$_SESSION['user']) ?>
    </div>

    <div class="col-8">
     <h3>Модерация</h3>
     <form action="admin.php" method="post"> 

         <div class="row"> 
            <div class="input-group">
                <label class="input-group-text" for="select_category">Тематика</label>
                <select name="select_category" class="form-select" id="select_category">
                    <?php require_once "category.php";
                    foreach ($categories as $key => $value):?>
                        <option  value='<?php echo $key;?>' <?php if($key===$category-1) echo "selected"; ?> > <?php echo $value;?></option>
                    <?php endforeach; ?>
                </select>

            </div>

            <div class="input-group mt-2">
                <span class="input-group-text" id="basic-addon1">Заголовок</span>
                <input type="text" class="form-control" aria-describedby="basic-addon1"  id="title" name="title" value="<?php echo $title; ?>">
            </div>

            <div class="col"> 
                <div class="input-group mt-2">
                    <span class="input-group-text" id="basic-addon1" >Нікнейм</span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1"  id="name" name="name" readonly="readonly" value="<?php echo $name; ?>">
                </div>
            </div>

            <div class="col"> 
                <div class="input-group mt-2">
                    <span class="input-group-text" id="basic-addon1">Дата: </span>
                    <input type="text" class="form-control" aria-describedby="basic-addon1"  id="date" name="date" readonly="readonly" value="<?php echo $date; ?>">
                </div>

            </div>

        </div>

        <div class="col">
            <textarea class="form-control my-2" aria-label="With textarea"  id="text" name="text" ><?php echo $text; ?></textarea> 
        </div>

        <div class="col">
            <button class="btn btn-success" type="submit" id="approve" name="approve">База</button>
            <button class="btn btn-warning" type="submit" id="next" name="next">Наступний</button>
            <button class="btn btn-warning" type="submit" id="prev" name="prev">Попередній</button>
            <button class="btn btn-danger" type="submit" id="delete" name="delete">Антибаза</button>
        </div>
    </form>
</div>

<div class="col-2">

</div>
</div>
<?php include TEMPLATES_PATH."partials".DIRECTORY_SEPARATOR."footer.php";?>
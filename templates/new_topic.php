<?php include TEMPLATES_PATH."partials".DIRECTORY_SEPARATOR."header.php";?>
<div class="row">
	<form action="add_topic.php" method="post">

		<div class="input-group">
			<select name="select_category" class="form-select" id="select_category">
				<?php require_once "category.php";
				foreach ($categories as $key => $value):?>
					<option value='<?php echo $value["id"];?>'><?php echo $value["name"];?></option>
				<?php endforeach; ?>
			</select>
			<label class="input-group-text" for="select_category">Тематика</label>
			
		</div>

		<div class="input-group mt-2">
			<span class="input-group-text" id="basic-addon1">Заголовок: </span>
			<input type="text" class="form-control <?php if(!empty($error['title'])) echo 'is-invalid' ?>" aria-describedby="basic-addon1"  id="title" name="title">
			<div class="invalid-feedback">
				<?php echo $error['title'] ?? '';?>;
			</div>
		</div>

		<textarea class="form-control mt-2 <?php if(!empty($error['text'])) echo 'is-invalid' ?>" aria-label="With textarea"  id="text" name="text"></textarea>
		<div class="invalid-feedback">
			<?php echo $error['text'] ?? '';?>;
		</div>

		<input class="btn btn-primary mt-2" type="submit" name="submit" value="Написати"/>
	</div>
</form>
</div>
</div>
<?php include TEMPLATES_PATH."partials".DIRECTORY_SEPARATOR."footer.php";?>
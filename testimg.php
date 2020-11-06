
<html>
<form method = "post" action="">

<p><textarea name ="editor" id ="editor"><?php echo !empty($_POST['editor'])?$_POST['editor']:''; ?></textarea></p>

<input type="submit" name="submit" value="submit"/>

</form>

    <?php if(!empty($_POST['editor'])){ ?>
            <div class="output">
                <?php echo $_POST['editor']; ?>
            </div>
    <?php } ?>



<script  src = "ckeditor/ckeditor.js"></script>
<script>
     CKEDITOR.replace('editor', {
        filebrowserUploadUrl: 'ckeditor/ck_upload.php',
        filebrowserUploadMethod: 'form'
    });
</script>
</html>
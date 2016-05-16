<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<HTML>
<head>
<title>Welcome to CodeIgniter 3.X | Multiple Upload File</title>
</head>
<body>
<?php echo $error;?>

<?php echo form_open_multipart('pages/do_upload');?>

<input type="file" name="files[]" multiple >
<input type="file" name="files[]" multiple >
<input type="file" name="files[]" multiple >

<br /><br />

<input type="submit" value="upload" />

</form>

<ul>
<?php if (isset($upload_data)) {
    foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach;
}?>
</ul>
</body>
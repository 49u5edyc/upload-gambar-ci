<?php echo "Form Upload"; ?>
<?php echo form_open_multipart('home/do_upload'); ?>
<input type="file" name="file_upload" />
<input type="submit" name="upload" value="upload" />
<?php echo form_close(); ?>

<!--
<form action="home/do_upload" method="post">
	<input type="file" name="File_upload" value="" placeholder="Upload gambar">
	<input type="submit" name="upload" value="upload">
</fopost
-->
<?php if(is_array($images)) : ?>
 <?php foreach($images as $row) : ?>
 <img src="<?php echo base_url().'asset/image/'.$row['name']; ?>" />
 <?php endforeach; ?>
 <?php endif; ?>
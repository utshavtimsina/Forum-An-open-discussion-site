
<style>
.error{
height:auto ; width:480px; background-color:white; margin:auto; border:2px solid red; border-radius:5px;     font-size:15px; font-weight:bolder; color:black;    opacity:0.5; }
</style>
<?php  if (count($errors) > 0) : ?>
	<div class="error">
		<?php foreach ($errors as $error) : ?>
			<p><?php echo $error ?></p>
		<?php endforeach ?>
	</div>
<?php  endif ?>
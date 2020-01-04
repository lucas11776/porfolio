<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	
</head>
<body>


	<?= form_open('contact#contact') ?>

		<?= validation_errors() ?>

		<?php if(isset($error) || isset($success) || isset($warning)) : ?>
			<p><?= $error || $success || $warning ?></p>
		<?php endif; ?>

		<!-- Name  -->
		<fieldset>
			<label for="name">Name</label>
			<input type="text" name="name" id="name" value="<?= set_value('name') ?>">
		</fieldset>

		<!-- Email  -->
		<fieldset>
			<label for="email">Email</label>
			<input type="text" name="email" id="email" value="<?= set_value('email') ?>">
		</fieldset>

		<!-- Subject -->
		<fieldset>
			<label for="subject">Subject</label>
			<input type="text" name="subject" id="subject" value="<?= set_value('subject') ?>">
		</fieldset>

		<!-- Message -->
		<fieldset>
			<label for="message">Message</label>
			<textarea name="message" id="message"><?= set_value('message') ?></textarea>
		</fieldset>
		
		<!-- Submit -->
		<fieldset>
			<button type="submit">Send Message</button>
		</fieldset>

		
	<?= form_close() ?>


	<br><br/><br/><hr>
	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.</p>
</body>
</html>
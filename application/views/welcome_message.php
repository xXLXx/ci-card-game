<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>A Card Game!</title>
	<?php echo link_tag(base_url('public_html/css/style.css'));?>
	
</head>
<body>

<div id="container">
	<h1>A Card Game!</h1>

	<div id="body">
<!-- 		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div> -->
	<?php
		echo heading('Login!', 1);
		echo form_open('validate_login');
		echo form_input(array(
              'name'        => 'username',
              'id'          => 'username',
              'placeholder' => 'Username',
              'style'       => 'width:20%',
            ));
		echo br(2);
		echo form_input(array(
              'name'        => 'password',
              'id'          => 'password',
              'placeholder' => 'Password',
              'style'       => 'width:20%',
            ));
		echo nbs(2);
		echo form_submit('login', 'Go');
		echo form_close();
	?>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>
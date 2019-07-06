
<!-- 		<p>The page you are looking at is being generated dynamically by CodeIgniter.</p>

		<p>If you would like to edit this page you'll find it located at:</p>
		<code>application/views/welcome_message.php</code>

		<p>The corresponding controller for this page is found at:</p>
		<code>application/controllers/welcome.php</code>

		<p>If you are exploring CodeIgniter for the very first time, you should start by reading the <a href="user_guide/">User Guide</a>.</p>
	</div> -->
<?php
	echo heading('Login!', 1);
	echo form_open('admin/validate_login');
	echo form_input(array(
          'name'        => 'username',
          'placeholder' => 'Username',
          'required'	=> 'true',
          'value'		=> set_value('username'),
          'style'       => 'width:20%',
        ));
	echo br(2);
	echo form_password(array(
          'name'        => 'password',
          'placeholder' => 'Password',
          'required'	=> 'true',
          'value'		=> '',
          'style'       => 'width:20%',
        ));
	echo nbs(2);
	echo form_submit('login', 'Go');
	echo nbs(2);
	echo 'or ';
	echo anchor('admin/signup', 'Create Me');
	echo form_close();
	echo br(1);
	echo validation_errors();
?>
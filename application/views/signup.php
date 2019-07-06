<?php
	echo heading('Sign Up!', 1);
	echo form_open('admin/validate_signup');
	echo form_input(array(
          'name'        => 'username',
          'placeholder' => 'Username',
          'required'	=> 'true',
          'value'		=> set_value('username'),
          'style'       => 'width:20%',
        ));
	echo br(2);
	echo form_input(array(
          'name'        => 'player_name',
          'placeholder' => 'Player Name',
          'required'	=> 'true',
          'value'		=> set_value('player_name'),
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
	echo br(2);
	echo form_password(array(
          'name'        => 'passconf',
          'placeholder' => 'Password Confirmation',
          'required'	=> 'true',
          'value'		=> '',
          'style'       => 'width:20%',
        ));
	echo nbs(2);
	echo form_submit('login', 'Go');
	echo nbs(2);
	echo 'or ';
	echo anchor('admin', 'Nevermind');
	echo form_close();
	echo br(1);
	echo validation_errors();
?>
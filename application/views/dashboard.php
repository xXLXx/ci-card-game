<h1>
	Welcome!: <strong><?php echo $this->session->userdata('player_name');?></strong>
	<div id="menu">
		<ul>
			<li><a href="<?php echo base_url('index.php/admin/dashboard');?>">Dashboard</a></li> |
			<li><a href="">Tong-Its! Masters</a></li> |
			<li><a href="<?php echo base_url('index.php/admin/signout');?>">Get out!</a></li>
		</ul>
	</div>
</h1>

<table id="tbl-player" width="100%">
</table>


<script type="text/javascript" src="<?php echo base_url('public_html/js/jquery-1.11.0.js');?>"></script>
<script type="text/javascript">
	var BASE_URL = '<?php echo base_url();?>' + 'index.php/';
</script>
<script type="text/javascript" src="<?php echo base_url('public_html/js/script.js');?>"></script>
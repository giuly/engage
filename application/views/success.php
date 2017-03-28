<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('load');
?>
<div id="container">
	<div class="card card-container"> 
		<img id="profile-img" class="profile-img-card" src="../assets/css/images/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
		<div class="alert alert-success">
		 	Congratulations <strong> <?php echo (isset($name)) ? $name : 'John Doe'; ?></strong>! You've just signed up successfully.
		</div>
	</div>
</div>
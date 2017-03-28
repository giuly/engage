<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
$this->load->view('load'); 
?>

<div id="container">
	<div class="card card-container"> 
		<img id="profile-img" class="profile-img-card" src="../assets/css/images/avatar_2x.png" />
        <p id="profile-name" class="profile-name-card"></p>
		<?php 
		echo validation_errors(); 
	
		$attributes = array('class' => 'form-horizontal', 'id' => 'contactForm', 'role' => 'form');
		echo form_open('/', $attributes);

			?>
			<!-- This container will be shown after sending new message -->
    		<div id="alertContainer" class="alert" style="display: none;"></div>
		    <div class="form-group">
		        <label class="col-xs-4 control-label">Full name *</label>
		        <div class="col-xs-7">
		            <input type="text" class="form-control" id="inputName" name="name" placeholder="Full Name" required autofocus/>
		            <div class="help-block with-errors"></div>
		        </div>
		        
		    </div>

		    <div class="form-group">
		        <label class="col-xs-4 control-label">Email address *</label>
		        <div class="col-xs-7">
		            <input type="email" class="form-control" id="inputEmail" name="email" data-remote="/Signup/check_unique_email" placeholder="john.doe@emal.com" required/>
		            <div class="help-block with-errors"></div>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-xs-4 control-label">Phone number</label>
		        <div class="col-xs-7">
		            <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="+40 7755 321 321"/>
		        </div>
		    </div>

		    <div class="form-group">
		        <label class="col-xs-4 control-label">Birth date *</label>
		        <div class="col-xs-7">
		            <input type="date" class="form-control" id="inputBirth" name="birth" placeholder="1988/11/11" required/>
		            <div class="help-block with-errors"></div>
		        </div>
		    </div>

		    <div class="form-group">
		        <div class="col-xs-7 col-xs-offset-4">
		            <button type="submit" class="btn btn-primary">Submit</button>
		        </div>
		    </div>
		</form>
	</div>
</div>

</body>
</html>
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="#">Tweet Categorization</a>
          <div class="nav-collapse">
            <ul class="nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>
			</ul>
          </div><!--/.nav-collapse -->
		  <div id="loginDiv">
		<?php
		session_start();
		if(isset($_SESSION['userID']))
			echo "<a id='LogoutButton' class='btn' onclick='LogoutButton_Click()'>Logout</a>";
		else
			echo 	"<a id='loginButton' class='btn' href='#loginModal' data-toggle='modal'>Login</a>
					<a id='signUpButton' class='btn' href='#signUpModal' data-toggle='modal'>Sign up</a>";
		?>
		</div>
		</div>
      </div>
    </div>
	
	<div class="modal fade" id="signUpModal">
		 <div class="modal-header">
			<a class="close" data-dismiss="modal">x</a>
			<h3>Sign up</h3>
		  </div>
		  <div class="modal-body">
		  	<form class="form-horizontal">
			  <fieldset>
				<div id="signUpError" class="alert alert-block alert-error fade in hide">
				  <a class="close" data-dismiss="alert">x</a>
				  <strong>Warning!</strong><span id="signUpErrorTxt"></span>
				</div>
				<div class="control-group">
				  <label class="control-label" for="userNameSignUp">User Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="userNameSignUp">
					</div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="passwordSignUp">Password</label>
				  <div class="controls">
					<input type="password" class="input-xlarge" id="passwordSignUp">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="passwordConfirmSignUp">Confirm Password</label>
				  <div class="controls">
					<input type="password" class="input-xlarge" id="passwordConfirmSignUp">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="passphraseSignUp">Enter the passphrase</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="passphraseSignUp">
					<p class="help-block">Enter the passphrase...restricted for beta.</p>
				  </div>
				</div>
			  </fieldset>
			</form>
		  </div>
		  <div class="modal-footer">
			<a href="#" class="btn btn-primary" onclick="SignUpButton_Click()">Save</a>
			<a href="#" class="btn" data-dismiss="modal">Close</a>
		  </div>
	</div>
	
	<div class="modal fade" id="loginModal">
		 <div class="modal-header">
			<a class="close" data-dismiss="modal">x</a>
			<h3>Login</h3>
		  </div>
		  <div class="modal-body">
		  <form class="form-horizontal">
			  <fieldset>
			<div id="loginError" class="alert alert-block alert-error fade in hide">
				  <a class="close" data-dismiss="alert">x</a>
				  <strong>Warning!</strong><span id="loginErrorTxt"></span>
				</div>
			<div class="control-group">
				  <label class="control-label" for="userNameLogin">User Name</label>
				  <div class="controls">
					<input type="text" class="input-xlarge" id="userNameLogin">
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label" for="passwordLogin">Password</label>
				  <div class="controls">
					<input type="password" class="input-xlarge" id="passwordLogin">
				  </div>
				</div>
				</fieldset>
			</form>
		  </div>
		  <div class="modal-footer">
			<a href="#" class="btn btn-primary" onclick="LoginButton_Click()">Login</a>
			<a href="#" class="btn" data-dismiss="modal">Close</a>
		  </div>
	</div>
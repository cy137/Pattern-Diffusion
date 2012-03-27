<script src="./assets/js/jquery.js"></script>
<script src="./assets/js/bootstrap-transition.js"></script>
<script src="./assets/js/bootstrap-modal.js"></script>
<script src="./assets/js/bootstrap-alert.js"></script>
<script src="./assets/js/bootstrap-dropdown.js"></script>
<script src="./assets/js/bootstrap-scrollspy.js"></script>
<script src="./assets/js/bootstrap-tab.js"></script>
<script src="./assets/js/bootstrap-tooltip.js"></script>
<script src="./assets/js/bootstrap-popover.js"></script>
<script src="./assets/js/bootstrap-button.js"></script>
<script src="./assets/js/bootstrap-collapse.js"></script>
<script src="./assets/js/bootstrap-carousel.js"></script>
<script src="./assets/js/bootstrap-typeahead.js"></script>

<script src="./js/twitter.js"></script>
<script type="text/javascript">

	var resultSet = {};
	
	function LoginButton_Click()
	{
		var errorMsg = "";
		if($('#userNameLogin').val() == "")
			errorMsg += "  You need to enter a user name.";
		if($('#passwordLogin').val() == "")
			errorMsg += "  You need to enter a password.";
		
		if(errorMsg == "")
		{
			console.log({"userID":$('#userNameLogin').val(),"password":$('#passwordLogin').val()});
			$.post("login.php",{"userID":$('#userNameLogin').val(),"password":$('#passwordLogin').val()},function(data){
				if(data == "true")
					window.location = "http://www.teamceladon.com:22222/workspace.php";
				else
				{
					errorMsg = "  There was an error submitting your information.  Please review and resubmit.";
					$('#loginErrorTxt').html(errorMsg);
					$('#loginError').show();
				}
			});
		}
		else
		{
			$('#loginErrorTxt').html(errorMsg);
			$('#loginError').show();
		}
	}

	function SignUpButton_Click()
	{
		var errorMsg = "";
		if($('#userNameSignUp').val() == "")
			errorMsg += "  You need to enter a user name.";
		if($('#passwordSignUp').val() != $('#passwordConfirmSignUp').val())
			errorMsg += "  Your passwords did not match.";
		if($('#passphraseSignUp').val() != "tweet")
			errorMsg += "  The passphrase is incorrect.";
		
		if(errorMsg == "")
		{
			$.post("signUp.php",{"userID":$('#userNameSignUp').val(),"password":$('#passwordSignUp').val(), "passwordConfirm":$('#passwordConfirmSignUp').val(),"passphrase":$('#passphraseSignUp').val()},function(data){
				if(data == "true")
					window.location = "http://www.teamceladon.com:22222";
				else
					errorMsg = "  There was an error submitting your information.  Please review and resubmit.";
			});
		}
		else
		{
			$('#signUpErrorTxt').html(errorMsg);
			$('#signUpError').show();
		}
		
	}
	
	function LogoutButton_Click()
	{
		$.post("logout.php",function(data)
		{
			if(data == "true")
				window.location = "http://www.teamceladon.com:22222";
		});
	}
	
	function UpdateContent(navAction,detail)
	{
		$.post("actionRouter.php",{"navAction":navAction,"detail":detail},function(data){
				$('#wrapper').html(data);
		});
	}
	
	$(document).ready(function(){
		$("ul.nav-list li:not(.nav-header)").on("click",function(event){
			$("ul.nav-list li:not(.nav-header).active").removeClass("active");
			$(this).addClass("active");
			UpdateContent($(this).attr("navAction"),$(this).attr("detail"));
		});
	});	
</script>

$(document).ready(function (){
	$("#login").on('click',function(){
		var email = $("#email").val();
		var password = $("#password").val();
		if(email == "" || password == "")
			alert('Please check your inputs');
		else{
			$.ajax(
				{
					url: 'login2.php',
					method:'POST',
					data: {
						login: 1,
						emailPHP: email,
						passwordPHP: password
					},
					success: function(response){
							
								
						$("#response").html(response);
						if(response.indexOf('success')>=0)
							window.location = 'after_log.html' ;
							 
					},
					dataType: 'text'
				}
			);
		}
	});
});


$(document).ready(function()
{ 
     /* validation */
  $("#register-form").validate({
      rules:
   {
   name: {
      required: true,
   minlength: 3
   },
   password: {
   required: true,
   maxlength: 15
   },
   cpassword: {
   required: true,
   equalTo: '#password'
   },
   email: {
            required: true,
            email: true
            },
    },
       messages:
    {
            name:{
					required:"please enter user name",
					minlength:"username atleast have 3 characters"
			},
            password:{
                      required: "please provide a password",
                     },
            email: "please enter a valid email address",
   cpassword:{
      required: "please retype your password",
      equalTo: "password doesn't match !"
       }
       },
    submitHandler: submitForm 
       });  
    /* validation */
    
    /* form submit */
    function submitForm()
    {  
    var data = $("#register-form").serialize();
    
    $.ajax({
    
    type : 'POST',
    url  : 'register.php',
    data : data,
    beforeSend: function()
    { 
     $("#error").fadeOut();
     $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
    },
    success :  function(data)
         {      
        if(data==1){
         
         $("#error").fadeIn(1000, function(){
           
           
           $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; User already exist !</div>');
           
           $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
          
         });
                    
        }
        else if(data=="registered")
        {
		var person = { name: '#name', college: '#college', gender : '#gender', rollno : '#rollno', email:'#email',degree:'#degree'};
		var myJSON = JSON.stringify(person);
		window.localStorage.setItem("#username", myJSON);
        
         alert("Registered successfully");
         window.location='login.html';
        }
        else{
          
         $("#error").fadeIn(1000, function(){
           
      $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');
           
         $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');
          
         });
           
        }
         }
    });
    return false;
  }
    /* form submit */ 

});
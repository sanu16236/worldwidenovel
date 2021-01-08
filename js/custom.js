$(window).on('load',function(){

    $('#preloader').fadeOut('slow');
// Newsletter section
  setTimeout(function () {
    $('#newsletter').modal('show');
  }, 2000);
})

$(document).ready(function(){

  var copdate = new Date().getFullYear();

$('#fdate').html(copdate);



/* singup ajax code start */



$('#signupbtn').on("click",function(e){

  e.preventDefault();

var name = $('#sname').val();

var email = $('#semail').val();

var password = $('#spassword').val();

var mobile = $('#mobile').val();

  

if(password.length < 6){

  $('#signuper').html('<p class="alert alert-danger">Fill password at least 6 character!</p>');

  return false;

}else{

  $('#signuper').html(' ');

}

$.ajax({

  url: 'signup.php',

  method: 'POST',

  data: {name:name, email:email, password:password, mobile:mobile},

  success: function(data){

      if(data == 1){

          $('#mailmsg').html('<p class="text-light">Email already exist..</p>');

      }else{
    
        if (data == "sent") {
      
      $('#signuper').html('<p class="alert alert-success">Redirection to home page ...</p>');
          setTimeout(function () { 
            window.location.href = "index.php";
          }, 2000);
    }

 }
}
});

});



/* ajax code for sign in */

$('#signinbtn').on("click", function(e){

  e.preventDefault();

  var lemail = $('#lemail').val();

  var lpassword = $('#lpassword').val();

  if(lemail == "" || lpassword == ""){

    $('#loginer').html('<p class="alert alert-danger">Please fill all fields..</p>');

    return false;

  }else{

    $('#loginer').html('');



  }

  if(lpassword.length < 6){

    $('#loginer').html('<p class="alert alert-danger">Password must be at least 6 character</p>');

    return false;

  }else{

    $('#loginer').html('');

  }

  $.ajax({

    url: 'login.php',

    method: 'POST',

    data: {lemail:lemail, lpassword:lpassword},

    success: function(ldata){

        if(ldata == 0){

          $('#loginer').html('<p class="alert alert-danger">Please enter valid login details..</p>');

        }else{

          $('#loginer').html('');

          $('#signinbtn').html('loading..');

          setTimeout(function(){

            $('#signinbtn').html('Sign In');

              window.location.href='index.php';

          },1000)

        }

    }

  });

  

});



});
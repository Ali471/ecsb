

(function($) {
    "use strict"; // Start of use strict

    // jQuery for page scrolling feature - requires jQuery Easing plugin
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: ($($anchor.attr('href')).offset().top - 50)
        }, 1250, 'easeInOutExpo');
        event.preventDefault();
    });

    // Highlight the top nav as scrolling occurs
    $('body').scrollspy({
        target: '.navbar-fixed-top',
        offset: 51
    })

    // Closes the Responsive Menu on Menu Item Click
    $('.navbar-collapse ul li a').click(function() {
        $('.navbar-toggle:visible').click();
    });

    // Fit Text Plugin for Main Header
    $("h1").fitText(
        1.2, {
            minFontSize: '35px',
            maxFontSize: '65px'
        }
    );

    // Offset for Main Navigation
    $('#mainNav').affix({
        offset: {
            top: 100
        }
    })

    // Initialize WOW.js Scrolling Animations
    new WOW().init();
	
	
	//Check to see if the window is top if not then display button
	$(window).scroll(function(){
		if ($(this).scrollTop() > 400) {
			$('.scrollToTop').show("slow");
		} else {
			$('.scrollToTop').hide("slow");
		}
	});
	
	//Click event to scroll to top
	$('.scrollToTop').click(function(){
		$('html, body').animate({scrollTop : 0},800);
		return false;
	});
	
	//signUp popup
	$('.showsection').click(function(){
		$("#close").css("cursor","pointer");
		$("#signup").show("slow");
		$("#fname:input").focus();
		$('html, body').animate({
        scrollTop: $('#signup').offset().top -50
    },1250, 'easeInOutExpo');
		
		});
		//close popup
		$('#close').click(function(){
			$('#signup').hide("slow");
			$('html, body').animate({
        scrollTop: $('.showsection').offset().top -50
    },1250, 'easeInOutExpo');
			
			});

//signin pop

$('#lg').click(function(){
    $("#close1").css("cursor","pointer");
    $("#signin").show("slow");
    $("#email:input").focus();
    $('html, body').animate({
        scrollTop: $('#signin').offset().top -50
    },1250, 'easeInOutExpo');
    
    });
    //close popup
    $('#close1').click(function(){
      $('#signin').hide("slow");
      $('html, body').animate({
        scrollTop: $('#lg').offset().top -50
    },1250, 'easeInOutExpo');
      
      });




    
	
	            //social icon adjustment
				
				$(function() {
	
    var $sidebar   = $(".animate"), 
        $window    = $(window),
        offset     = $sidebar.offset();
        

    $window.scroll(function() {
        if ($window.scrollTop() > offset.top) {
            $sidebar.stop().animate({
                marginTop: $window.scrollTop() - offset.top +200
            });
        } else {
            $sidebar.stop().animate({
                marginTop: 0
            });
        }
    });
    });



    
//signup field validation    
    

$('#fname').blur(function()
{
  if($(this).val().length<=2)
  {
    $('.ferror').text('First Name Should be 3 or more Characters');
    $('.ferror').show('slow');
    $('.fsuccess').hide('fast');
    
    
  }
   else
  {
    $('.ferror').hide('fast');
    $('.fsuccess').text('Valid UserName')
    $('.fsuccess').show('slow');
    
    
  }

});
$('#lname').blur(function()
{
  if($(this).val().length<=2)
  {
    $('.lerror').text('Last Name Should be 3 or more Characters');
    $('.lerror').show('slow');
    $('.lsuccess').hide('fast');
   

  }
  else
  {
    $('.lerror').hide('fast');
    $('.lsuccess').text('Valid UserName');
    $('.lsuccess').show('slow');
    
}
});
$('#email').blur(function()
{
  if($(this).val().length==0)
  {
    $('.Eerror').text('Please Enter Email Address');
    $('.Eerror').show('slow');
    

  }
  else
  {
    $('.Eerror').hide('slow');
    
  }

});
$('#password').blur(function()
{
  if($(this).val().length<=6)
  {
    $('.perror').text('Password Must be More Than 6 Charcters');
    $('.perror').show('slow');
    $('.psuccess').hide('fast');
    

  }
  else
  {
    $('.perror').hide('fast');
    $('.psuccess').text('Password is ok');
    $('.psuccess').show('slow');
    
    

  }
  

});
$('#cpassword').blur(function()
{
  if($(this).val().length<=6 || $(this).val()!=$('#password').val())
  {
    $('.cperror').text('Password Missmatch');
    $('.cperror').show('slow');
     $('.cpsuccess').hide('fast');
     

  }
   else
  {
    $('.cperror').hide('fast');
    $('.cpsuccess').text('Password Matched');
    $('.cpsuccess').show('slow');
    
    

  }
});


//signup submit function

$('#newsletter-signup').submit(function(e){

 
 if($('#fname').val().length<=2||$('#lname').val().length<=2||$('#email').val().length==0||$('#password').val().length<=6||$('#cpassword').val().length<=6||$('#password').val()!=$('#cpassword').val())
{
  alert("Please fill out all fields correctly");

  e.preventDefault();
}
else
{

    //check the form is not currently submitting
    if($(this).data('formstatus') !== 'submitting'){
 




         //setup variables
         var form = $(this),
         formData = form.serialize(),
         formMethod = form.attr('method'), 
         responseMsg = $('#signup-response');
         
 
         //add status data to form
         form.data('formstatus','submitting');
 
         //show response message - waiting
                    $("#signup-spin").show('slow');
                        setTimeout(function() 
                        { 
                          $("#signup-spin").hide('slow'); 
                        }, 
                        3000);
 
         //send data to server for validation
         $.ajax({
             url: 'signup.php',
             type: formMethod,
             data: formData,
             success:function(data){
 
                //setup variables
                var responseData = jQuery.parseJSON(data), 
                    klass = '';
 
                //response conditional
                switch(responseData.status){
                    case 'error':
                        klass = 'response-error';
                    break;
                    case 'success':
                      var email=responseData.message;
                      $('#showemail').val(email);
                      $('#signup').delay(3000);
                      $('#signup').hide("slow");
                      $('#showsection').hide('fast');
                      $('#signupinfo').show('slow');
                      $('html, body').animate({
                      scrollTop: $('.showsection').offset().top -50
                      },1250, 'easeInOutExpo');
                    break;  
                }
 
                //show reponse message
                
                responseMsg.fadeOut(200,function(){

                   $(this).removeClass('response-waiting')

                          .addClass(klass)
                          .text(responseData.message)
                          .delay(3000)
                          .show('slow')
                          .fadeIn(200,function(){
                              //set timeout to hide response message
                              setTimeout(function(){
                                  responseMsg.hide(200,function(){
                                      $(this).removeClass(klass);
                                      form.data('formstatus','idle');
                                  });
                               },3000)
                           });

                });
           }
      });
    }
 
    //prevent form from submitting
    return false;
  }





     
    });




//signin using ajax

$('#lemail').blur(function()
{
  if($(this).val().length==0)
  {
    $('.lEerror').text('Please Enter Email Address');
    $('.lEerror').show('slow');
    

  }
  else
  {
    $('.lEerror').hide('slow');
    
  }

});
$('#lpassword').blur(function()
{
  if($(this).val().length<=6)
  {
    $('.lperror').text('Password Must be More Than 6 Charcters');
    $('.lperror').show('slow');
    $('.lpsuccess').hide('fast');
    

  }
  else
  {
    $('.lperror').hide('fast');
    $('.lpsuccess').text('Password is ok');
    $('.lpsuccess').show('slow');
    
    

  }
});
  





$('#newsletter-signin').submit(function(){
 
    //check the form is not currently submitting
    if($(this).data('formstatus') !== 'submitting'){
 
         //setup variables
         var form = $(this),
         formData = form.serialize(),
         formUrl = form.attr('action'),
         formMethod = form.attr('method'), 
         responseMsg = $('#signin-response');
 
         //add status data to form
         form.data('formstatus','submitting');
 
         //show response message - waiting
         $("#signin-spin").show('slow');
                        setTimeout(function() 
                        { 
                          $("#signin-spin").hide('slow'); 
                        }, 
                        3000);
 
         //send data to server for validation
         $.ajax({
             url: 'signin.php',
             type: formMethod,
             data: formData,
             success:function(data){
 
                //setup variables
                var responseData = jQuery.parseJSON(data), 
                    klass = '';
 
                //response conditional
                switch(responseData.status){
                    case 'error':
                    $("#signin-spin").show('slow');
                        setTimeout(function() 
                        { 
                          $("#signin-spin").hide('slow'); 
                        }, 
                        3000);
                        klass = 'response-error';
                    break;
                    case 'success':
                    $("#signin-spin").show('slow');
                        setTimeout(function() 
                        { 
                          $("#signin-spin").hide('slow'); 
                        }, 
                        3000);
                        klass = 'response-success';
                        $(location).attr('href', 'profile.php');
                        
                    break;  

                }
 
                //show reponse message
                responseMsg.fadeOut(200,function(){
                   $(this).text(responseData.message)
                          .fadeIn(200,function(){
                              //set timeout to hide response message
                              setTimeout(function(){
                                  responseMsg.fadeOut(200,function(){
                                    
                                      form.data('formstatus','idle');
                                  });
                               },3000)
                           });
                });
           }
      });
    }
 
    //prevent form from submitting
    return false;
     
    });


//go to signup
$('#gosign-up').click(function(){

$("#signin").hide("slow");
$("#signup").show("slow");
    
    $('html, body').animate({
        scrollTop: $('#signup').offset().top -500
    },1250, 'easeInOutExpo');
    
    
$('#close').click(function(){
      $('#signup').hide("slow");
      $('html, body').animate({
        scrollTop: $('.showsection').offset().top -50
    },1250, 'easeInOutExpo');
      
      });


});

$('#gosignup').click(function(){

$("#signin").hide("slow");
$("#signup").show("slow");
    
    $('html, body').animate({
        scrollTop: $('#signup').offset().top -100
    },1250, 'easeInOutExpo');
    
    
$('#close').click(function(){
      $('#signup').hide("slow");
      $('html, body').animate({
        scrollTop: $('.showsection').offset().top -50
    },1250, 'easeInOutExpo');
      
      });


});


//go to signin

$('#gosign-in').click(function(){

$("#signup").hide("slow");
$("#signin").show("slow");

   
    $('html, body').animate({
        scrollTop: $('#signin').offset().top -50
    },1250, 'easeInOutExpo');
    
    
$('#close').click(function(){
      $('#signin').hide("slow");
      $('html, body').animate({
        scrollTop: $('.showsection').offset().top -50
    },1250, 'easeInOutExpo');
      
      });


});

$('#gosignin').click(function(){

$("#signup").hide("slow");
$("#signin").show("slow");

   
    $('html, body').animate({
        scrollTop: $('#signin').offset().top -50
    },1250, 'easeInOutExpo');
    
    
$('#close').click(function(){
      $('#signin').hide("slow");
      $('html, body').animate({
        scrollTop: $('.showsection').offset().top -50
    },1250, 'easeInOutExpo');
      
      });


});




//Complete SignUp And redirect to profile page



 
    //check the form is not currently submitting
    
		        
            // save store



            

})(jQuery); // End of use strict

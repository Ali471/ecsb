(function($) {
    "use strict";
	
$('#cssmenu > ul > li > a').click(function() {
  $('#cssmenu li').removeClass('active');
  $(this).closest('li').addClass('active');	
  var checkElement = $(this).next();
  if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
    $(this).closest('li').removeClass('active');
    checkElement.slideUp('normal');
  }
  if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
    $('#cssmenu ul ul:visible').slideUp('normal');
    checkElement.slideDown('normal');
  }
  if($(this).closest('li').find('ul').children().length == 0) {
    return true;
  } else {
    return false;	
  }		
});



$('#cssmenu').css({
                'position': 'fixed',
                
            });

$('.viewprod').click(function(){
	
	
	$(this).attr('src','images/icon_minus.png');
	
	
	
	});









$('#store').submit(function(e){


 
 if($('#name').val().length==0||$('#footer').val().length==0)
{
  alert("Please fill out all fields correctly");

  e.preventDefault();
}

else
{
  
              


var formData = new FormData($(this)[0]);

    $.ajax({
        url: 'savestore.php',
        type: 'POST',
        data: formData,
        async: false,
        success: function (data) {

           data = jQuery.parseJSON(data)
            if(data.status=='success')
			{
				$('#newstore').hide('slow');
				location.reload();
			}
        },
        cache: false,
        contentType: false,
        processData: false
    });

    return false;

            }



});

$('#AddStore').click(function(){
	
	$('#newstore').show('slow');
	
	
	});







})(jQuery);


      function selectprod()

      {
      	
      	var id = $('#selectcategory').children(":selected").attr("id");
      	if(id!='')
      	{
      	var xmlhttp;
      if (window.XMLHttpRequest)
        {// code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
        }
      else
        {// code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
      xmlhttp.onreadystatechange=function()
        {
        if (xmlhttp.readyState==4 && xmlhttp.status==200)
          {
      		$('#brands').prop('disabled', false);
        
      		var name=xmlhttp.responseText.split('/')
      		for(var i = 0; i < name.length-1; i++)
      		{
      			
      		$("#brands").append('<option id='+id+'>'+name[i]+'</option>');
      		$('#brands option[id!='+id+']').remove();
      		}
      		
          }
        }
      xmlhttp.open("POST","viewbrand.php",true);
      xmlhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xmlhttp.send("id="+id);

      	}
      	else
      	{	$('#brands option').remove();
      		$('#brands').prop('disabled', true);
      		
      	}
      }

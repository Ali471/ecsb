        

$(document).ready(function () {

    /*====================================
           METIS MENU 
     ======================================*/

    $('#main-menu').metisMenu();

    /*======================================
    LOAD APPROPRIATE MENU BAR ON SIZE SCREEN
    ========================================*/

    $(window).bind("load resize", function () {
        if ($(this).width() < 768) {
            $('div.sidebar-collapse').addClass('collapse')
        } else {
            $('div.sidebar-collapse').removeClass('collapse')
        }
    });

    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
});
    /*======================================
   WRITE YOUR SCRIPTS BELOW
   ========================================*/
$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

     //>=, not <=
    if (scroll >= 200) {
        //clearHeader, not clearheader - caps H
        $("#NAV").addClass("navbar-fixed-top");
    }
    else
    {
     $("#NAV").removeClass("navbar-fixed-top"); 
    }
}); 


$('#newstoreform').submit(function(e){

if(('.sn').val().length<1)
{
  $(".error").text("Please Enter Name");
  e.preventDefault;
}

});









   $('#addcat').click(function(){
    $('#newcat').show('slow');

});



   $('#closecat').click(function()
   {
    $('#newcat').hide('slow');

   });

   $('#addbrand').click(function(){
    $('.newbrand').show('slow');

});



   $('#closebrand').click(function()
   {
    $('.newbrand').hide('slow');

   });

 $('#newstore').click(function(){
    $('#store').show('slow');

  });

 $('#closestore').click(function()
   {
    $('#store').hide('slow');

   });

 $('#showprod').click(function(){

  $('#prod').show('slow');
  $(this).removeClass('fa-plus');
  $(this).addClass('fa-minus-square-o');
  $(this).attr('id','hideprod');


 });

 $('#hideprod').on('click','',function(){

  $('#prod').hide('slow');
  $(this).addClass('fa-plus');
  $(this).removeClass('fa-minus-square');
  $(this).attr('id','showprod');


 });





$('#newcategory').submit(function(e){


 
 if($('#name').val().length==0||$('#description').val().length==0)
{
  alert("Please fill out all fields correctly");

  e.preventDefault();
}

});

$('#newbrand').submit(function(e){


 
 if($('#pname').val().length==0||$('#pdescription').val().length==0)
{
  alert("Please fill out all fields correctly");

  e.preventDefault();
}

});

$('#delprod').click(function(){

  var chkArray = [];

$(".pchk:checked").each(function() {
    chkArray.push($(this).attr('id'));
  });
  
  
  
  var selected;
  
  
  
  if(chkArray.length > 0){

    
  

     $.ajax({
        
       type: "GET",
       url: "delprod.php?abc="+chkArray,
       data:chkArray,
        async: false,
        success: function (data) {

           alert(data);
           setTimeout(function(){
          window.location.reload();
         }, 100);
        },
           
        
        cache: false,
        contentType: false,
        processData: false
    });

    return false;

            }

   


  else{
    alert("Please at least one of the checkbox"); 
  }




});



$('#delcat').click(function(){

  var chkArray = [];

$(".chk:checked").each(function() {
    chkArray.push($(this).attr('id'));
  });
  
  
  
  var selected;
  
  
  
  if(chkArray.length > 0){

    
  

     $.ajax({
        
       type: "GET",
       url: "delcat.php?abc="+chkArray,
       data:chkArray,
        async: false,
        success: function (data) {

           alert(data);
           setTimeout(function(){
          window.location.reload();
         }, 100);
        },
           
        
        cache: false,
        contentType: false,
        processData: false
    });

    return false;

            }

   


  else{
    alert("Please at least one of the checkbox"); 
  }




});


$('#delbrand').click(function(){

  var chkArray = [];

$(".bchk:checked").each(function() {
    chkArray.push($(this).attr('id'));
  });
  
  
  
  var selected;
  
  
  
  if(chkArray.length > 0){

    
  

     $.ajax({
        
       type: "GET",
       url: "delbrand.php?abc="+chkArray,
       data:chkArray,
        async: false,
        success: function (data) {

           alert(data);
           setTimeout(function(){
          window.location.reload();
         }, 100);
        },
           
        
        cache: false,
        contentType: false,
        processData: false
    });

    return false;

            }

   


  else{
    alert("Please at least one of the checkbox"); 
  }




});


$('#chkall').change(function(){
    if($(this).prop('checked')){
        $('tbody tr td input[type="checkbox"]').each(function(){
            $(this).prop('checked', true);
        });
    }else{
        $('tbody tr td input[type="checkbox"]').each(function(){
            $(this).prop('checked', false);
        });
    }
});



    //Set default open/close settings
    var divs=$('.acc_container').hide(); //Hide/close all containers

    var h2s=$('.acc_plus').click(function () {
        h2s.not(this).removeClass('active')
        $(this).toggleClass('active')
        divs.not($(this).next()).slideUp()
        $(this).next().slideToggle()
        return false; //Prevent the browser jump to the link anchor

    });


        $('.editcat').click(function(){

        var id=$(this).attr('id');
        $("#editcat").fadeIn('slow');

        $.ajax({
                
               type: "GET",
               url: "editcatshow.php?id="+id,
                async: false,
                success: function (data) {
                  
                  var data = jQuery.parseJSON(data);
                    $("#epdes").val(data.descr);
                    $("#epname").val(data.name);
                    $("#epid").val(data.id);
                   $( "#epname" ).focus();
                   
                },
                   
                
                cache: false,
                contentType: false,
                processData: false
            });

            return false;

                    




        });



      $("#eclose").click(function(){

      $("#editcat").fadeOut('slow');


      });



                $('.ebrand').click(function(){




                var id=$(this).attr('id');
                $("#editbrand").fadeIn('slow');

                $.ajax({
                        
                       type: "GET",
                       url: "editbrandshow.php?id="+id,
                        async: false,
                        success: function (data) {
                          
                          var data = jQuery.parseJSON(data);
                            $("#ebdes").val(data.descr);
                            $("#ebname").val(data.name);
                            $("#hidden").val(data.id);
                            $("select.pcat").find('option[value='+data.category+']').prop('selected', true); 
                           $( "#ebname" ).focus();
                           
                        },
                           
                        
                        cache: false,
                        contentType: false,
                        processData: false
                    });


                      $('html, body').animate({
                        scrollTop: $("#editbrand").offset().top 
                    }, 1250,'easeInOutExpo');

                        return false;

                });


            $("#bclose").click(function(e){

            $("#editbrand").fadeOut('slow');
            e.preventDefault();

            });
 
         $("#updatebrand").click(function(e){

          var upcat='';

          var id = $('#upcat').children(":selected").attr("id");
            if(id!='')
            {
              var upcat = $("#upcat").val();
            }

           var ebname = $("#ebname").val();
           var ebdes = $("#ebdes").val();

            if( ebname.length<1 || upcat.length==0 || ebdes.length<1 )

              {
                alert("Please Enter Correct Value .!!");
                e.preventDefault();
              }

              else
              {

                var formData = $("#ubrand").serialize();

                
                $.ajax({

                     url: 'updatebrand.php',
                     type: 'POST',
                     data: formData,
                     success:function(data){

                        data=jQuery.parseJSON(data);
                       if(data.response=="Success")
                       {
                        alert("Record Updated Successfully") ; 
                        $("#editbrand").hide('slow');
                        location.reload();
                       }
                       else

                       {
                        alert("error");
                       }

                     }


                
                   });

              }


          
         });  


        $("#updatecat").click(function(e){

  

 

   var epname = $("#epname").val();
   var epdes = $("#epdes").val();

    if( epname.length<1 ||  epdes.length<1 )

      {
        alert("Please Enter Correct Value .!!");
        e.preventDefault();
      }

      else
      {

        var formData = $("#ucategory").serialize();

        
        $.ajax({

             url: 'updatecategory.php',
             type: 'POST',
             data: formData,
             success:function(data){

                data=jQuery.parseJSON(data);
               if(data.response=="Success")
               {
                alert("Record Updated Successfully") ; 
                $("#editbrand").hide('slow');
                location.reload();
               }
               else

               {
                alert("error");
               }

             }


        
           });

      }


  
 });  

$(".eproduct").click(function(e){

$("#editproduct").fadeIn("slow");

        $('html, body').animate({
                                    scrollTop: $("#editproduct").offset().top -200
                                }, 1000,'easeInOutExpo');

           var id=$(this).attr('id');

           $.ajax({
                        
                       type: "GET",
                       url: "editprodshow.php?id="+id,
                        async: false,
                        success: function (data) {
                          
                          var data = jQuery.parseJSON(data);
                          
                            
                          //  $("select.pcat").find('option[value='+data.category+']').prop('selected', true); 
                          // $( "#ebname" ).focus();
                           
                        },
                           
                        
                        cache: false,
                        contentType: false,
                        processData: false
                    });
          





});

$("#pclose").click(function(){

$("#editproduct").fadeOut("slow");
$('html, body').animate({
                        scrollTop: $(".panel-body").offset().top -100
                    }, 1000,'easeInOutExpo');
e.preventDefault();


});

});


        //javascript 


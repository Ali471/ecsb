/*=============================================================
    Authour URL: www.designbootstrap.com
    
    http://www.designbootstrap.com/

    License: MIT

    http://opensource.org/licenses/MIT

    100% Free To use For Personal And Commercial Use.

    IN EXCHANGE JUST TELL PEOPLE ABOUT THIS WEBSITE
   
========================================================  */
$(document).ready(function () {
    setProductCounterToCart();
    cartTotal();
    /*====================================
          SUBSCRIPTION   SCRIPTS 
    ======================================*/

    // SCROLL SCRIPTS 
    $('.scroll-me a').bind('click', function (event) { //just pass scroll-me class and start scrolling
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1000, 'easeInOutQuad');
        event.preventDefault();
    });

    $(".showcart").click(function(){

        $("#cartitems").show("slow");


    });







    $('[data-toggle="tooltip"]').tooltip()

    $(".continueshopping").click(function(){

         $("#cartitems").fadeOut("slow");
         $('html, body').stop().animate({
            scrollTop: $("#product").offset().top -500
        }, 1000, 'easeInOutQuad');
        event.preventDefault();

    });

    $(".addtocart").click(function(){

        var pid= $(this).attr('id');
        var img= $(this).parent().parent().parent().find('img').attr('src');
        var pname=$(this).parent().parent().parent().find('.pname').html();
        var des=$(this).parent().parent().parent().find('.desc').html();
        var price=$(this).parent().parent().parent().find('.price').html().replace("Rs:","");        
        
        addToCart(pid,img,pname,des,price,1);


    });

    $(".viewdetails").click(function(){

        $("#features").show('slow');

         var pid= $(this).attr('id');
        var img= $(this).parent().parent().find('img').attr('src');
        var pname=$(this).parent().parent().find('.pname').html();
        var des=$(this).parent().parent().find('.fulldesc').val();
        var brand=$(this).parent().parent().find('.brand').val();
        var price=$(this).parent().parent().find('.price').html();    

        $("#dimg").attr("src",img);
        $("#dname").html(pname)
        $("#ddesc").html(des);
        $("#pprice").html(price);
        $("#bbrand").html(brand);
        $(".hiddenpid").val(pid);

        $('html, body').stop().animate({
            scrollTop: $("#features").offset().top
        }, 1000, 'easeInOutQuad');

    });

    $(".add2cart").click(function(){
        $("#features").hide('slow');
        var pid = $(".hiddenpid").val();
        var img= $('#dimg').attr('src');
        var pname=$('#ddesc').html();
        var des=$('#ddesc').html();
        var price=$("#pprice").html().replace("Rs:","");
         var quantity=$('#cartQuantity').val();

         addToCart(pid,img,pname,des,price,quantity);
    });

   });

function removeProductFromCart(obj,id)
{
    
      $.ajax({
                url:'session.php',
                type:'post',
                data:{id:id,mode:'remove'},
                success:function(data)
                {
                   // alert(data);
                }

    });
      $(obj).parent().parent().remove();


if($("#tblCart tbody tr").length == 0)
{
 var html = '<tr>';
    html+='    <td colspan="6"> <h2 class="head-line"><i class="ion-sad"></i>  No item in your cart</h2>';
    html+='    </td>';
    html+='    </tr>';

    $("#tblCart tbody").append(html);
}
      setProductCounterToCart();
      cartTotal()
}

function setProductCounterToCart()
{
    if($("#tblCart tbody tr:first").html().indexOf("in your cart") > -1)
    {
        $('.notify').html('0');
    }
    else
        $('.notify').html($("#tblCart tbody tr").length);
}

function cartTotal()
{
 var subTotal = 0;
    var price=$("#tblCart tbody tr").each(function(){
      subTotal += parseInt($(this).find("td:eq(4)").html());
    });
    var tax =parseInt(subTotal * (17/100));

    var total = subTotal + tax;

    $(".stotal").html(subTotal);
    $(".tax").html(tax);
    $(".total").html(total);
}

function changeQuantity(obj)
{
    var quantity=$(obj).val();
    //alert(quantity);
    var subTotal=$(obj).parent().prev().html();
    subTotal*=quantity;
    $(obj).parent().next().html(subTotal);

    cartTotal();
}

function addToCart(pid,img,pname,des,price,quantity)

{
    $("#features").hide('slow');
            $.ajax({

            url:'session.php',
            type:'post',
            data:{id:pid,mode:'set'},
            success:function(data)
            {
               // alert(data);
            }
});
            if($("#tblCart tbody tr:first").html().indexOf("in your cart") > -1)
            {
                $("#tblCart tbody tr:first").remove();
            }
            var html = '<td><img src='+img+' class="img-circle" height="50px"></td>';
             html += '<td class="padd">'+pname+'</td>';
              html += '<td class="text-center padd">'+price+'</td>';
              html += '<td width="100px" class="padd"><input type="text" class="form-control" value='+quantity+'></td>';
                html +='   <td class="text-center padd" >'+price+'</td>';
                 html +='   <td class="padd"><i class="ion-close-round" data-toggle="tooltip" data-placement="top" title="Remove From Cart" onclick="removeProductFromCart(this,'+pid+')" style="cursor: pointer;"></i></td>';

                 $("#tblCart tbody").append('<tr>' + html + '</tr>');


        setProductCounterToCart();
        cartTotal();

        $('html, body').stop().animate({
            scrollTop: $("body").offset().top
        }, 1000, 'easeInOutQuad');
}




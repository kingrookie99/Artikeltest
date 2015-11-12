$(document).ready(function(){
    
    accountMenu();
    $(window).resize(function(){
        accountMenu();
    });
    
	$('.panel-group .in').siblings('.panel-heading').children('h4').children('a').addClass('linkIn');
	$('.receiverWishWrap .panel-group a').click(function(){
		$('.receiverWishWrap .panel-group a').removeClass('linkIn');
		setTimeout(function(){
			$('.receiverWishWrap .panel-group .in').siblings('.panel-heading').children('h4').children('a').addClass('linkIn');
		}, 500);
	});
    $('.ownWishWrap .panel-group a').click(function(){
		$('.ownWishWrap .panel-group a').removeClass('linkIn');
		setTimeout(function(){
			$('.ownWishWrap .panel-group .in').siblings('.panel-heading').children('h4').children('a').addClass('linkIn');
		}, 500);
	});
    
    var path = $('.hiddenPath').text();
    $('.button').each(function(){
        $(this).find('button').removeClass('active');
        $(this).removeClass('active');
       var buttonText = $(this).find('button').text(); 
        if (buttonText == path) {
            $(this).find('button').addClass('active');
            $(this).addClass('active');
        }
    });
    
        //callback handler for form submit
    $("#ajaxform").submit(function(e)
    {
       // var title = $('input[name="title"]').val();
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax(
        {
            url : formURL,
            type: "POST",
            data : postData,
            success:function(data, textStatus, jqXHR) 
            {
                $('.saved').slideDown();
                setTimeout(function(){
                    $('.saved').slideUp();
                    location.reload();
                },2500);
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
                //if fails      
            }
        });
        e.preventDefault(); //STOP default action
        e.unbind(); //unbind. to stop multiple form submit.
    });
    
    $("#ajaxform2").submit(function(e)
    {
       // var title = $('input[name="title"]').val();
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax(
        {
            url : formURL,
            type: "POST",
            data : postData,
            success:function(data, textStatus, jqXHR) 
            {
                $('.cleared').slideDown();
                setTimeout(function(){
                    $('.cleared').slideUp();
                    location.reload();
                },2500);
                
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
                //if fails      
            }
        });
        e.preventDefault(); //STOP default action
        e.unbind(); //unbind. to stop multiple form submit.
    });
    
    
    if($('.noWishVal').val() == 1) {
        $('.checkWish').attr('checked','checked');
    }
    else if($('.noWishVal').text() == 0) {
        $('.checkWish').removeAttr('checked');
    }
    $("#check").submit(function(e)
    {
       // var title = $('input[name="title"]').val();
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        //alert(formURL);
        $.ajax(
        {
            url : formURL,
            type: "POST",
            data : postData,
            success:function(data, textStatus, jqXHR) 
            {
                $('.checked').slideDown();
                setTimeout(function(){
                    $('.checked').slideUp();
                    location.reload();
                    
                },2500);
                
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
                //if fails      
            }
        });
        e.preventDefault(); //STOP default action
        e.unbind(); //unbind. to stop multiple form submit.
    });

    $("#ajaxRandom").submit(function(e)
    {
       // var title = $('input[name="title"]').val();
        var postData = $(this).serializeArray();
        var formURL = $(this).attr("action");
        $.ajax(
        {
            url : formURL,
            type: "POST",
            data : postData,
            success:function(data, textStatus, jqXHR) 
            {
                $('.generated').slideDown();
                setTimeout(function(){
                    $('.generated').slideUp();
                    location.reload();
                },2500);
                
            },
            error: function(jqXHR, textStatus, errorThrown) 
            {
                //if fails      
            }
        });
        e.preventDefault(); //STOP default action
        e.unbind(); //unbind. to stop multiple form submit.
    });
    
    //$("#ajaxform").submit(); //Submit  the FORM
   
});

function accountMenu() {
    if($(window).width() < 768) {
        
//        $('.mobileOpener').show()
//        $('.loginWindow').css('right','-250px');
        
        $('.mobileCloser').removeAttr('style');
        $('.mobileOpener').removeAttr('style');
        $('.loginWindow').removeAttr('style');
        
        $('.mobileOpener').click(function(){
            $('.mobileCloser').show();
            $('.mobileOpener').hide();
            $('.loginWindow').animate({
                right: "0px"
              }, 100, function() {
                    
              });
       });
        $('.mobileCloser').click(function(){
            $('.mobileOpener').show();
             $('.mobileCloser').hide();
            $('.loginWindow').animate({
                right: "-250px"
              }, 100, function() {
                   
              });
       });
    }
    else {
        $('.mobileCloser').removeAttr('style');
        $('.mobileOpener').removeAttr('style');
        $('.loginWindow').removeAttr('style');
    }
}
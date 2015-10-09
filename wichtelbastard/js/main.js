$(document).ready(function(){
    
    accountMenu();
    $(window).resize(function(){
        accountMenu();
    });
   
});

function accountMenu() {
    if($(window).width() < 768) {
        
//        $('.mobileOpener').show()
//        $('.loginWindow').css('right','-250px');
        
        $('.mobileCloser').removeAttr('style');
        $('.mobileOpener').removeAttr('style');
        $('.loginWindow').removeAttr('style');
        
        $('.mobileOpener').click(function(){
            $('.mobileOpener').hide();
            $('.mobileCloser').show();
            $('.loginWindow').animate({
                right: "0px"
              }, 500, function() {
                    
              });
       });
        $('.mobileCloser').click(function(){
             $('.mobileCloser').hide();
            $('.mobileOpener').show();
            $('.loginWindow').animate({
                right: "-250px"
              }, 500, function() {
                   
              });
       });
    }
    else {
        $('.mobileCloser').hide();
        $('.mobileOpener').hide();
        $('.loginWindow').css('right','0px');
    }
}
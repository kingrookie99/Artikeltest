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
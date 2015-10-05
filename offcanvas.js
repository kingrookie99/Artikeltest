$(document).ready(function () {
  
    $('[data-toggle="offcanvas"]').click(function () {
        $('.row-offcanvas').toggleClass('active')
    });
    
    $('#preloading').fadeOut(500, function() {
      $('.container.start, .container.detail').fadeIn();
        $('.blocks').css('visibility','visible');
    });	
    
    $(window).scroll(function(){
        var marginTop = $('body').scrollTop();
        if (marginTop > 100) {
            $('.toTop').fadeIn();
        }
        else {
            $('.toTop').fadeOut();
        }
    });
    
    
    $('.toTop').click(function(){
        $('body').animate({
            scrollTop:0
        }, 500);
    });
    
    $('.opener .openIt').click(function(){
       $('.section-footer').animate({
           bottom:"0px"
       },500,function(){
           $('.openIt').css('display','none');
           $('.closeIt').css('display','block');
       }); 
    });
    $('.opener .closeIt').click(function(){
       $('.section-footer').animate({
           bottom:"-90px"
       },500,function(){
           $('.openIt').css('display','block');
           $('.closeIt').css('display','none');
       }); 
    });
    
    
    
    /*
     $('.teaser').each(function(e){
        // console.log(isScrolledIntoView($(this)));
        if(isScrolledIntoView($(this)) !== true){
            //Nottich
             $(this).addClass('hidden'); 
        }
         else{
             

         }
    });

    $(document).on('scroll', function(){
        $('.hidden').each(function(){
            if(isScrolledIntoView($(this))){
                $(this).addClass('contentOn');
                $(this).removeClass('hidden').css({ 'display' : 'none' }).fadeIn();
            }
        });
    });
*/
    
});

function isScrolledIntoView(elem)
{
    var docViewTop = $(window).scrollTop();
    
    var docViewBottom = docViewTop + $(window).height();

    var elemTop = $(elem).offset().top;
    var elemBottom = elemTop + $(elem).height();
    //console.log(elem.attr('class') + ': '+docViewTop +': '+docViewBottom +': '+elemTop +': '+elemBottom +' ');
    return((elemBottom <= docViewBottom) && (elemTop >= docViewTop));
}

jQuery(document).ready(function($) {

    // if(navigator.userAgent.match(/Trident\/7\./)) {
    //     $('body').on("scroll", function (event) {
    //         event.preventDefault();
    //         var wd = event.wheelDelta;
    //         var csp = window.pageYOffset;
    //         window.scrollTo(0, csp - wd);
    //     });
    // }

   //
   //Contacts chekbox
   //
   $('label').change(function(){
    $(this).find('.checkbox_inner').toggleClass('checked');
  });

//
//   Form validation
//
    $("#form").validate({
        errorPlacement: function(){
            return false;  // suppresses error message text
        },
        errorClass: 'error-validation-class'
    });  
    $.validator.addClassRules({
        required: {
            required: true
        },
        requiredemail: {
            required: true,
            email: true
        },
        mintwo: {
            required: true,
            minlength: 2
        },
        integerval: {
            digits: true
        },
        mintnine: {
            required: true,
            minlength: 9
        }
    });    

//
//Checkbox border color
//
$( "#submit_btn" ).click(function() {
    let myInput = document.querySelector('#gdpr').checked;

    if(myInput == !true){
        $('.checkbox').css({'border-color': 'red'});
    }else{
        $('.checkbox').css({'border-color': '#b7b7b7'});
     }

}); 

$('#gdpr').change(function(){
    let myInput = document.querySelector('#gdpr').checked;

    if(myInput == true){
        $('.checkbox').css({'border-color': '#b7b7b7'});
    }else{
        $('.checkbox').css({'border-color': 'red'});
     }
});

    
    //
    //Send form function
    //
    $(document).on('submit', '#form', function(e){
  
        e.preventDefault();
        $('.loader').toggleClass("display-none");
        var formData = new FormData(this);
        formData.append('action', 'send_contact_form_message');
        
        
        
        $.ajax({
            url: variables.ajax_url,
            data: formData,
            processData: false,
            contentType: false,
            type: 'POST',
            success: function (data) {
               
                if(data == 'error'){
                    $('.loader').toggleClass("display-none");
                    $('.error-mess').toggleClass("display-none");
                    setTimeout(function()  {$('.error-mess').toggleClass("display-none"); }, 3000);

                }else{
               
                    $('.loader').toggleClass("display-none");
                    $('.post-send-mess').toggleClass("display-none");
                    setTimeout(function()  {$('.post-send-mess').toggleClass("display-none"); }, 3000);

                    var inputValue = document.querySelectorAll('input');
                    for(var i = 0; i < inputValue.length; i++){
                        inputValue[i].value = '';
                    }
                    document.querySelector('#inquiry').value = '';
                    $('.checkbox_inner').toggleClass('checked');
                    $('input:checkbox').removeAttr('checked');
                }
            }
      });
    });
//
//Navigation hidden on scroll
//
    var prev = 0;
    var $window = $(window);
    var nav = $('.nav-bar');
    
    $window.on('scroll', function(){
      var scrollTop = $window.scrollTop();
      nav.toggleClass('hidden', scrollTop > prev);
      prev = scrollTop;
    });
//
// Hamburger button $ mobile navigation
//
    $("#menu-toggle").click(function () {

        $(this).toggleClass("open");
        $('.mobile-menu').toggleClass("menu_hidden");
        $('body').toggleClass("noscroll");
        $('main').toggleClass("blur");
        
      });

      
    $('.menu-item').click(function () {

        var pageWidth = $(window).width();
        if( pageWidth <= 1000){

            $("#menu-toggle").toggleClass("open");
            $('.mobile-menu').toggleClass("menu_hidden");
            $('body').toggleClass("noscroll");
            $('main').toggleClass("blur");

        }
    });

//
// Slick carousel
//
      $('.carousel').slick({
          
        "slidesToShow": 3,
        prevArrow: $('.prev'),
        nextArrow: $('.next'),
        responsive: [
            {
                breakpoint: 1101,
                  settings: {
                    "slidesToShow": 2,
                  }
            },
            {
                breakpoint: 626,
                  settings: {
                    "slidesToShow": 1,
                  }
            }
        ]

      });
 
});





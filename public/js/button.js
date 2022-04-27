$(document).ready(function() {
     $('.form').prop('disabled', true);
     $('input[type="text"]').keyup(function() {
        if($(this).val() != '') {
           $('.s').prop('disabled', false);
        }

       
     });
      $('.form').prop('disabled', true);
     $('input[type="email"]').keyup(function() {
        if($(this).val() != '') {
           $('.s').prop('disabled', false);
        }

       
     });
      $('.form').prop('disabled', true);
     $('input[type="password"]').keyup(function() {
        if($(this).val() != '') {
           $('.s').prop('disabled', false);
        }

       
     });


  
        $(function() {
        // Multiple images preview with JavaScript
        var multiImgPreview = function(input, imgPreviewPlaceholder) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img>')).attr('src', event.target.result).appendTo(imgPreviewPlaceholder);
                     
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#images').on('change', function() {
            multiImgPreview(this, 'div.imgPreview');
        });
        });    
   


 $('.input_checkbox').click(function(){

      let checked=$(this).children('.check_btn').is(':checked')

     if(checked==true)
     { 
     
       $(this).css('border','0.2px solid #002f34')
      $(this).children('.check_btn').prop('checked',false)
     }else{

       $(this).children('.check_btn').prop('checked',true)
       // $(this).children('.ok').append(<i class="fas fa-check"></i>);
       $(this).css('border','2px solid #580631')
       $(this).siblings('.input_checkbox').children('.check_btn').prop('checked',false)
       $(this).siblings('.input_checkbox').css('border','0.2px solid #002F34')
     }
  });

 $('.input_checkbox2').click(function(){

      let checked=$(this).children('.check_btn2').is(':checked')

     if(checked==true)
     { 
     
       $(this).css('border','0.2px solid #002f34')
      $(this).children('.check_btn2').prop('checked',false)
     }else{

       $(this).children('.check_btn2').prop('checked',true)
       $(this).css('border','2px solid #580631')
       $(this).siblings('.input_checkbox2').children('.check_btn2').prop('checked',false)
       $(this).siblings('.input_checkbox2').css('border','0.2px solid #002F34')
     }
  });


 
     
 });



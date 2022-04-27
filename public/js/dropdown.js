jQuery(document).ready(function ()
{
    //sort product by subcategory

    $('.subcategory').on('change',function()
    {
       let value = $(this).val();
     
       $('#product_sub_category').val(value);
       $('#sub_form').submit();
       
                      
     });
    $('.days').on('change',function()
    {
       let value = $(this).val();
     
       $('#product_days').val(value);
       $('#day_form').submit();
       
                      
     });


   //sort orders by subcategory

    $('#sub_category2').on('change',function()
    {
       let value = $(this).val();
     
       $('#product_sub_category2').val(value);
       $('#sub_form2').submit();
       
                      
     });
    $('.days2').on('change',function()
    {
       let value = $(this).val();
     
       $('#product_days2').val(value);
       $('#day_form2').submit();
       
                      
     });

    
});
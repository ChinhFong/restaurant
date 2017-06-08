$(document).ready(function() {
  $('.btn-style').on('click',function(){
    $('.btn_value').val($(this).val());
    $('.create-form').submit();
  });
});

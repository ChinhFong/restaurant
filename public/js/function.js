var istoggle=0;
var d_info = $('#d_amount').val();
var r_info = $('#r_amount').val();
//check function
function toggleSlide(toggle_show,qty){ // check slide in and  out of qty field
  if(istoggle==1){
    toggle_show.toggle("slide");
  }
  else if(istoggle>=2){
    return;
  }
  else{
    toggle_show.toggle("slide");
    qty.val(1);
  }
}
function checkToggle(checkElement){
  if(checkElement.val()>0){
    istoggle++;
  }else{
    istoggle=0;
  }
}
function enableButton(val,btn){
  if(val>0){
    btn.prop('disabled',false)
  }
  else{
    btn.prop('disabled',true);
  }
}
function defaultSelectOpt(select,val){
  select.val(val);
}

//event
$(document).ready(function(){
  //datatable
  $('.dataTable').DataTable({
    // "order":[[0,'desc']],
    "scrollY": 300,
    "scrollX": true,
  });
  //qty of product
  $('.toggle_left').hide();
  //window load disabled some button
  $('.add-order').prop('disabled',true);
  $('.update-order').prop('disabled',true);
  //when select product change
  $('.select_opt').on('change',function(){
    checkToggle($(this));
    toggleSlide($('.toggle_left'),$('#qty'));
    enableButton($(this).val(),$('.add-order'));
  });
  //when select product in modal when click edit change
  $('.select_opt_edit').on('change',function(){
    enableButton($(this).val(),$('.update-order'));
  });
  //after click cancel in modal edit reset value to 0
  $('.cancel').on('click',function(){
    defaultSelectOpt($('.select_opt_edit'),0);
  });
  //dobule click on datatable in order to edit qty
  $('.dataTable tbody').on('dblclick', 'tr', function () {
        var data = $('.dataTable').DataTable().row( this ).data();
        $('.update_order_qty')[data[0]-1].click();
    } );

  //hide error checkout when form load
  $('.error').hide();

  // after tab from cash receive
  $('.creceive').focusout(function(){
    if($('#doll').is(':checked')){
      cash_receive = parseFloat($(this).val());
      if(cash_receive>d_info){
        return_dollar = cash_receive - d_info;
        e_rate = $('#e_rate').val();
        $('#return_dollar').val($('#return_dollar').val()+return_dollar);
        $('#return_riel').val($('#return_riel').val()+(return_dollar*e_rate).toLocaleString());
        $('.btn_pay').prop('disabled',false);
      }
      else{
        $(this).select();
        $('.error').fadeIn('slow');
      }
    }
    else{

    }
  });
  //close error of check out
  $('.close_error').on('click',function(){$('.error').fadeOut('slow');});
  //cancel checkout
  $('.cancel_checkout').on('click',function(){
    $('.error').hide();
    $('.creceive').val('');
    $('#return_dollar').val('Dollar: $');
    $('#return_riel').val('Riels: ');
    $('.btn_pay').val();
  });
  // $('.btn_pay').on('click',function(){
  //
  // });
});

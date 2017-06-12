var istoggle=0;

//check function
function toggleSlide(toggle_show,qty){
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
  $('.dataTable').DataTable({
    // "order":[[0,'desc']],
    "scrollY": 300,
    "scrollX": true,
  });
  $('.toggle_left').hide();
  $('.add-order').prop('disabled',true);
  $('.update-order').prop('disabled',true);
  $('.select_opt').on('change',function(){
    checkToggle($(this));
    toggleSlide($('.toggle_left'),$('#qty'));
    enableButton($(this).val(),$('.add-order'));
  });
  $('.select_opt_edit').on('change',function(){
    enableButton($(this).val(),$('.update-order'));
  });
  $('.cancel').on('click',function(){
    defaultSelectOpt($('.select_opt_edit'),0);
  });
  $('.dataTable tbody').on('dblclick', 'tr', function () {
        var data = $('.dataTable').DataTable().row( this ).data();
        $('.update_order_qty')[data[0]-1].click();
    } );
});

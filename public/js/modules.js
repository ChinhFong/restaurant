$(document).ready(function(){
  //function
  function autoFill(val,fill ){
    fill.val(val+'.index');
  }
  // fill = $('#url');

  //event
  $('#name').focusout(function(){
    // console.log($(this).val());
    autoFill($(this).val().toLowerCase(),$('#url'));
    autoFill($(this).val().toLowerCase(),$('#url_def'));
  });
});

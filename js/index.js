$(document).ready(function(){
  $('#add-item').click(function(){
    var clickBtnValue = $(this).val();
    var ajaxurl = '../php/add-item.php',
        data =  {'action': clickBtnValue};
    $.post(ajaxurl, data, function (response) {
      // Response div goes here.
      alert("action performed successfully");
    });
  });

});
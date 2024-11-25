// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});


$(function(){

  /* suppose you are trying to disable sunday(0 index),and saturday(6 index) */
  
  $('appointment').datepicker({
      daysOfWeekDisabled: [0,6]
  });
  
  });

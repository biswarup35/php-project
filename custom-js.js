$(document).ready(function(){
    $('.sidenav').sidenav();
  });

  $(document).ready(function(){
    $('.select-location').formSelect();
  });

  $(document).ready(function(){
    $('.select-stream').formSelect();
  });
  $(document).ready(function(){
    $('.location').formSelect();
  });
  $(document).ready(function(){
    $('.subject').formSelect();
  });

  document.addEventListener('DOMContentLoaded', function() {
    var elems = document.querySelectorAll('.tooltipped');
    var instances = M.Tooltip.init(elems);
  });


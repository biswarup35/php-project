$(document).ready(function(){
    $('.sidenav').sidenav();
    $('.select-location').formSelect();
    $('.select-stream').formSelect();
    $('.location').formSelect();
    $('.tooltipped').tooltip();
    $('.subject').formSelect();
  });

  // $(document).ready(function(){
  //   $('.select-location').formSelect();
  // });

  // $(document).ready(function(){
  //   $('.select-stream').formSelect();
  // });
  // $(document).ready(function(){
  //   $('.location').formSelect();
  // });
  // $(document).ready(function(){
  //   $('.subject').formSelect();
  // });
  // $(document).ready(function(){
  //   $('.tooltipped').tooltip();
  // });
 const parallax = document.getElementById("parallax");
 window.addEventListener("scroll", function(){
 let offset = this.window.pageYOffset;
 parallax.style.backgroundPositionY = offset * 0.7 + "px";
 });
 

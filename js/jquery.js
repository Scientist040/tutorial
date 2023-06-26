
$(document).ready(function(){
  $("#date").html(new Date().getFullYear());
  
  $(".vlbtn, .cvolunteer").click(function(){
  $(".volunteer").slideToggle('slow');
  });
  
  //logindiv
//   $(".user").click(function(){
//   $(".logindiv").slideToggle('slow');
//   })
  $(".user").hover(function(){
     $(".logindiv").slideToggle('slow');
     })
  //lesson nav
  $("#ml").click(function(){
  $("#nav").slideToggle('slow');
  })
  
  //open concenpt.
  $(".copbtn").click(function(){
  $("#cop").slideToggle('slow');
  });
  // open javascript
  $(".jsbtn").click(function(){
  $("#jp").slideToggle('slow');
  });
  // render nav
  let roqs = "nav.html";
  $.get(roqs, function(msg) {
  $("#altnav").html(msg);
  });
 
  // render remain footer
  
  let roqss = "footer.html";
  $.get(roqss, function(msg) {
  $("#remfooter").html(msg);
  });
  
 $('.link').click(function() {
         
         let rqs = "a-b-c/" + $(this).attr('href')
         $.get(rqs, function(msg) {
              $("#viewpoint").html(msg);
         });
         return false; // don't follow the link!
         $("#nav").slideToggle('slow', () =>{
         $("#ml").toggleClass("rot");
          })
    });
});
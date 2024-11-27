
    function success(data){
     var bgColor = "#388e3c";
     var icon = ["fas","fa-check"]; 
     snackbar(data,bgColor,icon);
   };
   function info(data){ 
     var bgColor = "#52A7CB"; 
     var icon = ["fas","fa-info-circle"];
     snackbar(data,bgColor,icon);
   };
    function warning(data){
      var bgColor = "#FCAB33"; 
      var icon = ["fas","fa-exclamation-triangle"];
       snackbar(data,bgColor,icon);
     };
     function error(data){ 
       var bgColor = "#D56855"; 
       var icon = ["far","fa-times-circle"]; 
       snackbar(data,bgColor,icon);
     };

    // main function 

    function snackbar(data,bgColor,icon) {
  var x = document.getElementById("snackbar");
  x.className = "show";
  x.style.backgroundColor = bgColor;
    
    document.getElementById("icon").classList.add(icon[0],icon[1]);



  document.getElementsByClassName("snackbar")[0].innerHTML = data;
  setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
   
}

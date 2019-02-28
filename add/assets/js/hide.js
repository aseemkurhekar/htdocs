jQuery(document).ready(function(){
  $("form").submit(function(){
     if ( $("#myDIV").css("visibility") == 'hidden')
        $("#myDIV").css("visibility",'visible');
      else
      {
        $('#asd').css("visibility",'hidden');
        $('#asd').css("color",'red');
          alert("hi");
      }
    });
});
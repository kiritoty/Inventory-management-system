window.onload = function() {
    var files = document.querySelectorAll("input[type=file]");
    files[0].addEventListener("change", function(e) {
        if(this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) { document.getElementById("preview").setAttribute("src", e.target.result); }
            reader.readAsDataURL(this.files[0]);
        }
    });
}
/*Thanks to Rossiter of www.cse.ust.hk for original script*/

 $('.dropdown-menu a').click(function(){
    $('#selected').text($(this).text());
  });
  


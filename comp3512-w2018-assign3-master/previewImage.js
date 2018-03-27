 this.imagePreview = function() {
    var xOffset= 10;
    var yOffset = 30;
    var inputs = document.querySelectorAll("a.preview");
    inputs.forEach(function(hoverLink) {
        hoverLink.addEventListener("mouseover",function(e){
             var xpm = this.querySelector("#demo").getAttribute("src");
             xpm = xpm.replace("small","medium");
             this.t = this.title;
             var c = (this.t != "") ? "<br/>" + this.t : "";
             
             var prv = document.getElementById("hArea");
             prv.innerHTML="<p id='preview'><img src='"+ xpm +"' alt='Image preview' />"+ c +"</p>";
             var hiddenP = document.querySelector("#preview");
             hiddenP.style.top = (e.pageY - xOffset) + "px";
             hiddenP.style.left = (e.pageX + yOffset) + "px";
             hiddenP.style.display = "block";
    });
    // var hoverLink = document.querySelector("a.preview");
    hoverLink.addEventListener("mousemove",function(e){
        var hiddenP = document.querySelector("#preview");
         hiddenP.style.top = (e.pageY - xOffset) + "px";
         hiddenP.style.left = (e.pageX + yOffset) + "px";
    });
    // var hoverLink = document.querySelector("a.preview");
    hoverLink = document.querySelector("a.preview");
    hoverLink.addEventListener("mouseout",function(e){
        var hiddenP = document.querySelector("#preview");
        hiddenP.style.display = "none";
    });
    });

};
    
    window.onload = function() {
    imagePreview();
};
    
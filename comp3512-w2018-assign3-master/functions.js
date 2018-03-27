function showDiv(buttonID){
          document.getElementById(buttonID).classList.remove('collapse');
          setTimeout(hideDiv, 2000);
          function hideDiv(){
               document.getElementById(buttonID).classList.add('makeItDisappear');
               setTimeout(resetClassList, 1550);
               function resetClassList(){
               document.getElementById(buttonID).classList.add('collapse');
               document.getElementById(buttonID).classList.remove('makeItDisappear');
               }
          }
}
      
window.addEventListener('load',function(){
var btnNotImplemented= document.getElementById("futureBtn");
if(btnNotImplemented){
btnNotImplemented.addEventListener("click",function(){showDiv('failureAlert');});}

var faveButton = document.getElementById('favItem');
if(faveButton){
faveButton.addEventListener("click",function(){showDiv('successAlert');});}
}); 
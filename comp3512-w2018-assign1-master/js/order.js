$(function(){
    var url = "https://assignment-3-jhern922.c9users.io/comp3512-w2018-assign1-master/print-services.php";
   $.get(url) //by default .get is asynchronous 
    .done(function(data){
        data = $.parseJSON(data);
        $('.printSummary').each(function(i, obj) { 
         var sizeID = Number(($('#sizeVal'+i).html()));
         var stockID = Number(($('#stockVal'+i).html()));
         var frameID = Number(($('#frameVal'+i).html()));
         
        for(let count=0; count<data['sizes'].length; count++){
            if(data['sizes'][count]['id'] == sizeID){
                $('#sizeVal'+i).html(data['sizes'][count]['name']);
            }
        }
        
        for(let count=0; count<data['stock'].length; count++){
            if(data['stock'][count]['id'] == stockID){
                $('#stockVal'+i).html(data['stock'][count]['name']);
            }
        }
        
        for(let count=0; count<data['frame'].length; count++){
            if(data['frame'][count]['id'] == frameID){
                $('#frameVal'+i).html(data['frame'][count]['name']);
            }
        }
        });
    })
    .fail( function(){ //this is just for Randy if he tries to enter a wrong URL in the for the .get
        alert("Oooops something wrong happened to the retrieval of JSON from " + url);
    });
});
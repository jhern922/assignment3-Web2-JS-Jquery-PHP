$(function(){
    $.get("js/printRules.json") // still need to change this because we need to use web-service
    .done(function(data){
        var sizeList = $(".sizeDropdown");
        var stockList = $(".stockDropdown");
        var frameList = $(".frameDropdown");
        
        for(let i=0; i<data['sizes'].length; i++){
        var optionItem = $("<option></option>");
        optionItem.html(""+data['sizes'][i]['name']);
        sizeList.append(optionItem);
        }
         
        for(let i=0; i<data['stock'].length; i++){
        var optionItem = $("<option></option>");
        optionItem.html(""+data['stock'][i]['name']);
        stockList.append(optionItem);
        }
        
        for(let i=0; i<data['frame'].length; i++){
        var optionItem = $("<option></option>");
        optionItem.html(""+data['frame'][i]['name']);
        frameList.append(optionItem);
        }
    })
    .fail(function(){
        alert("JSON stuff did not load!!!");
    });
});
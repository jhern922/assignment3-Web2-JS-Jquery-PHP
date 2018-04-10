$(function(){
    var url = "https://assignment-3-jhern922.c9users.io/comp3512-w2018-assign1-master/print-services.php";
   $.get(url) //by default .get is asynchronous 
    .done(function(data){
        data = $.parseJSON(data);
        var sizeList = $(".sizeDropdown");
        var stockList = $(".stockDropdown");
        var frameList = $(".frameDropdown");
         sizeOptions = data['sizes'];
         sizeLen = sizeOptions.length;
         stockOptions = data['stock'];
         stockLen = stockOptions.length;
         frameOptions = data['frame'];
         frameLen = frameOptions.length;
         shippingOptions = data['shipping'];
         totalSum = 0;
         framesInOrder = [];
         std_default = true
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
    .fail( function(){ //this is just for Randy if he tries to enter a wrong URL in the for the .get
        alert("Oooops something wrong happened to the retrieval of JSON from " + url);
    });
    
    $('.total_Prices').each(function(i, obj) {
        $(this).find('#id_inp').change(function() {
            var standard;
            var express;
            var finalShip;
            var argsString;
            var sizes = $('.sizeDropdown').find('option:selected');
            var size = sizes[i];
            var sizeIndex = $('.sizeDropdown option').index(size);
            sizeIndex = sizeIndex - (i * sizeLen);
            var sizePrice = sizeOptions[sizeIndex]['cost'];
            if(sizeIndex <= 1) { var stockSize = 'small_cost'; }
            else { var stockSize = 'large_cost';  }
            var stocks = $('.stockDropdown').find('option:selected');
            var stock = stocks[i];
            var stockIndex = $('.stockDropdown option').index(stock);
            stockIndex = stockIndex - (i * stockLen);
            var stockPrice = stockOptions[stockIndex][stockSize];
            var frames = $('.frameDropdown').find('option:selected');
            var frame = frames[i];
            var itemFrames = frame.value;
            var frameIndex = $('.frameDropdown option').index(frame);
            frameIndex = frameIndex - (i * frameLen);
            var frameCosts = frameOptions[frameIndex]['costs'];
            var framePrice = frameCosts[sizeIndex];
            var quant =  $(this).val();
            var orderItemTotal = ((Number(sizePrice) + Number(stockPrice) + Number(framePrice)) * Number(quant));
            var orderTotal = $('#total_price_amount'+i).val();
            if (orderTotal == 0) { totalSum += orderItemTotal; }
            else { totalSum = totalSum - orderTotal; totalSum += orderItemTotal; }
            if (itemFrames == "None") {framesInOrder[i] =  0;}
            else if (itemFrames != "None") {framesInOrder[i] =  quant;}
            argsString = framesInOrder.join("+");
            var fr_tot = eval(argsString);
            if (fr_tot == 0) { standard = shippingOptions[0]["rules"]["none"]; express = shippingOptions[1]["rules"]["none"];}
            else if (fr_tot < 10 ) { standard = shippingOptions[0]["rules"]["under10"]; express = shippingOptions[1]["rules"]["under10"];}
            else if (fr_tot >= 10) { standard = shippingOptions[0]["rules"]["over10"]; express = shippingOptions[1]["rules"]["over10"];}
            if (totalSum >= 100) { standard = 0; }
            if (totalSum >= 300) { express = 0; }
            alert("The price of standard shipping is: " + standard + " The price of express shipping is: " + express + " FRAMES COUNT: " + fr_tot);
            if($('#stand').is(':checked')) {finalShip = standard; }
            if($('#expr').is(':checked')) {finalShip = express; }
            $('#total_shp').val(finalShip);
            $('#total_price_amount'+i).val(orderItemTotal);
            $('#total_p').val(totalSum);
            grandTotal();
            $("#expr").on("click" , function () {
                finalShip = express;
                $('#total_shp').val(finalShip);
                grandTotal();
            });
            $("#stand").on("click" , function () {
                finalShip = standard;
                $('#total_shp').val(finalShip);
                grandTotal();
            });
            function grandTotal() {
                var val1 = $('#total_p').val();
                var val2 = $('#total_shp').val();
                var val3 = Number(val1) + Number(val2);
                $('#total_shhp').val(val3);
            }
        });
        
});



});


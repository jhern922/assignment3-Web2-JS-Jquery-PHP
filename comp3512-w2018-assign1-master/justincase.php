              <div class="modal-body">
                           <?php $i = 0; ?>
                           <?php  foreach($_SESSION['imageFavList'] as $row){ ?>
                           <div class="float-right">
                           <form class="total_Prices">
                               <h6><?php echo $row['Title'];?></h6>
                               <a href="single-image.php?id=<?php echo $row['ID'];?>"><img src="images/square-small/<?php echo $row['Path'];?>" alt='<?php echo $row['Title'];?>'></a></br>
                               <br>
                               <div class="float-right">
                               <div class="float-left">
                               <label for="id_select">Select Size: </label>
                               <div class="md-frm pull-right"><select id="id_select" name="size" class="sizeDropdown"></select></div>
                               </div>
                               <div class="float-left">
                               <label for="id_select2">Select Stock: </label>
                               <div class="md-frm pull-right"><select id="id_select2" name="size" class="stockDropdown"></select></div>
                               </div>
                               <div class="float-left">
                               <label for="id_select3">Select Frame Color: </label>
                               <div class="md-frm pull-right"><select id="id_select3" name="size" class="frameDropdown"></select></div>
                               </div>
                               <div class="float-left">
                               <label for="id_inp">Enter Quantity: </label>
                               <div class="md-frm pull-right"><input id="id_inp" title="Enter a quantity to see the price!" type="number"></div>
                               </div>
                               <div class="float-left"><br>
                               <label for="id_res">Price: </label>
                               <div class="md-frm pull-right">$  <input type="number" class="input" id=<?php echo "total_price_amount$i";?> readonly="readonly" value="0.00"/></div>
                               </div>
                           </form>
                           </div>
                           <hr>
                        <?php $i++; } ?>
                       </div>
                       <div class="modal-footer">
                           <form class="final prices">
                               <label for="total_p">Total Price: </label>
                               $  <input id="total_p"  type="number" readonly="readonly" value="0"><br>
                               <input id="stand" type="radio" name="shipping" value="standard" checked="checked">  Standard Shipping <br>
                               <input id="expr" type="radio" name="shipping" value="express">  Express Shipping <br>
                               <p class="warning_text"> *    Change an item quantity to change the shipping prices<br>Shipping costs are determined by your order</p>
                               <label for="total_shp">Shipping Cost: </label>
                               $  <input id="total_shp"  type="number" readonly="readonly" value="5"><br>
                               <label for="total_shhp">Grand Total: </label>
                               $  <input id="total_shhp"  type="number" readonly="readonly" value="0"><br>
                           </form>
                           
                           
                           <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                     </div>
               </div>
               
               
               
<!-- --->
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
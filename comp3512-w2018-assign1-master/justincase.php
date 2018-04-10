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
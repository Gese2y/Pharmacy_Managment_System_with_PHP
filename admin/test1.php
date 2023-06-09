          <div class="row" style="margin: 1em auto;">
            <div class="col-md-4 ">
              <div class="card card-stats  bg-success">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $sqlr="SELECT `item_id`, `Catagory_id`, `Item_name`, `unit`, `Quantity`, `Country`, `Sales_price`, `Sold_by`, `Customer_name`, `Sold_date`, Sum(Quantity) as SameValue from `sold_item`  GROUP BY item_id";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) { ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Sold Item</i></b></h2></center>

                    <h3 class="text-white">Over All Transaction In The Pharmay</h3>
                  </div>
                  <h3 class="card-title text-white">There Are <?php echo $row['SameValue']; ?> item solds Over All transaction  
                  </h3>
                <?php }} ?>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="vieTraStat">Get More Information</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-stats  bg-warning">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $sqlr="SELECT `item_id`, Sum(Quantity) as SameValue from `item`";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) { ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Store Status</i></b></h2></center>
                    <h3 class="text-white">Over All Avialabled Item in the store</h3>
                  </div>
                  <h3 class="card-title text-white"># There Are <span class="text-primary"><i class="fa fa-long-arrow-up"></i>  <?php echo $row['SameValue']; ?></span> Avialabled in the store  
                  </h3>
                <?php }} ?>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="avilable_item" class="">Get More Information</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="card card-stats  bg-primary">
                <div class="card-header card-header-warning card-header-icon text-white">
                  <?php $sqlr="SELECT `item_id`, Sum(Quantity) as SameValue from `item`";
     $result = $con->query($sqlr);
     if ($result ->num_rows > 0) {
      while ($row = $result->fetch_array()) { ?>
                  <div class="card-icon">

                    <center><h2 class="text-white"><b><i class="material-icons">Store Status</i></b></h2></center>
                    <h3 class="text-white">Over All Item that Found in the store</h3>
                  </div>
                  <h3 class="card-title text-white"># There Are <?php echo $row['SameValue']; ?> Item found in the store  
                  </h3>
                <?php }} ?>
                </div>
                <div class="card-footer">
                  <div class="stats">
                    <a href="avilable_item" class="text-white">Get More Information</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
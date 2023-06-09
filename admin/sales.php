
<?php
require_once('../assets/constants/config.php');
include('header.php');

$queryid = "SELECT * FROM `item`";

$queryidCu="SELECT * FROM  `customer_details`";
$resultiCu= mysqli_query($con, $queryidCu);

// for method 1

$resultid = mysqli_query($con, $queryid);

// for method 2

$resultid1 = mysqli_query($con, $queryid);

$options = "";

$queryCat="SELECT * FROM `itemdetail`";
$resultcat=mysqli_query($con,$queryCat);


while($rowid = mysqli_fetch_array($resultcat))
{
    $options = $options."<option value='$rowid[0]'>$rowid[0]</option>";
}



?>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Add Role</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Add Role
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Input Validation start -->
                <section class="input-validation">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
<div style="margin: 0em auto;" class="col-md-8">
	<form action="" method="POST">
  <div class="form-row">
   <div class="form-group col-md-4">
      <label for="inputZip">Item</label>
      <input list="browsers" name="item_id" class="form-control" placeholder="enter or select item id">
  <datalist id="browsers">
    <?php while($rowid1 = mysqli_fetch_array($resultid1)):;?>
    <option value="<?php echo $rowid1[1];?>"></option>

        <?php endwhile;?>
  </datalist>
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Country</label>
      <input list="browsers" name="country" class="form-control" placeholder="Select Country">
  <datalist id="browsers">
    <?php while($rowid1 = mysqli_fetch_array($resultid1)):;?>
	<option value="<?php echo $rowid1[7];?>"></option>
	<?php endwhile;?>
  </datalist>
    </div>
  </div>
    <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputCity">Quantity</label>
      <input type="text" class="form-control" id="inputCity" name="quan">
    </div>
    <div class="form-group col-md-4">
      <label for="inputZip">Sales To</label>
      <input list="browsers" name="customer" class="form-control" placeholder="write or select customer">
  <datalist id="browsers">
    <?php while($rowidCu = mysqli_fetch_array($resultCu)):;?>
    <option value="<?php echo $rowidCu[1];?>"></option>
    <?php endwhile;?>
  </datalist>
    </div>
  </div>
  
  <button type="button" class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample" name="search">SELL</button> <a href="sale.php?id=$_POST['item_id']"class="btn btn-danger"><i class="la la-trash">view</i></a>
</form>
</div>
                                    </div>
                                </div>
        
                                <p>
 
</p>

<div class="collapse" id="collapseExample">
  <form action="" method="POST">
    <label class="control-label col-sm-3" for="username">username: </label> <input  type="text" placeholder="search by user name" name="id">
      <button type="submit" name="search"><i class="las la-search" ></i></button>
  </form><br>
  <?php


if (isset($_POST['search'])) {
  $id=$_POST['id'];

  $query5="SELECT * FROM user WHERE username='$id'";
  $query5_run = mysqli_query($con,$query5);
  while ($row = mysqli_fetch_array($query5_run)) {
    ?>
    <form class="form-horizontal" action="" method="POST">
                      <div class="form-group">
                         <label class="control-label col-sm-2" for="username">username:</label>
                           <div class="col-sm-10">
                              <input type="text" class="form-control" id="username" placeholder="User Name" name="username" value="<?php echo $row['username']?>">
                            </div>
                        </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Emoloyee Id:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pwd" placeholder="Employee Id" name="E_id" value="<?php echo $row['Employee_id']?>" readonly>
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Email:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pwd" placeholder="ensert Email Address" name="email" value="<?php echo $row['Email']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="pwd">Password:</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" value="<?php echo $row['password']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <label class="control-label col-sm-2" for="res">Role:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="res" placeholder="Enter password" name="role" value="<?php echo $row['role']?>">
                            </div>
                      </div>
                      <div class="form-group">
                          <div class="col-sm-offset-2 col-sm-10">
                              <center><button type="submit" name="Update" class="btn btn-success"><i class="glyphicon glyphicon-update"></i>Update Account</button></center>
                          </div>
                        </div>


                     
                    </form>
    <?php
  }
}
  ?>
</div>   
                </div>

                        </div>
                    </div>



                </section>
                <!-- Input Validation end -->
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <?php include 'footer.php'; ?>

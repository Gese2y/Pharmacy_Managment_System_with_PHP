<?php
require_once('../assets/constants/config.php');
include('../header/SKheader.php');

$errors=array();


  $Grantq="SELECT * FROM user WHERE username='$Gname' AND (role='Store Keeper' or role='pharmacist' )";
  $Grantres=mysqli_query($con,$Grantq);
  if (mysqli_num_rows($Grantres)==1) {

 
if ($_POST) {
  $category=$_POST['category'];
  $item_id=$_POST['item_id'];
  $item_name=$_POST['item_name'];
  $unit=$_POST['unit'];
  $quan=$_POST['quan'];
  $item_pr=$_POST['item_pr'];
  $sale_price=$_POST['sale_price'];
  $pro_date=$_POST['pro_date'];
  $ex_date=$_POST['ex_date'];
  $E_date=$_POST['E_date'];
  $country=$_POST['country'];
  $shelf_no=$_POST['shelf_no'];
  $supplier_name=$_POST['supplier_name'];
  $Description=$_POST['Description'];
  $side_effect=$_POST['side_effect'];
  $name = $_SESSION['username'];

  $imgFile = $_FILES['image']['name'];
 $tmp_dir = $_FILES['image']['tmp_name'];
 $imgSize = $_FILES['image']['size']; 
 
 if(!empty($imgFile))
 {

 $upload_dir = 'image/'; // upload directory
 
 $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
 
 // valid image extensions
 $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
 
 // rename uploading image
 $coverpic = rand(1000,1000000).".".$imgExt;
 
 // allow valid image file formats
 if(in_array($imgExt, $valid_extensions)){ 
 // Check file size '5MB'
 if($imgSize < 5000000) {
 move_uploaded_file($tmp_dir,$upload_dir.$coverpic);
 }
 else{
 $errors[] = "Sorry, your file is too large.";
 }
 }
 else{
 $errors[] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed."; 
 }

//For Database Insertion
 // if no error occured, continue ....

 

 }
if ($Branch=='Wollo Sefer Branch') {
 $IsItd="INSERT INTO `itemdetail2`(`Catagory_name`, `item_id`, `Item_name`, `unit`, `Quantity`, `Description`, `side_effect`, `image`, `Shelf_no`, `store`) VALUES ('$category','$item_id','$item_name','$unit','$quan','$Description','$side_effect','$coverpic','$shelf_no','Store 2')";
$resultItd=mysqli_query($con,$IsItd);
       if ($resultItd===true) {
   
     } else {
      
      $errors[]= "check your enserted item id, that must be unique";
    }
      
  $sqlm = "INSERT INTO item (`Catagory_name`, `item_id`, `Item_name`, `unit`, `Quantity`, `Item_price`, `sales_price`, `Country`, `Produced_Date`, `Expired_date`, `Entered_date`, `Shelf_no`, `supplier_name`, `Record_by`, `Status`, `store`)
       VALUES ('$category','$item_id','$item_name','$unit','$quan','$item_pr','$sale_price','$country','$pro_date','$ex_date','$E_date','$shelf_no','$supplier_name','$nameUs1','Avialable','Store 2')";
       $resultm=mysqli_query($con,$sqlm);
       if ($resultm===true) {
   
     } else {
      
      $errors[]= " check your enserted item id, that must be unique";
    }
}
else if($Branch=='Mebrat Hayil Branch'){
   $IsItd="INSERT INTO `itemdetail`(`Catagory_name`, `item_id`, `Item_name`, `unit`, `Quantity`, `Description`, `side_effect`, `image`, `Shelf_no`, `store`) VALUES ('$category','$item_id','$item_name','$unit','$quan','$Description','$side_effect','$coverpic','$shelf_no','Store 1')";
$resultItd=mysqli_query($con,$IsItd);
       if ($resultItd===true) {
   
     } else {
      
      $errors[]= "check your enserted item id, that must be unique";
    }
      
  $sqlm = "INSERT INTO item (`Catagory_name`, `item_id`, `Item_name`, `unit`, `Quantity`, `Item_price`, `sales_price`, `Country`, `Produced_Date`, `Expired_date`, `Entered_date`, `Shelf_no`, `supplier_name`, `Record_by`, `Status`, `store`)
       VALUES ('$category','$item_id','$item_name','$unit','$quan','$item_pr','$sale_price','$country','$pro_date','$ex_date','$E_date','$shelf_no','$supplier_name','$nameUs1','Avialable','Store 1')";
       $resultm=mysqli_query($con,$sqlm);
       if ($resultm===true) {
   
     } else {
      
      $errors[]= " check your enserted item id, that must be unique";
    }
}
else{

}





}
$queryid = "SELECT * FROM `user`";

// for method 1

$resultid = mysqli_query($con, $queryid);

// for method 2

$resultid1 = mysqli_query($con, $queryid);

$options = "";

$queryCat="SELECT * FROM `category`";
$resultcat=mysqli_query($con,$queryCat);


while($rowid = mysqli_fetch_array($resultcat))
{
    $options = $options."<option value='$rowid[1]'>$rowid[1]</option>";
}

?>
<br>
<div style="text-align: center;">
  <a href="registernewmedicine" class="btn btn-success btn-lg col-md-2">Record New Item</a>
<a href="addmedicine" class="btn btn-primary btn-lg col-md-2">Add Item</a>
</div>
    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row mb-1">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title">Record New Item</h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Record New Item
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
                        <div class="col-md-8" style="margin: 0em auto;">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="panel-heading" style="text-align: center;">
                <img src=" Medicine-14-128.png" style="width: 10%; border-radius: 10%;">
                <h3 class="panel-title">Add Item </h3>
                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
                                       <div class="messages">
                      <?php 
                       if ($errors) {
                         foreach ($errors as $key => $value) {
                           echo '<div class="alert alert-warning" role="alert"><i class="glyphicon glyphicon-exclamation-sign"></i>'.$value.'</div>';
                         }
                       }?>
                    </div>
                                        <form class="form-horizontal" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data" novalidate>
                                              <div class="form-row">
   
	<div class="form-group col-md-4">
     <h5>Item name <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="item_name" class="form-control mb-1" required data-validation-required-message="Genetic name is required">
                                                        </div>
    </div>													
														
    <div class="form-group col-md-4">
      <h5>Item Id <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="item_id" class="form-control mb-1" required data-validation-required-message="Genetic name is required">
                                                        </div>
    </div>
	<div class="form-group col-md-4">
      <div class="control">
	  <h5>Category <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <select name="category" id="select"  class="form-control mb-1" required>
                                                              <option value="no">non</option>
                                                                 <?php echo $options;?>
                                                            </select>
                                                        </div>                                    
	  </div>
    </div>
  </div>
  <div class="form-row">
   <div class="form-group col-md-4">
     <h5>Quantity <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="number" name="quan" class="form-control mb-1" required data-validation-required-message="Quantity is required" min="1">
                                                        </div>
    </div>
    <div class="form-group col-md-4">
     <h5>Unit </h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <select name="unit"  class="form-control mb-1 select2">
                                                                <option value="unitless">--unit--</option>
                                                              <option value="pk">pk</option>
                                                             <option value="bottel">bottel</option>
                                                             <option value="tube">tube</option>
                                                             <option value="vial">vial</option>
                                                             <option value="box">box</option>
                                                             <option value="tin">tin</option>
                                                            </select>
                                                            </div>
                                                        </div>
    </div>
	<div class="form-group col-md-4">
      <h5>Barcode </h5>
                                                        <div class="controls">
                                                            <input type="text" name="barcode" class="form-control mb-1" placeholder="Barcode">
                                                        </div>
    </div>
  </div>
<div class="form-row">
   <div class="form-group col-md-4">
<h5>Manufactured Date <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <input type="date" name="pro_date" class="form-control mb-1" data-validation-required-message="Importer date is required">
                                                            </div>
                                                        </div>                                     
														
    </div>
    <div class="form-group col-md-4">
<h5>Expire date <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <input type="date" name="ex_date" class="form-control mb-1" data-validation-required-message="Expire date is required">
                                                            </div>
                                                        </div>
    </div>
	<div class="form-group col-md-4">
<h5>Entered Date <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <input type="date" name="E_date" class="form-control mb-1" data-validation-required-message="Importer date is required">
                                                            </div>
                                                        </div>
    </div>
  </div>
<div class="form-row">

	   <div class="form-group col-md-4">
<h5>Original Price</h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <input type="number" name="item_pr" class="form-control" min="1" />
                                                            </div>
                                                        </div>
    </div>
    <div class="form-group col-md-4">
<h5>Sale price <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="number" name="sale_price" class="form-control mb-1" required data-validation-required-message="Sales price is required" min="0">
                                                        </div>
    </div>
	<div class="form-group col-md-4">
<h5>Country </h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <select name="country" data-live-search="true"  class="form-control mb-1 select2">
                                                        <option value="">--select countr--</option>
                                                       <option value="Austria">Austria</option>
                                                       <option value="Azerbaijan">Azerbaijan</option>
                                                       <option value="Bahamas">Bahamas</option>
                                                       <option value="Bahrain">Bahrain</option>
                                                       <option value="Bangladesh">Bangladesh</option>
                                                       <option value="Barbados">Barbados</option>
                                                       <option value="Belarus">Belarus</option>
                                                       <option value="Belgium">Belgium</option>
                                                       <option value="Belize">Belize</option>
                                                       <option value="Benin">Benin</option>
                                                       <option value="Bermuda">Bermuda</option>
                                                       <option value="Bhutan">Bhutan</option>
                                                       <option value="Bolivia">Bolivia</option>
                                                       <option value="Bonaire">Bonaire</option>
                                                       <option value="Bosnia & Herzegovina">Bosnia & Herzegovina</option>
                                                       <option value="Botswana">Botswana</option>
                                                       <option value="Brazil">Brazil</option>
                                                       <option value="British Indian Ocean Ter">British Indian Ocean Ter</option>
                                                       <option value="Brunei">Brunei</option>
                                                       <option value="Bulgaria">Bulgaria</option>
                                                       <option value="Burkina Faso">Burkina Faso</option>
                                                       <option value="Burundi">Burundi</option>
                                                       <option value="Cambodia">Cambodia</option>
                                                       <option value="Cameroon">Cameroon</option>
                                                       <option value="Canada">Canada</option>
                                                       <option value="Canary Islands">Canary Islands</option>
                                                       <option value="Cape Verde">Cape Verde</option>
                                                       <option value="Cayman Islands">Cayman Islands</option>
                                                       <option value="Central African Republic">Central African Republic</option>
                                                       <option value="Chad">Chad</option>
                                                       <option value="Channel Islands">Channel Islands</option>
                                                       <option value="Chile">Chile</option>
                                                       <option value="China">China</option>
                                                       <option value="Christmas Island">Christmas Island</option>
                                                       <option value="Cocos Island">Cocos Island</option>
                                                       <option value="Colombia">Colombia</option>
                                                       <option value="Comoros">Comoros</option>
                                                       <option value="Congo">Congo</option>
                                                       <option value="Cook Islands">Cook Islands</option>
                                                       <option value="Costa Rica">Costa Rica</option>
                                                       <option value="Cote DIvoire">Cote DIvoire</option>
                                                       <option value="Croatia">Croatia</option>
                                                       <option value="Cuba">Cuba</option>
                                                       <option value="Curaco">Curacao</option>
                                                       <option value="Cyprus">Cyprus</option>
                                                       <option value="Czech Republic">Czech Republic</option>
                                                       <option value="Denmark">Denmark</option>
                                                       <option value="Djibouti">Djibouti</option>
                                                       <option value="Dominica">Dominica</option>
                                                       <option value="Dominican Republic">Dominican Republic</option>
                                                       <option value="East Timor">East Timor</option>
                                                       <option value="Ecuador">Ecuador</option>
                                                       <option value="Egypt">Egypt</option>
                                                       <option value="El Salvador">El Salvador</option>
                                                       <option value="Equatorial Guinea">Equatorial Guinea</option>
                                                       <option value="Eritrea">Eritrea</option>
                                                       <option value="Estonia">Estonia</option>
                                                       <option value="Ethiopia">Ethiopia</option>
                                                       <option value="Falkland Islands">Falkland Islands</option>
                                                       <option value="Faroe Islands">Faroe Islands</option>
                                                       <option value="Fiji">Fiji</option>
                                                       <option value="Finland">Finland</option>
                                                       <option value="France">France</option>
                                                       <option value="French Guiana">French Guiana</option>
                                                       <option value="French Polynesia">French Polynesia</option>
                                                       <option value="French Southern Ter">French Southern Ter</option>
                                                       <option value="Gabon">Gabon</option>
                                                       <option value="Gambia">Gambia</option>
                                                       <option value="Georgia">Georgia</option>
                                                       <option value="Germany">Germany</option>
                                                       <option value="Ghana">Ghana</option>
                                                       <option value="Gibraltar">Gibraltar</option>
                                                       <option value="Great Britain">Great Britain</option>
                                                       <option value="Greece">Greece</option>
                                                       <option value="Greenland">Greenland</option>
                                                       <option value="Grenada">Grenada</option>
                                                       <option value="Guadeloupe">Guadeloupe</option>
                                                       <option value="Guam">Guam</option>
                                                       <option value="Guatemala">Guatemala</option>
                                                       <option value="Guinea">Guinea</option>
                                                       <option value="Guyana">Guyana</option>
                                                       <option value="Haiti">Haiti</option>
                                                       <option value="Hawaii">Hawaii</option>
                                                       <option value="Honduras">Honduras</option>
                                                       <option value="Hong Kong">Hong Kong</option>
                                                       <option value="Hungary">Hungary</option>
                                                       <option value="Iceland">Iceland</option>
                                                       <option value="Indonesia">Indonesia</option>
                                                       <option value="India">India</option>
                                                       <option value="Iran">Iran</option>
                                                       <option value="Iraq">Iraq</option>
                                                       <option value="Ireland">Ireland</option>
                                                       <option value="Isle of Man">Isle of Man</option>
                                                       <option value="Israel">Israel</option>
                                                       <option value="Italy">Italy</option>
                                                       <option value="Jamaica">Jamaica</option>
                                                       <option value="Japan">Japan</option>
                                                       <option value="Jordan">Jordan</option>
                                                       <option value="Kazakhstan">Kazakhstan</option>
                                                       <option value="Kenya">Kenya</option>
                                                       <option value="Kiribati">Kiribati</option>
                                                       <option value="Korea North">Korea North</option>
                                                       <option value="Korea Sout">Korea South</option>
                                                       <option value="Kuwait">Kuwait</option>
                                                       <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                       <option value="Laos">Laos</option>
                                                       <option value="Latvia">Latvia</option>
                                                       <option value="Lebanon">Lebanon</option>
                                                       <option value="Lesotho">Lesotho</option>
                                                       <option value="Liberia">Liberia</option>
                                                       <option value="Libya">Libya</option>
                                                       <option value="Liechtenstein">Liechtenstein</option>
                                                       <option value="Lithuania">Lithuania</option>
                                                       <option value="Luxembourg">Luxembourg</option>
                                                       <option value="Macau">Macau</option>
                                                       <option value="Macedonia">Macedonia</option>
                                                       <option value="Madagascar">Madagascar</option>
                                                       <option value="Malaysia">Malaysia</option>
                                                       <option value="Malawi">Malawi</option>
                                                       <option value="Maldives">Maldives</option>
                                                       <option value="Mali">Mali</option>
                                                       <option value="Malta">Malta</option>
                                                       <option value="Marshall Islands">Marshall Islands</option>
                                                       <option value="Martinique">Martinique</option>
                                                       <option value="Mauritania">Mauritania</option>
                                                       <option value="Mauritius">Mauritius</option>
                                                       <option value="Mayotte">Mayotte</option>
                                                       <option value="Mexico">Mexico</option>
                                                       <option value="Midway Islands">Midway Islands</option>
                                                       <option value="Moldova">Moldova</option>
                                                       <option value="Monaco">Monaco</option>
                                                       <option value="Mongolia">Mongolia</option>
                                                       <option value="Montserrat">Montserrat</option>
                                                       <option value="Morocco">Morocco</option>
                                                       <option value="Mozambique">Mozambique</option>
                                                       <option value="Myanmar">Myanmar</option>
                                                       <option value="Nambia">Nambia</option>
                                                       <option value="Nauru">Nauru</option>
                                                       <option value="Nepal">Nepal</option>
                                                       <option value="Netherland Antilles">Netherland Antilles</option>
                                                       <option value="Netherlands">Netherlands (Holland, Europe)</option>
                                                       <option value="Nevis">Nevis</option>
                                                       <option value="New Caledonia">New Caledonia</option>
                                                       <option value="New Zealand">New Zealand</option>
                                                       <option value="Nicaragua">Nicaragua</option>
                                                       <option value="Niger">Niger</option>
                                                       <option value="Nigeria">Nigeria</option>
                                                       <option value="Niue">Niue</option>
                                                       <option value="Norfolk Island">Norfolk Island</option>
                                                       <option value="Norway">Norway</option>
                                                       <option value="Oman">Oman</option>
                                                       <option value="Pakistan">Pakistan</option>
                                                       <option value="Palau Island">Palau Island</option>
                                                       <option value="Palestine">Palestine</option>
                                                       <option value="Panama">Panama</option>
                                                       <option value="Papua New Guinea">Papua New Guinea</option>
                                                       <option value="Paraguay">Paraguay</option>
                                                       <option value="Peru">Peru</option>
                                                       <option value="Phillipines">Philippines</option>
                                                       <option value="Pitcairn Island">Pitcairn Island</option>
                                                       <option value="Poland">Poland</option>
                                                       <option value="Portugal">Portugal</option>
                                                       <option value="Puerto Rico">Puerto Rico</option>
                                                       <option value="Qatar">Qatar</option>
                                                       <option value="Republic of Montenegro">Republic of Montenegro</option>
                                                       <option value="Republic of Serbia">Republic of Serbia</option>
                                                       <option value="Reunion">Reunion</option>
                                                       <option value="Romania">Romania</option>
                                                       <option value="Russia">Russia</option>
                                                       <option value="Rwanda">Rwanda</option>
                                                       <option value="St Barthelemy">St Barthelemy</option>
                                                       <option value="St Eustatius">St Eustatius</option>
                                                       <option value="St Helena">St Helena</option>
                                                       <option value="St Kitts-Nevis">St Kitts-Nevis</option>
                                                       <option value="St Lucia">St Lucia</option>
                                                       <option value="St Maarten">St Maarten</option>
                                                       <option value="St Pierre & Miquelon">St Pierre & Miquelon</option>
                                                       <option value="St Vincent & Grenadines">St Vincent & Grenadines</option>
                                                       <option value="Saipan">Saipan</option>
                                                       <option value="Samoa">Samoa</option>
                                                       <option value="Samoa American">Samoa American</option>
                                                       <option value="San Marino">San Marino</option>
                                                       <option value="Sao Tome & Principe">Sao Tome & Principe</option>
                                                       <option value="Saudi Arabia">Saudi Arabia</option>
                                                       <option value="Senegal">Senegal</option>
                                                       <option value="Seychelles">Seychelles</option>
                                                       <option value="Sierra Leone">Sierra Leone</option>
                                                       <option value="Singapore">Singapore</option>
                                                       <option value="Slovakia">Slovakia</option>
                                                       <option value="Slovenia">Slovenia</option>
                                                       <option value="Solomon Islands">Solomon Islands</option>
                                                       <option value="Somalia">Somalia</option>
                                                       <option value="South Africa">South Africa</option>
                                                       <option value="Spain">Spain</option>
                                                       <option value="Sri Lanka">Sri Lanka</option>
                                                       <option value="Sudan">Sudan</option>
                                                       <option value="Suriname">Suriname</option>
                                                       <option value="Swaziland">Swaziland</option>
                                                       <option value="Sweden">Sweden</option>
                                                       <option value="Switzerland">Switzerland</option>
                                                       <option value="Syria">Syria</option>
                                                       <option value="Tahiti">Tahiti</option>
                                                       <option value="Taiwan">Taiwan</option>
                                                       <option value="Tajikistan">Tajikistan</option>
                                                       <option value="Tanzania">Tanzania</option>
                                                       <option value="Thailand">Thailand</option>
                                                       <option value="Togo">Togo</option>
                                                       <option value="Tokelau">Tokelau</option>
                                                       <option value="Tonga">Tonga</option>
                                                       <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                                                       <option value="Tunisia">Tunisia</option>
                                                       <option value="Turkey">Turkey</option>
                                                       <option value="Turkmenistan">Turkmenistan</option>
                                                       <option value="Turks & Caicos Is">Turks & Caicos Is</option>
                                                       <option value="Tuvalu">Tuvalu</option>
                                                       <option value="Uganda">Uganda</option>
                                                       <option value="United Kingdom">United Kingdom</option>
                                                       <option value="Ukraine">Ukraine</option>
                                                       <option value="United Arab Erimates">United Arab Emirates</option>
                                                       <option value="United States of America">United States of America</option>
                                                       <option value="Uraguay">Uruguay</option>
                                                       <option value="Uzbekistan">Uzbekistan</option>
                                                       <option value="Vanuatu">Vanuatu</option>
                                                       <option value="Vatican City State">Vatican City State</option>
                                                       <option value="Venezuela">Venezuela</option>
                                                       <option value="Vietnam">Vietnam</option>
                                                       <option value="Virgin Islands (Brit)">Virgin Islands (Brit)</option>
                                                       <option value="Virgin Islands (USA)">Virgin Islands (USA)</option>
                                                       <option value="Wake Island">Wake Island</option>
                                                       <option value="Wallis & Futana Is">Wallis & Futana Is</option>
                                                       <option value="Yemen">Yemen</option>
                                                       <option value="Zaire">Zaire</option>
                                                       <option value="Zambia">Zambia</option>
                                                       <option value="Zimbabwe">Zimbabwe</option>
                                                            </select>
                                                            </div>
                                                        </div>
    </div>
  </div> 

<div class="form-row">
   <div class="form-group col-md-4">
<h5>Shelf Number</h5>
                                                        <div class="controls">
                                                            <input type="text" name="shelf_no" class="form-control mb-1" placeholder="shelf number" required  data-validation-required-message="Shelf number is Required">
                                                        </div>
    </div>
    <div class="form-group col-md-4">
      <h5>Supplier Name </h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <select  data-live-search="true" name="supplier_name"  class="form-control mb-1 select2" required data-validation-required-message="Supplier Name is Required">
                                                                <?php while($rowid1 = mysqli_fetch_array($resultid1)):;?>
                                                                <option value="<?php echo $rowid1[0];?>"><?php echo $rowid1[0];?> id: <?php echo $rowid1[1];?></option>

                                                                    <?php endwhile;?>
                                                            </select>
                                                            </div>
                                                        </div>
    </div>
	<div class="form-group col-md-4">
	<div class="upload-btn-wrapper">
           <h5>Item Photo</h5>
                                                        <div class="controls">
                                                            <input type="file" name="image">
                                                        </div>                                             
                                                    </div>

    </div>
  </div>  <div class="form-row">
    <div class="form-group col-md-6">
<h5>Description </h5>
                                                        <div class="controls">
                                                            <textarea name="Description" class="form-control mb-1" placeholder="Description" rows="10" ></textarea>
                                                        </div>
    </div>
    <div class="form-group col-md-6">
      <h5>Side effect <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <textarea name="side_effect" class="form-control mb-1"  required placeholder="Side effect" rows="10"></textarea>
                                                        </div>
    </div>
  </div>


                <div class="form-group row">
                  <center><div class="col-sm-offset-2 col-sm-3">
                    <input type="submit" class="btn btn-success" value="ADD">
                  </div>
                  </center>
                </div>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
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
<?php
  }
  else{
    echo "<h1 style='color:red'>".$nameUs1." you are not granted to record item <h1>";
    echo "<a href='logout.php' class='w3-bar-item w3-button' id='topNavLogout'><i class='glyphicon glyphicon-log-out'></i>Login with another user</a>";
  }

?>
    <?php include 'footer.php'; ?>
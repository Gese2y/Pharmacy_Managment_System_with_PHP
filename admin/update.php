<?php
require_once('../assets/constants/config.php');
   session_start();

  if (!isset($_SESSION['username'])) { 
  $_SESSION['msg'] = "You have to log in first"; 
  header('location: LoginSK.php'); 
} 

$errors=array();
  $id=$_GET['id'];
  $query=mysqli_query($con,"SELECT * from `item` where item_id='$id'");
  $row=mysqli_fetch_array($query);
if (isset($_POST['Update'])) {
$Cat_Id=$_POST['Cat_Id'];
$It_Id=$_POST['It_Id'];
  $It_Na=$_POST['It_Na'];
  $quan=$_POST['quan'];
  $Un=$_POST['Un'];
  $It_Pr=$_POST['It_Pr'];
  $Pr_Da=$_POST['Pr_Da'];
  $Ex_Da=$_POST['Ex_Da'];
  $En_Da=$_POST['En_Da'];
  $Sh_No=$_POST['Sh_No'];
  $Su_Id=$_POST['Su_Id'];
  $Coun=$_POST['Coun'];

if (empty($Cat_Id)||empty($It_Id)||empty($It_Na)||empty($Coun)) {
    if ($Cat_Id=="") {
      $errors[]="username is required";
    }
    if ($It_Na=="") {
      $errors[]="password is required";
    }
     if ($It_Id=="") {
      $errors[]="Employee Id is required";
    }
     if ($Coun=="") {
      $errors[]="Email Address is required";
    }
  }


  $sqlup="UPDATE item SET  item_id='$It_Id', Catagory_id='$Cat_Id', Item_name='$It_Na',unit='$Un',Quantity='$quan', Item_price='$It_Pr', Country='$Coun', Produced_Date='$Pr_Da', Expired_date='$Ex_Da', Entered_date='$En_Da', Shelf_no='$Sh_No', Supplier_id='$Su_Id' where item_id='$id'";
  
       $resultup=mysqli_query($con,$sqlup);
       if ($resultup===true) {
     } else  {
      echo "Error: " . $sqlup . "<br>" . mysqli_error($con);
    }
    header("Location: editmedicine.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
<title>Basic MySQLi Commands</title>
 <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i%7CQuicksand:300,400,500,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/icheck/icheck.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/line/css/line-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/line/css/line-awesome.css">
    
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/icheck/custom.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/ui/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/forms/selects/select2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/components.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/core/colors/palette-gradient.css">
    <!-- END: Page CSS-->

    <!-- END: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/tables/datatable/datatables.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/css/plugins/forms/validation/form-validation.css">
    <link rel="stylesheet" type="text/css" href="../assets/admin/vendors/css/extensions/sweetalert.css">

</head>
<style type="text/css">
   .main {
        background-color: #FFFFFF;
        width: 1000px;
        height: 1250px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
    }
</style>
<body>
    
  <div style="background-color:  #5B5EA6;">
                <section class="input-validation">
                    <div class="row" style="padding-top: 50px;padding-bottom: 50px;">
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
                <img src="Edit-128.png" style="width: 10%; border-radius: 8%;">
                <h3 class="panel-title">Edit Item </h3>
                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body">
									<div class="messages">
                      <?php 
                       if ($errors) {
                         foreach ($errors as $key => $value) {
                           echo '<div class="alert alert-warning" role="alert">'.$value.'</div>';
                         }
                       }?>
                    </div>
                                                        <form class="form-horizontal" action="" method="POST">
                                              <div class="form-row">
   
	<div class="form-group col-md-4">
     <h5>Category name <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="Cat_Id" value="<?php echo $row['Catagory_name']?>" class="form-control mb-1" required data-validation-required-message="Genetic name is required">
                                                        </div>
    </div>													
														
    <div class="form-group col-md-4">
      <h5>Item Id <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="It_Id" value="<?php echo $row['item_id']?>" class="form-control mb-1" required data-validation-required-message="Genetic name is required">
                                                        </div>
    </div>
	<div class="form-group col-md-4">
      <div class="control">
	  <h5>Item Name <span class="required">*</span></h5>
<div class="controls">
                                                            <input type="text" name="It_Na" value="<?php echo $row['Item_name']?>"  class="form-control mb-1" required data-validation-required-message="Genetic name is required">
                                                        </div>                                   
	  </div>
    </div>
  </div>
  <div class="form-row">
   <div class="form-group col-md-4">
     <h5>Unit <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="Un" value="<?php echo $row['unit']?>" class="form-control mb-1" required data-validation-required-message="Quantity is required" >
                                                        </div>
    </div>
    <div class="form-group col-md-4">
     <h5>Quantity <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="number" name="quan" value="<?php echo $row['Quantity']?>" class="form-control mb-1" required data-validation-required-message="Quantity is required" min="1">
                                                        </div>
    </div>
	<div class="form-group col-md-4">
      <h5>Item Price </h5>
                                                        <div class="controls">
                                                            <input type="text" name="It_Pr" value="<?php echo $row['Item_price']?>" class="form-control mb-1" placeholder="Barcode">
                                                        </div>
    </div>
  </div>
<div class="form-row">
   <div class="form-group col-md-4">
<h5>Sales Price <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <input type="text" name="Sl_Pr" value="<?php echo $row['sales_price']?>" class="form-control mb-1" data-validation-required-message="Importer date is required">
                                                            </div>
                                                        </div>                                     
														
    </div>
    <div class="form-group col-md-4">
<h5>Manufactured date <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <input type="text" name="Pr_Da" value="<?php echo $row['Produced_Date']?>" class="form-control mb-1" data-validation-required-message="Expire date is required">
                                                            </div>
                                                        </div>
    </div>
	<div class="form-group col-md-4">
<h5>Expired Date <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <input type="text" name="Ex_Da" value="<?php echo $row['Expired_date']?>" class="form-control mb-1" data-validation-required-message="Importer date is required">
                                                            </div>
                                                        </div>
    </div>
  </div>
<div class="form-row">

	   <div class="form-group col-md-4">
<h5>Entered Date</h5>
                                                        <div class="controls">
                                                            <div class="input-group">
                                                                <input type="text"name="En_Da" value="<?php echo $row['Entered_date']?>" class="form-control" min="1" />
                                                            </div>
                                                        </div>
    </div>
    <div class="form-group col-md-4">
<h5>Country <span class="required">*</span></h5>
                                                        <div class="controls">
                                                            <input type="text" name="Coun" value="<?php echo $row['Country']?>" class="form-control mb-1" required data-validation-required-message="Sales price is required" min="0">
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
				</div>
 
</body>
</html>
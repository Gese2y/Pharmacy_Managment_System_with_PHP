<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<style type="text/css">
  #names {
  border:1px solid ;
  
  text-align:left;
}

#names tr td  , #names tr th {
  padding:1em;
}
 <style type="text/css">
  .ui-select{width: 100%}
/* This is to remove the arrow of select element in IE */
select::-ms-expand {  display: none; }
select{
    -webkit-appearance: none;
    appearance: none;
}
@-moz-document url-prefix(){
  .ui-select{border: 1px solid #CCC; border-radius: 4px; box-sizing: border-box; position: relative; overflow: hidden;}
  .ui-select select { width: 110%; background-position: right 30px center !important; border: none !important;}
}
  .upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}
</style>

</style>
<body>
<div>
      <label>First Name : <input id="frist-name" type="text" /></label>
        <br /> <br />
      <label>Last Name : <input id="last-name" type="text" /></label> 
        <br /><br />
       <input type="button" value="Add Name" onclick="addname()" />
    </div>
    <br /><br />
    <table id="names">
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Full Name</th>
        </tr>
    </table>
<script type="text/javascript">
  function addname() {
            var fName = $("#frist-name").val().toUpperCase();
            var lName = $("#last-name").val().toUpperCase();
            if (fName != "" && lName != "") {
                $("<tr><td>" + fName + "</td><td>" + lName + "</td><td>" + fName + " " + lName + "</td></tr>").appendTo("#names")

            }
        }
</script>
</body>
</html>
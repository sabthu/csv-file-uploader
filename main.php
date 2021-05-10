<?php
//index.php
$connect = mysqli_connect("localhost", "root", "", "testing");
$message = '';

if(isset($_POST["upload"]))
{
 if($_FILES['_file']['name'])
 {
  $filename = explode(".", $_FILES['customer_details_file']['name']);
  if(end($filename) == "csv")
  {
   $handle = fopen($_FILES['details_file']['tmp_name'], "r");
   while($data = fgetcsv($handle))
   {
    $customer_id = mysqli_real_escape_string($connect, $data[0]);  
                $customer_name = mysqli_real_escape_string($connect, $data[1]);
    $customer_contact_number = mysqli_real_escape_string($connect, $data[2]);
    $query = "
     UPDATE customer_details 
     SET customer_name = '$customer_name', 
     customer_contact_number = '$customer_contact_number' 
     WHERE custoner_id = '$customer_id'
    ";
    mysqli_query($connect, $query);
   }
   fclose($handle);
   header("location: index.php?updation=1");
  }
  else
  {
   $message = '<label class="text-danger">Please Select CSV File only</label>';
  }
 }
 else
 {
  $message = '<label class="text-danger">Please Select File</label>';
 }
}

if(isset($_GET["updation"]))
{
 $message = '<label class="text-success">Product Updation Done</label>';
}

$query = "SELECT * FROM customer_details";
$result = mysqli_query($connect, $query);
?> <!DOCTYPE html>
<html>
 <head>
  <title>CSV to Database</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 </head>
 <body>
  <br />
  <div class="container">
   <h2 align="center">Update Mysql Database through Upload CSV File using PHP</a></h2>
   <br />
   <form method="post" enctype='multipart/form-data'>
    <p><label>Please Select File(Only CSV Formate)</label>
    <input type="file" name="customer_details" /></p>
    <br />
    <input type="submit" name="upload" class="btn btn-info" value="Upload" />
   </form>
   <br />
   <?php echo $message; ?>
   <h3 align="center">Deals of the Day</h3>
   <br />
   <div class="table-responsive">
    <table class="table table-bordered table-striped">
     <tr>
      <th>customer Name</th>
      <th>customer contact number</th>
     </tr>
     <?php
     while($row = mysqli_fetch_array($result))
     {
      echo '
      <tr>
       <td>'.$row["customer_name"].'</td>
       <td>'.$row["customer_contact_number"].'</td>
      </tr>
      ';
     }
     ?>
    </table>
   </div>
  </div>
 </body>
</html>

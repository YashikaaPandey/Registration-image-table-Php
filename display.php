<?php
  include('./connect.php');
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $phone=$_POST['phone'];
    $mobile=$_POST['mobile'];
    $image=$_FILES['file'];
    echo $username;
    echo "<br>";
    echo $mobile;
    echo "<br>";
    print_r($image);
    $imagefilename=$image['name'];
    print_r($imagefilename);
    echo "<br>";
    $imagefileerror=$image['error'];
    print_r($imagefileerror);
    echo "<br>";
    $imagefiletemp=$image['tmp_name'];
    print_r($imagefiletemp);
    echo "<br>";
    $filename_separate=explode('.', $imagefilename);
    print_r($filename_separate);
    echo "<br>";
    //$file_extension=strtolower($filename_separate[1]);
    //print_r($file_extension);
    $file_extension=strtolower(end($filename_separate));
    print_r($file_extension);
    $extension=array('jpeg','jpg','png');
    if(in_array($file_extension,$extension)){
        $upload_image='images/'.$imagefilename;
        move_uploaded_file($imagefiletemp,$upload_image);
        $sql="insert into `registration` (name,mobile,image) values ('$username','$mobile','$upload_image')";
        $result=mysqli_query($con,$sql);
        if($result){
          echo '<div class="alert alert-success" role="alert">
            Data Inserted Successfully</div>';
        }
        else{
            die(mysqli_error($con));

        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width , initial-scale=1">
	<title>Display Data</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <style>
    img{
      width: 200px;
    }
  </style>
</head>

<body>
   <h1 class="text-center my-4">User data</h1>
   <div class="container mt-5 d-flex justify-content-center">
   <table class="table table-bordered w-50">
  <thead class="table-dark">
    <tr>
      <th scope="col">S.no</th>
      <th scope="col">Username</th>
      <th scope="col">Image</th>
    </tr>
  </thead>
  <tbody>
    <?php
     $sql="SELECT * FROM `registration`";
     $result=mysqli_query($con,$sql);
     while($row=mysqli_fetch_assoc($result)){
      $id=$row['id'];
      $name=$row['name'];
      $image=$row['image'];
      echo ' <tr>
      <td>'.$id.'</td>
      <td>'.$name.'</td>
      <td><img src='.$image.'></td>
    </tr>';
     }
     
     
     ?>
   
  </tbody>
</table>
   </div>

</body>
</html>
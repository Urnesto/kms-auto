<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'db_connect.php';
    if (isSet($_POST['sentForm'])) {
        if (isSet($_POST['car_number']) && isSet($_POST['vin_code']) && isSet($_POST['phone']) && isSet($_POST['data'])) {
            $t = date('Y-d-m H:i:s',time());
            $car_number = $_POST['car_number'];
            $car_number = str_replace(' ', '', $car_number);
            $pass = $_POST['vin_code'];
            $email = $_POST['phone'];
            $brand = $_POST['brand'];
            $data = $_POST['data'];
            $successMessage = "";
            $errorMessage = "";
            $sql = "INSERT INTO `user` (`time`,`car_number`,`vin_code`,`phone`,`brand`,`data_text`) VALUES ('$t','$car_number', '$pass', '$email','$brand','$data')";
            $query = mysqli_query($conn,$sql);
            if ($query) {
                $successMessage = "user added";
            } else {
                $errorMessage = "all field required";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Modal</title>
    <link href="stylea.css" rel="stylesheet">
    <link href="navbar.css" rel="stylesheet">
    <script defer src="script.js"></script>
</head>
<body>

<nav>
    <div class="menu-icon">
        <span class="fas fa-bars"></span>
    </div>
    <div class="logo" >
      <a href="main.php" style="text-decoration: none ; color: #5737c4;"> <p>KMotoservice </p> </a>
    </div>

    <div class="search-icon">
        <span class="fas fa-search"></span>
    </div>
    <div class="cancel-icon">
        <span class="fas fa-times"></span>
    </div>
    <button data-modal-target="#modal" class="add-user">Add user</button>

        <form action='' method='POST'>
            <input type='search' placeholder="Search"  class="search-data" name='sentsearch' id="sentsearch" />
            <input type='submit' name='sentsubmit'  />
        </form>


</nav>


<!--add user-->
<div class="modal" id="modal">
    <div class="modal-header">
        <div class="title">Add user </div>
        <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
        <div class="modal-data">
            <form action='' method='POST'>
                <label for="user">Car Number :</label>	<br/>
                <input type='text' name='car_number' id="car_number"  required/><br/>

                <label for="user">Vin code:</label>	<br/>
                <input type='text' name='vin_code' id="vin_code"  required/><br/>

                <label for="user">Phone</label>	<br/>
                <input type='text' name='phone' id="phone"  required/><br/>

                <label for="user">Brand</label>	<br/>
                <input type='text' name='brand' id="brand"  required/><br/>

                <label  for="data">Enter data:</label>	<br/>
                <textarea rows="5" cols="60"  name='data' class="tex-data" id="data"  placeholder="Enter text"></textarea>

                <input type='submit' name='sentForm' id="sentForm" />
            </form>
        </div>
    </div>
</div>
<div id="overlay"></div>
<div class="search">


</div>

</body>
</html>
<?php
include 'search.php';
?>
<?php
if(!empty($successMessage)){
    ?>
    <link href="alert.css" rel="stylesheet">
    <div class="top-alert">
    <div class="alert warning">
        <input type="checkbox" id="alert1"/>
        <label class="close" title="close" for="alert1">

            <i class="icon-remove"></i>
        </label>
        <p class="inner">
            <strong>Success! </strong> User added successfully
        </p>
    </div>
    </div>

    </div>
<?php
}elseif (!empty($errorMessage)){
    ?>
    <script>alert("User didnt added ,something went wrong ");</script>
<?php
}
?>
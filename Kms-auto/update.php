<?php
$id=false;
$car_number=false;
$vin_code=false;
$phone=false;
$brand=false;
$data_text=false;
    if(isset($_POST['id'])){
        $id=$_POST['id'];
    }
if(isset($_POST['car_number'])){
    $car_number=$_POST['car_number'];
    $car_number = str_replace(' ', '', $car_number);
    if(empty($car_number)){
        echo 'Enter  car number ';

    }
}
if(isset($_POST['vin_code'])){
    $vin_code=$_POST['vin_code'];
    if(empty($vin_code)){
        echo 'Enter vin code ';
    }
}
if(isset($_POST['phone'])){
    $phone=$_POST['phone'];
    if(empty($phone)){
        echo 'enter phone failed phone ';
    }
}
if(isset($_POST['brand'])){
    $brand=$_POST['brand'];
    if(empty($brand)){
        echo 'enter brand ';
    }
}
if(isset($_POST['data_text'])){
    $data_text=$_POST['data_text'];
    if(empty($data_text)){
        echo 'enter data ';
    }
}
require_once 'db_connect.php';
if(!empty($id) &&  !empty($car_number) && !empty($vin_code) && !empty($phone) && !empty($brand) && !empty($data_text)){
    $sql = 'update user set car_number =?,vin_code=?,phone=?,brand=?,data_text=? where id=?';
    echo $sql;
    $stm=mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stm,"ssssss",$car_number,$vin_code,$phone,$brand,$data_text,$id);
    if(mysqli_stmt_execute($stm)){
        header("Location: http://localhost");

        exit();
    }else{
        ?>
        <link href="alert.css" rel="stylesheet">
        <div class="top-alert"">
        <div class="alert error">
            <input type="checkbox" id="alert1"/>
            <label class="close" title="close" for="alert1">

                <i class="icon-remove"></i>
            </label>
            <p class="inner">
                <strong>Warning!</strong> User update failed try again
            </p>
        </div>
        </div>

        </div>
<?php
    }
}else{
    ?>
    <link href="alert.css" rel="stylesheet">
    <div class="top-alert"">
    <div class="alert error">
        <input type="checkbox" id="alert1"/>
        <label class="close" title="close" for="alert1">

            <i class="icon-remove"></i>
        </label>
        <p class="inner">
            <strong>Warning!</strong> User update failed try again
        </p>
    </div>
    </div>

    </div>
    <?php
}
?>
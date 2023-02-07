<html>
<body>
<center>
    <?php
    $id=false;
    if(isset($_GET['id'])){
        $id=$_GET['id'];
    }
    require_once('db_connect.php');
    if(!empty($id)){
        $sql='select * from user where id=?';
        $stm=mysqli_prepare($conn,$sql);
        mysqli_stmt_bind_param($stm,"s",$id);
        if(mysqli_stmt_execute($stm)){
            $result=mysqli_stmt_get_result($stm);
            if(mysqli_num_rows($result)>0){
                $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
                ?>
                <link href="edit.css" rel="stylesheet">
    <div class="container">
                <form id="contact" action="update.php" method="post">
                    <fieldset>
                        <h1>Edit User</h1>
                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                    </fieldset>
                    <fieldset>
                        <a>Car number</a>
                         <input type="text" value="<?php echo $row['car_number']; ?>" tabindex="1" name="car_number"><br>
                    </fieldset>
                    <fieldset>
                        <a>Vin code</a>
                         <input type="text" value="<?php echo $row['vin_code']; ?>" tabindex="2" name="vin_code"><br>
                    </fieldset>
                    <fieldset>
                        <a>Phone number</a>
                         <input type="text" value="<?php echo $row['phone']; ?>" tabindex="3" name="phone"><br>
                    </fieldset>
                    <fieldset>
                        <a>Brand</a>
                        <input type="text" value="<?php echo $row['brand']; ?>" tabindex="4" name="brand"><br>
                    </fieldset>
                    <fieldset>
                        <a>Data about car</a>
                        <textarea placeholder="" tabindex="5" name="data_text" required><?php echo $row['data_text']; ?></textarea>

                    </fieldset>
                    <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
                </form>
    </div>
                <?php
            }
        }else{
            ?>
        }
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
    }
    ?>
</center>
</body>
</html>


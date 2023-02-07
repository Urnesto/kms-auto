<?php

if (isSet($_POST['sentsubmit'])) {
    $keyword = $_POST['sentsearch'];

    ?>

    <link href="index.css" rel="stylesheet">
    <div class="table-box">
    <div class="table-row table-head">
        <div class="table-cell first-cell">
            <p>Time</p>
        </div>
        <div class="table-cell">
            <p>Car number </p>
        </div>
        <div class="table-cell">
            <p>Vin code </p>
        </div>
        <div class="table-cell">
            <p>Phone </p>
        </div>
        <div class="table-cell">
            <p>Brand </p>
        </div>
        <div class="table-cell">
            <p>Data </p>
        </div>
        <div class="table-cell last-cell">
            <p>Edit</p>
        </div>
    </div>

    <?php
    require "db_connect.php";

    $query = mysqli_query($conn, "SELECT * FROM `user` WHERE CONCAT(car_number,vin_code) LIKE '%$keyword%' ORDER BY `car_number` LIMIT 10")
    or die(mysqli_error());
    if (mysqli_num_rows($query) == 0) {
        ?>
        <link href="alert.css" rel="stylesheet">
        <div class="top-alert"">
        <div class="alert error">
            <input type="checkbox" id="alert1"/>
            <label class="close" title="close" for="alert1">

                <i class="icon-remove"></i>
            </label>
            <p class="inner">
                <strong>Warning!</strong> User not found!
            </p>
        </div>
        </div>

        </div>
        <?php
    } else {
        while($row = mysqli_fetch_array($query)  ) {
            ?>

            <div class="table-row">
                <div class="table-cell first-cell">
                    <p><?php echo $row['time']?></p>
                </div>
                <div class="table-cell ">
                    <p><?php echo $row['car_number']?></p>
                </div>
                <div class="table-cell">
                    <p><?php echo $row['vin_code']?></p>
                </div>
                <div class="table-cell">
                    <p><?php echo $row['phone']?></p>
                </div>
                <div class="table-cell">
                    <p><?php echo $row['brand']?></p>
                </div>
                <div class="table-cell ">
                    <a><?php echo $row['data_text']?></a>
                </div>
                <div class=" last-cell">
                    <?php echo '<td><a href="edit.php?id='.$row['id'].'">Edit</a></td>';?>
                </div>
            </div>
            </div>
            <?php

        }

    }

}
?>
</table>
</div>
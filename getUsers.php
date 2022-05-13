<?php

include_once('config.php');

$result = mysqli_query($conn,"SELECT * FROM user");

while($row = mysqli_fetch_assoc($result)){

    if($row['user_status'] == 1){
        echo "<div style='color:#009900'>".$row['user_name']." (Online)".
              "</div>";
    }else{
        echo "<div style='color:#FF0000'>".$row['user_name']." (Offline)".
        "</div>";
    }
}


?>
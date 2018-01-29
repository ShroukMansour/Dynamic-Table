<?php
/**
 * Created by PhpStorm.
 * User: Shrouk Mansour
 * Date: 27-Jan-18
 * Time: 20:20
 */




$conn = mysqli_connect("localhost", "root", "",  "hackathon_task");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = mysqli_query($conn, "select * from  table_description");
while ($row = $sql->fetch_assoc()) {
    $r[] = $row;
}
echo json_encode($r);
mysqli_close($conn);
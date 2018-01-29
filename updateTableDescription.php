<?php
/**
 * Created by PhpStorm.
 * User: Shrouk Mansour
 * Date: 27-Jan-18
 * Time: 19:49
 */


$conn = mysqli_connect("localhost", "root", "",  "hackathon_task");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$cells_order = $_POST['cellsOrder'];
$width = $_POST['width'];
$height = $_POST['height'];

$sql = mysqli_query($conn, "update table_description set cells_order = '$cells_order', width=$width
                                   , height=$height where id=1");

echo "update table_description set cells_order = '$cells_order', width=$width , height=$height where id=1";
mysqli_close($conn);
<?php
/**
 * Created by PhpStorm.
 * User: Shrouk Mansour
 * Date: 27-Jan-18
 * Time: 21:02
 */


$conn = mysqli_connect("localhost", "root", "",  "hackathon_task");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'] ;
$click_num = $_GET['clickNum'];
$shaded = $_GET['shaded'];

$sql = mysqli_query($conn, "insert into table_cell values ($id, $click_num, $shaded)");
echo "insert into table_cell values ($id, $click_num, $shaded)";
mysqli_close($conn);
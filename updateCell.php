<?php
/**
 * Created by PhpStorm.
 * User: Shrouk Mansour
 * Date: 27-Jan-18
 * Time: 13:03
 */

$conn = mysqli_connect("localhost", "root", "",  "hackathon_task");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$id = $_GET['id'] ;
$click_num = $_GET['clickNum'];
$shaded = $_GET['shaded'];

$sql = mysqli_query($conn, "UPDATE table_cell SET click_num=$click_num, shaded=$shaded where id=$id");
echo "UPDATE table_cell SET click_num=$click_num, shaded=$shaded where id=$id";
mysqli_close($conn);
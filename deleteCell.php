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


$sql = mysqli_query($conn, "delete from table_cell where id=$id");
echo "delete from table_cell where id=$id";
mysqli_close($conn);
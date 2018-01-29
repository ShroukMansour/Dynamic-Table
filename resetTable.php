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


$sql = mysqli_query($conn, "update table_description set cells_order = '1', width=1
                                   , height=1 where id=1");
$sql = mysqli_query($conn , "drop  table table_cell");

$sql = mysqli_query($conn, "CREATE TABLE `hackathon_task`.`table_cell` ( `id` INT(15) NOT NULL AUTO_INCREMENT , 
                            `click_num` INT(15) NOT NULL , `shaded` BOOLEAN NOT NULL ,
                             PRIMARY KEY (`id`)) ENGINE = InnoDB;");

$sql= mysqli_query($conn, "INSERT INTO `table_cell` (`id`, `click_num`, `shaded`) VALUES (NULL, '0', '0');");
mysqli_close($conn);

//	click_num shaded(1)
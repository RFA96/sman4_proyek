<?php
/**
 * Created by PhpStorm.
 * User: raka_matsukaze
 * Date: 1/10/18
 * Time: 19:06 PM
 */
    include "../koneksi.php";
    mysql_query("UPDATE nilai SET " . $_POST["column"] . " = '".$_POST["editval"]."' WHERE id_nilai=".$_POST["id"]);
?>
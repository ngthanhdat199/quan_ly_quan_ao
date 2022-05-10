<?php
    require_once('config.php');

    function initDB($sql) {
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_query($con,$sql);
        mysqli_close($con);
    }

    function execute($sql) {
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        mysqli_query($con,$sql);
        mysqli_close($con);
    }

    function executeResult($sql, $onlyOne = false) {
        $con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
        $resultset = mysqli_query($con,$sql);
        if ($onlyOne) {
            $data = mysqli_fetch_array($resultset,1);
        } else {
            $data = [];
            while ($row = mysqli_fetch_array($resultset,1)) {
                $data[] = $row;
            }
        }

        mysqli_close($con);
        return $data;
    }
?>
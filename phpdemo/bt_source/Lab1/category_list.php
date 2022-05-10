<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type="text/css" href="main.css"/>
    <title>My Shop</title>
</head>
<?php 
    require_once("database.php");
    $query="Select * From danhmuc Order By madm";
    $result=$db->query($query);
?>
<body>
    <div id="page">
        <div id="header">
            <h1>Danh mục</h1>
            <table>
                <tr>
                    <th>Hãng</th>
                </tr>
                <?php foreach($result as $row) { ?>
                    <tr>
                        <td><?php echo $row["tendm"]; ?></td>
                    </tr>    
               <?php } ?>
            </table>
            <br/>
        </div>
        <div id="footer">
            <p>&copy; <?php echo date("Y"); ?> ABC SHOP</p>
        </div>
    </div>
</body>
</html>
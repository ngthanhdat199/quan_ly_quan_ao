<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" type="text/css" href="main.css"/>
    <title>Document</title>
</head>
<?php 
    require_once("database.php");
    //1. Lấy mã danh mục
    if(!isset($madm)){
        if(isset($_GET["madm"]))
        $madm = $_GET["madm"];
        if(!isset($madm)){
            $madm=1;
        }
    }
    //2. Lấy tên của danh mục hàng hoá hiện tại
    $query ="Select * From danhmuc where madm=$madm";
    $bangdm=$db->query($query);
    $danhmuc = $bangdm->fetch(PDO::FETCH_BOTH);
    $tendm = $danhmuc['tendm'];

    //3. Lấy tất cả danh mục hàng hoá
    $query = "Select * from danhmuc order by madm";
    $bangdm = $db->query($query);

    //4. Lấy tất cả mặt hàng thuộc danh mục đã chọn
    $query = "Select * from mathang Where madm=$madm order By mahang";
    $bangmh = $db->query($query);
?>
<body>
    <div id="page">
        <div id="header">
            <h1>ABC Shop</h1>
        </div>
    <div id="main">
        <h1>Danh sách mặt hàng</h1>
<!-- Hiển thị danh sách danh mục dưới dạng liên kết --> 
        <div id="sidebar">
            <h2>Danh mục</h2>
        <ul class="nav">
            <?php foreach($bangdm as $r){ ?>
                <li><a href="?madm=<?php echo $r["madm"]; ?>"> <?php echo $r["tendm"];
    ?>
        </a></li>
    <?php } ?>
    </div>
<!-- Hiển thị danh sách mặt hàng thuộc danh mục đã chọn -->
     <div id="content">
        <h2><?php echo $tendm; ?></h2>
    <table>
        <tr>
            <th>Tên</th><th>Giá</th>
        </tr>
            <?php foreach($bangmh as $row){ ?>
        <tr>
            <td><?php echo $row["tenhang"]; ?></td>
            <td><?php echo $row["giaban"]; ?></td>
        </tr>
        <?php } ?>
     </table>
        </div>
        </div>
        <div id="footer">
        <p>&copy; <?php echo date("Y"); ?> ABC Shop</p>
    </div>
</div>

</body>
</html>
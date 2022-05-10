<!DOCTYPE html>
<html>
<head>
	<title>News page</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
                <h3>Lộ trình học Front-end</h3>
            </div>
            <div class="panel-body" style="display: flex;height:100%">

                <?php
                $con = mysqli_connect('localhost','root', '', 'fullstack');
                $sql = 'select * from news';
                $result = mysqli_query($con,$sql);
                mysqli_close($con);
                while ($row = mysqli_fetch_array($result,1)) {
                    echo '    
                    <div class="row">
                        <div class="col-md-11">
                            <img src="'.$row['thumbnail'].'" style="width:100%; border-radius: 14px">
                            <p style="font-weight: 700">'.$row['title'].'</p>
                            <p>'.$row['updated_at'].'</p>
                        </div>
                    </div>';
                }
                ?>
            </div>
		</div>
	</div>
</body>
</html>
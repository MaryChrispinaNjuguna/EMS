<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="style_header.css">

	<title>AdminHub</title>
    <style> 
   
    #sidebar_board1 {
        height: 100px;
	background: #174e80;
	padding: 0 24px;
	display: flex;
	align-items: center;
	grid-gap: 24px;
	font-family: var(--lato);
	position: sticky;
	top: 0;
	left: 0;
	z-index: 1000;
    width: 100%
}
#sidebar_board1 .brand {
	font-size: 24px;
	font-weight: 700;
	height: 100px;
	display: flex;
	align-items: center;
	color: var(--light);
	position: sticky;
	top: 0;
	left: 0;
	background:#174e80;
	z-index: 500;
	box-sizing: content-box;
}
#sidebar_board1 .brand .bx {
	min-width: 60px;
	display: flex;
	justify-content: center;
}
#sidebar_board1 li a.admin {
	color: var(--yellow);
}

    </style>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar_board1">
		<a href="#" class="brand">
        <img src="logo2.png" width="85" height="60" alt="logo">
		</a>
        <nav>
        <a href="#" class="brand">
        <span class="text">KENYATTA UNIVERSITY</span>

        </a>
        
			<i ></i>
           
			<form style="float: right; width:1000px"action="#">
				<div class="form-input">
					
				</div>
			</form>
			
			
			
		</nav>
        <li style="float: right;">
				<a href="index.php" class="admin">
					<i class='bx bxs-home' ></i>
					<span class="text">Home</span>
				</a>
			</li>
		<li style="float: right;">
				<a href="admin_login.php" class="admin">
					<i class='bx bxs-user' ></i>
					<span class="text">Admin</span>
				</a>
			</li>
		
					
		
	</section>
	<!-- SIDEBAR -->



	
	
</body>
</html>
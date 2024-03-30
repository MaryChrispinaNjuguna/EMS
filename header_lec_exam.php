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
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar_board">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Lecturer View</span>
		</a>
		
					
		
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i ></i>
			<form action="#">
				<div class="form-input">
					
				</div>
			</form>
			
			
			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
</section>
	

	<script>
		function changeActiveTab(element) {
			// Remove the 'active' class from all <li> elements
			var tabs = document.querySelectorAll('.side-menu li');
			tabs.forEach(tab => {
				tab.classList.remove('active');
			});
		
			// Add the 'active' class to the clicked <li> element
			element.parentNode.classList.add('active');
		}
		</script>
</body>
</html>
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
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text">Student View</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="student_home.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="student_exams.php">
					<i class='bx bxs-book' ></i>
					<span class="text">Exams Scheduled</span>
				</a>
			</li>
			<li>
				<a href="student_results.php">
					<i class='bx bxs-report' ></i>
					<span class="text">Results</span>
				</a>
			</li>
			<li>
				<a href="student_profile.php">
					<i class='bx bxs-user' ></i>
					<span class="text">Profile</span>
				</a>
			</li>

			<li>
				<a href="logout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
					</ul>
		
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
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
		
		<!-- MAIN -->
	<!-- CONTENT -->
	

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
</script></body>
</html>
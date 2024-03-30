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
			<span class="text">Admin View</span>
		</a>
		<ul class="side-menu top">
			<li >
				<a href="admin_view.php"onclick="changeActiveTab(this)">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			
			<li>
				<a href="all_students.php" onclick="changeActiveTab(this)">
					<i class='bx bxs-group' ></i>
					<span class="text">Student Details</span>
				</a>
			</li>
			<li >
				<a href="all_lecturers.php" onclick="changeActiveTab(this)">
					<i class='bx bxs-group' ></i>
					<span class="text">Lecturer Details</span>
				</a>
			</li>
			<li>
				<a href="all_units.php"onclick="changeActiveTab(this)">
					<i class='bx bxs-book' ></i>
					<span class="text">Unit Details</span>
				</a>
			</li>
			<li>
				<a href="all_results.php"onclick="changeActiveTab(this)">
					<i class='bx bxs-report' ></i>
					<span class="text">Student Results</span>
				</a>
			</li>
			<li>
			<a href="logout.php" class="logout">
				<i class='bx bxs-log-out-circle' ></i>
				<span class="text">Logout</span>
			</a>
			</li>
			
			
		</ul>
		<ul class="side-menu">
			
			<li>
				
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
		<!-- NAVBAR -->

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
	

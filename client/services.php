<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Services - E-counselling</title>

	<link rel="stylesheet" href="assets/css/styles.css"/>

	<!-- CSS only -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"/>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

	<link rel="stylesheet" type="text/css" href="assets/css/services_style.css">
	<script src="https://kit.fontawesome.com/9d31eb0257.js"></script>
</head>
<body>
	<?php
	include "includes/db.inc.php";
	include "includes/loginverify.inc.php";

	//check session
	if (!isset($_SESSION['users_id'])) {
		header("Location: login.php");
	}
	?>
	
	<div class="w-100">
		<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #116736; color: white;">
			<div class="container-fluid">
				<img class="logo" src="assets/img/isu_seal.png" style="height:60px;">
				<span class="top-bar-title ms-4 me-5">ISU E-counselling</span>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
						<li class="nav-item">
							<a class="nav-link " href="main.php">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="services.php">Services</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="appointment.php">Appointment</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>

		<div class="paragraph">
			<p style="margin-left: 20px;">
				<h3 style="font-weight: bold;">INDIVIDUAL INVENTORY</h3>
				This service is one of the gathering, recording and making available information about a student which will be useful to those teaching or counseling him. Hence, the collection of information about the students include records of student???s home and family background, health, school attendance, grades, extracurricular activities and results of standardized / psychological tests. The Student???s Guidance Envelope also contains counseling interviews, reports of any incident involving the students and other relevant matters which may contribute to a better understanding of the individual.
			</p>

			<p>
				<div class="label">
					<h3 style="font-weight: bold;">COUNSELLING SERVICES</h3>
				</div>

				The counseling services provide assistance to students in making decision about their problems. Individual or group counseling sessions are made available for all students with academic, personal, interpersonal, career concerns and other problems affecting them

				<h5>Categories:</h5>
				<div class="row">
					<div class="col">
						<div class="leftside">
							<h4>Counselling Types:<h4>
							<h6>Individual Counselling</h6>
							<h6>Group Counselling</h6>
							<h6>Follow-up</h6>
							<h6>Consultation</h6>
						</div>
						<div class="rightside">
							<h4>Counselling cases:</h4>
							<h6>Family</h6>
							<h6>Girl-Boy relationship</h6>
							<h6>Personal</h6>
							<h6>Testing interpretation</h6>
							<h6>Academics</h6>
							<h6>Interpersonal</h6>
							<h6>Gender sencitivity issues</h6>
							<h6>Cultural differences</h6>
							<h6>Career concerns</h6>
						</div>
					</div>
				</div>
			</p>

			<p>
				<h3 style="font-weight: bold;">INFORMATION SERVICES</h3>
				These services consist of the provision of up-to-date, accurate and a wide range of materials of an informational nature in such areas as vocational, educational, personal, socio-cultural, spiritual and moral. These also provide adequate materials concerning the world of work. Group guidance activities and other activities dealing with orientation to a new school/work place, career symposium, articulation between school levels are included in this service
			</p>

			<p>
				<h3 style="font-weight: bold;">FOLLOW-UP SERVICES</h3>
				The follow-up services are concerned with the problems of how well the students of the College get along when they leave school. This include their conduct and progress in the work place.
			</p>

			<p>
				<h3 style="font-weight: bold;">PSYCHOLOGICAL TESTING AND EVALUATION</h3>
				This service is given to students who may be in need of such and whose evaluation may be an aide of a tool in the helping process, which include mental ability test, aptitude, personality, interest, work values and emotional quotient appraisal.
			</p>

			<p>
				<h3 style="font-weight: bold;">REFERRAL</h3>
				Those cases which are considered beyond the scope of expertise of the office are referred to more experienced and competent professionals as part of the helping process
			</p>

			<p>
				<h3 style="font-weight: bold;">PLACEMENT SERVICES</h3>
				The placement services are composed of those activities outside the general classroom instruction that aid the students in achieving their career goals. More specifically, it helps the students with their need relating to career fulfilment. It helps the students satisfy these needs by assisting them in finding fulltime and/or summer employment, selecting and obtaining admission to curricular offering of the Institute or select the course that would fit most to their abilities and interest and would meet their needs. The placement service also provides referrals to resources that would provide assistance for special problems in areas such as economic welfare i.e. scholarship or grants-in-aid; marital and family problems; and vocational rehabilitation; and on-the-job training and others. Moreover, one of its major concerns is the establishing and maintaining of linkages in the industrial sectors and other agencies.
			</p>
		</div>
	</div>
</body>
</html>
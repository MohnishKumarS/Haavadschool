<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<link rel="shortcut icon" type="image/png" href="assets/img/harvard_favicon.png"/>
    <title>Procedure - Haavad International School</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/css/styles.css?ver=01.25.2018.01" rel="stylesheet">
	
	<!-- Font montserrat -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/fontawesome.min.css" rel="stylesheet">

  </head>
  <body>
	<?php include 'control-panel/php/header.php'?>

		<div id="Rules-page-fold">
			<div class="text-center">
				<h1><i class="fa fa-pencil-square-o" aria-hidden="true"></i>&nbsp;Procedure</h1>
			</div>
		</div>

		<div class="about-mv">
			<div class="container">
				<div class="col-md-8 col-md-offset-2 col-sm-12">
					<p><strong>ADMISSION AND WORDS TO STUDENTS</strong></p>
					<br>
					<ol>
						<li>Admission is given for classes Pre.K.G to VII std according to the availability of seats. The Students have to produce
							a copy of their birth certificate. Transfer Certificate and Mark statement in originals and three copies of passport
							size photographs at the time of admissions.</li>
						<li>Issue of prospectus and Application forms will be from April of every year. Entrance test will be conducted in the last
							week of April and May. Admission closes on 31st of May of every year.</li>
						<li>At the time of admission, the parents have to pay the fee prescribed If the parents wish to cancel the admission, the
							amount paid will not be refunded.</li>

					</ol>
					<br>

					<p><strong>AGE CRITERIA</strong></p>
					<br>
					<table class="table">
						<thead>
							<tr>
								<th>Class</th>
								<th>Age completed as on 1st June</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Pre School</td>
								<td>2.5 Years</td>
							</tr>
							<tr>
								<td>Junior kindergarten</td>
								<td>3 Years</td>
							</tr>
							<tr>
								<td>Senior kindergarten</td>
								<td>4 Years</td>
							</tr>
							<tr>
								<td>Grade 1</td>
								<td>5 Years</td>
							</tr>
							<tr>
								<td>Grade 2</td>
								<td>6 Years</td>
							</tr>
							<tr>
								<td>Grade 3</td>
								<td>7 Years</td>
							</tr>
							<tr>
								<td>Grade 4</td>
								<td>8 Years</td>
							</tr>
							<tr>
								<td>Grade 5</td>
								<td>9 Years</td>
							</tr>
							<tr>
								<td>Grade 6</td>
								<td>10 Years</td>
							</tr>
							<tr>
								<td>Grade 7</td>
								<td>11 Years</td>
							</tr>
						</tbody>
					</table>
					<br>

					<p style="text-align:center;text-transform:uppercase;"><B>Haavad Online Admission Form & Fee Structure Enquiry Form</B></p>
					<br>
					<form  style="margin-bottom:20px;" id="Admission-form" class="form-horizontal col-md-12 col-sm-12" action="control-panel/php/mail-form.php" method="POST">
						<input type="hidden" name="formType" value="Admission Application" data-field-name="Application_Type">
						<div class="form-group">
							<label for="name">Student Name:</label>
							<input type="text" name="studentName" class="form-control" id="name" data-field-name="Student Name" required>
						</div>
						<div class="form-group">
							<label for="primarycontact">Primary Contact No:</label>
							<input type="tel" name="contactNum" class="form-control" id="contact" data-field-name="Primary Contact No" required>
						</div>
						<div class="form-group">
							<label for="grade">Grade:</label>
							<input type="text" name="grade" class="form-control" id="grade" data-field-name="Grade" required>
						</div>
						<div class="form-group">
							<label for="campus">Campus:</label>
							<input type="text" name="campus" class="form-control" id="campus" data-field-name="Campus" required>
						</div>
						<div class="form-group">
							<label for="mothername">Mother Name:</label>
							<input type="text" name="motherName" class="form-control" id="mother-name" data-field-name="Mother Name" required>
						</div>
						<div class="form-group">
							<label for="fathername">Father Name:</label>
							<input type="text" name="fatherName" class="form-control" id="father-name" data-field-name="Father Name" required>
						</div>
						<div class="form-group">
							<label for="mothercontact">Mother Contact No:</label>
							<input type="tel" name="motherContactNum" class="form-control" id="mobile-1" data-field-name="Mother Contact No" required>
						</div>
						<div class="form-group">
							<label for="fathercontact">Father Contact No:</label>
							<input type="tel" name="fatherContactNum" class="form-control" id="mobile-2" data-field-name="Father Contact No" required>
						</div>
						<div class="form-group">
							<label for="motheremail">Mother Email ID:</label>
							<input type="email" name="motherMailID" class="form-control" id="email-1" data-field-name="Mother Email ID">
						</div>
						<div class="form-group">
							<label for="fatheremail">Father Email ID:</label>
							<input type="email" name="fatherMailID" class="form-control" id="email-2" data-field-name="Father Email ID">
						</div>
						<div class="form-group">
							<label for="address">Address:</label>
							<textarea class="form-control" name="address" rows="5" id="address" data-field-name="Address" required></textarea>
						</div>
						<button type="submit" class="btn btn-success">Submit</button>
						<br/>
					</form>
					<br><br/>
					<br>
					
				</div>
			</div>
		</div>

	<?php include 'control-panel/php/footer.php';?>
		<div class="footer-copy text-center">
			<p>&copy; Copyrights
				<script>document.write(new Date().getFullYear())</script>, Haavad Hi-Tech Matric Higher Secondary School</p>
		</div>

		<div id="Uploading-data" style="display:none;width:500px;height: 100px;position: fixed;top:50%;left:50%;transform:translate(-50%,-50%);z-index: 10000000000;background: white;box-shadow: 0 0 5px #aaa;text-align: center;vertical-align: middle;">
			<div style="
			top: 50%;
			position: relative;
			transform: translateY(-50%);
			font-size: 18px;
			padding: 10px;
			color: mediumvioletred;">Submitting your form. Please wait <i class="fa fa-cog fa-spin"></i></div>
		</div>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/main.js"></script>
		<script src="assets/js/mail-form.js"></script>
		<!-- Font awesome -->
		<script src="https://use.fontawesome.com/26689146d3.js"></script>
	</body>

</html>
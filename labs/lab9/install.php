<!DOCTYPE html>
<html>
	<head>
		<title>Installing Shiz</title>
	</head>
	<body>
		<main>
			<?php
				require './id.php';

				$idHost = $identity['dbHost'];
				$idName = $identity['dbName'];
				$idUser = $identity['dbUser'];
				$idPass = $identity['dbPass'];

				try {
					// create and execute the connection
					$dbc = new PDO("mysql:host=$idHost", $idUser, $idPass);
					$dbc -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$dbSQL = "CREATE DATABASE IF NOT EXISTS `$idName`; use `$idName`";
					
					// COURSES
					$tbCourses = "CREATE TABLE IF NOT EXISTS courses(crn INT(11) AUTO_INCREMENT, prefix VARCHAR(4) NOT NULL, number SMALLINT(4) NOT NULL, title VARCHAR(255) NOT NULL, section INT(2) NOT NULL, year INT(4) NOT NULL, PRIMARY KEY (crn))";
					// STUDENTS
					$tbStudents = "CREATE TABLE IF NOT EXISTS students(rin INT(9) AUTO_INCREMENT, rcsID CHAR(7), fname VARCHAR(100) NOT NULL, lname VARCHAR(100) NOT NULL, alias VARCHAR(100) NOT NULL, phone INT(10), street VARCHAR(100) NOT NULL, city VARCHAR(100) NOT NULL, state CHAR(2) NOT NULL, zip INT(5) NOT NULL, PRIMARY KEY (rin))";
					// GRADES
					$tbGrades = "CREATE TABLE IF NOT EXISTS grades(id INT(11) AUTO_INCREMENT, crn INT(11), rin INT(9), grade INT(3) NOT NULL, PRIMARY KEY (id), FOREIGN KEY (crn) REFERENCES courses (crn), FOREIGN KEY (rin) REFERENCES students (rin))";

					$dbc->exec($dbSQL);
					$dbc->exec($tbCourses);
					$dbc->exec($tbStudents);
					$dbc->exec($tbGrades);

					echo "<span class=\"success\">All ready to go!</span>";
				}
				catch (PDOException $err) {
					echo '<span class="fail">There\'s been an error: ' . $err->getMessage() . '</span>';
				}

				// close the connection
				$dbc = null;
			?>
		</main>
	</body>
</html>
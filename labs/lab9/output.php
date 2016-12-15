<!DOCTYPE html>
<html>
	<head>
		<?php if (isset($_GET['dispGrades'])): ?>
			<title>A List of Grades</title>
		<?php else: ?>
			<title>A List of Students, A-Z</title>
		<?php endif; ?>
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
					$dbc = new PDO("mysql:host=$idHost;dbname=$idName", $idUser, $idPass);
					$dbc -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					if (isset($_GET['dispGrades'])) {
						$a = "SELECT COUNT(*) FROM grades WHERE (90 <= grade && grade <= 100)";
						$b = "SELECT COUNT(*) FROM grades WHERE (80 <= grade && grade <= 89)";
						$c = "SELECT COUNT(*) FROM grades WHERE (70 <= grade && grade <= 79)";
						$d = "SELECT COUNT(*) FROM grades WHERE (65 <= grade && grade <= 69)";
						$f = "SELECT COUNT(*) FROM grades WHERE (grade < 65)";

						echo "<p>90-100: " . $dbc->query($a)->fetchColumn();
						echo "<br/>80-89: " . $dbc->query($b)->fetchColumn();
						echo "<br/>70-79: " . $dbc->query($c)->fetchColumn();
						echo "<br/>65-69: " . $dbc->query($d)->fetchColumn();
						echo "<br/>0-64: " . $dbc->query($f)->fetchColumn() . "</p>";
					}
					else {
						$students = "SELECT * FROM students ORDER BY lname,fname ASC";

						foreach($dbc->query($students) as $stud) {
							echo "Name: " . $stud['fname'] . " " . $stud['lname'] . "<br/>";
						}
					}
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
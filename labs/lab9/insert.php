<!DOCTYPE html>
<html>
	<head>
		<title>Inserting Shiz</title>
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

					//COURSES
					$tbCourses = "INSERT INTO courses (crn, prefix, number, title, section, year) VALUES
						(38132, 'ITWS', 4500, 'Web Science Systems Development', 1, 2017),
						(39066, 'ITWS', 1220, 'IT and Society', 2, 2017),
						(37915, 'CSCI', 1200, 'Data Structures', 9, 2017),
						(38201, 'CSCI', 2200, 'Foundations of Computer Science', 3, 2017),
						(37385, 'COMM', 1600, 'History and Culture of Games', 1, 2017),
						(39062, 'COMM', 2520, 'Intro to Game Storytelling', 2, 2017),
						(35098, 'CIVL', 4080, 'Concrete Design', 1, 2017),
						(38569, 'CIVL', 4280, 'Design for Constructability', 1, 2017),
						(35804, 'LGHT', 6770, 'Light and Health', 1, 2017),
						(35685, 'LGHT', 6760, 'Lighting Workshop', 1, 2017),
						(95875, 'CSCI', 1600, 'Computers and Cows Go M30W', 1, 2017),
						(78935, 'WRIT', 1200, 'Writing for Livelies', 2, 2017),
						(84936, 'ITWS', 1340, 'IT for Livelies', 3, 2017),
						(81455, 'PSYC', 3400, 'The Psychology of a Bovine Creature', 1, 2017),
						(27024, 'PSYC', 2200, 'The Psychology of a Feline Creature', 2, 2017)";
					//STUDENTS
					$tbStudents = "INSERT INTO students (rin, rcsID, fname, lname, alias, phone, street, city, state, zip) VALUES
						(527070068, 'corril', 'Lorenzo', 'Corrin', 'corril@rpi.edu', 2025550181, '2715 Sarah Drive', 'Carlyss', 'LA', 70663),
						(382373010, 'suevem', 'Mary', 'Suevelster', 'suevem@rpi.edu', 2025550100, '3007 Bell Street', 'New York', 'NY', 10004),
						(870026810, 'lawlem', 'Marshal', 'Lawlenger', 'lawlem@rpi.edu', 2025550171, '1798 Hog Camp Road', 'Schaumburg', 'IL', 60173),
						(516540426, 'smithw', 'William', 'Smitherson', 'smithw@rpi.edu', 2025550188, '4784 Collins Street', 'Brockway', 'PA', 15824),
						(123601163, 'abducc', 'Chorrio', 'Abductulla', 'abducc@rpi.edu', 2025550179, '3365 Wetzel Lane', 'Nevada', 'MS', 64772),
						(971439580, 'palenm', 'Menagash', 'Palendra', 'palenm@rpi.edu', 2025550109, '4577 Oral Lake Road', 'Apple Valley', 'MN', 55124),
						(591679511, 'cathet', 'Tom', 'Cathertiona', 'cathet@rpi.edu', 2025550138, '3669 Sherwood Circle', 'Lafayette', 'LI', 70501),
						(860550028, 'borrat', 'Travis', 'Borranger', 'borrat@rpi.edu', 2025550158, '3934 Riverwood Drive', 'Burney', 'CA', 96013),
						(102074004, 'lorkoh', 'Horracia', 'Lorkon', 'lorkoh@rpi.edu', 2025550170, '3605 Werninger Street', 'Houston', 'TX', 77032),
						(33654557, 'herral', 'Lucy', 'Herranzo', 'herral@rpi.edu', 2025550170, '1300 Glen Street', 'Greensburg', 'KT', 42743),
						(111111111, 'boomec', 'Captain', 'Boomerang', 'boomec@rpi.edu', 2002002001, '4th Street', 'Tiffin', 'OH', 44883),
						(222222222, 'snowmf', 'Frosty', 'Snowman', 'snowmf@rpi.edu', 2002002002, '5th Street', 'Brockton', 'MA', 2301),
						(333333333, 'arrowg', 'Green', 'Arrow', 'arrowg@rpi.edu', 2002002003, '6th Street', 'Michigan City', 'IN', 46360),
						(444444444, 'allenb', 'Barry', 'Allen', 'allenb@rpi.edu', 2002002004, '7th Street', 'Brainerd', 'MN', 56401),
						(555555555, 'smoakf', 'Felicity', 'Smoake', 'smoakf@rpi.edu', 2002002005, '8th Street', 'Woodhaven', 'NY', 11421)";
					//GRADES
					$tbGrades = "INSERT INTO grades (id, crn, rin, grade) VALUES
						(1922355554, 38132, 527070068, 80),
						(961206656, 39066, 527070068, 100),
						(1392762341, 38132, 382373010, 98),
						(766603131, 38201, 527070068, 23),
						(1235081465, 38132, 123601163, 45),
						(655891091, 39066, 382373010, 76),
						(1204434709, 37385, 527070068, 67),
						(953924192, 38132, 33654557, 87),
						(40393492, 39062, 382373010, 89),
						(1881986, 35098, 123601163, 99),
						(1307549882, 39066, 123601163, 76),
						(1665351371, 38569, 123601163, 86),
						(1681317961, 35804, 33654557, 87),
						(1957716333, 35685, 33654557, 34),
						(1000076298, 37915, 33654557, 57),
						(742603433, 38201, 102074004, 79),
						(1832937544, 37385, 102074004, 78),
						(1480657479, 39062, 102074004, 93),
						(240683558, 38132, 971439580, 95),
						(1726389275, 39066, 102074004, 98),
						(11, 84936, 382373010, 75),
						(22, 84936, 102074004, 92),
						(33, 78935, 382373010, 89),
						(44, 95875, 222222222, 99),
						(55, 27024, 444444444, 100)";

					$dbc->exec($tbCourses);
					$dbc->exec($tbStudents);
					$dbc->exec($tbGrades);

					echo "<span class=\"success\">Inserts successful!</span>";
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
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Bob’s Entertainment SuperSite Department Listings</title>
		<link rel="stylesheet" href="styles.css">
	</head>
	<body>
		<?php
			// FILENAME: 	bizal.bobs1.php
			// AUTHOR: 		Marcus Bizal
			// DESCRIPTION: This program takes a post request and
			//				creates a dynamic formatted list
			//				of inventory for Bob’s Entertainment SuperSite
			//				for the selected department and enables
			//				a selection for ordering.

			include "utilities.php";
			include "setup.php";
		?>
		<h1>Bob’s Entertainment SuperSite <? echo $department; ?> Department Listings</h1>
		<p>Please check the boxes next to items below to add them to your cart where you can see more info</p>
		<form action="bizal.bobs2.php" method="post">
			<?php
						$query = "SELECT ID, entertainerauthor, title, media, feature FROM products WHERE department = \"$department\"";
						createTableFromSQLResults(
													array("Select", "ID", "Entertainer/Author", "Title", "Media", "Feature"),
													mysqli_query($link, $query),
													true
												);

						mysqli_close($link);
			?>
			<br/>
			<input type="hidden" name="department" value="<? echo $department; ?>">
			<button type="submit" value="Submit">Add To Cart</button>
			<button type="reset" value="Reset">Reset</button>
		</form>
	</body>
</html>

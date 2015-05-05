<?Php
	// get category list from database in table category
	require ('dbconn.php');
	$myData = 'SELECT * FROM category';
		$statement = $db->prepare($myData);
		$statement->execute();
		$categories = $statement->fetchAll();
		$statement->closeCursor();	 
?>
<html>
<head>
<title>
Create Event
</title>
<link rel="stylesheet"type="text/css" href="homeLayout.css">
</head>
<body>
<form action="event.php" method="POST" class="mainbody">
<?Php // load category list.?>
<b>Category:</b>
<select name="select" >
		<option value="0"> -- Select Category -- </option>
		<?Php foreach ($categories as $category) :?>
			<option value = "<?Php echo $category['CategoryID']; ?>">
			<?Php echo $category['CategoryTitle']; ?>
			</option>
		<?Php endforeach; ?>
</select>
	<br/><?Php //capture event details?>
	<b>Event Title:</b> <input type="text" name="eventTitle"/><br/>
	<b>Event Description:</b> <input type="text" name="eventDesc"/><br/>
	<b>Date:</b><input type="text" name="dateTime"/><br/>
	<b>Location:</b><input type="text" name="location"/><br/>
	<input type='submit' value='Create'/>	
</form>
</body>
</html>
<?php
include_once 'upload.php';
include_once 'load_session_data.php';
include_once 'save_session_data.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
	<link rel="stylesheet" type="text/css" href="dark_theme_style.css"/>
	<title>Practice 5</title>
	<style><?php echo file_get_contents($_SESSION['css_path']); ?></style>
  </head>
  <body>
	<h1>Configurations</h1>
	<form action="index.php" method="post">
	  <div>
		<input type="radio" id="light_theme" name="color_theme" value="light" <?php if ($_SESSION['light_color_theme'] === "true") {echo "checked";}?>>
		<label for="light_theme">Light</label>
		<input type="radio" id="dark_theme" name="color_theme" value="dark" <?php if ($_SESSION['dark_color_theme'] === "true") {echo "checked";}?>>
		<label for="dark_theme">Dark</label>
	  </div>
	  <div>
		<input type="radio" id="rus_lang" name="language" value="rus" <?php if ($_SESSION['rus_lang'] === "true") {echo "checked";}?>>
		<label for="rus_lang">Rus</label>
		<input type="radio" id="eng_lang" name="language" value="eng" <?php if ($_SESSION['eng_lang'] === "true") {echo "checked";}?>>
		<label for="eng_lang">Eng</label>
	  </div>
	  <div>
	  <label for="username">Username</label>
	  <input type="text" id="username" name="username" maxlength="20" size="20" value=<?php echo $_SESSION['username'];?>>
	  </div>
	  <button type="submit" name="save_session">Save</button>
	</form>
	<?php
	if ($_SESSION['rus_lang'] === "true") {
	  echo '<h1>Привет, ' . $_SESSION['username'] . '</h1>';
	} else {
	  echo '<h1>Hello, ' . $_SESSION['username'] . '</h1>';
	}
	?>

	<h1>Upload pdf</h1>
	<form action="index.php" method="post" enctype="multipart/form-data" >
		<input type="file" name="fileToUpload" accept=".pdf" required> <br>
		<button type="submit" name="upload">Upload</button>
	</form>
	<h1>Files:</h1>
	<table>
		<tr><th>Id</th><th>Filename</th><th>Size</th><th>Upload date</th><th>Link</th></tr>
	<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . '/connect_db.php');
	$result = $mysqli->query("SELECT * FROM uploaded_files");
	foreach ($result as $row){
		echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['size']}</td><td>{$row['upload_date']}</td><td><a href='download/pdf_file.php?id={$row['id']}' target='_blank'>Download</a></td></tr>";
	}
	?>
	</table>
  </body>
</html>

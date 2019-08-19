<?php
	if(isset($_GET["error"])) {
		echo '<div class="error">';
		echo '<p>'.$_GET["error"].'</p>';
		echo '</div>';
	} elseif (count($errors) > 0) {
		echo "<div class='error'>";
		foreach($errors as $msg)
			echo "<p>".$msg."</p>";
		echo "</div>";
	}

	if(isset($_GET["success"])) {
		echo '<div class="success">';
		echo '<p>'.$_GET["success"].'</p>';
		echo '</div>';
	} elseif (count($success) > 0) {
		echo "<div class='success'>";
		foreach($success as $msg)
			echo "<p>".$msg."</p>";
		echo "</div>";
	}
?>
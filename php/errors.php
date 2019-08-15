<?php 
	if(isset($_GET["error"])) {
		echo '<div class="error">';
		echo '<p>'.$_GET["error"].'</p>';
		echo '</div>';
	} elseif (count($errorArray) > 0) {
		echo "<div class='error'>";
		foreach($errorArray as $msg)
			echo "<p>".$msg."</p>";
		echo "</div>";
	}

?>
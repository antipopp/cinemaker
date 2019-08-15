<?php if(isset($_GET["error"])){ ?>
	<div class="error">
		<p><?php echo $_GET["error"]?></p>
	</div>
<?php } else {
		if(count($errorArray) > 0) {
			echo "<div class='error'>";
				foreach($errorArray as $msg)
					echo "<p>".$msg."</p>";
			echo "</div>";
		}		
} ?>
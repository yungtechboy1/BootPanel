<h3><b><span class="glyphicon glyphicon-hdd"></span> <u>HDD Usage</u></b></h3>
<div class="progress">
	<?php
		$percent = BootPanel::getAPI()->getStat()->getHDD();
		echo '<div class="progress-bar" role="progressbar" aria-valuenow="'. $percent .'" aria-valuemin="0" aria-valuemax="100" style="width: '. $percent .'%;">';
		echo $percent .'%';
	?>
	</div>
</div>
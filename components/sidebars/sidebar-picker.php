
	<?php
        $sidebarSettings = get_field('sidebar_settings');
        if ($sidebarSettings):?>
		<?php
		$sidebarType = $sidebarSettings['sidebar_type'];
			if($sidebarType && $sidebarType == "Share") :?>
        	<?php include "share-sidebar.php"; ?>

		  	<?php elseif ($sidebarType && $sidebarType == "Resources"):?>
			<?php include "share-resources.php"; ?>

			<?php elseif ($sidebarType && $sidebarType == "Donate"):?>
			<?php include "share-donate.php"; ?>

			<?php else:?>
			 <?php echo '<p>sidebar</p>'; ?>
			
		<?php endif; ?>
	<?php endif; ?> 
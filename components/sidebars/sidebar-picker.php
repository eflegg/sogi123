
	<?php
   

		
			if($sidebarType && $sidebarType == "Share") :?>
        	<?php include "share-sidebar.php"; ?>

		  	<?php elseif ($sidebarType && $sidebarType == "Resources"):?>
			<?php include "resource-sidebar.php"; ?>

			<?php elseif ($sidebarType && $sidebarType == "Donate"):?>
			<?php include "donate-sidebar.php"; ?>

			<?php else:?>
				<?php include "share-sidebar.php"; ?>
			
		<?php endif; ?>

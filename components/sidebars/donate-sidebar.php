<?php
$sidebarText = $sidebarSettings['donate_text'];
$current_lang = pll_current_language(); 
;?>

<div class="shape "></div>
<div class="share-sidebar <?php echo $sidebarType;?>">
    <div class="share--inner">
        <h3><?php if($current_lang == 'fr'): echo 'Faire un don'; else: echo 'Donate'; endif; ?></h3>
        <p><?php echo $sidebarText;?></p>
        <a href="https://www.arcfoundation.ca/donate/#donation-links" target="_blank" class="text-center button btn--fat">
        <span class="text-center"><?php if($current_lang == 'fr'): echo 'Faire un don'; else: echo 'Donate'; endif; ?></span>
        </a>
    </div>
</div>
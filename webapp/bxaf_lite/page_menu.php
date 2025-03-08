<style>
/* space for top menu bar */
    body {
        padding-top: 3.5rem;
    }
</style>

<nav id='navigation-bar' class="navbar navbar-expand-lg fixed-top ps-3 <?php echo $BXAF_CONFIG['BXAF_PAGE_CSS_MENU']; ?>">

	<?php
		$temp_icon_link = $BXAF_CONFIG['BXAF_APP_SUBDIR_OVERRIDE'];
		if ($temp_icon_link == '') $temp_icon_link = $BXAF_CONFIG['BXAF_APP_SUBDIR'];
		
	?>
    <a class="navbar-brand" href="/<?php echo $temp_icon_link; ?>">
    	<?php
            if ($BXAF_CONFIG['BXAF_PAGE_APP_LOGO_URL'] != ''){
                echo "<img src='{$BXAF_CONFIG['BXAF_PAGE_APP_LOGO_URL']}' style='img-fluid'/> ";
            } else if ($BXAF_CONFIG['BXAF_PAGE_APP_ICON_CLASS'] != ''){
                echo "<i class='{$BXAF_CONFIG['BXAF_PAGE_APP_ICON_CLASS']}'></i> ";
            }

            if ($BXAF_CONFIG['BXAF_PAGE_APP_NAME_SHOW']){
				echo $BXAF_CONFIG['BXAF_PAGE_APP_NAME'];
			}
		?>
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-bs-toggle="collapse" data-target="#navbarNavDropdown" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    
</nav>

<style>
.bx-btn-circle {
  width: 30px;
  height: 30px;
  text-align: center;
  padding: 6px 0;
  font-size: 12px;
  line-height: 1.428571429;
  border-radius: 15px;
}
</style>
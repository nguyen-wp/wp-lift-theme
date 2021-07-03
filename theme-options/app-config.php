<?php

// https://docsv3.redux.io/
// https://devs.redux.io/core-fields/

if ( ! class_exists( 'Redux' ) ) {
	return;
}

require_once 'options/options.php';
require_once 'options/helps.php';
// INI TABS
require_once 'tabs/tab-css-js.php';
require_once 'tabs/tab-layout.php';
require_once 'tabs/tab-typography.php';
require_once 'tabs/tab-header.php';
require_once 'tabs/tab-footer.php';
require_once 'tabs/tab-social.php';
// require_once 'tabs/tab-full.php';
// CALL ACTION 
require_once 'options/docs.php';
require_once 'options/init.php';

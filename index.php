<?php
require_once(dirname(__FILE__)."/../../config.php");
global $OUTPUT, $PAGE, $CFG, $plugin;
require_login();

//set to true before deploy and run npm run build on the app forlder
$prod = false;

//get the manifest from the build folder
$string = file_get_contents("./app/build/asset-manifest.json");
$manifest = json_decode($string, true);
if ($prod) {
    $PAGE->requires->css(new moodle_url("./app/build/" . $manifest["main.css"]), true);
    $PAGE->requires->js(new moodle_url("./app/build/" . $manifest["main.js"]), false);
}

echo $OUTPUT->header();
echo '<div id="root"></div>';
if (!$prod) {
    echo '<script type="text/javascript" src="http://localhost:3000/static/js/bundle.js"></script>';
}

echo $OUTPUT->footer();


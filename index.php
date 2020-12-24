<?php
require_once(dirname(__FILE__)."/../../config.php");
global $OUTPUT, $PAGE, $CFG, $plugin;
require_login();

//$PAGE->requires->js_call_amd('local_axcoursemanager2/init', 'init');

//get the manifest from the build folder
$string = file_get_contents("./app/build/asset-manifest.json");
$manifest = json_decode($string, true);
//var_dump($manifest);
$PAGE->requires->css(new moodle_url("./app/build/" . $manifest["main.css"]), true);
$PAGE->requires->js(new moodle_url("./app/build/" . $manifest["main.js"]), false);

echo $OUTPUT->header();
echo '<div id="root"></div>';
echo $OUTPUT->footer();


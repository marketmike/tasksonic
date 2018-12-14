<?php

/*   
 *   FACEBOOK CONNECT LIBRARY FUNCTIONS/CLASSES
 */

/*   
 *   FILE INCLUDE PATHS
 *   MAKE SURE THESE PATHS ALL END WITH A FORWARD SLASH
 */

define(CONNECT_APPLICATION_PATH, "D:\webapps_dev\taskrunner\connect\facebook-client\");
define(CONNECT_JAVASCRIPT_PATH, "http://www.tasksonic.com/connect/javascript/");
define(CONNECT_CSS_PATH, "http://www.tasksonic.com/connect/css/");
define(CONNECT_IMG_PATH, "http://www.tasksonic.com/connect/img/");

include_once CONNECT_APPLICATION_PATH . 'facebook-client/facebook.php';
include_once CONNECT_APPLICATION_PATH . 'lib/fbconnect.php';
include_once CONNECT_APPLICATION_PATH . 'lib/core.php';
include_once CONNECT_APPLICATION_PATH . 'lib/user.php';
include_once CONNECT_APPLICATION_PATH . 'lib/display.php';

/*   
 *   FB CONNECT APPLICATION DATA
 */

$callback_url    = 'http://www.tasksonic.com/';
$api_key         = 'c0e810f7d0b3155ea64f7cf8fd9da1e1';
$api_secret      = '65142040fa6275b6dd94d4f07296e410';
$base_fb_url     = 'connect.facebook.com';
$feed_bundle_id  = 'your template bundle id';

/*   
 *   SAMPLE BUNDLE DATA
 */

$sample_post_title = "FB Connect Demo";
$sample_post_url = "http://pakt.com/scripts/facebook/connect/";
$sample_one_line_story = '{*actor*} posted a comment on <a href="{*post-url*}">{*post-title*}</a> and said {*post*}.';
$sample_template_data = '{"post-url":"http://pakt.com/scripts/facebook/connect/", "post-title":"FB Connect Demo", "post":"This is so easy to use!"}';

?>
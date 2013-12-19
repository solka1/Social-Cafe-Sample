<?php
/**
* Copyright 2011 Facebook, Inc.
*
* Licensed under the Apache License, Version 2.0 (the "License"); you may
* not use this file except in compliance with the License. You may obtain
* a copy of the License at
*
* http://www.apache.org/licenses/LICENSE-2.0
*
* Unless required by applicable law or agreed to in writing, software
* distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
* WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
* License for the specific language governing permissions and limitations
* under the License.
*/

  require_once(dirname(__FILE__).'/products.php');

  // Destroy our session so we forget about the user
  $facebook->destroySession();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Welcome The Samba School for Facebook</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel=StyleSheet href="css/sc.css" type="text/css" />
  </head>
  <body>

   <script>
    // Since we're logging out of only Social Cafe, and not Facebook, when we
    // go back to the main page and the user is still logged in to Facebook,
    // the page will re-log us in because there is a Facebook session, but
    // no Social Cafe session. To prevent this, we set a flag in the URL
    // and check it in the main page.
    window.location = '<?php echo $app_url; echo '/?logged_out=true' ?>';
   </script>
  </body>
</html>



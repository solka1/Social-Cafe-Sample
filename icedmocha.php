<?php
/**
* Copyright 2012 Facebook, Inc.
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

?>
<!DOCTYPE html>
<html lang="en">
<head prefix="og: http://ogp.me/ns# <?php echo $app_namespace; ?>: http://ogp.me/ns/apps/<?php echo $app_namespace; ?>#">
  <meta charset="utf-8">
  <title>Iced Mocha Coffee</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
  <meta property="og:locale" content="en_US">
  <meta property="og:title" content="Iced Mocha">
  <meta property="og:site_name" content="Social Cafe">
  <meta property="og:determiner" content="an">
  <meta property="http://ogp.me/ns/fb#app_id" content="<?php echo $app_id; ?>">
  <meta property="og:description" content="Cold and refreshing">
  <meta property="og:image" content="<?php echo $app_url; ?>/img/mocha2x.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="140">
  <meta property="og:image:height" content="140">
  <meta property="og:url" content="<?php echo $app_url; ?>/icedmocha.php">
  <meta property="og:type" content="<?php echo $app_namespace; ?>:beverage">
  <meta property="<?php echo $app_namespace; ?>:category" content="<?php echo $app_url; ?>/types/coffee.php">

  <link rel="shortcut icon" href="img/favicon.ico">
  <link rel="stylesheet" type="text/css" href="css/sc.css">
</head>
<body>

  <div class="header">
    <h1><a href="<?php echo $app_url; ?>"><img class="logo" alt="cafe" src="img/cafe.png" width="135" height="100"> Social Cafe</a></h1>
    <div class="controls"><a href="<?php echo htmlspecialchars($facebook->getLoginUrl( array( 'scope' => 'publish_actions'))); ?>">Login</a> <a href="<?php echo htmlspecialchars($facebook->getLogoutUrl()); ?>">Logout</a></div>
  </div>

  <div class="contents">
    <div class="top_msg">

<?php
    // Require unauthenticated users to login to view product but allow Facebook's Open Graph 
    // to retrieve the og properties  
   if(!$facebook->getUser()) {
     echo '<a href="' . htmlspecialchars($facebook->getLoginUrl( array( 'scope' => 'publish_actions'))) . '">Login</a></div>';
   } else {
?>


      <p>Iced Mocha</p>
      <p>Would you like one?</p>
      <p style="font-size: 14px">(Choosing a drink will publish a story to your stream)</p>
    </div>

    <div class="item">
      <a href="javascript:document.forms[0].submit();"><img alt="mocha" src="img/mocha.png" width="70" height="70"> Iced Mocha </a>
    </div>

    <form action="index.php" method="post"><input name="product" type="hidden" value="1"></form>
<?php } ?>
  </div>
</body>
</html>

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
require_once(dirname(dirname(__FILE__)).'/products.php');

?>
<!DOCTYPE html>
<html lang="en">
<head prefix="og: http://ogp.me/ns# <?php echo $app_namespace; ?>: http://ogp.me/ns/apps/<?php echo $app_namespace; ?>#">
  <meta charset="utf-8">
  <title>OG Sample Object - Coffee</title>
  <meta property="og:locale" content="en_US">
  <meta property="og:title" content="Coffee">
  <meta property="og:image" content="https://s-static.ak.fbcdn.net/images/devsite/attachment_blank.png">
  <meta property="og:image:type" content="image/png">
  <meta property="og:image:width" content="52">
  <meta property="og:image:height" content="52">
  <meta property="og:determiner" content="a">
  <meta property="http://ogp.me/ns/fb#app_id" content="<?php echo $app_id; ?>">
  <meta property="og:url" content="<?php echo $app_url; ?>/types/coffee.php">
  <meta property="og:type" content="<?php echo $app_namespace; ?>:beveragecategory">

  <link rel="stylesheet" type="text/css" href="../css/sc.css">
</head>
<body>
  <div id="wrapper">
    <!-- Information below is for debugging purposes -->
    <h1>OG Sample Object - Coffee</h1>
    <table style="border:0;border-spacing:0;border-collapse:collapse">
      <tr>
        <th class="key">og:title</th>
        <td class="value">Coffee</td>
      </tr>
      <tr>
        <th class="key">og:image</th>
        <td class="value">https://s-static.ak.fbcdn.net/images/devsite/attachment_blank.png</td>
      </tr>
      <tr>
        <th class="key">og:determiner</th>
        <td class="value">a</td>
      </tr>
      <tr>
        <th class="key">fb:app_id</th>
        <td class="value"><?php echo $app_id; ?></td>
      </tr>
      <tr>
        <th class="key">og:url</th>
        <td class="value"><?php echo $app_url; ?>/types/coffee.php</td>
      </tr>
      <tr>
        <th class="key">og:type</th>
        <td class="value"><?php echo $app_namespace; ?>:beveragecategory</td>
      </tr>
    </table>
  </div>
</body>
</html>
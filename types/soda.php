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


  require_once('../products.php');

?><html>
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# social-cafe: http://ogp.me/ns/apps/social-cafe#">
        <title>OG Sample Object - Coffee</title>
          <meta property="og:title" content="Soda" />
          <meta property="og:image" content="https://s-static.ak.fbcdn.net/images/devsite/attachment_blank.png" />
          <meta property="og:determiner" content="a" />
          <meta property="fb:app_id" content="<?php echo $app_id; ?>" />
          <meta property="og:url" content="<?php echo $app_url; ?>/types/soda.php" />
          <meta property="og:type" content="<?php echo $app_namespace; ?>:beveragecategory" />

                          <link type="text/css" rel="stylesheet" href="/stylesheets/app.css" />
    </head>
    <body>
        <div id="wrapper">
            <!-- Information below is for debugging purposes -->
            <h1>OG Sample Object - Soda</h1>
            <table border="0" cellspacing="0">
                                            <tr>
              <th class="key">og:title</th>

              <td class="value">Soda</td>
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
              <td class="value"><?php echo $app_url; ?>/types/soda.php</td>
              </tr>
                                                            <tr>
              <th class="key">og:type</th>
              <td class="value"><?php echo $app_namespace; ?>:beveragecategory</td>

              </tr>
                                          </table>
        </div>
    </body>
</html>


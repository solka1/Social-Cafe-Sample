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
    <meta property="fb:app_id" content="<?php echo $app_id; ?>">
    <meta property="og:description" content="Cold and refreshing">
    <meta property="og:image" content="<?php echo $app_url; ?>/img/mocha2x.png">
    <meta property="og:image:type" content="image/png">
    <meta property="og:image:width" content="200">
    <meta property="og:image:height" content="200">
    <meta property="og:url" content="<?php echo $app_url; ?>/icedmocha.php">
    <meta property="og:type" content="<?php echo $app_namespace; ?>:beverage">
    <meta property="<?php echo $app_namespace; ?>:category" content="<?php echo $app_url; ?>/types/coffee.php">

    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/sc.css">

  </head>
  <body>
   <div id="fb-root"></div>
   <script>
     function submitForm(index) {
        document.forms[0].elements[0].value=index;
        document.forms[0].submit();
     };
      
      var appId = '<?php echo $facebook->getAppID() ?>';
      window.fbAsyncInit = function() {

        FB.init({
          appId: appId,
          status: true,
          cookie: true
        });

        FB.Event.subscribe('auth.statusChange', handleStatusChange);
      };

      function handleStatusChange(response) {
        if (response.authResponse) {
          // If we already have a Facebook session, and the server didn't know
          //  when it sent this page, then the server will have set the
          //  variable refresh_on_load to true, in which case, we simply
          //  reload this page, since we now have a session.
          //  (This happens on the first load of the page when you're
          //  already logged in to Facebook, since when you do the server
          //  load of the first page, the access token will not be sent
          //  over, because the JS SDK was not loaded yet. So, when you
          //  hit the server, it doesn't know you're logged in and serves
          //  you the logged out page.) We also don't reload if we just
          //  came from the logout page, which we detect by looking for
          //  'logged_out' in the URL parameters.
          if(refresh_on_load && !(location.href.match('\\?logged_out=true'))) {
            window.location.reload(true);
          }
        }
      }

      (function(d){
        var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
        if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true;
        js.src = "//connect.facebook.net/en_US/all.js";
        ref.parentNode.insertBefore(js, ref);
      }(document));
   </script>

  <div class="header" > 
    <h1><a href="<?php echo $app_url; ?>">Samba School of Dance</a></h1>
    <div class="controls">
      <?php
       if($facebook->getUser()) {
          echo '<img id="profile" class="profile" src="https://graph.facebook.com/' . $facebook->getUser() . '/picture?type=small" />';
          echo ' <a id="logout" href="/logout.php" >Logout</a>';
            echo '<script> var refresh_on_load = false; </script>';
        } else {
          echo '<br /><a id="login" href="' .getLoginUrl($facebook) . '">Login</a>';
          echo '<script> var refresh_on_load = true; </script>';
       }
      ?>
    </div>
  </div>

  <div class="contents">
    <div class="top_msg">

  <?php
     // Show login link if not logged in.
     if(!$facebook->getUser()) {
       echo '<a href="' . htmlspecialchars($facebook->getLoginUrl( array( 'scope' => 'publish_actions'))) . '">Login</a>';
     } 
  ?>

    <p>Enrol now to Beginners</p>
    <p>Feeling confident about taking the next step in Samba? Enrol now</p>
<p>(Please note Enrolling will publish to your feeds)</p>
	</div>

  	  <div class="item">
  		<a href="javascript:document.forms[0].submit();"><img src="img/sambadancer02.png" width="70px" /> Intermediate Class</a>
  	  </div>
  
       <br />
  
    	<form action="index.php" method="post" > <input name="product" type="hidden" value="1" /></form>
    	</div>
  </body>
</html>

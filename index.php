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
  
  function publishCustomAction($facebook, $product) {
    global $app_namespace;
    $ret_obj = $facebook->api('/me/'.$app_namespace.':order', 'post', array(
                                                                            'beverage' => $product['url']
                                                                            ));
    return $ret_obj['id'];
  }
  
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Welcome to the Social Cafe</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/sc.css">
  </head>
<body>

  <?php
    if ( isset($app_id) && $app_id === 'YOUR_APP_ID' ) {
  ?>
    <p><strong>Please configure your application variables.</strong></p>
  <?php
    }
  ?>

  <script>
   function submitForm(index) {
     if(location.href.match('\\?logged_out=true')) {
       alert("Please login first");
     } else {
       document.forms[0].elements[0].value=index;
       document.forms[0].submit();
     }
   };
  </script>

  <div id="fb-root"></div>
  <script type="text/javascript">
    var appId = '<?php echo $facebook->getAppID() ?>';
    window.fbAsyncInit = function() {
    channelUrl: <?php echo json_encode($app_url.'/channel.html'); ?>,

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
    <h1><a href="<?php echo $app_url; ?>">Silvi's Dance School</a></h1>
    <div class="controls">
	  <?php
	    if($facebook->getUser()) {
        echo '<img id="profile" class="profile" src="https://graph.facebook.com/' .
                                  $facebook->getUser() . '/picture?type=small" />';
        echo ' <a id="logout" href="logout.php" >Logout</a>';
        echo '<script> var refresh_on_load = false; </script>';
	    } else {
        echo '<br /><a id="login" href="' . getLoginUrl($facebook) . '">Login</a>';
        echo '<script> var refresh_on_load = true; </script>';
      }
	  ?>
  </div>
  </div>

    <div id="contents" class="contents">

    <?php
    echo '<div id="logged_in">';
	  echo '<div class="top_msg">';

	  if($_GET["at"]) {
      echo '<p><pre>access token: ' . $facebook->getAccessToken() . '</pre></p>';
	  }

    if(isset($_POST['product'])) {
      $idx = $_POST['product'];
      try {
        echo '<p>You are enjoying a '.$products[$idx]['name'];
        $story_id = publishCustomAction($facebook, $products[$idx]);
        $me = $facebook->api('/me','GET');
        echo ' (story id: <a href="https://www.facebook.com/' . $me['username'] . '/activity/' . $story_id . '" target="_blank">' . $story_id . '</a> ).';
      } catch (FacebookApiException $e) {
        echo '<p>There was a problem with your purchase. Please <a href="' . getLoginUrl($facebook) . '">Login</a> again.';
        if(array_key_exists('debug',$_REQUEST)) {
          echo '<pre>' . $e->getMessage() . '</pre>';
        }
      }
    } else {
          echo '<p>You have not chosen anything yet.</p>';
    }
    ?>

  	<p>What would you like? </p>
        <p style="font-size: 12px">(Choosing a drink will publish a story to your stream)</p>
     </div>
  
     <div class="item">
      <a href="javascript:submitForm(0);"><img src="img/latte.png" width="70px" height= "70px" /> Cafe Latte</a>
     </div>
  
     <div class="item">
      <a href="javascript:submitForm(1);"><img src="img/mocha.png" width="70px" height= "70px" /> Iced Mocha </a>
     </div>
  
     <div class="item">
      <a href="javascript:submitForm(2);"><img src="img/tea.png" width="70px" height= "70px" /> Earl Grey Tea </a>
     </div>
  
     <br />
  
     <?php if($_REQUEST['debug']) { ?>
       <form action="index.php?debug=1" method="post" > <input name="product" type="hidden" value="foobar" /></form>
     <?php } else { ?>
       <form action="index.php<?php if(array_key_exists('debug',$_REQUEST)){echo '?debug=1';} ?>" method="post"> <input name="product" type="hidden" value="foobar"></form>
     <?php } ?>
  
     </div>
  </div>

  </body>
</html>

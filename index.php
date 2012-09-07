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
  $ret_obj = $facebook->api('/me/'.$app_namespace.':drink', 'post', array(
    'beverage' => $product['url']
  ));
  return $ret_obj['id'];
}
  
$login_url = htmlspecialchars($facebook->getLoginUrl( array( 'scope' => 'publish_actions') ));

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Welcome to the Social Cafe</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="shortcut icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="css/sc.css">
  </head>
  <body>

<?php
if ( isset($app_id) && $app_id === 'YOUR_APP_ID' ) {
  ?><p><strong>Please configure your application variables.</strong></p><?php
}
?>

  <script type="text/javascript">
    function submitForm(index) {
      document.forms[0].elements[0].value=index;
      document.forms[0].submit();
    };
  </script>


  <div id="fb-root"></div>
  <script type="text/javascript">
      window.fbAsyncInit = function() {

        FB.init({
          appId: <?php echo json_encode($facebook->getAppID()); ?>,
          channelUrl: <?php echo json_encode($app_url.'/channel.html'); ?>,
          status: true,
          cookie: true
        });
    
        FB.Event.subscribe('auth.statusChange', handleStatusChange);
      };

      function handleStatusChange(response) {
          console.log(response);
          if (response.authResponse) {
              logged_out.style.display = 'none';
              logged_in.style.display = 'inline';
          } else {
              logged_out.style.display = 'inline';
              logged_in.style.display = 'none';
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
    <h1><a href="<?php echo $app_url; ?>"><img class="logo" alt="cafe" src="img/cafe.png" width="135" height="100"> Social Cafe</a></h1>
    <div class="controls"><a href="<?php echo $login_url; ?>">Login</a> <a href="<?php echo htmlspecialchars($facebook->getLogoutUrl()); ?>">Logout</a></div>
  </div>

    <div class="contents"> 
<?php
    echo '<div id="logged_out"><a href="' . $login_url . '">Login</a></div>';
    echo '<div id="logged_in">';
    echo '<div class="top_msg">';

    if(array_key_exists('at',$_GET)) {
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
        echo '<p>There was a problem with your purchase. Please <a href="' . $login_url . '">Login</a> again.';
        if(array_key_exists('debug',$_REQUEST)) {
          echo '<pre>' . $e->getMessage() . '</pre>';
        }
      }
    } else {
      echo '<p>You have not chosen anything yet.</p>';
    }
?>

      <p>What would you like? </p>
      <p style="font-size: 14px">(Choosing a drink will publish a story to your stream)</p>
    </div>
  
    <div class="item">
      <a href="javascript:submitForm(0);"><img alt="latte" src="img/latte.png" width="70" height="70"> Cafe Latte</a>
    </div>
  
    <div class="item">
      <a href="javascript:submitForm(1);"><img alt="mocha" src="img/mocha.png" width="70" height="70"> Iced Mocha </a>
    </div>
  
    <div class="item">
      <a href="javascript:submitForm(2);"><img alt="tea" src="img/tea.png" width="70" height= "70"> Earl Grey Tea </a>
    </div>

    <footer><p style="font-size:14px;margin-top:1em">Images are licensed under <a rel="license" href="http://creativecommons.org/licenses/by/2.0/">CC BY 2.0</a> from flickr users: mattb4rd, kennymatic, jackbrodus.</p></footer>

    <form action="index.php<?php if(array_key_exists('debug',$_REQUEST)){echo '?debug=1';} ?>" method="post"> <input name="product" type="hidden" value="foobar"></form>
  </div></div>

  </body>
</html>
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

  require_once('products.php');

  function publishCustomAction($facebook, $product) {
    global $app_namespace;
      $ret_obj = $facebook->api('/me/'.$app_namespace.':order', 'post', array(
                        'beverage' => $product['url'],
                      ));
      return $ret_obj['id'];
  }
  
  $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_actions') );

?>
<html>
  <head>
    <title>Welcome to the Social Cafe</title>

    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel=StyleSheet href="css/sc_mobile.css" type="text/css" />
  </head>
  <body>

   <script>
     function submitForm(index) {
		    document.forms[0].elements[0].value=index;
    		document.forms[0].submit();
     };
   </script>


   <div id="fb-root"></div>
   <script>
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
    <h1><a href="<?php echo $app_url; ?>"><img class="logo" src="img/cafe.png" width="135px" height="100px" /> Social Cafe</a></h1>
    <div class="controls"><a href="<?php echo $login_url; ?>">Login</a> <a href="<?php echo $facebook->getLogoutUrl(); ?>">Logout</a></div>
  </div>

    <div class="contents"> 
	<?php
   	  echo '<div id="logged_out"><a href="' . $login_url . '">Login</a></div>';
   	  echo '<div id="logged_in">';
	  echo '<div class="top_msg">';

	  if($_GET["at"]) {
		echo '<p><pre>access token: ' . $facebook->getAccessToken() . '</pre></p>';
	  }

	  if(isset($_POST['product'])) {
		$idx = $_POST['product'];
		try {
			echo '<p>You are enjoying a ' . $products[$idx]['name'];
			$story_id = publishCustomAction($facebook, $products[$idx]);
			$me = $facebook->api("/me",'GET');
			echo ' (story id: <a href="https://www.facebook.com/' . $me['username'] . '/activity/' . $story_id . '" target="_blank">' . $story_id . '</a> ).';
		} catch (FacebookApiException $e) {
			echo '<p>There was a problem with your purchase. Please <a href="' . $login_url . '">Login</a> again.';
			if($_REQUEST['debug']) { 
				echo '<pre>' . $e->getMessage() . '</pre>';
			}
		}
          } else {
		echo "<p>You haven't chosen anything yet. </p>";
          }
	?>

  	<p>What would you like? </p>
        <p style="font-size: 14px">(Choosing a drink will publish a story to your stream)</p>
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
     <p style="font-size: 14px">Images are licensed under <a href="http://creativecommons.org/licenses/by/2.0/">CC BY 2.0</a> from flickr users: mattb4rd, kennymatic, jackbrodus.</p>
  
     <?php if($_REQUEST['debug']) { ?>
	<form action="index.php?debug=1" method="post" > <input name="product" type="hidden" value="foobar" /></form>
     <?php } else { ?>       
	<form action="index.php" method="post" > <input name="product" type="hidden" value="foobar" /></form>
     <?php } ?>
  
     </div>
  </div>

  </body>
</html>



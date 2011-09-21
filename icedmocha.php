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

?>
<head prefix="og: http://ogp.me/ns# social-cafe: http://ogp.me/ns/apps/social-cafe#">
    <title>Iced Mocha Coffee</title>
                      <meta property="og:title" content="Iced Mocha" />
                                <meta property="og:determiner" content="an" />
                                <meta property="fb:app_id" content="138483919580948" />
                                <meta property="og:image" content="http://social-cafe.herokuapp.com/img/kyoto_sq.gif" />
                                <meta property="og:url" content="http://social-cafe.herokuapp.com/icedmocha.php" />
                                <meta property="og:type" content="social-cafe:beverage" />
                                <meta property="social-cafe:category" content="http://social-cafe.herokuapp.com/types/coffee.html"> 
    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel=StyleSheet href="css/sc.css" type="text/css" />

  </head>
  <body>

   <script>
     function submitForm(index) {
		document.forms[0].elements[0].value=index;
		document.forms[0].submit();
     }
   </script>

  <div class="header" > 
    <h1><a href="http://social-cafe.herokuapp.com/"><img src="img/cafe.jpg" width="135px" height="100px" /> Social Cafe</a></h1>
    <div class="controls"><a href="<?php echo $facebook->getLoginUrl( array( 'scope' => 'publish_stream, publish_actions') ); ?>">Login</a> <a href="<?php echo $facebook->getLogoutUrl(); ?>">Logout</a></div>
  </div>

    <div class="contents"> 
      <div class="top_msg">

<?php
       if(!$facebook->getUser()) {
         echo '<a href="' . $facebook->getLoginUrl( array( 'scope' => 'publish_stream, publish_actions') ) . '">Login</a>';
       } else {
?>
		<?php
                  if($_GET["at"]) {
                    echo '<p><pre>access token: ' . $facebook->getAccessToken() . '</pre></p>';
                  }

		  if(isset($_POST['product'])) {
		    $idx = $_POST['product'];
		    try {
		      echo '<p>You are enjoying a ' . $products[$idx]['name'] . '.</p>';
		      publishCustomAction($facebook, $products[$idx]);
		    } catch (FacebookApiException $e) {
		      echo '<p>There was a problem with your purchase. Please <a href="' . $facebook->getLoginUrl( array( 'scope' => 'publish_stream, publish_actions') ) . '">Login</a> again.';
		    }
		  } else {
                     echo "<p>Iced Mocha</p>";
                  }
		?>

		<p>Would you like One? </p>

      </div>


	  <div class="item">
		<a href="javascript:submitForm(1);"><img src="img/kyoto.gif" width="70px" /> Iced Mocha </a>
	  </div>

     <br />
     <p style="font-size: 14px">Images are licensed under <a href="http://creativecommons.org/licenses/by/2.0/">CC BY 2.0</a> from flickr users: mattb4rd, kennymatic, jackbrodus.</p>

	<form action="/index.php" method="post" > <input name="product" type="hidden" value="foobar" /></form>
	</div>
     <?php } ?>

  </body>
</html>



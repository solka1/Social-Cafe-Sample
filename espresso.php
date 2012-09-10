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
    <title>Espresso</title>
      <meta property="og:title" content="Espresso" />
      <meta property="og:determiner" content="an" />
      <meta property="fb:app_id" content="<?php echo $app_id; ?>" />
      <meta property="og:image" content="<?php echo $app_url; ?>/img/espresso.gif" />
      <meta property="og:url" content="<?php echo $app_url; ?>/espresso.php" />
      <meta property="og:type" content="<?php echo $app_namespace; ?>:beverage" />
      <meta property="og:restrictions:country:disallowed" content="us" />
      <meta property="og:restrictions:country:disallowed" content="it" />
      <meta property="og:restrictions:country:disallowed" content="ca" />
      <meta property="<?php echo $app_namespace; ?>:category" content="<?php echo $app_url; ?>/types/coffee.php"> 
    <link rel="shortcut icon" href="img/favicon.ico" />
    <link rel=StyleSheet href="css/sc.css" type="text/css" />

  </head>
  <body>

  <div class="header" > 
    <h1><a href="<?php echo $app_url; ?>"><img src="img/cafe.png" width="135px" height="100px" /> Social Cafe</a></h1>
    <div class="controls"><a href="<?php echo $facebook->getLoginUrl( array( 'scope' => 'publish_actions') ); ?>">Login</a> <a href="<?php echo $facebook->getLogoutUrl(); ?>">Logout</a></div>
  </div>

    <div class="contents"> 
      <div class="top_msg">

<?php
    // Require unauthenticated users to login to view product but allow Facebook's Open Graph 
    // to retrieve the og properties  
   if(!$facebook->getUser()) {
     echo '<a href="' . $facebook->getLoginUrl( array( 'scope' => 'publish_actions') ) . '">Login</a>';
   } else {
?>


    <p>Espresso</p>
		<p>Would you like One? </p>
        <p style="font-size: 14px">(Choosing a drink will publish a story to your stream)</p>
      </div>

  	  <div class="item">
  		<a href="javascript:document.forms[3].submit();"><img src="img/espreso.gif" width="70px" /> Espresso </a>
  	  </div>
  
       <br />
       <p style="font-size: 14px">Images are licensed under <a href="http://creativecommons.org/licenses/by/2.0/">CC BY 2.0</a> from flickr users: mattb4rd, kennymatic, jackbrodus.</p>
  
    	<form action="index.php" method="post" > <input name="product" type="hidden" value="1" /></form>
    	</div>
     <?php } ?>

  </body>
</html>



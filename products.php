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

include_once(dirname(__FILE__).'/php-sdk/facebook.php');

$app_url = "http://sambadanceschool.herokuapp.com"; // no slash at the end, e.g. 'https://social-cafe.herokuapp.com'
$app_id = "189159657912197";
$app_secret = "9a9fa225eeb93369b41edd4e1e3b6471";
$app_namespace = "senappz"; // no colon at the end, e.g. 'social-cafe'

$facebook = new Facebook(array(
  'appId' => $app_id,
  'secret' => $app_secret,
));

$products = array(
  array(
    'url' => $app_url.'/latte.php',
    'name' => 'Beginners',
    'description' => "New to Samba? What are you waiting for sign up now",
    'price' => 2.85,
  ),
  array(
    'url' => $app_url.'/icedmocha.php',
    'name' => 'Intermediate',
    'description' => 'Feeling confident. Sign up and upgrade your rhythm today',
    'price' => 3.25
  ),
  array(
    'url' => $app_url.'/earlgrey.php',
    'name' => 'Advamced',
    'description' => 'You made it this far why stop now. Sign up for Advance today ',
    'price' => 2.55
  ),
);

/*
 * When generating the login URL, remove logged_out=true from the
 * current URL, otherwise users will not be able to buy a product
 * after they login.
 */
function getLoginUrl($fb) {
  $url = $fb->getLoginUrl( array( 'scope' => 'publish_actions'));
  return preg_replace('/logged_out\%3Dtrue/e','',$url);
}
  
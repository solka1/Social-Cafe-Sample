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


include_once('php-sdk/facebook.php');

$app_id = "YOUR_APP_ID";
$app_secret = "YOUR_APP_SECRET";

$facebook = new Facebook( array(
                           'appId' => $app_id,
                           'secret' => $app_secret,
                         ));

$products = array(
  array(
    'url' => 'http://social-cafe.herokuapp.com/latte.php',
    'name' => 'Cafe Latte',
    'description' => 'Its hot',
    'price' => 2.85,
  ),
  array(
    'url' => 'http://social-cafe.herokuapp.com/icedmocha.php',
    'name' => 'Iced Mocha',
    'description' => 'Cold & Sweet',
    'price' => 3.25
  ),
  array(
    'url' => 'http://social-cafe.herokuapp.com/earlgrey.php',
    'name' => 'Earl Grey Tea',
    'description' => 'Smells amazing.',
    'price' => 2.55
  ),
);

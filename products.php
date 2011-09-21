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

$app_id = "138483919580948";
$app_secret = "5a3d4f5a267a70544349570e24db1796";

$facebook = new Facebook( array(
                           'appId' => $app_id,
                           'secret' => $app_secret,
                         ));

$products = array(
  array(
    'url' => 'http://social-cafe.herokuapp.com/latte.php',
    'name' => 'Cafe Latte',
    'thumb' => 'heatlamp.jpg',
    'description' => 'Its hot',
    'price' => 2.85,
  ),
  array(
    'url' => 'http://social-cafe.herokuapp.com/icedmocha.php',
    'name' => 'Iced Mocha',
    'thumb' => 'board.jpg',
    'description' => 'Cold & Sweet',
    'price' => 3.25
  ),
  array(
    'url' => 'http://social-cafe.herokuapp.com/earlgrey.php',
    'name' => 'Earl Grey Tea',
    'thumb' => 'board.jpg',
    'description' => 'Smells amazing.',
    'price' => 2.55
  ),
);

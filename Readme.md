Social Cafe sample app -- PHP
=============================

This is a sample app showing how to publish custom actions using the Facebook PHP SDK.

You can view the running sample online at http://social-cafe.heroku.com/

To run the code yourself, please create a Facebook application.

In addition, please make sure that you're created the following objects and actions, using the Open Graph tab in the [Developer App](https://developers.facebook.com/apps):

 * **Beverage**. This object should contain a custom 'category' property that points to a `BeverageType` 
   * Three instances of Beverage - Cafe Latte, Iced Mocha, and Earl Grey Tea.

 * **BeverageCategory**
   * Three instances of BeverageCategory - coffee, tea, and soda

 * **Drink Action**, which relates to a Beverage

You can use the Debug tab in the Developer tab to make sure you've set up the objects correctly.


Once you have taken these steps, enter your Facebook app ID and secret in products.php and edit the following files to edit the Open Graph meta tags to use your namespace and object URIs:

 * earlgrey.php
 * icedmocha.php
 * latte.php

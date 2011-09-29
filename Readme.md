Social Cafe sample app -- PHP
=============================

This is a sample app showing how to publish custom actions using the Facebook PHP SDK.

You can view the running sample online at http://social-cafe.heroku.com/

To run the code yourself, please create a Facebook application. 

In addition, please make sure that you've created the following objects and actions, using the Open Graph tab under your application in the [Developer App](https://developers.facebook.com/apps):

 * **Action: Drink** 
    * Drink is an action that is connected to a Beverage

 * **Objects: Beverage, BeverageCategory**
   * Add a custom property 'category' to Beverage and set it to the BeverageCategory object type.

 

Once you have taken these steps, edit products.php and change these variables and upload your app to the hosting server: app_url, app_id, app_secret, app_namespace




If you encounter any problems:

 * You can use the [Debug Tool](http://developers.facebook.com/tools/debug) under Related links to make sure you've set up the objects correctly by entering the url of the Open Graph pages.

 * You can see any errors Facebook returns by appending a "debug=1" to the url of the app.


**Notes**


 * There are three Beverages in our app - Latte, Iced Mocha and Earl Grey Tea. The definitions of the beverages are defined in the og meta properties in the individual pages in the app.

 * There are three BeverageCategory categories in our app - Coffee, Tea and Soda. The definitions of the categories are defined in the og meta properties under the /types folder.



 * The quickest way to setup your actions and objects is as follows:
   * Under Open Graph, click on "Getting Started"
   * Specify - People can [drink] a [beverage] - then complete the wizard without changing anything. This will create a Drink action and a Beverage object and link them together.
   * Click on Dashboard and create the BeverageCategory object type.
   * Click on the Beverage object type
   * Under Object Properies, create 'category' and link it to 'BeverageCategory'

# Social Cafe

Enables users to tell their friends what beverage they're currently enjoying, by posting it to their Timeline via Open Graph. This is a sample app showing how to publish custom actions using the Facebook PHP SDK.

Authors: Dhiren Patel

## Demo

http://social-cafe.heroku.com/

## Installing

To run the code yourself, please create a Facebook application.

In addition, please make sure that you've created the following objects and actions, using the Open Graph tab under your application in the [Developer App](https://developers.facebook.com/apps):

 * **Action: Drink**
    * Drink is an action that is connected to a Beverage

 * **Objects: Beverage, BeverageCategory**
   * Add a custom property 'category' to Beverage and set it to the BeverageCategory object type.

Once you have taken these steps, edit products.php and change these variables and upload your app to the hosting server: app_url, app_id, app_secret, app_namespace

The quickest way to setup your actions and objects is as follows:
   * Under Open Graph, click on "Getting Started"
   * Specify - People can [drink] a [beverage] - then complete the wizard without changing anything. This will create a Drink action and a Beverage object and link them together.
   * Click on Dashboard and create the BeverageCategory object type.
   * Click on the Beverage object type
   * Under Object Properies, create 'category' and link it to 'BeverageCategory'

## Additional Resources

If you encounter any problems:

 * You can use the [Debug Tool](http://developers.facebook.com/tools/debug) under Related links to make sure you've set up the objects correctly by entering the url of the Open Graph pages.

 * You can see any errors Facebook returns by appending a "debug=1" to the url of the app.

 Also, note:

  * There are three Beverages in our app - Latte, Iced Mocha and Earl Grey Tea. The definitions of the beverages are defined in the og meta properties in the individual pages in the app.

 * There are three BeverageCategory categories in our app - Coffee, Tea and Soda. The definitions of the categories are defined in the og meta properties under the /types folder.

## Contributing

All contributors must agree to and sign the [Facebook CLA](https://developers.facebook.com/opensource/cla) prior to submitting Pull Requests. We cannot accept Pull Requests until this document is signed and submitted.

## License

Copyright 2012-present Facebook, Inc.

You are hereby granted a non-exclusive, worldwide, royalty-free license to use, copy, modify, and distribute this software in source code or binary form for use in connection with the web services and APIs provided by Facebook.

As with any software that integrates with the Facebook platform, your use of this software is subject to the Facebook Developer Principles and Policies [http://developers.facebook.com/policy/]. This copyright notice shall be included in all copies or substantial portions of the software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
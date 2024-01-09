# P4TShop
 An Ecommerce online shop.
 The app is almost a functional Ecommerce online store. 
 The following logic can be applied before checking out;
 1. When you click on the check out button, you can decide to store your cart items in the order table. I emplore this method since I was specifically told to do so during development. But if the user fails to purchase the product and the session has been cleared using Session::forget() then you need to programmatical go through it but it makes the logic more complicated. 
 2. This step is the best way to go through it. Don't store the cart items in the order table when users checkout. Only store the cart item when they make payment using PayPal. Before storing you can checking for transactionRefernce and if true, then you can store the cart items and payment details in the order and payment tables. 
 Just some finishing touches left. 
 Lastly, for further development, the role and the auth middleware will be added to protect some routes from either guest or user that is not admin from accessing a page. That can be done either in a controller or route.

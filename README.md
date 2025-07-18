# E-commerce Shop

## Running locally
Using [herd](https://herd.laravel.com/) setup is made simple.

Clone the repo with `git clone https://github.com/ThatLukeDev/ecommerce`,
then download [herd](https://herd.laravel.com/) and add the path to your [herd paths](https://herd.laravel.com/docs/macos/getting-started/sites).

## Initial setup
Creating an account can be done easily with the top right menu on the website.

After creating an account, to make it an admin it is necessary to use SQL.

You can use a program such as SequelAce or a query such as `UPDATE users SET permission = 1 WHERE email LIKE '[EMAIL]'`

## Using E-commerce shop

After an admin account has been set, you can access the admin panel when signed in from the top right menu.

From here, you can change the display page motd, and add and remove products, change stock, description, etc.

Stock will automatically be depleted once a user has purchased something, and an order will be added to the orders table,
where your other programs can interface with it to send out notifications, etc.

You can also mark a product as featured in the admin panel to make it appear on the home page,
this can draw attention to sales or push a product more.

Deleting a product with the admin panel will mark it as deleted, but keep the data, so users can see the product details
in their history tab. If, for any reason, a product needs to be wiped completely (due to bad pr, etc), you can use the afformentioned steps
to update this.

## Code documentation

Documentation for updating and managing the source code itself can be found as comments above each function.
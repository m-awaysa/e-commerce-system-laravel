<div class="container">
    <!-- <h1 class="mt-5 text-center ">E-Commerce</h1> -->
    <h3 class="mt-5 text-danger text-center ">For commercial sale only</h3>
    <h6 class="text-danger text-center">*only the registered salesman can see th price, cart and discount*</h6>
    <h6 class="text-danger text-center">*both guest and salesman(user) can order products*</h6>
    <div class="mt-5">
        <h2>Admin account:</h2>
        <h5 class="text-success">Email: guest@admin.com</h5>
        <h5 class="text-success">Password: guestguest</h5>
        <h6 class="text-danger ">*The website will refresh at 00:00 AM (GMT+2) every day, all changes will be removed or
            you can refresh the site from the dashboard*</h6>
        <h2>salesman account:</h2>
        <h5 class="text-success">Email: guest@user.com</h5>
        <h5 class="text-success">Password: guestguest</h5>
        <br>
        <h2>Brief about the site:</h2>
        <h3>Admin Panel</h3>
        <h5>1. Dashboard</h5>
        <ol class=" list-group-numbered">
            <li class="list-group-item">The admin control panel main page showing general information and statistics
                about the website.
                For example, total number of product,
                number of salesman accounts, monthly earning,yearly earning, most active salesman, Most purchased
                product, etc.</li>
            <li class="list-group-item">Salesman activity:
                <ol class=" list-group-numbered">
                    <li class="list-group-item"> it shows in table each salesmen with the number of total viewing,
                        buying, add to cat and request.</li>
                    <li class="list-group-item">clicking on salesman will show you these information for each product
                        which salesman bought, ordered it, viewed it or added it to his cart.</li>
                </ol>
            </li>
            <li class="list-group-item">Product activity(product point of view): it shows in table each product with the
                number of total viewing, buying, add to cat and request.</li>
            <li class="list-group-item">Line chart for earning this month (x,y => total earning, day).</li>
        </ol>
        <h5>2. Category</h5>
        <ol class=" list-group-numbered">
            <li class="list-group-item">List saved categories from database, add new category, edit existing category,
                delete a category, hide or show an existing category on the public website.</li>
            <li class="list-group-item">Category can’t be deleted if it has products.</li>
            <li class="list-group-item">Deleting a category here means an actual delete from database. So, a
                confirmation message prompted to user to confirm deleting.</li>
            <li class="list-group-item">If a category is hidden, the category and its product will not be visible on the
                public website.</li>
            <li class="list-group-item">Each category has its own features.</li>
        </ol>
        <h5>3. Product</h5>
        <ol class=" list-group-numbered">
            <li class="list-group-item">List saved Products from database, add new product, edit existing product,
                delete a product, hide or show an existing product on the public website.</li>
            <li class="list-group-item">Deleting a product here means an actual delete from database. So, a confirmation
                message prompted to user to confirm deleting.</li>
            <li class="list-group-item">If a category is hidden, it will not be visible on the public website.</li>
            <li class="list-group-item">A product can't be in multiple categories.</li>
            <li class="list-group-item">Each product can take a features from his category feature and assign value to
                this features(product_feature many to many relation).</li>
        </ol>
        <h5>4. Salesman</h5>
        <ol class=" list-group-numbered">
            <li class="list-group-item">List saved users from database, you can delete a salesman or deactivate the
                account.</li>
            <li class="list-group-item">Account requests button: It will display the table containing account requests.
            </li>
            <li class="list-group-item">Registering on the public site will send an account request to the admin.</li>
            <li class="list-group-item">Admin can either accept or decline the request.</li>
        </ol>
        <h5>5. Order</h5>
        <p>in this page there is a table and tow button</p>
        <ol class=" list-group-numbered">
            <li class="list-group-item">salesman requests button.
                <ol class=" list-group-numbered">
                    <li class="list-group-item">will show a table of requesting orders from salesman(users).</li>
                    <li class="list-group-item">Admin can either accept the order(will change it from requested order to
                        shipped order) or decline it.</li>
                    <li class="list-group-item">Admin can change the quantity, price, color, etc of order if needed.
                    </li>
                </ol>
            </li>
            <li class="list-group-item">guest requests button.
                <ol class=" list-group-numbered">
                    <li class="list-group-item">will show a table of orders from guests.</li>
                    <li class="list-group-item">Admin can either accept the order(will change it from requested order to
                        shipped order) or decline it.</li>
                    <li class="list-group-item">decline request will automatically return the requested products to the
                        stock .</li>
                    <li class="list-group-item">Admin can see the orders and change the quantity, price, color, etc if
                        needed.</li>
                </ol>
            </li>
            <li class="list-group-item">main table.
                <ol class=" list-group-numbered">
                    <li class="list-group-item">contains a shipping order and sold order.</li>
                    <li class="list-group-item">for shipping order: the admin can confirm the sale process and change it
                        to sold order cancel it.</li>
                    <li class="list-group-item">canceling a shipping order will automatically return the requested
                        products to the stock .</li>
                    <li class="list-group-item">for sold order: its means the sale process is completed and the order
                        products will involved in the earning calculation.</li>
                    <li class="list-group-item">sold order are still be canceled and that's will delete the order
                        products from sales table and return the products to the stock and user activity will updated .
                    </li>
                </ol>
            </li>
        </ol>
        <h5>6. Layouts</h5>
        <ol class=" list-group-numbered">
            <li class="list-group-item">This page will allow the admin to have full control of the home page.</li>
            <li class="list-group-item">Admin can change, delete or hide photo from carousel part in home page.</li>
            <li class="list-group-item">Admin can add, edit, hide parts in home page.</li>
        </ol>
        <h3>User(salesman)</h3>
        <h5>1.Cart</h5>
        <ol class=" list-group-numbered">
            <li class="list-group-item">The cart is available just for registered salesman.</li>
            <li class="list-group-item">Add product to cart, change the amount, request the cart product.</li>
            <li class="list-group-item">If the product quantity is 0, the salesman will not be able to add it to the
                cart or order it.</li>
        </ol>
        <h5>2.discount feature</h5>
        <ol class=" list-group-numbered">
            <li class="list-group-item">The salesman oly can see the price so the discount page(contain all products
                which has discount) will be visible only for salesman.</li>
            <li class="list-group-item">Each salesman has his own a discount ratio it will apply to all product.</li>
            <li class="list-group-item">Product discount will apply to product if it's greater than the salesman
                discount.</li>
        </ol>
        <h5>3.Account page</h5>
        <ol class=" list-group-numbered">
            <li class="list-group-item">Show and edit account information.</li>
        </ol>
        <h3>Guest</h3>
        <ol class=" list-group-numbered">
            <li class="list-group-item">Guest can see the public site but cant see the price,discount or the cart.</li>
            <li class="list-group-item">Guest can order product by clicking on order button and fill the form that
                appears</li>
            <li class="list-group-item">he quantity does not change on guest request</li>
        </ol>
        <h3>Public Site</h3>
        <h5>1.Home</h5>
        <ol class=" list-group-numbered">
            <li class="list-group-item">Contains carousel part and other parts all controlled by admin .</li>
        </ol>
        <h5>2.Products</h5>
        <ol class=" list-group-numbered">
            <li class="list-group-item">Contains all products with abilities to filter the products.</li>
        </ol>
        <h5>3.Category</h5>
        <ol class=" list-group-numbered">
            <li class="list-group-item">Contains all categories. pressing on any category will take you to the product
                page which contain all products belong to this category.</li>
        </ol>
        <h5>4.Contact Us</h5>
        <ol class=" list-group-numbered">
            <li class="list-group-item">allow the customer to send us an email.</li>
        </ol>
        <h5>5.Register & login</h5>
        <ol class=" list-group-numbered pb-5">
            <li class="list-group-item">Registering here mean sending a salesman-account request to the admin.</li>
            <li class="list-group-item">Customer can apply one request for each email.</li>
            <li class="list-group-item">If the account information approved(the Admin approved you are an actual seller)
                you can login.</li>
            <li class="list-group-item">login for the first time require email verification.</li>
        </ol>
    </div>
</div>

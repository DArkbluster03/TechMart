# E-Commerce System (Tech)
## Project Overview

### Project Title:
**TechMart**

### Objective:
TechMart is designed to create a seamless and user-friendly e-commerce platform dedicated to computer-related technology items.

### Target Audience:
This platform aims to provide a wide range of high-quality products, including hardware, software, accessories, and peripherals, catering to tech enthusiasts and professionals.

---

## Tech Stack

### Backend:
- **Framework**: Laravel

### Frontend:
- **Framework/Library**: React

### Rendering Method:
- **Client-Side Rendering (CSR)**

### UI Design:
- **Tool**: Figma
- **Design Link**: [TechMart](https://www.figma.com/design/zdzjZqFsQBzKgACAfySBQL/Techmart?node-id=0-1&t=aN4YR1t236fKwjGI-1)

---

## Project Features

### 1. Admin Panel:
- **Product Management**: Add, edit, delete, and manage inventory for all products.
- **Category Management**: Create and update product categories (e.g., Laptops, Accessories).
- **Order Management**: Track, update, and manage customer orders (e.g., status updates).
- **User Management**: View, edit, or deactivate user accounts and roles (Admin/User).

### 2. Customer Panel:
- **Product Browsing**: Search and filter products by category, price, brand, or features.
- **Product Details**: View detailed information, reviews, and specifications for products.
- **Cart Management**: Add, remove, or update quantities of items in the cart.
- **Order Management**: View order history and track current orders.
- **Profile Management**: Update personal details, passwords, and addresses.

### 3. Vendor Panel:
- **Product Listings**: Upload, manage, and edit product listings.
- **Sales Overview**: Track individual product sales and earnings.
- **Stock Updates**: Manage inventory and restock products as needed.
- **Order Fulfillment**: Process and ship customer orders.

### 4. User Authentication:
- **Secure Login/Signup**: Enable secure account creation and login for customers, admins, and vendors.
- **Manual Registration by Admin**: Allow admin to manually register vendor or customer accounts if needed.

### 5. CRUD Operations:
- **Product Management**: Add, update, delete, and retrieve product information.
- **User Management**: Create, update, or delete user accounts and roles.
- **Order Management**: View, update, or delete customer orders.
- **Category and Tag Management**: Add or update product categories and tags.
 ### 5. Api Endpoints:
- **AdminPanel**:
- POST /api/admin/add-product
Add a new product to the catalog.

POST /api/admin/manage-inventory
Manage product inventory (e.g., stock updates).

POST /api/admin/manage-discount
Set or update discounts on products.

POST /api/admin/manage-orders
Process orders, including updating order status.

GET /api/admin/reports
View various reports (sales, inventory, etc.).

POST /api/admin/track-shipping
Track the shipping status of orders.

POST /api/admin/manage-customer
Manage customer accounts (update details, block, etc.)..
- **Customer Panel**:
- POST /api/customer/create-account
Create a new customer account.

POST /api/customer/login
Log in to an existing customer account.

GET /api/customer/view-products
Browse all products in the catalog.

GET /api/customer/view-product/:productId
View detailed information about a specific product.

POST /api/customer/add-to-cart
Add a product to the shopping cart.

POST /api/customer/checkout
Proceed with order checkout.

POST /api/customer/add-review
Add a product review.

GET /api/customer/order-history
View the customer's past orders..
- **Seller/Shop Owner Panel**:
-
- POST /api/seller/add-product
Sellers can add new products to their store.

POST /api/seller/update-product
Update details or availability of existing products.

POST /api/seller/manage-orders
Manage orders, including processing and shipping.

GET /api/seller/view-sales
View sales performance and revenue for the shop.

POST /api/seller/update-pricing
Update product pricing or set promotional offers..
- **ResourceManagement**:
- POST /api/resource/warehouse-management
Manage warehouse resources for stocking and shipping.

POST /api/resource/order-management
Manage stock orders for products from suppliers..
- **UserAuthentication**:
- POST /api/auth/login
Log in as a customer, seller, or admin.

POST /api/auth/register
Register a new user account (customer or seller).

POST /api/auth/logout
Log out from the system.

POST /api/auth/reset-password
Reset a forgotten password for any account type.


---

## Milestones

### Milestone-1: 
- **Login, Signup with Authentication (Admin & Others)**:
  1. Implement secure login and signup functionality for two roles: Admin and General Users.
  2. Admins have access to manage products, view user activities, and oversee orders.
  3. General Users can browse, add items to the cart, and make purchases.

- **Basic Page Layout (Home & Others)**:
  - **Home Page**:
    1. Showcase featured and top-selling products.
    2. Add a search bar for product lookup.
    3. Display categories for easy navigation (e.g., Laptops, Desktops, Accessories).
  - **Navigation Bar**:
    1. Add links to Home, Products, Categories, About Us, Contact Us, and User Account.
    2. Include a cart icon with a dynamic item counter.
  - **Other Pages**:
    - **Product Page**: Show product details (name, image, price, specs, reviews).
    - **Cart Page**: List items with quantity adjustment and removal options.
    - **User Profile Page**: Include order history, saved items, and account settings.
  - **Responsive Design**: Make pages mobile-friendly and device-compatible.

---

### Milestone-2: 
- **All Page Functionalities & User Interaction**:

  - **Home Page Functionalities**:
    1. **Search Bar**: Allow users to search for products by name or category.
    2. **Category Navigation**: Filter products by categories (e.g., Laptops, Accessories).
    3. **Featured Products**: Display clickable featured and top-selling product cards.

  - **Product Page Functionalities**:
    1. **Product Details**: Display product name, price, images, specifications, and reviews.
    2. **Add to Cart**: Provide an option to add products to the cart.

  - **Cart Page Functionalities**:
    1. **Cart Item Management**: Enable quantity adjustment or removal of items.
    2. **Total Price Calculation**: Show dynamic updates of the total price.
    3. **Checkout Button**: Redirect users to the checkout process.

  - **User Profile Functionalities**:
    1. **Order History**: List all past orders with statuses (e.g., delivered, pending).
    2. **Saved Items**: Provide a section for wishlist or saved products.
    3. **Account Settings**: Allow users to update personal details and passwords.

  - **Admin Functionalities**:
    1. **Product Management**: Add, edit, and delete products.
    2. **User Management**: View and manage user roles and activities.
    3. **Order Management**: Update and track order statuses.

  - **User Interactions**:
    1. **Responsive Interactions**: Ensure buttons and links are easy to click on all devices.
    2. **Feedback**: Provide real-time feedback (e.g., "Added to Cart" toast messages).
    3. **Form Validations**: Validate inputs for login, signup, and checkout forms.

---

### Final Milestone: Admin Control Panel, Hosting, and Design Perfection 

- **Admin Control Panel**:
  1. **Dashboard Overview**: Display key metrics (e.g., total users, orders, revenue, and products).
  2. **Product Management**: Add, edit, delete, and view products with options to upload images.
  3. **User Management**: View user details, update roles (Admin/User), and deactivate accounts.
  4. **Order Management**: View, update, and track order statuses (e.g., pending, shipped, delivered).
  5. **Review Management**: Moderate and delete inappropriate user reviews.
  6. **Analytics**: Provide sales and user activity reports with charts and graphs.

- **Perfection of Designs**:
  1. **Consistency**: Ensure uniform fonts, colors, and button styles across all pages.
  2. **Accessibility**: Optimize the UI for screen readers and keyboard navigation.
  3. **Responsive Design**: Test and refine layouts for various screen sizes (mobile, tablet, desktop).
  4. **Microinteractions**: Add subtle animations for hover effects, button clicks, and loading states.
  5. **Error-Free UI**: Fix any alignment, overlapping, or broken element issues.

---

## Team Members

| ID          | Name                    | Email                              | Role               |
|-------------|-------------------------|------------------------------------|--------------------|
| 202220104062| Akib Mahmud Omio        | akibmahmudomio@gmail.com           | Frontend + Backend |
| 20220104066 | Reza Alvi                | alvireza24@gmail.com               | Frontend + Backend |
| 20220104070 | Turjoy Basak Arko        | darkbluster03@gmail.com            | Lead               |

---


# MageProfis_CustomerNotice

This module enables the customer to display static blocks as Notices by using a 
Prefix in the Block identifier.

###Usage:

just add a static block, name it however you want an add the "notice_" prefix.

A Block with "notice_" as Prefix will be displayed on all pages. 

## Default Prefixes

<ul>
    <li>"notice_" => Will be displayed on all pages</li>
    <li>"notice-category_" => Will be displayed on all category pages</li>
    <li>"notice-product_" => Will be displayed on product view</li>
    <li>"notice-login_" => Will be displayed on login page</li>
    <li>"notice-register_" => Will be displayed on registration page</li>
    <li>"notice-account_" => Will be displayed on all account pages</li>
    <li>"notice-search_" => Will be displayed on all search pages</li>
    <li>"notice-checkout_" => Will be displayed in checkout</li>
    <li>"notice-cart_" => Will be displayed in cart</li>
    <li>"notice-contact_" => Will be displayed on contact page</li>
    <li>"notice-page_" => Will be displayed on CMS-Pages</li>
</ul>

##Add or remove Prefixes

Prefixes are Mapped to Layout Handles.
You can add or remove Prefixes in system -> Configuration -> Mageprofis -> Customer Notices.
Please do not add an "_" at the end of your custom prefix.



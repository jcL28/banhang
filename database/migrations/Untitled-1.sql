- role_permissions -> id, role_id, permissions_id
- role -> id, name
- permission -> id, name
- users (admin, user) -> id, name , password, email, type (0: admin, 1: user), phone, address, country, role_id, status(0: inactive, 1: active), date_created
- products -> id, product_name, product_price, product_color, product_size, product_price_promotion, product_description
- products_images -> product_name, images
- product_categories -> id, category_name
- orders -> id, user_id, user_name, user_phone, user_email, user_address, user_country
- order_details -> product_id, product_price, product_color, product_size ,total_price, total_price_promotion
- cart -> user_id, user_name, user_phone, user_email, user_address, user_country
- cart_details -> product_id, product_price, product_color, product_size
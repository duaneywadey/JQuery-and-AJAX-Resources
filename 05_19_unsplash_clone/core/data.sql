CREATE TABLE unsplash_users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR (255),
    password TEXT,
    first_name VARCHAR (255),
    last_name VARCHAR (255),
    is_admin BOOL,
    is_suspended BOOL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE unsplash_categories (
    unsplash_category_id INT AUTO_INCREMENT PRIMARY KEY,
    category_name VARCHAR (255),
    user_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE unsplash_photos (
    unsplash_photo_id INT AUTO_INCREMENT PRIMARY KEY,
    photo_name TEXT,
    photo_description TEXT,
    user_id INT,
    category_name VARCHAR (255) DEFAULT "Others",
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




CREATE TABLE attendance_system_users (
    user_id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR (255),
    password TEXT,
    first_name VARCHAR (255),
    last_name VARCHAR (255),
    is_admin BOOL,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE attendance_records (
    attendance_record_id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    attendance_type VARCHAR(255),
    date_added DATE,
    timestamp_record_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);




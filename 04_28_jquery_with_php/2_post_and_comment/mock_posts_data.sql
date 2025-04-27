CREATE TABLE mock_posts_data (
	mock_post_id INT AUTO_INCREMENT PRIMARY KEY,
	post_desc TEXT,
	date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE mock_comments_data (
	mock_comment_id INT AUTO_INCREMENT PRIMARY KEY,
	post_id INT,
	comment_desc TEXT,
	date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
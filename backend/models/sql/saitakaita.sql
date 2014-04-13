CREATE TABLE cms_user(
	id INTEGER AUTO_INCREMENT,
	user_name VARCHAR(20) NOT NULL,
	password VARCHAR(40) NOT NULL,
	created_at DATETIME,
	PRIMARY KEY (id),
	UNIQUE KEY user_name_index(user_name))
	ENGINE=INNODB;
	
CREATE TABLE cms_article(
	id INTEGER AUTO_INCREMENT,
	user_id INTEGER NOT NULL,
	category INTEGER DEFAULT 1 NOT NULL,
	image_path VARCHAR(255),
	title VARCHAR(255),
	body TEXT,
	created_at DATETIME,
	update_at DATETIME,
	PRIMARY KEY(id))
	ENGINE=INNODB;


CREATE TABLE cms_category(
	category_id INTEGER AUTO_INCREMENT,
	category_name VARCHAR(40) NOT NULL,
	created_at DATETIME,
	PRIMARY KEY (category_id),
	UNIQUE KEY category_name_index(category_name))
	ENGINE=INNODB;



ALTER TABLE cms_article ADD FOREIGN KEY (user_id) REFERENCES cms_user(id);
ALTER TABLE cms_article ADD FOREIGN KEY (category) REFERENCES cms_category(category_id);
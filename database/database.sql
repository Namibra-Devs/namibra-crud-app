-- CREATE YOUR DATABAS AND USER. MAKE SURE YOU GRANT YOUR USER ALL NECCESSARY PREVILAGES

CREATE TABLE employee (
  id int NOT NULL AUTO_INCREMENT,
  name varchar(255) DEFAULT NULL,
  position varchar(100) DEFAULT NULL,
  age int DEFAULT NULL,
  imageSrc varchar(200) DEFAULT NULL,
  PRIMARY KEY (id)
);

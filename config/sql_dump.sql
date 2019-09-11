CREATE DATABASE IF NOT EXISTS gallery DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

USE gallery;

CREATE TABLE IF NOT EXISTS car_photos (
  id SERIAL,
  file_name VARCHAR(255),
  counter int(10) DEFAULT 0,
  description VARCHAR(255));

INSERT INTO car_photos (file_name, description)
  VALUES ('ford-explorer.jpg', 'Ford Explorer'),
         ('ford-focus.jpg', 'Ford Focus'),
         ('kia-ceed.jpg', 'Kia Ceed'),
         ('kia-rio.jpg', 'Kia Rio');
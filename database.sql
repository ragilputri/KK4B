/* Create Database and Table */
create database restaurant;

use restaurant;

CREATE TABLE 'menu' (
  'id' int(10) NOT NULL auto_increment,
  'kategori' varchar(100),
  'makanan' varchar(100),
  'harga' varchar(100),
  PRIMARY KEY  ('id')
);
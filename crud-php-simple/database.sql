create database test;

use test;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);


CREATE TABLE `employees` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `gender` Varchar(10) NOT NULL,
  `salary` bigint(50),
  `address` text(200) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY  (`id`)
);


CREATE TABLE `vendor` (
  `vid` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);




CREATE TABLE `products` (
  `pid` int(11) NOT NULL auto_increment,
  `product_name` varchar(200) NOT NULL unique,
  `description` varchar(200) NOT NULL,
  `product_type` varchar(50) NOT NULL,
  `cost` float NOT NULL,
  `sell_price` float NOT NULL,
  `quantity` int(20) NOT NULL,
  `vendor_id` int(10) NOT NULL,
  `added_by` int(10) NOT NULL,
  PRIMARY KEY  (`pid`)
);
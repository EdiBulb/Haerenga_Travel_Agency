/*
phpMyAdmin
version 5.2.1
http://www.phpmyadmin.net

Host: localhost
Generation Time: 25 October 2024
Server version: 10.4.32-MariaDB
PHP Version: 8.2.12
*/


SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/* Database: travel_agency */


/* Table creation: admin */
CREATE TABLE admin (
  user_id int(11) NOT NULL auto_increment,
  username varchar(40) NOT NULL,
  password varchar(40) NOT NULL,
  email varchar(40) NOT NULL,
  address varchar(60) NOT NULL,
  phone_no varchar(30) NOT NULL,
  designation varchar(30) NOT NULL,
  date timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (user_id),
  UNIQUE KEY username (username)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

/* Initial data setting: admin */
INSERT INTO admin (user_id, username, password, email, address, phone_no, designation, date) VALUES
(1, 'admin', 'admin', 'admin@email.com', 'Level 4/3 City Road, Grafton, Auckland 1010', '1112223333', '', '2025-10-25 09:31:12'),
(2, 'harry', 'harry', '270415424@yoobeestudent.ac.nz', 'Level 4/3 City Road, Grafton, Auckland 1010', '0271112222', '', '2025-10-25 09:31:12'),
(3, 'goun', 'goun', '270541365@yoobeestudent.ac.nz', 'Level 4/3 City Road, Grafton, Auckland 1010', '0272223333', '', '2025-10-25 09:31:12'),
(4, 'harneet', 'harneet', '270470939@yoobeestudent.ac.nz', 'Level 4/3 City Road, Grafton, Auckland 1010', '0273334444', '', '2025-10-25 09:31:12');


/* Table creation: contact */
CREATE TABLE contact (
  contact_id int(11) NOT NULL auto_increment,
  name varchar(100) NOT NULL,
  company varchar(100) NOT NULL,
  email varchar(100) NOT NULL,
  topic varchar(100) NOT NULL,
  phone varchar(100) NOT NULL,
  comments varchar(10000) NOT NULL,
  date timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (contact_id)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

/* Initial data setting: contact */
INSERT INTO contact (contact_id, name, company, email, topic, phone, comments, date) VALUES
(1, 'No Name', 'Company', 'Email', 'Topic', '0009998888', 'Visa Inquiries', '2024-10-27 23:32:11'),
(2, 'Taylor', '', 'taylor@email.com', 'South Island Package Inquiries', '0007776666', 'Are there three-day package tours?', '2024-10-27 23:37:45');


/* Table creation: customer */
CREATE TABLE customer (
  customer_id int(11) NOT NULL AUTO_INCREMENT,
  uploadimage TEXT NOT NULL,
  full_name VARCHAR(60) NOT NULL,
  status VARCHAR(15) NOT NULL,
  date_of_birth DATE NOT NULL,
  place_of_birth VARCHAR(60) NOT NULL,
  previous_nationality VARCHAR(30) NOT NULL,
  present_nationality VARCHAR(30) NOT NULL,
  sex VARCHAR(30) NOT NULL,
  marital_status VARCHAR(30),
  place_of_issue VARCHAR(30) NOT NULL,
  qualification VARCHAR(30),
  profession VARCHAR(40),
  home_address VARCHAR(90),
  telephone_no VARCHAR(30) NOT NULL,
  email VARCHAR(40) NOT NULL,
  password VARCHAR(255) NOT NULL,
  purpose_of_travel VARCHAR(60) NOT NULL,
  date_of_passport DATE NOT NULL,
  passport_no VARCHAR(30) NOT NULL,
  date_of_passport_expiry DATE NOT NULL,
  duration_of_stay FLOAT NOT NULL,
  date_of_arrival DATE NOT NULL,
  date_of_departure DATE NOT NULL,
  mode_of_payment VARCHAR(30) NOT NULL,
  relationship VARCHAR(30),
  destination VARCHAR(30) NOT NULL,
  carriers_name VARCHAR(30),
  visa_no VARCHAR(30),
  date_of_insertion TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  inserted_by VARCHAR(11) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (customer_id),
  UNIQUE KEY (passport_no)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=104;

/* Insert statements */
INSERT INTO customer (
  customer_id, uploadimage, full_name, status, date_of_birth, place_of_birth, previous_nationality, present_nationality, sex, marital_status, place_of_issue, qualification, profession, home_address, telephone_no, email, purpose_of_travel, date_of_passport, passport_no, date_of_passport_expiry, duration_of_stay, date_of_arrival, date_of_departure, mode_of_payment, relationship, destination, carriers_name, visa_no, date_of_insertion, inserted_by
) VALUES
(101, 'user/customer_1.jpg', 'Harry Potter', 'APPROVED', '1999-01-01', 'London', 'United Kingdom', 'United Kingdom', 'MALE', 'MARRIED', 'London', 'GRADUATION', 'Programer', NULL, '123123123', 'customer1@email.com', 'VISIT', '2024-12-01', 'U00000000', '2025-12-01', 5, '2024-12-10', '2024-12-15', 'bank transfer', NULL, 'Auckland', NULL, 'visa_no', '2024-10-26 12:00:00', 'goun'),
(102, 'user/customer_2.jpg', 'Ronald Weasley', 'APPENDED', '1999-02-01', 'London', 'United Kingdom', 'United Kingdom', 'MALE', 'MARRIED', 'London', 'GRADUATION', 'Programer', NULL, '456456456',  'customer2@email.com','WORK', '2024-12-02', 'U11111111', '2025-12-02', 5, '2024-12-10', '2024-12-15', 'bank transfer', NULL, 'Auckland', NULL, 'visa_no', '2024-10-26 12:00:00', 'goun'),
(103, 'user/customer_3.jpg', 'Hermione Granger', 'APPENDED', '1999-03-01', 'London', 'United Kingdom', 'United Kingdom', 'FEMALE', 'MARRIED', 'London', 'GRADUATION', 'Programer', NULL, '789789789',  'customer3@email.com','WORK', '2024-12-03', 'U22222222', '2025-12-03', 7, '2024-12-10', '2024-12-17', 'bank transfer', NULL, 'Auckland', NULL, 'visa_no', '2024-10-26 12:00:00', 'goun');


/* Table creation: employee */
CREATE TABLE employee (
  emp_id int(100) NOT NULL auto_increment,
  emp_name varchar(100) NOT NULL,
  emp_picture varchar(100) NOT NULL,
  emp_contact varchar(100) NOT NULL,
  emp_email varchar(100) NOT NULL,
  emp_address varchar(100) NOT NULL,
  emp_reference varchar(100),
  emp_desc varchar(100),
  emp_join varchar(100) NOT NULL,
  emp_close varchar(100),
  PRIMARY KEY  (emp_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

/* Initial data setting: employee */
INSERT INTO employee (emp_id, emp_name, emp_picture, emp_contact, emp_email, emp_address, emp_reference, emp_desc, emp_join, emp_close) VALUES
(1, 'Harry Kang', 'user/employee_1.jpg', '0271112222', '270415424@yoobeestudent.ac.nz', 'Level 4/3 City Road, Grafton, Auckland 1010', '', 'Founding member', '2024-10-01', ''),
(2, 'Goun Han', 'user/employee_2.jpg', '0272223333', '270541365@yoobeestudent.ac.nz', 'Level 4/3 City Road, Grafton, Auckland 1010', '', 'Founding member', '2024-10-01', ''),
(3, 'Harneet Kaur', 'user/employee_3.jpg', '0273334444', '270470939@yoobeestudent.ac.nz', 'Level 4/3 City Road, Grafton, Auckland 1010', '', 'Founding member', '2024-10-01', '');


/* Table creation: pages */
CREATE TABLE pages (
  page_id int(100) NOT NULL auto_increment,
  title varchar(100) NOT NULL,
  description text NOT NULL,
  page_type varchar(100) NOT NULL,
  picture varchar(100) NOT NULL,
  date timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (page_id)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

/* Initial data setting: pages */
INSERT INTO pages (page_id, title, description, page_type, picture, date) VALUES
(22, 'TERM & CONDITION', '	\r\n1st contract will be for 2 years\r\nLodging will be free\r\nMedical facility will be free\r\nreturn ticket will be free after two year\r\novertime allowance will be according to local ï¿½Labour Law ï¿½ï¿½\r\nother term & condition will be according to Government Labor Laws', 'term_condition', '', '2024-12-04 09:48:45'),
(29, 'OUR SERVICES :', 'The main goal of Haerenga is to provide honest, efficient, and quick services to ensure that you can explore New Zealand’s breathtaking landscapes, deeply understand Māori culture, and experience a safe and adventurous journey.

    We offer a variety of customized travel packages that allow you to explore all corners of New Zealand, with special programs designed to let you immerse yourself in the rich traditions and heritage of the Māori people. After receiving government approval, we organize diverse activities and adventures that let you fully experience New Zealand\'s nature and culture.

    Your journey will be meticulously planned by our experienced travel experts, ensuring that you enjoy the beauty and charm of each destination to the fullest. We prioritize health and safety, managing every aspect of your trip so that it runs smoothly and securely.

    Explore everything New Zealand has to offer with Haerenga! We take care of every detail, from flights and accommodations to tours, ensuring your adventure is unforgettable.', 'services', 'services.png', '2024-12-08 22:30:23'),
(30, 'ABOUT HAERENGA TRAVEL AND TOUR:', 'The team at HAERENGA Travels is committed to delivering quality service to its clients with a personal touch. As a leading industry player', 'aboutus', 'aboutus.jpg', '2024-12-08 22:31:19'),
(31, 'Careers at HAERENGA Travel and Tour Agency:', 'HAERENGA is rapidly growing organization, in terms of both people customers. To keep up with this rapid pace of growth, we are seeking talented & focused individuals who can contribute significantly and be a part of this growth process.', 'career', '1223305719383_image_.jpg', '2024-12-08 22:32:49'),
(32, 'Auckland City', 'Explore auckland city hidden spot', 'packages', 'about.jpg', '2024-12-27 16:40:12'),
(33, 'ENJOY South Island', 'Special Package of South island Road Trip Package', 'packages', 'bannerAboard2.gif', '2024-12-27 10:46:26'),
(34, 'BOOK TRIP', 'Travel Now HAERENGA Travel and Tour Agency 40% off\r\n', 'news', 'news.gif', '2024-12-27 10:54:57'),
(35, 'Rent Car', '\r\nRental Car Link Offer 30% Discount up to December', 'news', 'goa-tour-packages-h.gif', '2024-12-27 11:00:49'),
(36, 'New Zealand', 'Special New Zealand Trip now contact us', 'news', 'hajj.gif', '2024-12-27 11:04:59'),
(37, 'About Maori', 'The Maori are the native people of New Zealand, who came from Polynesia over 1,000 years ago. They have a unique culture with traditions like carving and the "haka" dance. Their language, Te Reo Maori, is one of the New Zealand official languages. Today, Maori culture is an important part of New Zealands identity.', 'abouthistory', 'Maori2.png', '2024-12-27 11:04:59');


/* Table creation: package */
CREATE TABLE package (
    package_id INT AUTO_INCREMENT PRIMARY KEY,
    package_name VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2),
    picture varchar(100) NOT NULL,
    duration VARCHAR(100)
);

/* Initial data setting: package */
INSERT INTO package (package_name, description, price, picture, duration)
VALUES 
('South Island Tour', 'Enjoy 7 days Road Trip in South island', 3000.00, 'southisland.png','7 days'),
('Taupo Tour', 'Explore the majestic Taupo', 750.00, 'taupo.png','4 days'),
('City Explorer', 'Discover the hidden gems of the city', 300.00, 'auckland.png', '3 days');


/* Table creation: bookings */
CREATE TABLE bookings (
    booking_id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    email VARCHAR(255),
    phone VARCHAR(20),
    package_id INT,
    travel_date DATE,
    people INT,
    message TEXT,
    FOREIGN KEY (package_id) REFERENCES Package(package_id)
);

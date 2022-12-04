
-- Host: localhost    Database: dolphin_crm
-- Server version   5.0.45-log

/*!40101 SET NAMES utf8 */;
SET TIME_ZONE='-05:00' ;


DROP DATABASE IF EXISTS dolphin_crm;
CREATE DATABASE dolphin_crm;
USE dolphin_crm;

--
-- Table structure for table users
--


CREATE TABLE users (
  id int(3) NOT NULL auto_increment,
  firstname varchar(35) NOT NULL default '',
  lastname varchar(20) NOT NULL default '',
  `password` varchar(32) NOT NULL default '',
  email varchar(25) NOT NULL default '',
  `role` varchar(11) NOT NULL default '',
  created_at Datetime default NOW(),
  PRIMARY KEY  (id)

) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table users
--
/*DROP TABLE IF EXISTS users;*/
LOCK TABLES users WRITE;
/*!40000 ALTER TABLE users DISABLE KEYS */;
<<<<<<< HEAD
INSERT INTO users(firstname,lastname,password,email,role) VALUES ('Chandler','Bing',MD5('password123'),' 
=======
INSERT INTO users(firstname,lastname,password,email,role) VALUES ('Admin','Admin',MD5('password123'),' 
>>>>>>> SQL_branch
admin@project2.com','admin'),
('Lacque ','Dixon',MD5('password112'),'admin2@project2.com','admin2'),
('Amoy','James',MD5('password113'),'admin3@project2.com','admin3'),
('Richelle','Smith',MD5('password114'),'admin4@project2.com','admin4'),
('Janai','Thomas',MD5('password115'),'admin5@project2.com','admin5');
/*!40000 ALTER TABLE users ENABLE KEYS */;
UNLOCK TABLES;

GRANT ALL PRIVILEGES ON dolphin_crm.* TO 'admin'@'localhost' IDENTIFIED BY 'password123';

--
-- Table structure for table contacts
--

/*DROP TABLE IF EXISTS contacts;*/
CREATE TABLE contacts (
  id int(3) NOT NULL auto_increment,
  title varchar(20) NOT NULL default '',
  firstname varchar(20) NOT NULL default '',
  lastname varchar(20) NOT NULL default '',
  email varchar(30) NOT NULL default '',
  telephone varchar(20) NOT NULL default '',
  company varchar(20) NOT NULL default '',
  `type` enum('Sales Lead','Support') NOT NULL default 'Sales Lead',
  assigned_to int(11) default NULL,
  created_by int(11) default Null,
  created_at Datetime default NOW(),
  updated_at Datetime default NOW(),

  PRIMARY KEY  (id)

) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table contacts
--

LOCK TABLES contacts WRITE;
/*!40000 ALTER TABLE contacts DISABLE KEYS */;
INSERT INTO contacts(title,firstname,lastname,email,telephone,company,type,assigned_to,created_by) VALUES ('Host','Matthew','Sutherland','Matthew@project2.com','18761212121','NovaTech','Sales Lead',3,3);
/*!40000 ALTER TABLE contacts ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table notes
--

/*DROP TABLE IF EXISTS notes;*/
CREATE TABLE notes (
  id int(3) NOT NULL auto_increment,
  contact_id varchar(11) NOT NULL default '',
  comment text NOT NULL,
  created_by int(11) default Null,
  created_at Datetime default NOW(),
<<<<<<< HEAD
  
=======

>>>>>>> SQL_branch
  PRIMARY KEY  (id)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table notes
--

LOCK TABLES notes WRITE;
/*!40000 ALTER TABLE notes DISABLE KEYS */;
INSERT INTO notes(contact_id,comment,created_by) VALUES ('2','Customer successfully added',3),
('3','Customer addition not successful',9);
/*!40000 ALTER TABLE notes ENABLE KEYS */;
UNLOCK TABLES;



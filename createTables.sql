Create database ProjectShare;
use ProjectShare;

CREATE TABLE `MessageBox` (
  `mb_from_userid` int(6) DEFAULT NULL,
  `mb_to_userid` int(6) DEFAULT NULL,
  `mb_text` text,
  `mb_time` datetime DEFAULT NULL,
  `mb_id` int(6) NOT NULL AUTO_INCREMENT,
  `has_read` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`mb_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

CREATE TABLE `Users` (
  `user_id` int(6) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) DEFAULT NULL,
  `user_email` varchar(30) DEFAULT NULL,
  `user_location` varchar(50) DEFAULT NULL,
  `user_pass` varchar(30) DEFAULT NULL,
  `user_gender` varchar(1) DEFAULT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

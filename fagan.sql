CREATE TABLE `tbl_shoe` (
  `shoe_id` int(8) unsigned NOT NULL auto_increment, 
  `shoe_brand` varchar(180) NOT NULL default '',
  `shoe_type` varchar(180) NOT NULL default '',
  `shoe_amount` int(10) NOT NULL default '0',
  `shoe_date_added` date NOT NULL,
  `shoe_time_added` time NOT NULL,
  `shoe_saved` int(1) NOT NULL default '0',	
  `shoe_status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`shoe_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;

CREATE TABLE `tbl_shoe_items` (
  `rec_id` int(8) NOT NULL default '0',
  `shoe_id` int(8) NOT NULL default '0',
  `rec_qty` int(8) NOT NULL default '0',
  KEY  (`rec_id`),
  KEY  (`shoe_id`)
) ENGINE=MyISAM;

CREATE TABLE `tbl_shirt` (
  `shirt_id` int(8) unsigned NOT NULL auto_increment, 
  `shirt_brand` varchar(180) NOT NULL default '',
  `shirt_name` varchar(180) NOT NULL default '',
  `shirt_amount` int(10) NOT NULL default '0',
  `shirt_date_added` date NOT NULL,
  `shirt_time_added` time NOT NULL,
  `shirt_saved` int(1) NOT NULL default '0',	
  `shirt_status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`shirt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20000001;

CREATE TABLE `tbl_shirt_items` (
  `rec_id` int(8) NOT NULL default '0',
  `shirt_id` int(8) NOT NULL default '0',
  `rec_qty` int(8) NOT NULL default '0',
  KEY  (`rec_id`),
  KEY  (`shirt_id`)
) ENGINE=MyISAM;


CREATE TABLE `tbl_perfume` (
  `perfume_id` int(8) unsigned NOT NULL auto_increment, 
  `perfume_brand` varchar(180) NOT NULL default '',
  `perfume_name` varchar(180) NOT NULL default '',
  `perfume_amount` int(10) NOT NULL default '0',
  `perfume_date_added` date NOT NULL,
  `perfume_time_added` time NOT NULL,
  `perfume_saved` int(1) NOT NULL default '0',	
  `perfume_status` int(1) NOT NULL default '0',
  PRIMARY KEY  (`perfume_id`)
) ENGINE=MyISAM AUTO_INCREMENT=30000001;

CREATE TABLE `tbl_perfume_items` (
  `rec_id` int(8) NOT NULL default '0',
  `perfume_id` int(8) NOT NULL default '0',
  `rec_qty` int(8) NOT NULL default '0',
  KEY  (`rec_id`),
  KEY  (`perfume_id`)
) ENGINE=MyISAM;

CREATE TABLE `tbl_users` (
  `user_id` int(8) unsigned NOT NULL auto_increment, 
  `user_lastname` varchar(180) NOT NULL default '',
  `user_firstname` varchar(180) NOT NULL default '',
  `user_email` varchar(180) NOT NULL default '',
  `user_password` varchar(180) NOT NULL default '',
  `user_date_added` date NOT NULL,
  `user_time_added` time NOT NULL,	
  `user_date_updated` date NOT NULL,
  `user_time_updated` time NOT NULL,
  `user_status` int(1) NOT NULL default '0',
  `user_token` varchar(255) NOT NULL default '',
  `user_access` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10000001;
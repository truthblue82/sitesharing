
--
-- Table structure for table `axon_contact_info`
--

DROP TABLE IF EXISTS `ha_contact_info`;
CREATE TABLE IF NOT EXISTS `ha_contact_info` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `fullname` text NOT NULL,
  `email` text NOT NULL,
  `company` text NOT NULL,
  `subject` text NOT NULL,
  `content` longtext NOT NULL,
  `is_send` tinyint(1) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=0 ;


INSERT INTO `gceval`.`usertype` (`name`) VALUES ('Support');
INSERT INTO `gceval`.`usertype` (`name`) VALUES ('Database Administrator');
INSERT INTO `gceval`.`usertype` (`name`) VALUES ('Programmer');
INSERT INTO `gceval`.`usertype` (`name`) VALUES ('Security Analyst');
INSERT INTO `gceval`.`usertype` (`name`) VALUES ('System Analyst');
INSERT INTO `gceval`.`usertype` (`name`) VALUES ('Software Architect');
INSERT INTO `gceval`.`usertype` (`name`) VALUES ('Data Scientist');
INSERT INTO `gceval`.`usertype` (`name`) VALUES ('Designer');
INSERT INTO `gceval`.`usertype` (`name`) VALUES ('Software Engineer');
INSERT INTO `gceval`.`usertype` (`name`) VALUES ('Project Manager');
INSERT INTO `gceval`.`usertype` (`name`) VALUES ('Tester');
INSERT INTO `gceval`.`usertype` (`name`) VALUES ('Human Resources');
INSERT INTO `gceval`.`usertype` (`name`) VALUES ('Operation Manager');


INSERT INTO `gceval`.`permission` (`role`) VALUES ('CREATE_DIAGNOSTIC');
INSERT INTO `gceval`.`permission` (`role`) VALUES ('DELETE_DIAGNOSTIC');
INSERT INTO `gceval`.`permission` (`role`) VALUES ('ALTER_DIAGNOSTIC');

INSERT INTO `gceval`.`permission` (`role`) VALUES ('MANAGE_USERS');

INSERT INTO `gceval`.`permission` (`role`) VALUES ('CREATE_ANSWER');
INSERT INTO `gceval`.`permission` (`role`) VALUES ('ALTER_ANSWER');
INSERT INTO `gceval`.`permission` (`role`) VALUES ('DELETE_ANSWER');
INSERT INTO `gceval`.`permission` (`role`) VALUES ('ACCESS_ANSWER');


INSERT INTO `gceval`.`permission` (`role`) VALUES ('FULL_ACESS');
INSERT INTO `gceval`.`permission` (`role`) VALUES ('FULL_CONTROL');

INSERT INTO `gceval`.`permission` (`role`) VALUES ('ACCESS_DASHBOARD');

INSERT INTO `gceval`.`group` (`name`) VALUES ('admin');
INSERT INTO `gceval`.`group` (`name`) VALUES ('employee');
INSERT INTO `gceval`.`group` (`name`) VALUES ('company');
INSERT INTO `gceval`.`group` (`name`) VALUES ('researcher');

INSERT INTO `gceval`.`group_has_permission` (`Group_idGroup`, `Permission_idPermission`) VALUES ('1', '10');

INSERT INTO `gceval`.`group_has_permission` (`Group_idGroup`, `Permission_idPermission`) VALUES ('2', '5');
INSERT INTO `gceval`.`group_has_permission` (`Group_idGroup`, `Permission_idPermission`) VALUES ('2', '6');
INSERT INTO `gceval`.`group_has_permission` (`Group_idGroup`, `Permission_idPermission`) VALUES ('2', '7');
INSERT INTO `gceval`.`group_has_permission` (`Group_idGroup`, `Permission_idPermission`) VALUES ('2', '8');


INSERT INTO `gceval`.`group_has_permission` (`Group_idGroup`, `Permission_idPermission`) VALUES ('3', '5');
INSERT INTO `gceval`.`group_has_permission` (`Group_idGroup`, `Permission_idPermission`) VALUES ('3', '6');
INSERT INTO `gceval`.`group_has_permission` (`Group_idGroup`, `Permission_idPermission`) VALUES ('3', '7');
INSERT INTO `gceval`.`group_has_permission` (`Group_idGroup`, `Permission_idPermission`) VALUES ('3', '8');
INSERT INTO `gceval`.`group_has_permission` (`Group_idGroup`, `Permission_idPermission`) VALUES ('3', '11');


INSERT INTO `gceval`.`group_has_permission` (`Group_idGroup`, `Permission_idPermission`) VALUES ('4', '10');


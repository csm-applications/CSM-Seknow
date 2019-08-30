-- insert the user_types

INSERT INTO usertype (id_user_type,name) VALUES (1,'Support');
INSERT INTO usertype (id_user_type,name) VALUES (2,'Database Administrator');
INSERT INTO usertype (id_user_type,name) VALUES (3,'Programmer');
INSERT INTO usertype (id_user_type,name) VALUES (4,'Security Analyst');
INSERT INTO usertype (id_user_type,name) VALUES (5,'System Analyst');
INSERT INTO usertype (id_user_type,name) VALUES (6,'Software Architect');
INSERT INTO usertype (id_user_type,name) VALUES (7,'Data Scientist');
INSERT INTO usertype (id_user_type,name) VALUES (8,'Designer');
INSERT INTO usertype (id_user_type,name) VALUES (9,'Software Engineer');
INSERT INTO usertype (id_user_type,name) VALUES (10,'Project Manager');
INSERT INTO usertype (id_user_type,name) VALUES (11,'Tester');
INSERT INTO usertype (id_user_type,name) VALUES (12,'Human Resources');
INSERT INTO usertype (id_user_type,name) VALUES (13,'Operation Manager');
INSERT INTO usertype (id_user_type,name) VALUES (14,'Manager');

-- populate the permissions


INSERT INTO permission (id_permission, role) VALUES (1,'CREATE_DIAGNOSTIC');
INSERT INTO permission (id_permission, role) VALUES (2,'DELETE_DIAGNOSTIC');
INSERT INTO permission (id_permission, role) VALUES (3,'ALTER_DIAGNOSTIC');

INSERT INTO permission (id_permission, role) VALUES (4,'MANAGE_USERS');

INSERT INTO permission (id_permission, role) VALUES (5,'CREATE_ANSWER');
INSERT INTO permission (id_permission, role) VALUES (6,'ALTER_ANSWER');
INSERT INTO permission (id_permission, role) VALUES (7,'DELETE_ANSWER');
INSERT INTO permission (id_permission, role) VALUES (8,'ACCESS_ANSWER');


INSERT INTO permission (id_permission, role) VALUES (9,'FULL_ACESS');
INSERT INTO permission (id_permission, role) VALUES (10,'FULL_CONTROL');

INSERT INTO permission (id_permission, role) VALUES (11,'ACCESS_DASHBOARD');


-- populate the possibles groups of users

INSERT INTO grouping (id_group, name) VALUES (1, 'admin');
INSERT INTO grouping (id_group, name) VALUES (2, 'employee');
INSERT INTO grouping (id_group, name) VALUES (3, 'company');
INSERT INTO grouping (id_group, name) VALUES (4, 'researcher');


-- assign each group to permission

INSERT INTO group_has_permission (Group_id_Group, Permission_id_Permission) VALUES ('1', '10');

INSERT INTO group_has_permission (Group_id_Group, Permission_id_Permission) VALUES ('2', '5');
INSERT INTO group_has_permission (Group_id_Group, Permission_id_Permission) VALUES ('2', '6');
INSERT INTO group_has_permission (Group_id_Group, Permission_id_Permission) VALUES ('2', '7');
INSERT INTO group_has_permission (Group_id_Group, Permission_id_Permission) VALUES ('2', '8');


INSERT INTO group_has_permission (Group_id_Group, Permission_id_Permission) VALUES ('3', '5');
INSERT INTO group_has_permission (Group_id_Group, Permission_id_Permission) VALUES ('3', '6');
INSERT INTO group_has_permission (Group_id_Group, Permission_id_Permission) VALUES ('3', '7');
INSERT INTO group_has_permission (Group_id_Group, Permission_id_Permission) VALUES ('3', '8');
INSERT INTO group_has_permission (Group_id_Group, Permission_id_Permission) VALUES ('3', '11');


INSERT INTO group_has_permission (Group_id_Group, Permission_id_Permission) VALUES ('4', '10');

-- insert users


INSERT INTO useraccount (nome, email, password, phone, active, birth_date, start_work, gender, user_type, grouping) 
VALUES ('Luiz alfredo', 'luiz@gmail.com', '123', '(43)88481-1234', '1', '1990-06-11','2007-05-01', 'Male' ,'3', '2');
INSERT INTO useraccount (nome, email, password, phone, active, birth_date, start_work, gender, user_type, grouping) 
VALUES ('Mario dos Santos', 'mario@gmail.com', '123', '(43)991234-1234', '1', '1987-02-10', '2010-03-05','Male' , '14', '3');
INSERT INTO useraccount ( nome, email, password, phone, active, birth_date, start_work, gender, user_type, grouping) 
VALUES ('Luiza de Gênova', 'luiza@gmail.com', '123', '(43)994112-4434', '1', '1992-12-10', '2002-03-05','Female' , '7', '2');
INSERT INTO useraccount ( nome, email, password, phone, active, birth_date, start_work, gender, user_type, grouping) 
VALUES ('Aldacir Dias dos Santos', 'aldacir@gmail.com', '123', '(43)991293-5312', '1', '1997-05-05', '2001-03-05', 'Male' , '9', '2');
INSERT INTO useraccount ( nome, email, password, phone, active, birth_date, start_work, gender, user_type, grouping) 
VALUES ('Juniormar Oliveira da Silva', 'juniormar@gmail.com', '123', '(43)912394-0524',  '1', '1985-01-10', '1999-03-05', 'Male' , '2', '2');
INSERT INTO useraccount ( nome, email, password, phone, active, birth_date, start_work, gender, user_type, grouping) 
VALUES ('Gabriel Garcia Cardoso', 'gabriel@gmail.com', '123', '(43)924552-9592', '1', '1981-02-02', '2007-03-05', 'Male' , '2', '2');
INSERT INTO useraccount ( nome, email, password, phone, active, birth_date, start_work, gender, user_type, grouping) 
VALUES ('Mariana Oliveira Silva', 'mariana@gmail.com', '123', '(43)99934-2012', '1', '1950-01-12', '2012-03-05', 'Female' , '5', '2');
INSERT INTO useraccount ( nome, email, password, phone, active, birth_date, start_work, gender, user_type, grouping) 
VALUES ('Lisandra Cavalcanti Bergamasco', 'lisandra@gmail.com', '123', '(43)89823-5124', '1', '1995-05-04', '2017-03-05', 'Female' , '3', '2');
INSERT INTO useraccount ( nome, email, password, phone, active, birth_date, start_work, gender, user_type, grouping) 
VALUES ('Hans Stolbert', 'hans@gmail.com', '123', '(43)94924-1235', '1', '1991-01-15', '2018-03-05', 'Male' , '6', '2');
INSERT INTO useraccount ( nome, email, password, phone, active, birth_date, start_work, gender, user_type, grouping) 
VALUES ('Lidia Garcia de Souza', 'lidia@gmail.com', '123', '(43)90513-3242', '1', '1976-03-12', '2018-03-05', 'Female' , '2', '2');

INSERT INTO useraccount ( nome, email, password, phone, active, birth_date, start_work, gender, user_type, grouping) 
VALUES ('Administrator', 'admin@gmail.com', '123', '(43)9999-1111', '1', '1990-03-12', '2010-03-05', 'Male' , '1', '1');


-- insert company
INSERT INTO company ( name, phone, foundation_date, Description, Owner)  VALUES ( '4Logic', '(43) 9999-1123',
'2010-10-22', 'Software company that creates software for balance calibration and quality management.', 4); 
INSERT INTO company ( name, phone, foundation_date, Description, Owner)  VALUES ( 'Atos', '(43) 3356-2421', 
'2003-10-02', 'Software factory capable of producing software for several companies in the country.', 2); 
INSERT INTO company ( name, phone, foundation_date, Description, Owner)  VALUES ( 'Xbrain', '(11) 1425-3123', 
'2005-05-02', 'Company created to handle business data and discover patterns and assist in intelligent management.',2); 
INSERT INTO company ( name, phone, foundation_date, Description, Owner)  VALUES ( 'DB1', '(16)3345-1354', 
'2009-01-09', 'Software factory that produces enterprise management software and ERPs', 1); 
INSERT INTO company ( name, phone, foundation_date, Description, Owner)  VALUES ( 'Oracle', '(11)9291-2912', 
'1999-10-01', 'Provider of software such as database and various developer tools',3); 
INSERT INTO company ( name, phone, foundation_date, Description, Owner)  VALUES ( 'Netflix', '(13)9124-1923', 
'2015-11-10', 'Company focused on video streaming and content production',7); 
INSERT INTO company ( name, phone, foundation_date, Description, Owner)  VALUES ( 'Facebook', '(11)1323-1412', 
'2006-02-01', 'Company holding the largest social network in the world',5);

-- assign user to company

UPDATE useraccount SET company_id='2' WHERE id_user_account='1';
UPDATE useraccount SET company_id='4' WHERE id_user_account='2';
UPDATE useraccount SET company_id='2' WHERE id_user_account='3';
UPDATE useraccount SET company_id='2' WHERE id_user_account='4';
UPDATE useraccount SET company_id='2' WHERE id_user_account='5';
UPDATE useraccount SET company_id='2' WHERE id_user_account='6';
UPDATE useraccount SET company_id='1' WHERE id_user_account='7';
UPDATE useraccount SET company_id='2' WHERE id_user_account='8';
UPDATE useraccount SET company_id='3' WHERE id_user_account='9';
UPDATE useraccount SET company_id='3' WHERE id_user_account='10';
UPDATE useraccount SET company_id='5' WHERE id_user_account='11';


-- insert group of answers

INSERT INTO groupofanswer (id_group_of_answer, name) VALUES (1, 'Likert Scale');
INSERT INTO groupofanswer (id_group_of_answer, name) VALUES (2, 'Range 1 to 5');
INSERT INTO groupofanswer (id_group_of_answer, name) VALUES (3, 'Range 1 to 10');
INSERT INTO groupofanswer (id_group_of_answer, name) VALUES (4, 'Yes or No');
INSERT INTO groupofanswer (id_group_of_answer, name) VALUES (5, 'weak, moderate, strong');


-- insert possible answers

-- 1 - 5
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('1',1, '2');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('2',2, '2');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('3',3, '2');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('4',4, '2');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('5',5, '2');


-- likert
INSERT INTO answer (Answer,weigth,group_of_answer) VALUES ('Strongly disagree',1, '1');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('Disagree',2, '1');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('Neighter Disagre nor Agree',3 ,'1');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('Agree', 4,'1');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('Strongly Agree', 5, '1');

-- 1 - 10
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('1',1, '3');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('2',2, '3');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('3',3, '3');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('4',4, '3');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('5',5, '3');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('6',6, '3');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('7',7, '3');
INSERT INTO answer (Answer, weigth,group_of_answer) VALUES ('8',8, '3');
INSERT INTO answer ( Answer, weigth,group_of_answer) VALUES ('9',9, '3');
INSERT INTO answer (Answer,weigth, group_of_answer) VALUES ('10',10, '3');

-- yes or no
INSERT INTO answer (Answer,weigth, group_of_answer) VALUES ('Yes',1, '4');
INSERT INTO answer (Answer,weigth, group_of_answer) VALUES ('No',0, '4');

-- 3 points scale
INSERT INTO answer (Answer, weigth,  group_of_answer) VALUES ('Weak', 1,'5');
INSERT INTO answer (Answer, weigth, group_of_answer) VALUES ('Moderate',2 ,'5');
INSERT INTO answer (Answer, weigth, group_of_answer) VALUES ('Strong',3 ,'5');


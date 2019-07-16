-- insert the user_types

INSERT INTO usertype (name) VALUES ('Support');
INSERT INTO usertype (name) VALUES ('Database Administrator');
INSERT INTO usertype (name) VALUES ('Programmer');
INSERT INTO usertype (name) VALUES ('Security Analyst');
INSERT INTO usertype (name) VALUES ('System Analyst');
INSERT INTO usertype (name) VALUES ('Software Architect');
INSERT INTO usertype (name) VALUES ('Data Scientist');
INSERT INTO usertype (name) VALUES ('Designer');
INSERT INTO usertype (name) VALUES ('Software Engineer');
INSERT INTO usertype (name) VALUES ('Project Manager');
INSERT INTO usertype (name) VALUES ('Tester');
INSERT INTO usertype (name) VALUES ('Human Resources');
INSERT INTO usertype (name) VALUES ('Operation Manager');
INSERT INTO usertype (name) VALUES ('Manager');

-- populate the permissions

INSERT INTO permission (role) VALUES ('CREATE_DIAGNOSTIC');
INSERT INTO permission (role) VALUES ('DELETE_DIAGNOSTIC');
INSERT INTO permission (role) VALUES ('ALTER_DIAGNOSTIC');

INSERT INTO permission (role) VALUES ('MANAGE_USERS');

INSERT INTO permission (role) VALUES ('CREATE_ANSWER');
INSERT INTO permission (role) VALUES ('ALTER_ANSWER');
INSERT INTO permission (role) VALUES ('DELETE_ANSWER');
INSERT INTO permission (role) VALUES ('ACCESS_ANSWER');


INSERT INTO permission (role) VALUES ('FULL_ACESS');
INSERT INTO permission (role) VALUES ('FULL_CONTROL');

INSERT INTO permission (role) VALUES ('ACCESS_DASHBOARD');


-- populate the possibles groups of users

INSERT INTO grouping (name) VALUES ('admin');
INSERT INTO grouping (name) VALUES ('employee');
INSERT INTO grouping (name) VALUES ('company');
INSERT INTO grouping (name) VALUES ('researcher');


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


INSERT INTO useraccount (nome, email, password, phone, active, birth_date, start_work, user_type, grouping) 
VALUES ('Luiz alfredo', 'luiz@gmail.com', '123', '(43)88481-1234', '1', '1990-06-11', '2007-05-01', '3', '2');
INSERT INTO useraccount (nome, email, password, phone, active, birth_date, start_work, user_type, grouping) 
VALUES ('Mario dos Santos', 'mario@gmail.com', '123', '(43)991234-1234', '1', '1987-02-10', '2010-03-05', '5', '2');
INSERT INTO useraccount (nome, email, password, phone, active, birth_date, start_work, user_type, grouping) 
VALUES ('Luiza de Gênova', 'luiza@gmail.com', '123', '(43)994112-4434', '1', '1992-12-10', '2002-03-05', '7', '2');
INSERT INTO useraccount (nome, email, password, phone, active, birth_date, start_work, user_type, grouping) 
VALUES ('Aldacir Dias dos Santos', 'aldacir@gmail.com', '123', '(43)991293-5312', '1', '1997-05-05', '2001-03-05', '9', '2');
INSERT INTO useraccount (nome, email, password, phone, active, birth_date, start_work, user_type, grouping) 
VALUES ('Juniormar Oliveira da Silva', 'juniormar@gmail.com', '123', '(43)912394-0524', '1', '1985-01-10', '1999-03-05', '2', '2');
INSERT INTO useraccount (nome, email, password, phone, active, birth_date, start_work, user_type, grouping) 
VALUES ('Gabriel Garcia Cardoso', 'gabriel@gmail.com', '123', '(43)924552-9592', '1', '1981-02-02', '2007-03-05', '2', '2');
INSERT INTO useraccount (nome, email, password, phone, active, birth_date, start_work, user_type, grouping) 
VALUES ('Mariana Oliveira Silva', 'mariana@gmail.com', '123', '(43)99934-2012', '1', '1950-01-12', '2012-03-05', '5', '2');
INSERT INTO useraccount (nome, email, password, phone, active, birth_date, start_work, user_type, grouping) 
VALUES ('Lisandra Cavalcanti Bergamasco', 'lisandra@gmail.com', '123', '(43)89823-5124', '1', '1995-05-04', '2017-03-05', '3', '2');
INSERT INTO useraccount (nome, email, password, phone, active, birth_date, start_work, user_type, grouping) 
VALUES ('Hans Stolbert', 'hans@gmail.com', '123', '(43)94924-1235', '1', '1991-01-15', '2018-03-05', '6', '2');
INSERT INTO useraccount (nome, email, password, phone, active, birth_date, start_work, user_type, grouping) 
VALUES ('Lidia Garcia de Souza', 'lidia@gmail.com', '123', '(43)90513-3242', '1', '1976-03-12', '2018-03-05', '2', '2');

INSERT INTO useraccount (nome, email, password, phone, active, birth_date, start_work, user_type, grouping) 
VALUES ('Administrator', 'admin@gmail.com', '123', '(43)9999-1111', '1', '1990-03-12', '2010-03-05', '1', '1');


-- insert company
INSERT INTO company (name, phone, foundation_date, Description, Owner)  VALUES ('4Logic', '(43) 9999-1123',
'2010-10-22', 'Empresa de Software que cria sofwares para calibragem de balanças e gestão de Qualidade', 4); 
INSERT INTO company (name, phone, foundation_date, Description, Owner)  VALUES ('Atos', '(43) 3356-2421', 
'2003-10-02', 'Fábrica de software capaz de produzir softwares para diversas empresas do país', 2); 
INSERT INTO company (name, phone, foundation_date, Description, Owner)  VALUES ('Xbrain', '(11) 1425-3123', 
'2005-05-02', 'Empresa criada para lidar com dados de empresas e descobrir padrões e auxiliar na gestão inteligente',2); 
INSERT INTO company (name, phone, foundation_date, Description, Owner)  VALUES ('DB1', '(16)3345-1354', 
'2009-01-09', 'Fábrica de software que produz softwares de gestão empresarial e ERPs', 1); 
INSERT INTO company (name, phone, foundation_date, Description, Owner)  VALUES ('Oracle', '(11)9291-2912', 
'1999-10-01', 'Empresa fornecedora de softwares como banco de dados e diversas ferramentas para desenvolvedores',3); 
INSERT INTO company (name, phone, foundation_date, Description, Owner)  VALUES ('Netflix', '(13)9124-1923', 
'2015-11-10', 'Empresa focada no streamming de vídeos e produção de conteúdo',7); 
INSERT INTO company (name, phone, foundation_date, Description, Owner)  VALUES ('Facebook', '(11)1323-1412', 
'2006-02-01', 'Empresa mantenedora da maior rede social do mundo',5);

-- assign user to company

UPDATE useraccount SET company_id='2' WHERE id_user_account='1';
UPDATE useraccount SET company_id='4' WHERE id_user_account='2';
UPDATE useraccount SET company_id='1' WHERE id_user_account='3';
UPDATE useraccount SET company_id='7' WHERE id_user_account='4';
UPDATE useraccount SET company_id='3' WHERE id_user_account='5';
UPDATE useraccount SET company_id='1' WHERE id_user_account='6';
UPDATE useraccount SET company_id='1' WHERE id_user_account='7';
UPDATE useraccount SET company_id='2' WHERE id_user_account='8';
UPDATE useraccount SET company_id='3' WHERE id_user_account='9';
UPDATE useraccount SET company_id='3' WHERE id_user_account='10';
UPDATE useraccount SET company_id='5' WHERE id_user_account='11';


-- insert new diagnostic

INSERT INTO diagnostic (name, Description, user_account) 
VALUES ('PintoD For software industries', 
	'Validating knowledge creation indicators for the software industry: a field research through a structured questionnaire', '11');


-- insert sections
INSERT INTO section (number,name, diagnostic) VALUES (1,'Online community of practice (CoP) or knowledge sharing forum', '1');
INSERT INTO section (number,name, diagnostic) VALUES (1,'Knowledge product (KP)', '1');
INSERT INTO section (number,name, diagnostic) VALUES (1,'Organizational development of the KM capacity', '1');
INSERT INTO section (number,name, diagnostic) VALUES (1,'Participants’ perspectives about the research', '1');

-- insert first section questions

INSERT INTO question (Question, Section) VALUES ('Number of members of CoP', '1');
INSERT INTO question (Question, Section) VALUES ('Number of contributions by type of content ', '1');
INSERT INTO question (Question, Section) VALUES ('Number of views of different types of contents ', '1');
INSERT INTO question (Question, Section) VALUES ('Distribution of members" participation (comment, don"t comment and listeners)', '1');
INSERT INTO question (Question, Section) VALUES ('Number of answers by discussion ', '1');
INSERT INTO question (Question, Section) VALUES ('Number of days before the first answer on a discussion', '1');
INSERT INTO question (Question, Section) VALUES ('Number of members who engage discussions ', '1');
INSERT INTO question (Question, Section) VALUES ('Number of contributions from moderators ', '1');
INSERT INTO question (Question, Section) VALUES ('Number of (mutual) connections of access, exit, moderators and members of the CoP in the corporate social', '1');
INSERT INTO question (Question, Section) VALUES ('Number of discussions which broke down into other topics ', '1');
INSERT INTO question (Question, Section) VALUES ('Presence of target public who participated in the CoP setting procedures ', '1');
INSERT INTO question (Question, Section) VALUES ('Non-participation of the target public due to discontinuation or lack of setting of the CoP ', '1');
INSERT INTO question (Question, Section) VALUES ('Number of chats which had resulted in the portal ', '1');
INSERT INTO question (Question, Section) VALUES ('If a person has talked to someone who they had never talked before and who they probably would not have', '1');
INSERT INTO question (Question, Section) VALUES ('Someone who has already worked out of the CoP with someone who met on the CoP ', '1');
INSERT INTO question (Question, Section) VALUES ('The person can give an example of what the community allows you to do ', '1');


-- insert second section questions

INSERT INTO question (Question, Section) VALUES ('Number of KP created', '2');
INSERT INTO question (Question, Section) VALUES ('Percentage of users who classify KP as good, excellent, or useful', '2');
INSERT INTO question (Question, Section) VALUES ('Number of KP mentions', '2');
INSERT INTO question (Question, Section) VALUES ('Number of KP downloads', '2');
INSERT INTO question (Question, Section) VALUES ('Number of people who read a KP', '2');
INSERT INTO question (Question, Section) VALUES ('Percentage of readers who accessed a particular KP', '2');
INSERT INTO question (Question, Section) VALUES ('Number of people who acquire knowledge about their work and/or product policy through reading ', '2');
INSERT INTO question (Question, Section) VALUES ('Number of channels where a KP is available', '2');
INSERT INTO question (Question, Section) VALUES ('If there was knowledge acquired through discussions about the product ', '2');
INSERT INTO question (Question, Section) VALUES ('Number of KP reccommendations', '2');
INSERT INTO question (Question, Section) VALUES ('Useful for the knowledge product noticed by the target public', '2');
INSERT INTO question (Question, Section) VALUES ('Number of examples where work has been mentioned', '2');

-- insert third section questions

INSERT INTO question (Question, Section) VALUES ('Percentage of people who feel encouraged to share knowledge with their co-workers ', '3');
INSERT INTO question (Question, Section) VALUES ('Percentage of people who believe they have time to transmit and receive knowledge \"from\" or \"to\" other', '3');
INSERT INTO question (Question, Section) VALUES ('Percentage of people who share knowledge with a co-worker from outside their team at least once a week ', '3');
INSERT INTO question (Question, Section) VALUES ('Percentage of people who believe knowledge is an essential organizational resource', '3');
INSERT INTO question (Question, Section) VALUES ('Percentage of people who agree they are encouraged, by the organization, to seek knowledge from coworkers', '3');
INSERT INTO question (Question, Section) VALUES ('Percentage of people who agree that if the need comes up for a specific piece of knowledge, the', '3');
INSERT INTO question (Question, Section) VALUES ('Percentage of people who agree that they know exactly \"who\" in the organization has the specific', '3');
INSERT INTO question (Question, Section) VALUES ('Percentage of people who agree that they can find the knowledge they need quickly and easily ', '3');
INSERT INTO question (Question, Section) VALUES ('Percentage of people who agree that organizational knowledge is useful and meets their needs when', '3');
INSERT INTO question (Question, Section) VALUES (' Percentage of people who agree that organization"s CoP improve and facilitate knowledge sharing', '3');
INSERT INTO question (Question, Section) VALUES ('Percentage of people who agree that it is not so easy to share knowledge with co-workers from other teams', '3');
INSERT INTO question (Question, Section) VALUES ('Percentage of people who are confident that all their knowledge created with potential value for future', '3');
INSERT INTO question (Question, Section) VALUES ('Structures for teamwork and project which encourage people to present experiences and insights from', '3');
INSERT INTO question (Question, Section) VALUES ('Encourage people from many perspectives and different points of view to emerge in the company', '3');

-- insert forth section questions

INSERT INTO question (Question, Section) VALUES ('This set of indicators will help me with decision-making on my daily life?', '4');
INSERT INTO question (Question, Section) VALUES ('Do you think that KM is important to your organization?', '4');
INSERT INTO question (Question, Section) VALUES ('Do you think that KM is important to the project you are involved with?', '4');
INSERT INTO question (Question, Section) VALUES ('What is your understanding level regarding KM?', '4');
INSERT INTO question (Question, Section) VALUES ('Do you have any suggestion about those indicators? (e.g. add/replace/take out an indicator; comments; etc.)', '4');


-- insert group of answers

INSERT INTO groupofanswer (name) VALUES ('Likert Scale');
INSERT INTO groupofanswer (name) VALUES ('Range 1 to 5');
INSERT INTO groupofanswer (name) VALUES ('Range 1 to 10');
INSERT INTO groupofanswer (name) VALUES ('Yes or No');


-- insert possible answers

INSERT INTO answer (Answer, group_of_answer) VALUES ('Strongly disagree', '1');
INSERT INTO answer (Answer, group_of_answer) VALUES ('Disagree', '1');
INSERT INTO answer (Answer, group_of_answer) VALUES ('Neighter Disagre nor Agree', '1');
INSERT INTO answer (Answer, group_of_answer) VALUES ('Agree', '1');
INSERT INTO answer (Answer, group_of_answer) VALUES ('Strongly Agree', '1');
INSERT INTO answer (Answer, group_of_answer) VALUES ('1', '2');
INSERT INTO answer (Answer, group_of_answer) VALUES ('2', '2');
INSERT INTO answer (Answer, group_of_answer) VALUES ('3', '2');
INSERT INTO answer (Answer, group_of_answer) VALUES ('4', '2');
INSERT INTO answer (Answer, group_of_answer) VALUES ('5', '2');
INSERT INTO answer (Answer, group_of_answer) VALUES ('1', '3');
INSERT INTO answer (Answer, group_of_answer) VALUES ('2', '3');
INSERT INTO answer (Answer, group_of_answer) VALUES ('3', '3');
INSERT INTO answer (Answer, group_of_answer) VALUES ('4', '3');
INSERT INTO answer (Answer, group_of_answer) VALUES ('5', '3');
INSERT INTO answer (Answer, group_of_answer) VALUES ('6', '3');
INSERT INTO answer (Answer, group_of_answer) VALUES ('7', '3');
INSERT INTO answer (Answer, group_of_answer) VALUES ('8', '3');
INSERT INTO answer ( Answer, group_of_answer) VALUES ('9', '3');
INSERT INTO answer (Answer, group_of_answer) VALUES ('10', '3');

INSERT INTO answer (Answer, group_of_answer) VALUES ('Yes', '4');
INSERT INTO answer (Answer, group_of_answer) VALUES ('No', '4');



-- insert group of answer in question

INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('1', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('2', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('3', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('4', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('5', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('6', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('7', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('8', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('9', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('10', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('11', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('12', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('13', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('14', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('15', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('16', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('17', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('18', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('19', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('20', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('21', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('22', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('23', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('24', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('25', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('26', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('27', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('28', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('29', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('30', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('31', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('32', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('33', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('34', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('35', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('36', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('37', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('38', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('39', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('40', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('41', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('42', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('43', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('44', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('45', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('46', '2');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('47', '2');


-- insert a response in the first questionnaire

INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '1', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '2', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '3', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '4', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '5', '1');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '6', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '7', '2');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '8', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '9', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '10', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '11', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '12', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '13', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '14', '2');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '15', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '1', '16', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '2', '17', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '2', '18', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '2', '19', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '2', '20', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '2', '21', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '2', '22', '2');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '2', '23', '1');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '2', '24', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '2', '25', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '2', '26', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '2', '27', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '2', '28', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '29', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '30', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '31', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '32', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '33', '2');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '34', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '35', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '36', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '37', '1');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '38', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '39', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '40', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '41', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '3', '42', '4');

INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '4', '43', '21');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '4', '44','21');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '4', '45','22');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '4', '46','22');
INSERT INTO answerdata (user_account, Section, question, User_answer) VALUES ('1', '4', '47','I dont have any suggestions');


INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '1', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '2', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '3', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '4', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '5', '1');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '6', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '7', '2');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '8', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '9', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '10', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '11', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '12', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '13', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '14', '2');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '15', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '1', '16', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '2', '17', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '2', '18', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '2', '19', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '2', '20', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '2', '21', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '2', '22', '2');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '2', '23', '1');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '2', '24', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '2', '25', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '2', '26', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '2', '27', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '2', '28', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '29', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '30', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '31', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '32', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '33', '2');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '34', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '35', '3');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '36', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '37', '1');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '38', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '39', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '40', '4');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '41', '5');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('2', '3', '42', '4');

INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '4', '43', '21');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '4', '44','21');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '4', '45','22');
INSERT INTO answerdata (user_account, Section, question, answer) VALUES ('1', '4', '46','22');


-- Insere um novo diagnostico

INSERT INTO diagnostic (name, Description, User_Account) VALUES 
('Bukowitz and Williams', 'Este Diagnóstico utiliza 7 seções para avaliar se sua empresa está realizando os procedimentos indicados para a gestão de 
	conhecimento. É importante ressaltar que cada seção foca em uma faceta da gestão de conhecimento e precisa ser respondida com a sinceridade.
	O mascaramento do diagnóstico levará o getor a não investir em melhorar o processo de aprendizado e compartilhamento de conhecimento', '11');

-- Insere as seções

INSERT INTO section (number, name, diagnostic) VALUES ('1', 'Obter', '2');
INSERT INTO section (number, name, diagnostic) VALUES ('2', 'Utilizar', '2');
INSERT INTO section (number, name, diagnostic) VALUES ('3', 'Aprender', '2');
INSERT INTO section (number, name, diagnostic) VALUES ('4', 'Contribuir', '2');
INSERT INTO section (number, name, diagnostic) VALUES ('5', 'Avaliar', '2');
INSERT INTO section (number, name, diagnostic) VALUES ('6', 'Construir/manter', '2');
INSERT INTO section (number, name, diagnostic) VALUES ('7', 'Descartar', '2');


-- insere as perguntas da seção 1

INSERT INTO question (Question, Section) VALUES ('As pessoas fornecem explicações completas queuando fazem solicitações de informações', '5');
INSERT INTO question (Question, Section) VALUES ('Os grupos e as pessoas documentam rotineiramente e compartilham informações sobre seus conhecimentos', '5');
INSERT INTO question (Question, Section) VALUES ('Há distinção entre papéis de gestão do conhecimento que são principalmente de natureza administrativa e aqueles que são mais focadas em conteúdos.', '5');
INSERT INTO question (Question, Section) VALUES ('As pessoas são capazes de personalizar o seu ambiente de informação.', '5');
INSERT INTO question (Question, Section) VALUES ('Os meios físicos e eletrônicos onde armazenamos nossos conhecimentos são mantidos atualizados.', '5');
INSERT INTO question (Question, Section) VALUES ('A organização aloca recursos às comunidades de especialistas que desejam gerenciar seus conhecimentos.', '5');
INSERT INTO question (Question, Section) VALUES ('O treinamento de novos sistemas focaliza como essas tecnologias podem ser utilizadas para melhorar a qualidade e a eficiência da forma como as pessoas trabalham.', '5');
INSERT INTO question (Question, Section) VALUES ('As pessoas só solicitam informação quando realmente necessitam dela', '5');
INSERT INTO question (Question, Section) VALUES ('As pessoas distinguem a informação que desejam que a organização remeta automaticamente para as suas mesas daquela que desejam procurar com base em uma necessidade hipotética.', '5');
INSERT INTO question (Question, Section) VALUES ('As comunidades de especialistas são fáceis de identificar, ficando claro onde ir para obter informações específicas.', '5');
INSERT INTO question (Question, Section) VALUES ('As solicitações de informação enviadas para a intranet ou fóruns de discussão, geralmente são fáceis de compreender.', '5');
INSERT INTO question (Question, Section) VALUES ('Os indivíduos específicos identificam, coletam, classificam, resumem e disseminam o conhecimento organizacional.', '5');
INSERT INTO question (Question, Section) VALUES ('Os especialistas desempenham um papel importante na identificação de informação para outros usuários.', '5');
INSERT INTO question (Question, Section) VALUES ('Os meios eletrônicos e físicos onde armazenamos o nosso conhecimento contém a melhor informação disponível sobre um amplo leque de tópicos necessários.', '5');
INSERT INTO question (Question, Section) VALUES ('Quando as pessoas recebem a tarefa de pesquisar informação, são capazes de realizá-la.', '5');
INSERT INTO question (Question, Section) VALUES ('As pessoas podem buscar informações em uma ampla variedade de aplicativos e bancos de dados.', '5');
INSERT INTO question (Question, Section) VALUES ('A organização criou instrumentos eletrônicos e gráficos que dirigem as pessoas para os recursos disponíveis.', '5');
INSERT INTO question (Question, Section) VALUES ('Os especialistas em informação da empresa ajudam as pessoas a utilizar instrumentos on-line, incluindo a intranet.', '5');
INSERT INTO question (Question, Section) VALUES ('Estabelecemos maneiras para as pessoas documentarem e compartilharem informações.', '5');
INSERT INTO question (Question, Section) VALUES ('Há distinção entre informação que deveria ser controlada centralmente e aquela em que todos deveriam ser livres para documentar e compartilhar.', '5');


-- insere as questões da seção 2

INSERT INTO question (Question, Section) VALUES ('Os relacionamentos hierárquicos não interferem com a busca de informação que as pessoas necessitam.', '6');
INSERT INTO question (Question, Section) VALUES ('O escritório de trabalho não é utilizado como um símbolo de status ou superioridade na nossa organização.', '6');
INSERT INTO question (Question, Section) VALUES ('As pessoas poderiam dizer que as mudanças no espaço de trabalho são baseadas tanto na necessidade de trabalhar em conjunto quanto na de cortar custos.', '6');
INSERT INTO question (Question, Section) VALUES ('Todos podem descrever como as suas decisões podem afetar o desempenho organizacional geral.', '6');
INSERT INTO question (Question, Section) VALUES ('Todos falam se têm uma opinião ou uma ideia pra oferecer.', '6');
INSERT INTO question (Question, Section) VALUES ('Como parte do nosso processo de resolução de problemas, consideramos com seriedade o que outros poderiam chamar de ideias malucas ou estranhas.', '6');
INSERT INTO question (Question, Section) VALUES ('Vemos a colaboração com os concorrentes, para fortalecer o setor, como uma atitude boa a ser tomada.', '6');
INSERT INTO question (Question, Section) VALUES ('Levamos todas as ideias promissoras em consideração, não importa de quem elas venham.', '6');
INSERT INTO question (Question, Section) VALUES ('Fazemos questão de não estruturar algumas de nossas reuniões porque isso ajuda-nos a pensar mais criativamente sobre a resolução de problemas.', '6');
INSERT INTO question (Question, Section) VALUES ('Envolver os nossos clientes no processo de criar e desenvolver produtos e serviços novos é uma prática bem estabelecida na nossa organização.', '6');
INSERT INTO question (Question, Section) VALUES ('O nosso espaço de trabalho propicia a flexibilidade de levar a nossa atividade aonde precisemos com pouco esforço.', '6');
INSERT INTO question (Question, Section) VALUES ('Qualquer um que tenha uma boa idéia pode conseguir apoio para prosseguir nela.', '6');
INSERT INTO question (Question, Section) VALUES ('As pessoas descreveriam nossa organização como flexível, ao invés de rígida.', '6');
INSERT INTO question (Question, Section) VALUES ('Temos o nível correto de protocolos de segurança para informação confidencial.', '6');
INSERT INTO question (Question, Section) VALUES ('Todos na nossa organização podem explicar o básico sobre as nossas finanças.', '6');
INSERT INTO question (Question, Section) VALUES ('Com freqüência, fazemos parcerias com os fornecedores para favorecer o cliente.', '6');
INSERT INTO question (Question, Section) VALUES ('O nosso espaço de trabalho é planejado para promover o fluxo de idéias entre os grupos de trabalho.', '6');
INSERT INTO question (Question, Section) VALUES ('Na nossa organização as pessoas podem utilizar a informação que obtém para melhorar o seu trabalho.', '6');
INSERT INTO question (Question, Section) VALUES ('Ajustamos o nosso relacionamento hierárquico com base no trabalho que as pessoas necessitam fazer.', '6');
INSERT INTO question (Question, Section) VALUES ('Utilizamos abordagens que as pessoas chamariam de lúcidas, como parte do nosso processo de resolução de problemas.', '6');
INSERT INTO question (Question, Section) VALUES ('Antes que as pessoas tratem dos problemas, elas consideram o contexto geral no qual o problema ocorreu.', '7');
INSERT INTO question (Question, Section) VALUES ('Construímos modelos, para os nossos sistemas de tomada de decisões, para entender melhor por que os fatos acontecem daquela maneira.', '7');
INSERT INTO question (Question, Section) VALUES ('As equipes engajam-se em experiências de aprendizagem fora do local de trabalho para encontrarem maneiras melhores de trabalharem juntas.', '7');
INSERT INTO question (Question, Section) VALUES ('Utilizamos jogos e simulações relacionados com o trabalho para pensar mais claramente sobre as nossas situações de negócios.', '7');
INSERT INTO question (Question, Section) VALUES ('Refletir sobre as lições aprendidas com as experiências de trabalho é uma prática estabelecida na nossa organização.', '7');
INSERT INTO question (Question, Section) VALUES ('As pessoas aplicam o que aprenderam fora da organização ao seu trabalho.', '7');
INSERT INTO question (Question, Section) VALUES ('Geralmente, quando as pessoas terminam projetos, elas tomam o tempo necessário para reunir-se com a sua equipe e analisar o que deu errado e o que poderia ter sido melhor.', '7');
INSERT INTO question (Question, Section) VALUES ('O nosso processo de planejamento inclui olhar para uma série de cenários, de modo que possamos pensar em como responder em situações diferentes.', '7');
INSERT INTO question (Question, Section) VALUES ('Com freqüência, o nosso processo de aprendizagem inclui obter o retorno dos clientes.', '7');
INSERT INTO question (Question, Section) VALUES ('Quando ocorre uma falha, a nossa primeira resposta é não determinar a culpa.', '7');
INSERT INTO question (Question, Section) VALUES ('Na nossa organização, as pessoas exibem uma curiosidade natural.', '7');
INSERT INTO question (Question, Section) VALUES ('As pessoas admitem quando falham.', '7');
INSERT INTO question (Question, Section) VALUES ('As pessoas aplicam as idéias que desenvolveram em trabalhos anteriores às situações novas.', '7');
INSERT INTO question (Question, Section) VALUES ('Quando temos um grande sucesso, conversamos sobre o que fizemos certo.', '7');
INSERT INTO question (Question, Section) VALUES ('Na nossa organização, o fracasso é considerado uma oportunidade para aprender.', '7');
INSERT INTO question (Question, Section) VALUES ('A nossa organização apóia atividades de grupo que promovem a aprendizagem mútua.', '7');
INSERT INTO question (Question, Section) VALUES ('Em uma ocasião ou em outra, todos na nossa organização \\\"põem as mãos na massa\\\" para ter a experiência em primeira mão das conseqüências das suas decisões.', '7');
INSERT INTO question (Question, Section) VALUES ('Aprender com as falhas está incorporado a como conduzimos o trabalho subsequente.', '7');
INSERT INTO question (Question, Section) VALUES ('Tentamos assegurar que as pessoas tenham algumas responsabilidades em comum, de modo que seja mais fácil aprender uns com os outros.', '7');
INSERT INTO question (Question, Section) VALUES ('Tratamos as discordâncias como oportunidades para aprender com os outros.', '7');
INSERT INTO question (Question, Section) VALUES ('As funções de dedicação exclusiva, como gerente de conhecimento ou coordenador de conhecimento, sustentarão o processo de compartilhamento do conhecimento.', '8');
INSERT INTO question (Question, Section) VALUES ('A organização determinou onde o compartilhamento de conhecimento entre grupos produzirá os maiores benefícios mútuos.', '8');
INSERT INTO question (Question, Section) VALUES ('Reconhecemos a contribuição individual para nossa organização, vinculando-a ao nome do autor original.', '8');
INSERT INTO question (Question, Section) VALUES ('As interações físicas são utilizadas para reforçar as comunicações eletrônicas.', '8');
INSERT INTO question (Question, Section) VALUES ('As pessoas diriam que compartilhar conhecimento não diminui o valor do indivíduo para a organização.', '8');
INSERT INTO question (Question, Section) VALUES ('As pessoas são membros de múltiplas comunidades, tornando mais fácil transferir conhecimento para a organização .', '8');
INSERT INTO question (Question, Section) VALUES ('As pessoas que se recusam a compartilhar conhecimento não obtêm certos benefícios organizacionais.', '8');
INSERT INTO question (Question, Section) VALUES ('Nós ligamos as pessoas por meio de unidades organizacionais e grupos funcionais tradicionais para promover o compartilhamento de conhecimento.', '8');
INSERT INTO question (Question, Section) VALUES ('Os profissionais moderadores e os facilitadores ajudam as pessoas a expressarem melhor o que elas sabem, de modo que os outros as possam entender.', '8');
INSERT INTO question (Question, Section) VALUES ('Os espaços eletrônico e físico onde armazenamos o nosso conhecimento têm uma estrutura que ajuda as pessoas a direcionar as suas contribuições.', '8');
INSERT INTO question (Question, Section) VALUES ('As pessoas têm voz ativa no que acontece com as ideias e expertises que compartilham com as outras.', '8');
INSERT INTO question (Question, Section) VALUES ('O comportamento de compartilhamento do conhecimento é incorporado ao sistema de avaliação de desempenho.', '8');
INSERT INTO question (Question, Section) VALUES ('As interações físicas são utilizadas para transferir o conhecimento “implícito” difícil de articular.', '8');
INSERT INTO question (Question, Section) VALUES ('A nossa organização procura maneiras de remover as barreiras impostas ao compartilhamento de conhecimento.', '8');
INSERT INTO question (Question, Section) VALUES ('Os processos para contribuir com conhecimento para a organização são normalmente integrados nas atividades de trabalho.', '8');
INSERT INTO question (Question, Section) VALUES ('As pessoas podem identificar as outras, na organização, que poderiam se beneficiar do seu conhecimento.', '8');
INSERT INTO question (Question, Section) VALUES ('O compartilhamento de conhecimento é reconhecido publicamente.', '8');
INSERT INTO question (Question, Section) VALUES ('A organização legitimou o compartilhamento de conhecimento, dando tempo às pessoas para que o façam.', '8');
INSERT INTO question (Question, Section) VALUES ('As pessoas focalizam as suas atividades de compartilhamento de conhecimento nas informações importantes para a missão.', '8');
INSERT INTO question (Question, Section) VALUES ('As pessoas trabalham sob o pressuposto de que, quando utilizam o conhecimento com que outros contribuíram na organização, são obrigadas a contribuir com o seu próprio conhecimento em algum ponto.', '8');
INSERT INTO question (Question, Section) VALUES ('Reconhecemos que o conhecimento é parte da base de recursos da qual a nossa organização gera valor.', '9');
INSERT INTO question (Question, Section) VALUES ('Frequentemente, os membros da equipe de gerência sênior conversam sobre a gestão do conhecimento, quando fazem relatos sobre a situação da organização.', '9');
INSERT INTO question (Question, Section) VALUES ('O processo de mensuração do conhecimento ajuda-nos a entender melhor o que é que estamos tentando gerir.', '9');
INSERT INTO question (Question, Section) VALUES ('Nós medimos o nosso processo de gestão do conhecimento e os seus resultados.', '9');
INSERT INTO question (Question, Section) VALUES ('Publicamos um documento de circulação externa que relata a qualidade com que gerimos o conhecimento.', '9');
INSERT INTO question (Question, Section) VALUES ('Podemos vincular atividades de gestão do conhecimento a resultados mensuráveis.', '9');
INSERT INTO question (Question, Section) VALUES ('As pessoas conhecem que medida é utilizada para monitorar o processo de gestão do conhecimento e os seus resultados.', '9');
INSERT INTO question (Question, Section) VALUES ('Conversamos sobre medir o conhecimento de maneira que as pessoas possam entender prontamente.', '9');
INSERT INTO question (Question, Section) VALUES ('Desenvolvemos um esquema que vincula as atividades de gestão do conhecimento aos resultados estratégicos.', '9');
INSERT INTO question (Question, Section) VALUES ('Dispomos de uma carta esquemática que descreve como as diferentes formas de conhecimento da nossa organização interagem umas com as outras para criar valor.', '9');
INSERT INTO question (Question, Section) VALUES ('Fazemos experiências com maneiras diferentes de medir a qualidade com que gerimos o conhecimento.', '9');
INSERT INTO question (Question, Section) VALUES ('Publicamos um documento interno que relata a qualidade com que fazemos a gestão do conhecimento.', '9');
INSERT INTO question (Question, Section) VALUES ('Para tomar decisões de gestão do conhecimento, baseamo-nos em uma mescla de fatos sólidos, números e informações não-mensuráveis.', '9');
INSERT INTO question (Question, Section) VALUES ('A gerência sênior avalia qual conhecimento necessita ser desenvolvido quando ela aloca recursos.', '9');
INSERT INTO question (Question, Section) VALUES ('A avaliação do capital intelectual é parte do processo de mensuração do desempenho organizacional geral.', '9');
INSERT INTO question (Question, Section) VALUES ('Há algum tempo temos praticado a gestão do conhecimento sem dar esse nome a ela.', '9');
INSERT INTO question (Question, Section) VALUES ('Baseamo-nos numa equipe cujos membros têm expertises em avaliação, mensuração e operação para avaliar o nosso processo de gestão do conhecimento e seus resultados.', '9');
INSERT INTO question (Question, Section) VALUES ('Mapeamos o fluxo do processo das atividades de gestão do conhecimento.', '9');
INSERT INTO question (Question, Section) VALUES ('As pessoas podem explicar a diferença entre a avaliação e a mensuração de desempenho.', '9');
INSERT INTO question (Question, Section) VALUES ('Utilizamos tanto medidas qualitativas quanto quantitativas para dimensionar a efetividade do nosso processo de gestão do conhecimento e seus resultados.', '9');
INSERT INTO question (Question, Section) VALUES ('Rotineiramente, perguntamo-nos como podemos alavancar o nosso conhecimento para outras áreas.', '10');
INSERT INTO question (Question, Section) VALUES ('Não importa qual grupo propôs uma idéia ou tecnologia, qualquer um na empresa pode utilizá-la.', '10');
INSERT INTO question (Question, Section) VALUES ('Acreditamos que a gestão do conhecimento é um assunto de todos.', '10');
INSERT INTO question (Question, Section) VALUES ('Encorajamos as pessoas a pensarem sobre como as suas atividades não relacionadas com o trabalho poderiam beneficiar a organização.', '10');
INSERT INTO question (Question, Section) VALUES ('Os nossos sistemas de TI conectam-nos com as fontes de informação de que necessitamos para fazer o nosso trabalho.', '10');
INSERT INTO question (Question, Section) VALUES ('Os nossos valores formais e informais estão alinhados.', '10');
INSERT INTO question (Question, Section) VALUES ('Os nossos sistemas de TI promovem a formação de diferentes redes de pessoas.', '10');
INSERT INTO question (Question, Section) VALUES ('Os nossos executivos superiores pedem a todos os gerentes para incluírem a gestão do conhecimento nos seus planos de negócios.', '10');
INSERT INTO question (Question, Section) VALUES ('O nosso processo de desenvolvimento de produtos inclui os nossos clientes explicitamente.', '10');
INSERT INTO question (Question, Section) VALUES ('A nossa organização trata as pessoas como fontes de valor ao invés de custos.', '10');
INSERT INTO question (Question, Section) VALUES ('Lançamos um grupo ou indicamos uma pessoa para liderar o nosso esforço de gestão do conhecimento.', '10');
INSERT INTO question (Question, Section) VALUES ('Geralmente, as pessoas confiam na informação que encontram nos nossos sistemas de TI.', '10');
INSERT INTO question (Question, Section) VALUES ('Cada vez mais, estamos nos aliando a outras organizações, em redes estratégicas ou parcerias, para levar produtos inovadores para o mercado.', '10');
INSERT INTO question (Question, Section) VALUES ('Vemos a tecnologia de informação como um instrumento para ajudar-nos a fazer o nosso trabalho.', '10');
INSERT INTO question (Question, Section) VALUES ('Tivemos idéias vitoriosas de produtos novos que vieram dos interesses não-funcionais dos empregados.', '10');
INSERT INTO question (Question, Section) VALUES ('Os nossos produtos (ou serviços) rendem um valor muito mais alto como resultado do conhecimento que eles contêm.', '10');
INSERT INTO question (Question, Section) VALUES ('Empenhamo-nos em manter as pessoas que possuem capacidades indispensáveis para a missão.', '10');
INSERT INTO question (Question, Section) VALUES ('Temos uma política formal que assegura que compartilhemos a tecnologia e as idéias entre as unidades e além das fronteiras dos grupos.', '10');
INSERT INTO question (Question, Section) VALUES ('As pessoas sabem quando não é apropriado compartilhar o conhecimento externamente.', '10');
INSERT INTO question (Question, Section) VALUES ('Vemos os nossos produtos e serviços como tendo tanto uma dimensão tangível como intangível (ou baseada no conhecimento).', '10');
INSERT INTO question (Question, Section) VALUES ('A nossa decisão de adquirir conhecimento é baseada em quanto podemos alavancá-lo.', '11');
INSERT INTO question (Question, Section) VALUES ('Quando surge uma nova oportunidade, tentamos re-instrumentar as nossas habilidades existentes antes de empregarmos um novo grupo de pessoas.', '11');
INSERT INTO question (Question, Section) VALUES ('Tomamos decisões de despojamento de conhecimento baseadas na importância estratégica do capital intelectual e nas projeções financeiras.', '11');
INSERT INTO question (Question, Section) VALUES ('Tentamos entender o impacto dos relacionamentos na produtividade antes de automatizarmos as tarefas e substituirmos o contato pessoa-a-pessoa pelo contato pessoa-computador.', '11');
INSERT INTO question (Question, Section) VALUES ('Antes de aceitarmos projetos ou pedidos novos, pensamos se o conhecimento que construímos para a nossa organização pode ser usado de outras maneiras.', '11');
INSERT INTO question (Question, Section) VALUES ('Participamos de grupos de pesquisa sobre o nosso ramo de negócios para ajudar-nos a decidir se necessitamos adquirir conhecimento novo.', '11');
INSERT INTO question (Question, Section) VALUES ('Quando os grupos encontram maneiras de trabalhar com menos pessoas, eles imaginam como perseguir atividades de valor mais alto em vez de demitir pessoas.', '11');
INSERT INTO question (Question, Section) VALUES ('Podemos recusar trabalhar para um cliente se tal trabalho não constrói conhecimento que podemos utilizar de outras maneiras.', '11');
INSERT INTO question (Question, Section) VALUES ('Despojamos o conhecimento de uma maneira planejada, deliberada.', '11');
INSERT INTO question (Question, Section) VALUES ('Quando descartamos negócios ou grupos de pessoas, tratamos as pessoas afetadas com dignidade e respeito.', '11');
INSERT INTO question (Question, Section) VALUES ('Regularmente, revemos as nossas práticas de promoção para nos certificarmos de que não estamos perdendo pessoas com conhecimento estrategicamente importante.', '11');
INSERT INTO question (Question, Section) VALUES ('Colocamos o nosso pessoal como aprendizes em outras organizações para determinar se necessitamos adquirir novos conhecimentos ou expertises.', '11');
INSERT INTO question (Question, Section) VALUES ('Formamos alianças com organizações que complementam os nossos conjuntos de habilidades como uma alternativa de fazer tudo por nós mesmos.', '11');
INSERT INTO question (Question, Section) VALUES ('Quando nos despojamos de ativos tangíveis, estamos conscientes dos componentes de conhecimento que eles contêm.', '11');
INSERT INTO question (Question, Section) VALUES ('Terceirizamos habilidades e expertises que não sustentam as nossas competências essenciais.', '11');
INSERT INTO question (Question, Section) VALUES ('Rotineiramente, examinamos se estamos sustentando o nosso conhecimento estratégico à custa do conhecimento estrategicamente importante.', '11');
INSERT INTO question (Question, Section) VALUES ('Antes de demitir pessoas, tentamos determinar se suas habilidades e expertises podem ser utilizadas em outro lugar.', '11');
INSERT INTO question (Question, Section) VALUES ('Preferimos utilizar os recursos e as habilidades que temos localmente, quando testamos uma idéia de negócios nova.', '11');
INSERT INTO question (Question, Section) VALUES ('Fazemos uso de relacionamentos informais com negócios relacionados à nossa área, para manter nossa base de conhecimento atualizada.', '11');
INSERT INTO question (Question, Section) VALUES ('A nossa organização leva em conta o impacto que tem sobre a lealdade, a contribuição e o compromisso, o fato de deixar as pessoas irem embora.', '11');

-- insert group  of answer

INSERT INTO groupofanswer (name) VALUES ('weak, moderate, strong');

INSERT INTO answer (Answer, group_of_answer) VALUES ('Fraco', '5');
INSERT INTO answer (Answer, group_of_answer) VALUES ('Moderado', '5');
INSERT INTO answer (Answer, group_of_answer) VALUES ('Forte', '5');


-- insert answers group

INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('48', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('49', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('50', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('51', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('52', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('53', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('54', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('55', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('56', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('57', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('58', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('59', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('60', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('61', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('62', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('63', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('64', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('65', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('66', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('67', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('68', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('69', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('70', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('71', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('72', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('73', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('74', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('75', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('76', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('77', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('78', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('79', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('80', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('81', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('82', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('83', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('84', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('85', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('86', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('87', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('88', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('89', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('90', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('91', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('92', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('93', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('94', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('95', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('96', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('97', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('98', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('99', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('100', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('101', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('102', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('103', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('104', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('105', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('106', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('107', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('108', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('109', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('110', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('111', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('112', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('113', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('114', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('115', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('116', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('117', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('118', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('119', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('120', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('121', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('122', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('123', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('124', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('125', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('126', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('127', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('128', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('129', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('130', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('131', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('132', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('133', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('134', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('135', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('136', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('137', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('138', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('139', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('140', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('141', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('142', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('143', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('144', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('145', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('146', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('147', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('148', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('149', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('150', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('151', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('152', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('153', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('154', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('155', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('156', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('157', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('158', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('159', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('160', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('161', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('162', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('163', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('164', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('165', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('166', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('167', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('168', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('169', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('170', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('171', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('172', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('173', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('174', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('175', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('176', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('177', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('178', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('179', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('180', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('181', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('182', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('183', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('184', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('185', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('186', '5');
INSERT INTO question_has_groupofanswer (question, group_of_answer) VALUES ('187', '5');

-- insert new diagnostic

INSERT INTO diagnostic (idquestionnaire, name, Description) 
VALUES (1,'Diagnostic for software industries', 
	'Validating knowledge creation indicators for the software industry: a field research through a structured questionnaire');


-- insert sections
INSERT INTO section (id_section, number,name, diagnostic) VALUES (1, 1,'Online community of practice (CoP) or knowledge sharing forum', '1');
INSERT INTO section (id_section, number,name, diagnostic) VALUES (2, 1,'Knowledge product (KP)', '1');
INSERT INTO section (id_section, number,name, diagnostic) VALUES (3, 1,'Organizational development of the KM capacity', '1');
INSERT INTO section (id_section, number,name, diagnostic) VALUES (4, 1,'Participants’ perspectives about the research', '1');

-- insert first section questions

INSERT INTO question (id_question, Question, Section) VALUES (1,'Number of members of CoP', '1');
INSERT INTO question (id_question, Question, Section) VALUES (2,'Number of contributions by type of content ', '1');
INSERT INTO question (id_question, Question, Section) VALUES (3,'Number of views of different types of contents ', '1');
INSERT INTO question (id_question, Question, Section) VALUES (4,'Distribution of members" participation (comment, don"t comment and listeners)', '1');
INSERT INTO question (id_question, Question, Section) VALUES (5,'Number of answers by discussion ', '1');
INSERT INTO question (id_question, Question, Section) VALUES (6,'Number of days before the first answer on a discussion', '1');
INSERT INTO question (id_question, Question, Section) VALUES (7,'Number of members who engage discussions ', '1');
INSERT INTO question (id_question, Question, Section) VALUES (8,'Number of contributions from moderators ', '1');
INSERT INTO question (id_question, Question, Section) VALUES (9,'Number of (mutual) connections of access, exit, moderators and members of the CoP in the corporate social', '1');
INSERT INTO question (id_question, Question, Section) VALUES (10,'Number of discussions which broke down into other topics ', '1');
INSERT INTO question (id_question, Question, Section) VALUES (11,'Presence of target public who participated in the CoP setting procedures ', '1');
INSERT INTO question (id_question, Question, Section) VALUES (12,'Non-participation of the target public due to discontinuation or lack of setting of the CoP ', '1');
INSERT INTO question (id_question, Question, Section) VALUES (13,'Number of chats which had resulted in the portal ', '1');
INSERT INTO question (id_question, Question, Section) VALUES (14,'If a person has talked to someone who they had never talked before and who they probably would not have', '1');
INSERT INTO question (id_question, Question, Section) VALUES (15,'Someone who has already worked out of the CoP with someone who met on the CoP ', '1');
INSERT INTO question (id_question, Question, Section) VALUES (16,'The person can give an example of what the community allows you to do ', '1');


-- insert second section questions

INSERT INTO question (id_question, Question, Section) VALUES (17,'Number of KP created', '2');
INSERT INTO question (id_question, Question, Section) VALUES (18,'Percentage of users who classify KP as good, excellent, or useful', '2');
INSERT INTO question (id_question, Question, Section) VALUES (19,'Number of KP mentions', '2');
INSERT INTO question (id_question, Question, Section) VALUES (20,'Number of KP downloads', '2');
INSERT INTO question (id_question, Question, Section) VALUES (21,'Number of people who read a KP', '2');
INSERT INTO question (id_question, Question, Section) VALUES (22,'Percentage of readers who accessed a particular KP', '2');
INSERT INTO question (id_question, Question, Section) VALUES (23,'Number of people who acquire knowledge about their work and/or product policy through reading ', '2');
INSERT INTO question (id_question, Question, Section) VALUES (24,'Number of channels where a KP is available', '2');
INSERT INTO question (id_question, Question, Section) VALUES (25,'If there was knowledge acquired through discussions about the product ', '2');
INSERT INTO question (id_question, Question, Section) VALUES (26,'Number of KP reccommendations', '2');
INSERT INTO question (id_question, Question, Section) VALUES (27,'Useful for the knowledge product noticed by the target public', '2');
INSERT INTO question (id_question, Question, Section) VALUES (28,'Number of examples where work has been mentioned', '2');

-- insert third section questions

INSERT INTO question (id_question, Question, Section) VALUES (29,'Percentage of people who feel encouraged to share knowledge with their co-workers ', '3');
INSERT INTO question (id_question, Question, Section) VALUES (30,'Percentage of people who believe they have time to transmit and receive knowledge \"from\" or \"to\" other', '3');
INSERT INTO question (id_question, Question, Section) VALUES (31,'Percentage of people who share knowledge with a co-worker from outside their team at least once a week ', '3');
INSERT INTO question (id_question, Question, Section) VALUES (32,'Percentage of people who believe knowledge is an essential organizational resource', '3');
INSERT INTO question (id_question, Question, Section) VALUES (33,'Percentage of people who agree they are encouraged, by the organization, to seek knowledge from coworkers', '3');
INSERT INTO question (id_question, Question, Section) VALUES (34,'Percentage of people who agree that if the need comes up for a specific piece of knowledge, the', '3');
INSERT INTO question (id_question, Question, Section) VALUES (35,'Percentage of people who agree that they know exactly \"who\" in the organization has the specific', '3');
INSERT INTO question (id_question, Question, Section) VALUES (36,'Percentage of people who agree that they can find the knowledge they need quickly and easily ', '3');
INSERT INTO question (id_question, Question, Section) VALUES (37,'Percentage of people who agree that organizational knowledge is useful and meets their needs when', '3');
INSERT INTO question (id_question, Question, Section) VALUES (38,' Percentage of people who agree that organization"s CoP improve and facilitate knowledge sharing', '3');
INSERT INTO question (id_question, Question, Section) VALUES (39,'Percentage of people who agree that it is not so easy to share knowledge with co-workers from other teams', '3');
INSERT INTO question (id_question, Question, Section) VALUES (40,'Percentage of people who are confident that all their knowledge created with potential value for future', '3');
INSERT INTO question (id_question, Question, Section) VALUES (41,'Structures for teamwork and project which encourage people to present experiences and insights from', '3');
INSERT INTO question (id_question, Question, Section) VALUES (42,'Encourage people from many perspectives and different points of view to emerge in the company', '3');

-- insert forth section questions

INSERT INTO question (id_question, Question, Section) VALUES (43,'This set of indicators will help me with decision-making on my daily life?', '4');
INSERT INTO question (id_question, Question, Section) VALUES (44,'Do you think that KM is important to your organization?', '4');
INSERT INTO question (id_question, Question, Section) VALUES (45,'Do you think that KM is important to the project you are involved with?', '4');
INSERT INTO question (id_question, Question, Section) VALUES (46,'What is your understanding level regarding KM?', '4');
INSERT INTO question (id_question, Question, Section) VALUES (47,'Do you have any suggestion about those indicators? (e.g. add/replace/take out an indicator; comments; etc.)', '4');


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



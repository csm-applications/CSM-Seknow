# :sparkles: Getting Started

In this quick tutorial, we summarize how to configure all the environment and run the back-end application. For this, there are few requirements that are mandatory:
1. Make sure that you have Java installed and configured in your operating system [[quick tutorial (in portuguese)](https://www.computersciencemaster.com.br/configurando-o-ambiente-java/)]
2. Install and configure your favorite programming IDE (netbeans, eclipse, intelliJ, VScode)
3. Install and configure an instance of postgres database [[Click to install postgres](https://www.postgresql.org/download/)]

Despite the existence of several environment configuration variables, this tutorial will focus on providing an overview about how to run this application. For this, I'm currently using: 

- Java 1.8
- Netbeans 11 / Eclipse JEE
- Postgres (pgadmin4 and database version 10).

Okay, Lets get started.

## Step 01 - downloading the project

The first step to run this project is accessing the [repository home page](https://github.com/csm-applications/CSM-Seknow) and download this project. For this, there are two different ways: 

1- Fork the project to your Github; 
2- Click on the button "code" and next on "Download zip".

To contribute with this project use "fork". Otherwise, just download the zip and move on.

## Step 02 - Import your project into your programming IDE

Seknow back-end was created using maven i.e., a dependency manager that support developers to easily deal with libraries [to know more... click here](https://maven.apache.org/). This means that you will need to import a maven-based project...

Netbeans IDE             |  Eclipse
:-------------------------:|:-------------------------:
<img src="https://user-images.githubusercontent.com/13739735/172901577-ee393b48-bf10-4245-99a3-4f2c648fabdf.png" width="200"/>|<img src="https://user-images.githubusercontent.com/13739735/172902471-c0722687-af2f-4ac0-8f9e-8554c98b436c.png" width="200"/>

Locate in your file system the project folder:

<img src="https://user-images.githubusercontent.com/13739735/172905362-753134f4-6cf4-4645-a1f1-4d2eb03b69b2.JPG" width=700/>

The expected result is the following structure:

Netbeans IDE             |  Eclipse
:-------------------------:|:-------------------------:
<img src="https://user-images.githubusercontent.com/13739735/172906056-fb2baf3a-49bf-488d-8c05-803451b059e6.png" width="200"/>|<img src="" width="200"/>

## Step 03 - Checking the database connection

Before undertaking into database configuration, you will need to create an empty database in postgres using a simple command like: "CREATE DATABASE <database name>". For now, you don't need to create tables or insert data (because JPA will do it). 

Seknow is a Springboot application, it means that it benefits from the whole Spring framework ecosystem to deliver the back-end. If you don't know Spring or springboot, take a moment to check out how this framework works.
> Some useful references
>- [Official website](https://spring.io/projects/spring-boot)
>- [Spring Initializer (to start new projects)](https://start.spring.io/)
>- [What is spring? (in portuguese)](https://www.youtube.com/watch?v=5XPojnx9bb8)
  
In source/main/resources/application.properties you will find a configuration file for database:

```text
`# = DATABASE
## Spring DATASOURCE (DataSourceAutoConfiguration & DataSourceProperties)
spring.datasource.url=jdbc:postgresql://localhost:5432/SeknowSE
spring.datasource.username= postgres
spring.datasource.password=12345
# The SQL dialect makes Hibernate generate better SQL for the chosen database
spring.jpa.properties.hibernate.dialect = org.hibernate.dialect.PostgreSQLDialect
# Hibernate ddl auto (create, create-drop, validate, update)
spring.jpa.hibernate.ddl-auto = update
spring.jpa.properties.hibernate.temp.use_jdbc_metadata_defaults = false
# default port
server.port=8000
server.servlet.context-path=/api
```
  
Make sure that your username and password are correct and save the file.

## Step 04 - Running the application
  
To run Seknow, you will need to run "GcEvalApplication.java" class which contains a main method that start the server. It is important to notice that all dependencies must be satisfied, hence, building the project will download all libraries automatically and after that the project will start. After running the project, take a look on database and check whether the following tables were created:
  
<img src="https://user-images.githubusercontent.com/13739735/172916560-f2d8e67e-85ce-4121-b33b-92cf16df196c.png" width=200/>

  
## Step 05 - Populating the database for development
  
Seknow is almost ready to go... at this point, you already created the tables and services are running. However, you need to populate the database with basic informations like user type (e.g., support, database admin, programmer, designer), roles, user groups, permissions, dummy users, etc. 
  
> To facilitate this process the scripts are available [here](https://github.com/csm-applications/CSM-Seknow/tree/master/Database).
  
- Run ambient setup.sql // to insert basic data
- Insert Diagnostic 01  // to insert a questionnaire
- Insert Diagnostic 02  // to insert Bukowitz and Williams a questionnaire
- Insert responses questionnaire 01 // to insert examples of answers
- Insert responses questionnaire 02 // to insert another set of examples
  
Finally you can test your application by calling in navigator the endpoint:

  > http://localhost:8000/api/users/
  
The expected results is a json:
  
<img src="https://user-images.githubusercontent.com/13739735/172921449-5d41a2e5-78ec-4467-8456-486fb852f4a8.png" width=700/>
  
# Conclusion

Your application is now ready to receive requests from the front-end application.




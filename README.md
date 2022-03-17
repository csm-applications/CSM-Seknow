# CSM-Seknow
This project was published in the Brazilian Software Conference in the Tools section (CBSOFT). Its purpose is to perform the reuse diagnosis of the knowledge items of an organization.

## Brief Overview

Knowledge Management (KM) is responsible for using the intellectual resources of an organization. KM principles are determining and effective factors for the software product quality. Several KM process have been proposed in the literature. However, for a KM initiative to be successful, it is important to consider the current state of KM activities in a company. In this context, the objective of this work is to measure KM activities in software engineering companies through a tool that automates the process of KM diagnosis. This paper presents the Software Engineering KNOWledge management diagnosis (SEKNOW) tool, the main functionalities, the potential users profile and examples of use. In addition, we show how the architecture was implemented in order to make the tool extensible to multiple diagnostics and how the companies can use the tool to fetch data to their systems. Finally, we present similar tools and compare their functionalities.

## Demo

For more details and a demo of this running project access this video: 

[Watch the demo vídeo](https://www.youtube.com/watch?v=yh_Ypdkq3pw)


## Roadmap

This tool was built using the following technologies:
Server:
* Java 1.8 (web)
* Maven
* Springboot

Client:

* PHP 7.1
* Apache server
* Bootstrap

### Step 01: Setting up the database 

In this project, we created a database pre-population file and a SQL database creation schema. This Schema can be used and managed by JPA later. These files are in the "database" folder. Create a new schema in your postgres database with the name "seknow". Next, run the script to create the database and pre-populate (if you want the database to be populated with diagnostics and user data).

### Step 02: Running the server

You can use any IDE you prefer to edit projects. I recommend using Eclipse or Netbeans because of their easy integration. To run the server on your machine it is only necessary to run the GcEvalApplication.java class as a Java file.

### Step 03: running the client

The client is just one example of an application that consumes REST services. This service is consumed by PHP and is very simple to initialize. Just put the folder inside the apache server and boot the server.

If you do not have the apache server installed, one option is to use XAMPP: https://www.apachefriends.org/download.html

### Step 04: Enjoy

This project is OpenSource and still needs several contributions to make it a smart way to diagnose knowledge management. If you have identified issues that can be improved, leave them in the Issues section.



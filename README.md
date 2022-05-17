# univertuel

# Requirements

* amp:
To use univertuel, you need to run :  
     * a web server as Apache2 or anyone else. 
     * php version 7.4 minimum  
     * a database server as PostgreSQL, mysql, etc... In my case, i use mysql server version 8.0.28   

* Symfony
Univertuel is written with Symfony on version 5.1


# Configuration

Before using it, you need to configure .env file located univertuel/.env (don't forget to modify settings on your file manager to display hidden files).
Customize your database authentication : DATABASE_URL="mysql://user_name:user_password@127.0.0.1:3306/database_name?serverVersion=5.7" with your own config.

# univertuel architecture

* config: 
The most importants files are packages/security.yml and routes.yml 
	* routes.yml : all routes are listed here
	* security.yml : define all methods to identify a user and manage security points
	
* migrations:
Those files describe database project's structure to ensure ORM Doctrine services.

* public:
You will find there all css, images, and so on contents for the platform, and for personal user contents.

* src : 
	* Controller: Game : a folder for game managment, a subfolder for game class data, a subfolder for figure (caracter) class data and one for Campaign for Campaigns managment 
		* Platform : common methods and messages module used in the platform
		* User : user registration and authentication 
	* Entity : 
		* Campaign : Entity to store Campaign data 
		* Game : a folder by game, a subfolder for game class data, a subfolder for figure (caracter) class data 
		* Platform : message module used in the platform for private messages
		* User : user class 
	* Form : same strucute as entity, form class to create and update entities
	* Repository : same structure as entity to load ans store data 
	* Security : TokenAuthenticator class to encrypt user passwords, credentials, and many authenticate methods  

* templates:
All templates view :
	* Campaign
	* game
	* memberArea
	* platform
	* user
and basic templates.

* Users
Users are created as ROLE_MEMBER. If you want to use all services, you need to have at least a ROLE_ADMIN. In this case, create that user, and update in database
(in user table) the role.

#some explanations

First of all, you need to setup each game you wana to play by creating each game component (weapons, armors, magic spells...). Todo this, use the admin panel with an admin user.
Then, a member must create a campain. To create a caracter named figure in univertuel, another user must ask to join with the button ask to join in the campain created before, or the campaign owner musk send a join invitation to that member.
Check your personal messages, and follow the sended link to create figure. No figure can be created out of campaign, and a campaign il linked to a game.

What is a figure?
A figure is a caracter in Univertuel, each figure as a unique owner(user). In a game like Prophecy, folder game entities are game objects while figure are components of a sheet caracter. Each class store a sheet component. ProphecyFigureXXXXX realize the relation between a game component and the figure.
For exemple in Prophecy, we have most of skills. Class ProphecySkill design a model for a skill (name, max and min value, blablabla...), ProphecyFigureSkill realize the skill for a figure. It is an association of Tendency and Figure, with a value property.
 
What is a Campaign?
A campaign is a game mode owned by a member, and can contain one or many figures. Each campaign can be customized by the owner, and customize or not some rules for caracter creation, or experience evolution and/or component game (armors, weapons, skills, etc...).
The campaign owner must send an invitation to someone in order to authorize him to create a figure.
 

Why prefix Prophecy for entity class?
We use a single database, but, in the future many games. In order to distinct each table, we need to prefix class. An other solution would have to use ORM to rename the destination table, but this should have been some confusion.    
						




  
	
	
	
	
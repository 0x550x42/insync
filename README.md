# inSync - Contacts Exchange System

Contacts exchange system with a different approach. The purpose of creating this system was to do away with the hassle of exchanging contact numbers with people when you switch to a new number or start using a new number.

This system aims to keep your phonebook and your sim numbers synchronised with those you want and how you want. Then, If you know you are using say contact number ``` xyz ``` and you tell the application that this is the number I intend to use now.

The app will sync in up on to all people's devices which were connected wo you and the next time they wish to call you up. They will already have your number sitting in their phonebook under your contact name.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. See deployment for notes on how to deploy the project on a live system.

### Prerequisites

What things you need to install the software on windows and how to install them
* Apache web server with PHP 5.5 and MySQL
```
https://httpd.apache.org/
```
* A nice text editor like Notepad++
```
https://notepad-plus-plus.org/
```
* A web browser (Google Chrome preferred)

### Installation

* Clone this repo in your system
* Setup any local server which can serve ```php``` and ```mysql```
* Create a new schema on your database and generate new tables using the structures provided
* Move the cloned directory to ```www``` or similar location on your server and startup the server
* Head over the ```localhost``` on any browser
* You are done

## Built With

* [JavaScript](http://www.dropwizard.io/1.0.2/docs/) - The frontend
* [PHP](http://www.dropwizard.io/1.0.2/docs/) - The backend
* [Apache Server](https://maven.apache.org/) - Local server

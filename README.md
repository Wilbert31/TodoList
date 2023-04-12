# todoListApp

To-Do List App
This is a To-Do List app built using HTML, CSS, Material Design Bootstrap, JavaScript, PHP, and the MVC (Model-View-Controller) architecture with Object-Oriented Programming (OOP) principles.


Technologies Used

HTML
CSS
Material Design Bootstrap
JavaScript
PHP
MVC architecture with OOP principles


Installation

Clone this repository into your local machine
Import the todolist.sql file into your MySQL server
Edit the config.php file to match your MySQL server settings
Open the index.php file in your browser


Usage

Add tasks to your to-do list using the form
Delete tasks using the buttons on each task
Mark tasks as done by clicking the green checkbox on each task


MVC Architecture

The MVC architecture separates the application into three components: Model, View, and Controller. This makes the application easier to maintain and extend.

The Model represents the data and the business logic of the application.
The View represents the user interface.
The Controller handles the user input and updates the Model and View accordingly.
OOP Principles
The OOP principles used in this app are:

Encapsulation: The data and methods related to a task are encapsulated in a Task class.
Inheritance: The User class inherits from the Database class to perform database operations.
Polymorphism: The Task class implements the __toString() method to allow for easy display of a task object.

Credits
This app was created by Wilbert. It uses Material Design Bootstrap for the user interface.

License
This app is licensed under the MIT License. See the LICENSE file for details.
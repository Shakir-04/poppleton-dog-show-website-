# poppleton-dog-show-website-
Database-driven website for the Poppleton Dog Show showing total owners, dogs, and events, plus the top 10 dogs by average scores. Built with PHP, MySQL, HTML, and CSS, integrating the relational database using SQL queries for dynamic data display.

## Features

- Display total owners, dogs, and events.  
- Show top 10 dogs based on average scores across events.  
- Clickable owner names linking to a detailed contact page (`mailto:` email links).  
- Clean layout and styling with CSS for better user experience.  
- Dynamic data retrieval using SQL queries with PHP.

---

## Tech Stack

- **Frontend:** HTML, CSS  
- **Backend:** PHP  
- **Database:** MySQL  
- **Tools:** VS Code, XAMPP  

---

## Installation / Setup

1. Install [XAMPP](https://www.apachefriends.org/index.html) and start **Apache** and **MySQL**.  
2. Place the project files in the `htdocs` folder (e.g., `C:\xampp\htdocs\Poppleton-Dog-Show-Website`).  
3. Open [phpMyAdmin](http://localhost/phpmyadmin) and import `database.sql`.  
4. Update `db_connect.php` if necessary with your database credentials.  
5. Open `index.php` in a browser via `http://localhost/Poppleton-Dog-Show-Website/index.php`.
<img width="940" height="591" alt="image" src="https://github.com/user-attachments/assets/115dd23e-ea9b-4589-91d6-e7bf43ae4425" />

---
## Website Development (with PHP)

Using **VS Code** as my chosen IDE, I saved the project files in the correct directory (`C:\xampp\htdocs\Assignment 3`) and created three PHP files:

- `index.php`  
- `owner.php`  
- `db_connect.php`  

The `db_connect.php` file establishes a connection to the MySQL database using the `mysqli` extension. Once connected, SQL queries can be run to fetch data from the database.

On `index.php`, I displayed the total number of owners, dogs, and events in the show by executing queries to count:

- Distinct `owner_id` values  
- All dog entries  
- Event entries
<img width="859" height="190" alt="image" src="https://github.com/user-attachments/assets/610f483e-7d21-40e4-bf8b-7566968c72c1" />


I then wrote an SQL query to retrieve the **top 10 dogs** based on their average scores across multiple events. The data displayed for each dog includes:

- Dog's name  
- Dog's breed  
- Average score  
- Owner’s name and email
<img width="940" height="397" alt="image" src="https://github.com/user-attachments/assets/9216b168-fbfe-44c7-8da1-7bd1e3c82fa9" />


For added functionality, the owner’s name on the main page is a **clickable link** redirecting to `owner.php`, which displays detailed contact information (email and phone number). The email is displayed as a clickable `mailto:` link that opens the user’s default email app.

To make the website aesthetically pleasing, I then also went the extra effort to add CSS styling. The improvements it gave was:
•	Centered text for titles and important information.
•	A clean layout for the dog list and owner details.
•	Styling of the email links to make them stand out.
•	Basic page structure using margins and padding for clarity.

<img width="940" height="500" alt="image" src="https://github.com/user-attachments/assets/111eb588-1bb1-45f7-ab45-f0825b9007d3" />

## Key Learning Outcomes

- Building **dynamic, database-driven websites** with PHP and MySQL.  
- Writing SQL queries to retrieve and manipulate relational data.  
- Displaying **dynamic data in HTML** with clean CSS styling.  
- Practical experience integrating **backend and frontend** for web applications.



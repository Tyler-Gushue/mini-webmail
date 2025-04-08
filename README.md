# ExEmail

## Description

A simple email web application.  You can login, view sent emails, view received emails, and send emails.

## Steps to Set Up

1. Clone the project into your htdocs folder in XAMPP
2. In XAMPP start Apache and MySQL
3. then in your browswer go to localhost/path/to/login.php

## List of Features Implemented

1. The ability to log into the website
2. The ability to view sent emails
3. The ability to view received emails
4. The ability to log out
5. The ability to send an email

## APIs Used and Their URLs

1. emails.php
urls:
    - http://localhost/api/emails.php?action=sent
    - http://localhost/api/emails.php
    - http://localhost/api/emails.php?action=received

2. login.php    
urls:
    - http://localhost/api/login.php

3. logout.php
urls:
    - http://localhost/api/logout.php

## Any Additoinal Notes or Considerations

I used Bootstrap to create my foot 
    Link: https://bootstrap-cheatsheet.themeselection.com/

## Fold Structure Justification

I separate my folder structure into six folders: api, assets, db, includes, public, and templates.  When I looked back on the previous assignments, this looked like the most logical way to separate my files.  My api folder holds all api logic like login, logout, sending emails, getting all sent emails and getting all emails from the inbox.  My assets folder was used for style, so I have my CSS file there.  My db folder was used for holding basic db logic like connecting to the db, db_dump.sql and the ERD.  My includes file I had a dbFunctions file used for db commands like getting a password from an email, getting all sent emails, getting all received emails, and sending an email.  This file was included anywhere that needed db logic, so having it in the includes folder made the most sense.  In my public folder, I had all my web pages like inbox, sent emails, sending an email and login.  I had my footer and header in my templates folder, and I decided on this because the previous assignments were like this.
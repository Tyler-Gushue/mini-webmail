# Mini Email

A lightweight, full-stack webmail application built with PHP, MySQL, and vanilla JavaScript. The platform allows registered users to authenticate, compose and dispatch internal messages, and monitor incoming and outgoing correspondence.

---

## Features

* **Session-Based Authentication:** User sign-in and sign-out handling with session-protected views.
* **Dynamic Inbox & Sent Folders:** Asynchronous data fetching via custom REST-style endpoints with automated 60-second polling for updates.
* **Compose & Dispatch:** Client-side message creation with backend JSON request validation and persistence.
* **Modular Architecture:** Separation of concerns isolating UI templates, API endpoints, and reusable database operations.

---

## Tech Stack

* **Backend:** PHP
* **Database:** MySQL
* **Frontend:** JavaScript (Fetch API), HTML5, CSS3
* **UI Utilities:** Bootstrap
* **Server Environment:** Apache / XAMPP

---

## Project Structure

```text
mini-email/
├── api/                  # Backend endpoints handling JSON request/response cycles
├── assets/               # Static assets and global stylesheet (style.css)
├── db/                   # Database connection scripts, ERD, and db_dump.sql
├── includes/             # Shared database helper functions and business logic
├── public/               # User-facing application views (Inbox, Login, Compose, Sent)
├── templates/            # Reusable header and footer page components
└── README.md             # Project documentation and setup guide
```

---

## Getting Started

### Prerequisites

* [XAMPP](https://www.apachefriends.org/) with Apache and MySQL installed

### Installation

1. **Clone the Repository**  
   Clone the repository directly into your local Apache root directory:  
   ```bash
   git clone [https://github.com/Tyler-Gushue/mini-webmail.git](https://github.com/Tyler-Gushue/mini-webmail.git) C:/xampp/htdocs/mini-email
   ```

2. **Start Services**  
   Open the XAMPP Control Panel and start both **Apache** and **MySQL**.

3. **Import Database**  
   * Navigate to `http://localhost/phpmyadmin` in your browser.
   * Create a new database matching your `db.php` configuration.
   * Select the database, navigate to the **Import** tab, choose `db/db_dump.sql`, and run the import.

4. **Launch the Application**  
   Open your browser and navigate to:  
   ```text
   http://localhost/mini-email/public/login.php
   ```

### Demo Accounts

The database comes pre-seeded with test accounts from `db/db_dump.sql`. Use any of the following credentials to sign in:

| Email | Password |
| :--- | :--- |
| `sunny.mailer@example.com` | `&ah4FPg%kHhqKKJEcr4eDz^Un` |
| `jane.the.reader@example.com` | `kMM7vE8cT!SYhnK*jT&NbtFr7` |
| `quiet.quokka@example.com` | `rdxWsgJZ^vFR6Z&5bUfn2NU%k` |
| `timmy.travels@example.com` | `1TsZ8R8#sKUrmbrTh$geTxWZ*` |
| `coffee.codes@example.com` | `ejRR52Y6yrKas!h5eMuX@Xpw%` |

---

## API Reference

The internal backend uses parameter-driven endpoints serving JSON payloads:

| Endpoint | Method | Parameter / Action | Description |
| :--- | :--- | :--- | :--- |
| `/api/login.php` | `POST` | `email`, `password` | Validates credentials and initiates user session |
| `/api/logout.php` | `GET` | — | Destroys current session and redirects |
| `/api/emails.php` | `GET` | `?action=received` | Retrieves inbox messages for the current user |
| `/api/emails.php` | `GET` | `?action=sent` | Retrieves sent messages for the current user |
| `/api/emails.php` | `POST` | `action=sendEmail` | Validates and dispatches a new email record |

---

## Database Design

The relational database model tracks users, system sessions, and message delivery statuses. Refer to `db/ERD.png` for the complete entity-relationship diagram.
# Mini Email

A lightweight, full-stack webmail application built with PHP, MySQL, and vanilla JavaScript[cite: 2, 3, 4]. The platform allows registered users to authenticate, compose and dispatch internal messages, and monitor incoming and outgoing correspondence[cite: 2, 3, 4, 5, 6].

---

## Features

* **Session-Based Authentication:** User sign-in and sign-out handling with session-protected views[cite: 2, 3, 4, 5, 6].
* **Dynamic Inbox & Sent Folders:** Asynchronous data fetching via custom REST-style endpoints with automated 60-second polling for updates[cite: 2, 3, 6].
* **Compose & Dispatch:** Client-side message creation with backend JSON request validation and persistence[cite: 2, 5].
* **Modular Architecture:** Separation of concerns isolating UI templates, API endpoints, and reusable database operations[cite: 2].

---

## Tech Stack

* **Backend:** PHP[cite: 2, 3, 4]
* **Database:** MySQL[cite: 2]
* **Frontend:** JavaScript (Fetch API), HTML5, CSS3[cite: 2, 3, 4, 5]
* **UI Utilities:** Bootstrap[cite: 2]
* **Server Environment:** Apache / XAMPP[cite: 2]

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

* [XAMPP](https://www.apachefriends.org/) with Apache and MySQL installed[cite: 2]

### Installation

1. **Clone the Repository**  
   Clone the repository directly into your local Apache root directory:  
   ```bash
   git clone [https://github.com/](https://github.com/)<your-username>/mini-email.git C:/xampp/htdocs/mini-email
   ```[cite: 2]

2. **Start Services**  
   Open the XAMPP Control Panel and start both **Apache** and **MySQL**[cite: 2].

3. **Import Database**  
   * Navigate to `http://localhost/phpmyadmin` in your browser.
   * Create a new database matching your `db.php` configuration[cite: 2].
   * Select the database, navigate to the **Import** tab, choose `db/db_dump.sql`, and run the import[cite: 2].

4. **Launch the Application**  
   Open your browser and navigate to:  
   ```text
   http://localhost/mini-email/public/login.php
   ```[cite: 2]

### Demo Accounts

The database comes pre-seeded with test accounts from `db/db_dump.sql`[cite: 2]. Use any of the following credentials to sign in[cite: 1]:

| Email | Password |
| :--- | :--- |
| `sunny.mailer@example.com`[cite: 1] | `&ah4FPg%kHhqKKJEcr4eDz^Un`[cite: 1] |
| `jane.the.reader@example.com`[cite: 1] | `kMM7vE8cT!SYhnK*jT&NbtFr7`[cite: 1] |
| `quiet.quokka@example.com`[cite: 1] | `rdxWsgJZ^vFR6Z&5bUfn2NU%k`[cite: 1] |
| `timmy.travels@example.com`[cite: 1] | `1TsZ8R8#sKUrmbrTh$geTxWZ*`[cite: 1] |
| `coffee.codes@example.com`[cite: 1] | `ejRR52Y6yrKas!h5eMuX@Xpw%`[cite: 1] |

---

## API Reference

The internal backend uses parameter-driven endpoints serving JSON payloads[cite: 2, 4, 5]:

| Endpoint | Method | Parameter / Action | Description |
| :--- | :--- | :--- | :--- |
| `/api/login.php`[cite: 2, 4] | `POST`[cite: 4] | `email`, `password`[cite: 4] | Validates credentials and initiates user session[cite: 2, 4] |
| `/api/logout.php`[cite: 2] | `GET` | — | Destroys current session and redirects[cite: 2] |
| `/api/emails.php`[cite: 2, 3] | `GET`[cite: 3] | `?action=received`[cite: 2, 3] | Retrieves inbox messages for the current user[cite: 2, 3] |
| `/api/emails.php`[cite: 2, 6] | `GET`[cite: 6] | `?action=sent`[cite: 2, 6] | Retrieves sent messages for the current user[cite: 2, 6] |
| `/api/emails.php`[cite: 2, 5] | `POST`[cite: 5] | `action=sendEmail`[cite: 5] | Validates and dispatches a new email record[cite: 2, 5] |

---

## Database Design

The relational database model tracks users, system sessions, and message delivery statuses. Refer to `db/ERD.png` for the complete entity-relationship diagram[cite: 2].
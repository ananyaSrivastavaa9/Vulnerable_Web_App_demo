# Vulnerable_Web_App_demo
A deliberately vulnerable web application built for cybersecurity learning and demonstration.
# Vulnerable Web Application Demo

This project is a deliberately vulnerable web application built for learning and demonstrating common cybersecurity flaws.

## Vulnerabilities Demonstrated
- **SQL Injection** – manipulating queries through user input
- **Cross-Site Scripting (XSS)** – injecting malicious scripts into forms
- **Plaintext Password Storage** – insecure credential handling
- **Broken Access Control** – accessing admin panel without authentication
- **Misconfiguration** – directory listing enabled

## Project Files
- `admin.php` → Admin panel left open without authentication
- `login.php` → Backdoor login vulnerability
- `products.php` → SQL injection demo
- `contact.php` → Stored XSS demo
- `database.txt` → Plaintext credentials
- `index.html` → Landing page
- `signup.php` / `saveContact.php` → Supporting forms

## Screenshots
## Screenshots

- **Welcome Page**  
  ![Welcome Page](screenshot/WelcomePage.jpg)

- **Backdoor Login**  
  ![Backdoor Login](screenshot/login.jpg)

- **SQL Injection**  
  ![SQL Injection](screenshot/products.jpg)

- **XSS Popup**  
  ![XSS Popup](screenshot/contact.jpg)

- **Admin Panel Open Without Login**  
  ![Admin Panel](screenshot/admin.jpg)

- **Plaintext Password Storage**  
  ![Database File](screenshot/plain_text.jpg)

## ⚠️ Disclaimer
This project is for **educational purposes only**.  
Do not deploy it on a public server.
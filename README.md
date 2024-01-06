
# InfinityWeb

![InfinityWeb](https://i.imgur.com/xzh0vSv.png)

[InfinityWeb Discord](https://discord.gg/Ww4ybKqEYT) - [InfinityWeb Trello](https://trello.com/b/cmCj5ykK/community-web)

---

### InfinityWeb: The Comprehensive and Advanced Platform for Flyff Server Administrators

InfinityWeb is a cutting-edge web solution dedicated to optimizing and enhancing the management of Flyff servers. Packed with innovative features and focused on user-friendliness, performance, and customizability, this platform sets new standards in server administration:


- Intuitive Server Management:
A sophisticated dashboard offers administrators the ability to effortlessly monitor and control their server activities, simplifying and streamlining daily management tasks.

- Performance-Oriented Design: 
Understanding the importance of speed and reliability, InfinityWeb is built from the ground up with performance in mind, ensuring that administrators and users enjoy a fast and smooth experience.

- Transaction Management: 
Thoughtfully integrated modules for purchases and sales provide seamless transaction handling, increasing transparency, and enabling better financial management.

- Diverse Customization Options: 
An advanced theme system offers endless possibilities for personalization, allowing every aspect of the user interface to meet the specific tastes and needs of users.

- State-of-the-Art Technology: 
Utilizing Laravel 10, Inertia, and Vue3, InfinityWeb stands at the forefront of modern web development, guaranteeing a future-proof and scalable platform.

- Expandability and Flexibility: 
Our architecture supports extensions and customizations to meet the ever-changing demands of the Flyff community.

---

As a community-driven project, we place great emphasis on user involvement and feedback. Therefore, we invite all interested Flyff administrators and developers to contribute to the development, share their suggestions via our Discord channel, and actively contribute to the growth and success of this platform. Our ultimate goal is to create a vibrant, innovative, and supportive community dedicated to the continuous improvement and expansion of the InfinityWeb platform.



# Installation Guide

Install and set up InfinityWeb for Flyff server operators using Composer and NPM.

## Getting Started

These instructions will guide you through the installation process.

### Prerequisites

- Git
- Composer
- NPM
- PHP 8.1 or higher with the following extensions:
    - BCMath
    - Ctype
    - Fileinfo
    - JSON
    - Mbstring
    - OpenSSL
    - PDO
    - Tokenizer
    - XML
    - sql_srv (for SQL Server)
    - pdo_sqlsrv (for SQL Server)
  

- SQL Server 2019 or higher
- A web server (Apache, Nginx, etc.)
- Meilisearch (as search engine) (Docker image: https://hub.docker.com/r/getmeili/meilisearch / or Windows exe: https://github.com/meilisearch/meilisearch/releases/tag/v1.5.1)  
- A Flyff server
- A database management tool (e.g., SQL Server Management Studio)
- A text editor or IDE (e.g., Visual Studio Code, Sublime Text, etc.)
- A terminal (e.g., Git Bash, Windows Terminal, etc.)
- A web browser (e.g., Chrome, Firefox, etc.)


### Installation Steps

#### Step 1: Clone the Repository

Clone the InfinityWeb repository from GitHub.

```bash
git clone https://github.com/CommunityWeb2023/InfinityWeb.git
```

### Step 2: Install Composer Dependencies
Navigate to the InfinityWeb directory and install the required Composer dependencies.
```bash
cd InfinityWeb
composer install
```

### Step 3: Install NPM Packages
Install the necessary NPM packages.
```bash
npm install && npm run build 
```

### Step 4: Configure Environment Variables
Create a copy of the .env.example file and rename it to .env.
```bash
cp .env.example .env
```

### Step 5: Generate Application Key
Generate a new application key. This step is crucial for application security.
```bash
php artisan key:generate   
```

### Step 6: Update Environment Settings
Edit the .env file with your database and Flyff server details.
```bash
APP_URL=YOR DOMAIN OR IP
DB_HOST=YOUR IP OR SERVER
DB_PORT=YOUR SQL PORT
DB_DATABASE=WEB_DBF
DB_USERNAME=YOUR USER
DB_PASSWORD=YOUR PASSWORD
```
Replace placeholders like YOUR IP OR SERVER, YOUR SQL PORT, etc., with your actual database and server information.


### Step 7: Run Database Migrations
Perform database migrations with the following command. This will set up your database schema. Before create the database WEB_DBF in your SQL Server.
```bash
php artisan migrate:fresh --seed
```

if you has some error with the migration on the table ACCOUNT_TBL at webid column, you need to add this column manually in your ACCOUNT_TBL table.


## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`DB_HOST=YOUR IP OR SERVER`,
`DB_PORT=YOUR SQL PORT`,
`DB_USERNAME=YOUR USER`,
`DB_PASSWORD=YOUR PASSWORD`


## Authors

- [@CommunityWeb2023](https://github.com/CommunityWeb2023) - CommunityWeb 2023
- [@momoathome](https://github.com/momoathome) - Maurice



# Community Web 2023

Our Discord: - [Community Web Discord](https://discord.gg/Ww4ybKqEYT)


## DE:
Die Website Community Web 2023 repräsentiert eine innovative und gemeinschaftlich gestaltete Plattform, die sich an die spezifischen Bedürfnisse von Flyff-Serverbetreibern richtet. Entwickelt und kontinuierlich verbessert durch die aktive Mitwirkung ihrer Nutzergemeinschaft, legt sie einen starken Fokus auf das Domain Driven Design (DDD)-Prinzip. Dieser Ansatz gewährleistet eine intuitive und effiziente Nutzung, wobei die Struktur und Funktionen der Website eng an die realen Anforderungen ihrer Zielgruppe angepasst sind. Besonderen Wert legt Community Web 2023 auf Geschwindigkeit und Sicherheit, um eine optimale Online-Erfahrung zu bieten und gleichzeitig die Vertraulichkeit und den Schutz der Benutzerdaten zu gewährleisten. Insgesamt bildet sie eine dynamische und zuverlässige Ressource, die auf die Förderung einer engagierten und gut vernetzten Flyff-Community abzielt.


## EN:
The website Community Web 2023 represents an innovative and collaboratively designed platform, specifically tailored to meet the needs of Flyff server operators. Developed and continuously improved through the active participation of its user community, it places a strong emphasis on the Domain Driven Design (DDD) principle. This approach ensures an intuitive and efficient usage, with the website's structure and functionalities closely aligned with the real-world requirements of its target audience. Community Web 2023 places particular importance on speed and security, aiming to provide an optimal online experience while simultaneously ensuring the confidentiality and protection of user data. Overall, it forms a dynamic and reliable resource, focused on fostering a committed and well-connected Flyff community.
# CommunityWeb 2023 Installation Guide

Install and set up CommunityWeb 2023 for Flyff server operators using Composer and NPM.

## Getting Started

These instructions will guide you through the installation process.

### Prerequisites

- Git
- Composer
- NPM

### Installation Steps

#### Step 1: Clone the Repository

Clone the CommunityWeb 2023 repository from GitHub.

```bash
git clone https://github.com/CommunityWeb2023/Flyff-Community-Web.git
```

### Step 2: Install Composer Dependencies
Navigate to the Flyff-Community-Web directory and install the required Composer dependencies.
```bash
cd Flyff-Community-Web
composer install
```

### Step 3: Install NPM Packages
Install the necessary NPM packages.
```bash
npm install
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
DB_HOST=YOUR IP OR SERVER
DB_PORT=YOUR SQL PORT
DB_DATABASE=WEB_DBF
DB_USERNAME=YOUR USER
DB_PASSWORD=YOUR PASSWORD

FLYFF_DROP_RATE=1
FLYFF_PENYA_RATE=1
FLYFF_EXP_RATE=1
```
Replace placeholders like YOUR IP OR SERVER, YOUR SQL PORT, etc., with your actual database and server information.


### Step 7: Run Database Migrations
Perform database migrations with the following command. This will set up your database schema.
```bash
php artisan migrate:fresh --seed
```



## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

`DB_HOST=YOUR IP OR SERVER`,
`DB_PORT=YOUR SQL PORT`,
`DB_USERNAME=YOUR USER`,
`DB_PASSWORD=YOUR PASSWORD`

`FLYFF_DROP_RATE=1`,
`FLYFF_PENYA_RATE=1`,
`FLYFF_EXP_RATE=1`


## Authors

- [@CommunityWeb2023](https://github.com/CommunityWeb2023)


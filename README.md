<p align="center"><a href="https://app.tvetxr.ga/" target="_blank"><img src="https://gitlab.com/zulwaqarzain96/communication/-/raw/master/public/icons/icon-192x192.png" width="170"></a></p>

<p align="center">
<a href="https://gitlab.com/ImranShamm/hse-magicx/-/pipelines"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
</p>

## REQUIREMENT
This installation is intended to be used with laragon that comes with preinstall tools needed for the project for local development environment. For other ways the requirement is still the same but you need to configure them yourself.

Just make sure that your Laragon run with below Environment
- PHP >= 7.4 < 8.0
- MySQL 5.7
- Apache 2.4
- Node v12

## INSTALLATION STEPS

### To Run Web System

**1) Clone**
- SSH : `git clone git@gitlab.com:zulwaqarzain96/communication.git`
- HTTPS : `git clone https://gitlab.com/zulwaqarzain96/communication.git`

**2) run - `composer install`**

**3) run - `npm install`**

**4) Copy .env.example file and rename to .env** 

_For database:-_
- change `DB_DATABASE=dev_communication`

_For Mailing we use SMTP so the attribute should looks like below:-_
- `MAIL_MAILER=smtp`
- `MAIL_HOST=smtp.gmail.com`
- `MAIL_PORT=587`
- `MAIL_USERNAME=test@test.com`
- `MAIL_PASSWORD=test123`
- `MAIL_ENCRYPTION=tls`
- `MAIL_FROM_ADDRESS=test@test.com`
- `MAIL_FROM_NAME="${APP_NAME}"`

_For Firebase Cloud Messaging (FCM) the attribute should looks like below:-_
   
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Relative or full path to the Service Account JSON file
- `FIREBASE_CREDENTIALS=fcm-credential/test-2021-firebase-adminsdk-1111-111111111.json`

   You can find the database URL for your project at https://console.firebase.google.com/project/_/database
- `FIREBASE_DATABASE_URL=https://test-2021-default-rtdb.region-subregion1.firebasedatabase.app/`

_Lastly, make sure your **APP_URL** is working for websocket to run locally._

**5) run - `php artisan key:generate`**

**6) run - `php artisan storage:link`**

**7) Create database - dev_communication**

**8) run - `php artisan migrate`**

### To Run Websocket

**1) Run - `node chat.js`**


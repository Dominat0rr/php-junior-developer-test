# PHP developer test
## Instructions
Using NASA’s “Astronomy Picture of the Day” API, build a webpage that lists the picture of the day for the last 30 days.

For each day the date, picture and description should be displayed.

## Getting started
Fork this repo to your own Github account and commit your work there.

NASA’s API can be found [here](https://api.nasa.gov/#apod), the API you’ll need for this test is the “APOD”. You can use an API key to authenticate, but the DEMO_KEY should also work.

Your repo needs to include at minimum anything required to get the app working. Detailed instructions should be provided in the README.md file to setup and run the app.

Feel free to use whichever framework you feel most comfortable with.

# Bonus points
- Save the API response to a database and use that to build your webpage
- Make it look good
- Make it as object-oriented as possible
- Manage your dependencies with Composer
- If you have frontend assets, use a build tool like web pack or gulp to compile them


## Database Instructions
- edit the following file with your database credentials and database schema: config/config.php

edit the following:
    # Database params
    define("DB_HOST", "");
    define("DB_USER", "");
    define("DB_PASSWORD", "");
    define("DB_NAME", "");
    
- example script to create databse:
create database statiknasa charset utf8mb4;

- script to create table (pictures):
create table pictures (
  id bigint(20) unsigned not null auto_increment,
  copyright varchar(255),
  date date not null,
  explanation text,
  hdurl varchar(255),
  title varchar(255),
  url varchar(255),
  primary key (id)
);
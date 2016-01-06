SMS Two-Factor Authentication
=============================

Use text messages (SMS) instead of the default TOTP system (Time-based One-time Password Algorithm).
This plugin works with the service [Twilio](https://www.twilio.com).

Author
------

- Frederic Guillot
- License MIT

Requirements
------------

- [Twilio Account](https://www.twilio.com)
- Twilio phone number and API credentials

Installation
------------

- Decompress the archive in the `plugins` folder

or

- Create a folder **plugins/SmsTwoFactor**
- Copy all files under this directory

Documentation
-------------

### Configure Twilio in Kanboard

1. Go to **Settings > Integrations > SMS Two-Factor Authentication**
2. Enter the Twilio API credentials (Account SID, Auth Token and Phone Number)

### Set User Phone Number

1. Go the user profile
2. Go to **Integrations > SMS Two-Factor Authentication**
3. Enter your mobile phone number

### Enable the Two-Factor

1. Go to the user profile
2. Enable the two-factor authentication
3. Check your device and save

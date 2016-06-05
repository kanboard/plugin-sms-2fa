SMS Two-Factor Authentication
=============================

[![Build Status](https://travis-ci.org/kanboard/plugin-sms-2fa.svg?branch=master)](https://travis-ci.org/kanboard/plugin-sms-2fa)

Use text messages (SMS) instead of the default TOTP system (Time-based One-time Password Algorithm).
This plugin works with the service [Twilio](https://www.twilio.com).

Author
------

- Frederic Guillot
- License MIT

Requirements
------------

- Kanboard >= 1.0.29
- [Twilio Account](https://www.twilio.com)
- Twilio phone number and API credentials

Installation
------------

You have the choice between 3 methods:

1. Install the plugin from the Kanboard plugin manager in one click
2. Download the zip file and decompress everything under the directory `plugins/SmsTwoFactor`
3. Clone this repository into the folder `plugins/SmsTwoFactor`

Note: Plugin folder is case-sensitive.

Documentation
-------------

### Configure Twilio API in Kanboard

![Twilio Settings](https://cloud.githubusercontent.com/assets/323546/12133114/2a89e684-b3f0-11e5-8486-cbbf9edc7c4a.png)

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

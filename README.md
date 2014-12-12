Primo-Text-a-Call-Number
========================

Adds a Text Call Number option to the Actions Menu in the Ex Libris Primo Catalog Search Interface


# Application Installation and Setup
Copy application files to an external web server with PHP installed.

- Required Libraries
 -  Mail Pear Module http://pear.php.net/manual/en/package.mail.mail.php
 -  Mail_Mime Pear Module http://pear.php.net/manual/en/package.mail.mail-mime.php
 -  Net_SMPT Pear Module http://pear.php.net/package/Net_SMTP/

# Configure Settings

text_a_call_number.php config setting

```php

// Set to location of files on remote server
// For example: define("SMS_INCLUDE_PATH","//www.university.edu/library/primo/sms");
define("SMS_INCLUDE_PATH","");

```

sms/config.php config settings

```php

// set smtp mail host for sending text message emails
define("SMTP_HOST","smtp.university.edu");

// turn emailing on (can be set to false when debugging)
define("EMAIL_ON",true);

// set location string prefix - this part of the Primo location string will be removed to shorten the text message
define("LOCATION_STRING_PREFIX","Available at Library");

// set the subject line of the text message
define("SMS_MESSAGE_SUBJECT","University Library");

// set the reply address of the text message
define("SMS_MESSAGE_FROM","NoReply@university.edu");

// turn logging on/off (true/false)
define("LOG_USAGE",false);

// set the name/location of the log file, if logging is on
define("LOG_FILE","log.txt");

```

# Logging (optional)

After logging setting has been set to true in config.php, set log file permissions to be writable.

# Primo Configuration Changes

- Login to Primo Back Office
- Click *Configuration & Management Wizards* - *Ongoing Configuration Wizards*
- Click *Views Wizard*
- Click *Edit* for relevant template where you want to enable Text a Call Number
- Click *Edit* for the *Layout Set*
- For the *Brief Display* and *Full Display*:
  - Add a custom tile in the exlidHeaderContainer div, called text_a_call_number
  - For the new custom tile, set the css id and class to: text_a_call_number
  - Set the URL to the location of the text_a_call_number.php application file
    - For example: http://www.university.edu/library/primo/sms/text_a_call_number.php
- Continue through the *Views Wizard* to save and deploy changes


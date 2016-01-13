Primo Text a Call Number
========================

Adds a Text Call Number option to the Actions Menu in the Ex Libris Primo Catalog Search Interface

### System Components
 - PBO
 - Remote Web Server with PHP

### Skillset Requirements
- PBO (to Update your Primo Theme to add Custom JavaScript)
- Basic PHP
- Basic CSS
- Intermediate JavaScript
- Intermediate Server Management (if Pear module dependancies are not already available)

### Implementation (Recipe) Steps

#### Step 0) Update Primo Theme to Install Send To Actions Menu Customization (project link coming soon...)
```html
<!-- Add Send To links to the record level -->
<script src="//www.university.edu/js/send-to-links.js"></script>
```

#### Step 1) Application Installation and Setup
Copy application files to an external web server with PHP installed.

- Required Libraries
 -  Mail Pear Module http://pear.php.net/package/Mail
 -  Mail_Mime Pear Module http://pear.php.net/package/Mail_Mime
 -  Net_SMTP Pear Module http://pear.php.net/package/Net_SMTP/

#### Step 2) # Configure Settings

text_a_call_number.php config setting

```php

// Set to location of files on remote server
// For example: define("SMS_INCLUDE_PATH","//www.university.edu/library/primo/sms");
define("SMS_INCLUDE_PATH","");

```

#### Step 3) sms/config.php config settings
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
Note: If the logging setting has been set to true in config.php , set the log file's permissions to be writable by the server.

#### Step 4) Update Primo Theme to Include JavaScript and CSS Files
```html
<!-- Text Call Number -->
<script src="//www.university.edu/primo/sms/sms.js"></script>
<link rel="stylesheet" type="text/css" href="//www.university.edu/primo/sms/sms.css">
```

#### Step 5) Update Send To Actions Menu Script
To include the links for sending a record via Text to the Send To Actions Menu for each item, the custom script will need to be augmented to include a placeholder for the new option.

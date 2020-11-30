# Scout-Tech-Developer-Assessment
Developer Assessment for Scout Technologies
Created by: Garryd Smit

# Setup for local testing with Xamp:

1.Download the Scout-Tech-Developer-Assessment folder

2.Copy the scout_dev_test folder into the htdocs folder where Xamp is installed.

3.With Xamp running login to phpMyAdmin

4.Create a new database and name it scout_tech_test

5. Once the database is created click on the "Import" tab. Drag and drop the scout_tech_test.sql file or Click on the "Choose File" button and select the scout_tech_test.sql file and click "Go". You will be notified once the import has been completed.

With Xamp still running, you can now visit http://127.0.0.1/scout_dev_test/ to begin testing.

If your local server's username and password is not set to username: root and password:'' you can access the datapase.php file located in Scout_dev_test/core/libraries/database.php and set $username and $password to your respective username and password.

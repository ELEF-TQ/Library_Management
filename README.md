## Working with the Website

To work with this website on your local machine, follow these steps:

1. **Clone the repository**: Open your command prompt or terminal and navigate to the desired directory. Then, run the following command to clone the repository:
git clone https://github.com/ELEF-TQ/Library_Management.git


2. **Install WAMP server**: Download and install [WAMP server](https://www.wampserver.com/), which provides a local environment for running your PHP and MySQL-based website.

3. **Database setup**: Launch the WAMP server and ensure that the Apache and MySQL services are running. Open your web browser and go to `http://localhost/phpmyadmin`. Create a new database for the website.

4. **Configure database connection**: Locate the configuration file in the source code that handles the database connection. It is found in a file called `connect.php`. 
Open the file and update the database connection details to match your local environment.

5. **Import database**: If a pre-existing database schema is required, export the database file from the production environment or obtain the SQL dump file. In phpMyAdmin, select the newly created database and choose the "Import" option. Select the SQL file ' librarymanagementdb.sql ' and click "Go" to import the database structure and data.

6. **Place website files**: Copy the files from the cloned repository into the web server's document root directory. By default, this directory is located at `C:\wamp64\www` on Windows or `/var/www/html` on Linux.

7. **Access the website**: Open your web browser and go to `http://localhost` or `http://127.0.0.1` to access the website running on the WAMP server. Ensure that the WAMP server is still running, and you should see the website in action.

Now you can follow these steps to work with the website locally using the WAMP server.

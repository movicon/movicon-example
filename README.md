# TODO manager

An example of RESTful application that uses the [MoViCon](https://github.com/movicon/movicon) framework for PHP. This application is a simple TODO manager that contains the following routes:

```text
task-list.php                        Returns the list of tasks.
task-detail.php?id                   Prints the task details.
task-new.php?title&[state = 'open']  Creates a task.
task-edit.php?id&title&state         Edits a task.
task-delete.php?id                   Deletes a task
```

## Install

  1. Execute the following command from a terminal (replace `[folder-name]` by your folder):
  ```bash
  git clone https://github.com/movicon/movicon-example [folder-name]
  ```
  2. Create a MySQL database and import `/scripts/database.sql` to create the tables.
  3. Copy `config-sample` to `config.php` and change it with the appropriate values.
  4. Install the libraries (replace `<folder-name>` by your folder):
  ```bash
  cd <folder-name>
  composer install
  ```

After that, test it by opening the following link:  
http://path/to/your/folder/app/task-list.php

Alternatively you can create a Virtual Host in Apache2. Simply move the following snippet to `/etc/apache2/sites-available/todo.localhost.conf` (**note that the `DOCUMENT_ROOT` is the `app` folder**):

```text
<VirtualHost *:80>
	ServerName todo.localhost

	# the website "lives" in app/
	DocumentRoot /path/to/your/project/app

	<Directory /path/to/your/project>
		Options Indexes FollowSymLinks MultiViews
		AllowOverride All
		Require all granted
	</Directory>
</VirtualHost>
```

And then execute the following command to enable it:
```bash
sudo a2ensite todo.localhost
sudo service apache2 reload
```

And finally open the following link from your browser:  
http://todo.localhost/task-list.php

If the previous link doesn't work, probably you need to add the following line to the end of /etc/hosts file:
```
127.0.0.1 todo.localhost
```

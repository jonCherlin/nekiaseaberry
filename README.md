# WordPress Template #

### A base instance for all Dom & Tom WordPress projects ###
#### **Do not modify this repo directly** ####

In order to use this template, duplicate it for your project using the instructions below.

## HowTo ##

### Create a duplicate of the repo ###

First create an empty repo for your new project.  

	git clone --bare git@github.com:DomAndTom/wp-single-site-template.git

	cd wp-single-site-template.git

	git push --mirror git@github.com:DomAndTom/<new repo name>.git
	
	cd ..
	
	rm -rf wp-single-site-template.git (Or rmdir /S wp-single-site-template.git on Windows)

Your should now have a shiny new repo for your project on github.

### Clone and configure ###

Once you've duplicated the repo, you're ready to create your local clone and configure.

Make your new webroot directory.  (We'll use 'example' as our directory name)

	cd example
	
	git clone git@github.com:DomAndTom/templatetest.git .
	git submodule init
	git submodule update
	
Now that you've cloned your new repo to your local machine, we'll need to make a few quick configuration changes and import the base SQL.

Copy the wp-config.php.dist to wp-config.php

`Create your local database`

Edit wp-config.php

	/** The name of the database for WordPress */
	define('DB_NAME', 'wp_template');

	/** MySQL database username */
	define('DB_USER', 'root');

	/** MySQL database password */
	define('DB_PASSWORD', 'root');

Point your browser to your local instance and you should now see a base install of WordPress ready to go.

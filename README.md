# TiSamiModule

TiSamiModule is a module that wraps the [Sami](https://github.com/fabpot/Sami) PHP documentation generation tool with information specific to Tire Intelligence's documentation process.


## Installation

### Composer

Add the following lines to the `require-dev` section of your `composer.json` file.

	"require-dev": {
		"tireintelligence/ti-sami-module": "dev-master",
        "sami/sami": "@dev"
    },

You may need to add the following repository definition to your composer file:

	"repositories" : [
    	{
        	"type" : "vcs",
          	"url" : "ssh://gitolite@tipgit02/TiSamiModule.git"
      	}
    ],

Once the composer file has been updated, you will need to run one of the following commands, as appropriate.

	php composer.phar install --dev
	php composer.phar update --dev
	php composer.phar update "tireintelligence/ti-sami-module" --dev

### Configuration File
	
Copy the file `config/sami.php` and place it in your project's `config/` directory, replacing the option values to match the information required by your project.


## Generating Documentation

The Sami library provides a bin file in the vendor directory, as added by composer.

Execute the following command from the root of the project

	./vendor/bin/sami.php update config/sami.php -v
	
The optional `-v` flag will output any parsing errors to the console.

This will generate/update the documentation for the module and place it into the `build_dir` and `cache_dir` as specified in the config file.

## Customizing the Documentation Process

### Default Method

The file `config/sami.php` that resides in the repository must contain the values that will be used when automatically generating documentation as part of a build script or some other automated process.

If you want to use different configuration settings for the documentation generation (for example, using a different `build_dir` or `cache_dir`), simply create a copy of the `config/sami.php` and save it as `config/sami.local.php`.  (Note that you may need to add a `.gitignore` rule to this new file and commit the changes to your project's repository.) 

Modify any of the desired settings, and provide the new config file to the command line.

	./vendor/bin/sami.php update config/sami.local.php -v

Note that the generation process switches Git branches, so the working directory must be clean.

## Further Customization

The `Boostrap` method used by this module provides the easiest way to implement the documentation configuration into a TI project.  However, you can always create your own sami config file as defined in the [Sami](https://github.com/fabpot/Sami) documentation for further customizations.


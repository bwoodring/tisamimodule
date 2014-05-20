# TiSamiModule

TiSamiModule is a module that wraps the [Sami](https://github.com/fabpot/Sami) PHP documentation generation tool with information specific to Tire Intelligence.


## Installation

Add `"tireintelligence/ti-sami-module": "dev-master"` to your `composer.json` file and run `php composer.phar install --dev`.

Copy the file `config/sami.php` and place it in your project's `config/` directory, replacing the option values to match the information required by your project.


## Generating Documentation

The Sami library provides a bin file in the vendor directory, as added by composer.

	1) Make sure you have access to a Sami instance by running the following in your project:
	composer install --dev 
	
	2) Execute the following command from the root of the project
	./vendor/bin/sami.php update config/sami.php -v
	
The optional `-v` flag will output any parsing errors to the console.

This will generate/update the documentation for the module and place it into the `build_dir` and `cache_dir` as specified in the config file.

## Customizing the Documentation Process

### Default Method

The file `config/sami.php` that resides in the repository must contain the values that will be used when automatically generating documentation as part of a build script or some other automated process.

If you want to use different configuration settings for the documentation generation (for example, using a different `build_dir` or `cache_dir`), simply create a copy of the `config/sami.php` and save it as `config/sami.local.php`.  You will need to add a .gitignore rule to this new file and commit the changes to your project's repository. Modify any of the desired settings, and provide the new config file to the command line.

	./vendor/bin/sami.php update config/sami.local.php -v

Note that the generation process switches Git branches, so the working directory must be clean.

## Further Customization

The `Boostrap` method used by this module provides teh easiest way to implement the documentation configuration into a TI project.  However, you can always create your own sami config file as defined in the [Sami](https://github.com/fabpot/Sami) documentation for further cusomtizations.


# TiSamiModule

TiSamiModule is a module that wraps the [Sami](https://github.com/fabpot/Sami) PHP documentation generation tool with information specific to Tire Intelligence's documentation process.

## Installing Dependencies via Composer

The recommended way to get a working copy of this project is to clone the repository from `git` and use [Composer](https://getcomposer.org) to install dependencies using the `install` or `update` command:

    cd where/cloned/TiSamiModule/
    composer.phar self-update (optional)
    composer.phar install


## Generating Documentation

### TiSamiModule

The Sami library provides a bin file in the vendor directory, as added by Composer.

Executing the following command from the root of this project will generate docuemntation for the TiSamiModule.

	./vendor/bin/sami.php update config/sami.php -v
	
The optional `-v` flag will output any parsing errors to the console.

This will generate/update the documentation for the module and place it into the `build_dir` and `cache_dir` as specified in the config file.

### External Projects 

This module can generate documentation for any PHP project using a custom configuration file.
	
To add configuration for an additional project, copy the file `config/sami.php` and rename it to `config/project.sami.php`, replacing the option values to match the information required by your project.  These configuration files should be committed to the repository.

For example, the config file for the SecurityMgmtModule is named `config/security-mgmt-module.sami.php`;


## Customizing the Documentation Process

### Default Method

The file `config/sami.php` that resides in the repository must contain the values that will be used when automatically generating documentation as part of a build script or some other automated process.

If you want to use different configuration settings for the documentation generation (for example, using a different `build_dir` or `cache_dir`), simply create a copy of the `config/sami.php` and save it as `config/sami.local.php`.

Modify any of the desired settings, and provide the new config file to the command line.

	./vendor/bin/sami.php update config/sami.local.php -v

Note that the generation process switches Git branches, so the working directory must be clean.

## Further Customization

You can always create your own sami config file as defined in the [Sami](https://github.com/fabpot/Sami) documentation for further customizations not currenlty implemented by this module.


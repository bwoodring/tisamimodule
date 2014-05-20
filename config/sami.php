<?php
/**
 * The configuration file used to configure the Sami php documentation engine.
 *
 * To Generate Documentation:
 * 1) Run a composer install --dev
 * 2) Execute the following command from the root of the project
 *      ./vendor/bin/sami.php update config/sami.php
 *
 * See this projects README.md file for additional usage information, or see
 * the link below to the Sami project for more information.
 *
 * @author Chris Chandler <chris.chandler@tire-intelligence.com>
 * @link https://github.com/fabpot/Sami Home of Sami documentor project
 */
use Symfony\Component\Finder\Finder;
use Sami\Parser\Filter\TrueFilter;
use Sami\Sami;
use Sami\Version\GitVersionCollection;

// Paths to generated output and cached files
$buildDir = '/webroot/docs.corp.tire-intelligence.com/security-mgmt-module/build/%version%';
$cacheDir = '/webroot/docs.corp.tire-intelligence.com/security-mgmt-module/cache/%version%';

// Major version number to start with when generating docs from tags
$majorVersionStart = 1;

// Create a File iterator instance
$iterator = Finder::create()
    ->files()
    ->name('*.php')
    ->exclude('*/vendor/*')
    ->in($dir = __DIR__ . '/../src/SecurityMgmtModule')
;

// Set the Git versions/tags to parse
$versions = GitVersionCollection::create($dir)
    ->add('master', 'master')
    // Generate documentation for all v{$majorVersionStart}.0.* tags
    ->addFromTags(function ($version) use ($majorVersionStart) {
        return preg_match('/^v?' . $majorVersionStart . '\.\d+\.\d+$/', $version);
    })
;

// Create new Sami instance
$sami = new Sami(
    $iterator,
    array(
        'versions'             => $versions,
        'filter'               => new TrueFilter(),
        'title'                => 'SecurityMgmtModule API',
        'build_dir'            => $buildDir,
        'cache_dir'            => $cacheDir,
        'default_opened_level' => 2,
    )
);

// Return configured Sami instance
return $sami;
<?php
namespace TiSamiModule;

use Symfony\Component\Finder\Finder;
use Sami\Parser\Filter\TrueFilter;
use Sami\Sami;
use TiSamiModule\Version\GitVersionCollection;
use TiSamiModule\Config\Options;
use TiSamiModule\Console\Colors;

/**
 * A generic boostrap file to set up the config required for Sami integration
 * with an application.
 *
 * Note that you do not have to use this Bootstrap file, and you may use your
 * own sami config file.
 *
 * @author Chris Chandler <chris.chandler@tire-intelligence.com>
 * @copyright (c) 2014, Tire Intelligence
 */
class Bootstrap
{
    const VERSION = '1.0.0';

    /**
     * The options instance that was passed in via the constructor
     *
     * @var Options
     */
    private $options;

    /**
     * @var Colors
     */
    private $colors;

    /**
     * Constructor.
     *
     * @param \TiSamiModule\Config\Options $options
     */
    public function __construct(Options $options)
    {

        // Set options to class
        $this->setOptions($options);
    }

    /**
     * Get the configured Sami instance
     *
     * @return \Sami\Sami
     */
    public function getSami()
    {

        // Create new Sami instance
        $sami = new Sami(
            $this->getIterator(),
            array(
                'versions'             => $this->getVersions(),
                'filter'               => new TrueFilter(),
                'title'                => $this->getOptions()->getApiTitle(),
                'build_dir'            => $this->getOptions()->getBuildDir(),
                'cache_dir'            => $this->getOptions()->getCacheDir(),
                'default_opened_level' => 2,
            )
        );

        // Return configured Sami instance
        return $sami;
    }

    /**
     * Echo console banner info
     */
    public function showBanner()
    {
        $infoString = 'TI Documentation Script v' . self::VERSION . PHP_EOL;
        echo $this->getColors()->getColoredString($infoString, 'cyan');
    }

    /**
     * Get Iterator
     *
     * @return Finder
     */
    private function getIterator()
    {
        // Create a File iterator instance
        $iterator = Finder::create()
            ->files()
            ->name('*.php')
            ->exclude('vendor')
            ->in($this->getOptions()->getCodebaseDir());

        return $iterator;
    }

    /**
     * Get version collection
     *
     * @return GitVersionCollection
     */
    private function getVersions()
    {
        // Get options
        $options = $this->getOptions();

        // Set the Git versions/tags to parse
        $versions = GitVersionCollection::create($options->getCodebaseDir())
            ->add('master', 'master')
            ->addFromMostRecentTags($options->getNumberOfTags());

        return $versions;
    }

    /**
     * Get options
     *
     * @return Options
     */
    private function getOptions()
    {
        return $this->options;
    }

    /**
     * Set options to class
     *
     * @param \TiSamiModule\Config\Options $options
     * @return \TiSamiModule\Bootstrap
     */
    private function setOptions(Options $options)
    {
        // Make sure options are valid
        if (!$options->isValid()) {
            $e = PHP_EOL
                . 'One or more TiSamiModule\Config\Options properties is empty'
                . PHP_EOL . PHP_EOL;
            echo $this->getColors()->getColoredString($e, null, 'red');
            exit(1);
        }

        $this->options = $options;

        return $this;
    }

    /**
     * Get Colors for CLI
     *
     * @return Colors
     */
    public function getColors()
    {
        if (!$this->colors instanceof Colors) {
            $this->setColors(new Colors());
        }

        return $this->colors;
    }

    /**
     * Set colors
     *
     * @param Colors $colors
     * @return Bootstrap
     */
    public function setColors(Colors $colors)
    {
        $this->colors = $colors;
        return $this;
    }

}
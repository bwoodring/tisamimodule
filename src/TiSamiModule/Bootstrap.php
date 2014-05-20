<?php
namespace TiSamiModule;

use Symfony\Component\Finder\Finder;
use Sami\Parser\Filter\TrueFilter;
use Sami\Sami;
use TiSamiModule\Version\GitVersionCollection;
use TiSamiModule\Config\Options;

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

    /**
     * @var Options
     */
    private $options;

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
            ->exclude('*/vendor/*')
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
     * @throws \InvalidArgumentException
     */
    private function setOptions(Options $options)
    {
        if (!$options->isValid()) {
            $e = 'One or more properties of TiSamiModule\Config\Options empty';
            throw new \InvalidArgumentException($e);
        }

        $this->options = $options;
        return $this;
    }

}
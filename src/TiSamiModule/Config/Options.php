<?php
namespace TiSamiModule\Config;

/**
 * POPO for options that can be passed to the Bootstrap class
 *
 * @author Chris Chandler <chris.chandler@tire-intelligence.com>
 * @copyright (c) 2014, Tire Intelligence
 */
class Options
{
    const VERSION_DIR_PLACEHOLDER = '%version%';

    /**
     * The directory containing the code to be parsed for documentation
     *
     * @var dir
     */
    private $codebaseDir;

    /**
     * The directory in which the generated documentation will be saved
     *
     * @var string
     */
    private $buildDir;

    /**
     * The directory in which to store files that are cahced as a part of the
     * documentation generation process
     *
     * @var string
     */
    private $cacheDir;

    /**
     * The number of most recent tags to include in the generation process
     *
     * @var int
     */
    private $numberOfTags = 3;

    /**
     * The title to use for the generated documentation
     *
     * @var string
     */
    private $apiTitle = 'API';

    /**
     * If any defined property on this class is null, then one or more options
     * have not been set, thereby indicating an invalid option class.
     *
     * @return bool
     */
    public function isValid()
    {
        return !(in_array(null, get_object_vars($this)));
    }

    /**
     * Get codebase directory
     *
     * @return string
     */
    public function getCodebaseDir()
    {
        return $this->codebaseDir;
    }

    /**
     * Get build directory
     *
     * @return string
     */
    public function getBuildDir()
    {
        return $this->buildDir;
    }

    /**
     * Get the cache directory
     *
     * @return string
     */
    public function getCacheDir()
    {
        return $this->cacheDir;
    }

    /**
     * Get the number of tags
     *
     * @return int
     */
    public function getNumberOfTags()
    {
        return $this->numberOfTags;
    }

    /**
     * Get the API Title
     *
     * @return string
     */
    public function getApiTitle()
    {
        return $this->apiTitle;
    }

    /**
     * Sets the codebase directory to the provided string
     *
     * @param string $codebaseDir
     * @return \TiSamiModule\Config\Options
     */
    public function setCodebaseDir($codebaseDir)
    {
        // Remove trailing slash, if it exists
        $codebaseDir = rtrim($codebaseDir, DIRECTORY_SEPARATOR);

        $this->codebaseDir = $codebaseDir;
        return $this;
    }

    /**
     * Sets the build diretcory to the provided string with the
     * VERSION_DIR_PLACEHOLDER appended to the end
     *
     * @param string $buildDir
     * @return \TiSamiModule\Config\Options
     */
    public function setBuildDir($buildDir)
    {
        // Remove trailing slash, if it exists
        $buildDir = rtrim($buildDir, DIRECTORY_SEPARATOR);

        // Concatenate version placeholder to build dir
        $this->buildDir = $buildDir
            . DIRECTORY_SEPARATOR
            . self::VERSION_DIR_PLACEHOLDER;

        return $this;
    }

    /**
     * Sets the cache diretcory to the provided string with the
     * VERSION_DIR_PLACEHOLDER appended to the end
     *
     * @param string $cacheDir
     * @return \TiSamiModule\Config\Options
     */
    public function setCacheDir($cacheDir)
    {
        // Remove trailing slash, if it exists
        $cacheDir = rtrim($cacheDir, DIRECTORY_SEPARATOR);

        // Concatenate version placeholder to build dir
        $this->cacheDir = $cacheDir
            . DIRECTORY_SEPARATOR
            . self::VERSION_DIR_PLACEHOLDER;

        return $this;
    }

    /**
     * Set number of tags
     *
     * @param int $numberOfTags
     * @return \TiSamiModule\Config\Options
     */
    public function setNumberOfTags($numberOfTags)
    {
        $this->numberOfTags = $numberOfTags;
        return $this;
    }

    /**
     * Set API Title
     *
     * @param string $apiTitle
     * @return \TiSamiModule\Config\Options
     */
    public function setApiTitle($apiTitle)
    {
        $this->apiTitle = $apiTitle;
        return $this;
    }

}
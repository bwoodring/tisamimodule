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

    private $codebaseDir;
    private $buildDir;
    private $cacheDir;
    private $numberOfTags = 3;
    private $apiTitle     = 'API';

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

    public function getCodebaseDir()
    {
        return $this->codebaseDir;
    }

    public function getBuildDir()
    {
        return $this->buildDir;
    }

    public function getCacheDir()
    {
        return $this->cacheDir;
    }

    public function getNumberOfTags()
    {
        return $this->numberOfTags;
    }

    public function getApiTitle()
    {
        return $this->apiTitle;
    }

    public function setCodebaseDir($codebaseDir)
    {
        // Remove trailing slash, if it exists
        $codebaseDir = rtrim($codebaseDir, DIRECTORY_SEPARATOR);

        $this->codebaseDir = $codebaseDir;
        return $this;
    }

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

    public function setNumberOfTags($numberOfTags)
    {
        $this->numberOfTags = $numberOfTags;
        return $this;
    }

    public function setApiTitle($apiTitle)
    {
        $this->apiTitle = $apiTitle;
        return $this;
    }

}
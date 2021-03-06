<?php
namespace TiSamiModule\Console;

/**
 * Description of Colors.
 *
 * A large pecentage of this code was imported from the code example
 * on the linked site.
 *
 * @author Chris Chandler <chris.chandler@tire-intelligence.com>
 * @author JR of if !1 0
 * @link http://www.if-not-true-then-false.com/author/juissi/
 */
class Colors {

    /**
     * Foreground colors
     *
     * @var array
     */
    private $foregroundColors = array(
        'black' => '0;30',
        'dark_gray' => '1;30',
        'blue' => '0;34',
        'light_blue' => '1;34',
        'green' => '0;32',
        'light_green' => '1;32',
        'cyan' => '0;36',
        'light_cyan' => '1;36',
        'red' => '0;31',
        'light_red' => '1;31',
        'purple' => '0;35',
        'light_purple' => '1;35',
        'brown' => '0;33',
        'yellow' => '1;33',
        'light_gray' => '0;37',
        'white' => '1;37'
    );

    /**
     * Background colors
     *
     * @var array
     */
    private $backgroundColors = array(
        'black' => '40',
        'red' => '41',
        'green' => '42',
        'yellow' => '43',
        'blue' => '44',
        'magenta' => '45',
        'cyan' => '46',
        'light_gray' => '47'
    );

    /**
     * Color the provided string for the console
     *
     * @param string $string               Text to color
     * @param string|null $foregroundColor Name of the foreground color
     * @param string|null $backgroundColor Name of the background color
     * @return string                      The colored string
     */
    public function getColoredString($string,  $foregroundColor = null,
        $backgroundColor = null)
    {
        $colored_string = '';

        // Check if given foreground color found
        if (isset($this->foregroundColors[$foregroundColor])) {
            $colored_string .= "\033[";
            $colored_string .= $this->foregroundColors[$foregroundColor];
            $colored_string .= 'm';
        }

        // Check if given background color found
        if (isset($this->backgroundColors[$backgroundColor])) {
            $colored_string .= "\033[";
            $colored_string .= $this->backgroundColors[$backgroundColor];
            $colored_string .= 'm';
        }

        // Add string and end coloring
        $colored_string .= $string . "\033[0m";

        return $colored_string;
    }

    /**
     * Returns all foreground color names
     *
     * @return array
     */
    public function getForegroundColors()
    {
        return array_keys($this->foregroundColors);
    }

    /**
     * Returns all background color names
     *
     * @return array
     */
    public function getBackgroundColors()
    {
        return array_keys($this->backgroundColors);
    }

}
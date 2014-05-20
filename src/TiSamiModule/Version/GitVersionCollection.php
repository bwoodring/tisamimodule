<?php
namespace TiSamiModule\Version;

use Sami\Version\GitVersionCollection as SamiGitCollection;
use Sami\Version\Version;

/**
 * A class that extends the Sami class of teh smae name for the purpose
 * of adding custom functions, specific to TI documentation processes.
 *
 * @author Chris Chandler <chris.chandler@tire-intelligence.com>
 * @copyright (c) 2014, Tire Intelligence
 */
class GitVersionCollection extends SamiGitCollection
{

    /**
     * Adds the specified number of most recent tags to the list of
     * versions that will have documentation genertaed for them
     *
     * @param int $numberOfTags
     * @return \TiSamiModule\Version\GitVersionCollection
     */
    public function addFromMostRecentTags($numberOfTags = 3)
    {
        // Get all available tags for repository
        $tags = array_filter(explode("\n", $this->execute(array('tag'))));

        // Apply class level filter to version list
        $versions = array_filter($tags, $this->filter);

        // Apply class level sorter to version list
        usort($versions, $this->sorter);

        // If the number of versions exceeds the number of most recent tags to
        // generate, slice off only the number of tags allowed
        $versions = array_slice($versions, count($versions) - $numberOfTags);

        // For each tag/version, add to list to be generated
        foreach ($versions as $version) {
            $version = new Version($version);
            $version->setFrozen(true);
            $this->add($version);
        }

        return $this;
    }

}
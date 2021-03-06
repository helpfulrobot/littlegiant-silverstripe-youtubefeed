<?php

/**
 * Class YouTubeVideo
 *
 * Represents a video on YouTube
 */
class YouTubeVideo extends DataObject
{

    /**
     * @var array
     */
    private static $db = array(
        'Title' => 'Varchar(255)',
        'VideoID' => 'Varchar(255)',
        'Description' => 'Text',
        'Published' => 'SS_Datetime',
        'ChannelTitle' => 'Varchar(255)',
        'ChannelID' => 'Varchar(255)',
        'PlaylistID' => 'Varchar(255)',
        'ThumbnailURL' => 'Varchar(255)',
        'PlaylistPosition' => 'Int',
    );

    /**
     * @var array
     */
    private static $indexes = array(
        'VideoID' => true
    );

    /**
     * @var array
     */
    private static $summary_fields = array(
        'Title' => 'Title',
        'Description' => 'Description',
        'Published.Nice' => 'Published'
    );

    /**
     * @var string
     */
    private static $default_sort = "Published DESC";

    /**
     * Returns the URL where the video resides on YouTube
     *
     * @return string
     */
    public function getLink()
    {
        return 'https://www.youtube.com/watch?v=' . $this->VideoID;
    }

    /**
     * Looks up YouTubeVideo objects by VideoID, returns the first result
     *
     * @param $videoID
     * @return bool|DataList
     */
    public static function getExisting($videoID)
    {
        $video = YouTubeVideo::get()
            ->filter('VideoID', $videoID)
            ->first();

        return $video ? $video : false;
    }

}

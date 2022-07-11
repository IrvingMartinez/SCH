<?php

defined('_EXEC') or die;

class Route_vkye
{
    private $path;
    private $settings_url;

    public function __construct($path, $settings_url)
    {
        $this->path = $path;
        $this->settings_url = $settings_url;
    }

    public function on_change_start()
    {
        if ( isset($this->settings_url['onSession']) && $this->settings_url['onSession'] === 'hidden' )
        {
            if ( Functions::check_session() === true )
                header('Location: index.php');
        }

        if ( isset($this->settings_url['private']) && $this->settings_url['private'] === true )
        {
            if ( Functions::check_session() === false )
                header('Location: index.php');
        }
    }

    public function on_change_end()
    {
    }
}

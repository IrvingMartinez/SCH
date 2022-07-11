<?php
defined('_EXEC') or die;

class Placeholders_vkye
{
    private $buffer;
    private $format;

    public function __construct( $buffer )
    {
        $this->format = new Format();
        $this->buffer = $buffer;
    }

    public function run()
    {
        $this->buffer = $this->include_main_header();

        return $this->buffer;
    }

    private function include_main_header()
    {
        return $this->format->include_file( $this->buffer, 'main-header' );
    }
}

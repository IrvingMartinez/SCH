<?php
defined('_EXEC') or die;

class Pages_model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	public function get_user_info()
	{

		// if( is_null($data) )
		// return false;

		return $this->database->select(
			'entries',
			[
				'check_time'
			]
		);

		// return (isset($query[0]) && !empty($query[0]) ) ? $query[0] : null;
	}

}

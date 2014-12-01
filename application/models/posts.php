<?php
class Posts extends MY_Model{
	const DB_TABLE = 'posts';
	const DB_TABLE_PK = 'post_id';
	
	public $post_id;
	public $ad_id;
	public $title;
	public $message;
	public $dateTime;
}
?>
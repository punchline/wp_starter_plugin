<?php
/**
Plugin Name: Punchline 
Author: Mike Payne
Version: 1.0
*/

class ContentType {
	public $type;
	public $options = [];
	public $labels = [];

	public function __construct($type, $options = [], $labels = []) {
		$this->type = $type;

		$default_options = [
			'public' => true,
			'supports' => ['title', 'editor', 'thumbnail']
		];

		$required_labels = [
			'singular_name' => ucwords($this->type),
			'plural_name' => ucwords($this->type).'s'
		];

		$this->options = $options + $default_options;
		$this->labels = $labels + $required_labels;

		add_action('init', array($this, 'register'));
	}

	public function register() {
		register_post_type($this->type, $this->options);
	}

	public function default_labels() {
		return [
			'name' => $this->labels['plural_name'],
			'singular_name' => $this->labels['singular_name'],
			'add_new' => 'Add New ' . $this->labels['singular_name'],
			'add_new_item' => 'Add New ' . $this->labels['singular_name'],
			'edit' => 'Edit ' . $this->labels['singular_name'],
			'edit_item' => 'Edit ' . $this->labels['singular_name'],
			'new_item' => 'New ' . $this->labels['singular_name'],
			'view' => 'View ' . $this->labels['singular_name'] . ' Page',
			'view_item' => 'View ' . $this->labels['singular_name'],
			'search_items' => 'Search ' . $this->labels['plural_name'],
			'not_found' => 'No matching ' . $this->labels['plural_name'] . ' found',
			'not_found_in_trash' => 'No ' . $this->labels['plural_name'] . ' found in Trash',
			'parent_item_colon' => 'Parent ' . $this->labels['singular_name']
		];
	}
}

// $quotes = new ContentType('quote', [], ['plural_name'=>'Quotes']);

<?php

class QM_Collector_WPBP_Debug extends QM_Collector {
	/**
	 * Register with WordPress API on construct
	 */
	function __construct( $title, $parent ) {
		$this->title = $title;
		$this->parent = $parent;
		$this->id = strtolower( str_replace(' ', '_', $title ) );
	}

	public function name() {
		return $this->title;
	}

	public function process() {
		if ( is_array( $this->parent->output ) ) {
			$this->data['log'] = $this->parent->output;
		}
	}

}

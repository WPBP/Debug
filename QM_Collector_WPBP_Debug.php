<?php

class QM_Collector_WPBP_Debug extends QM_Collector {
	/**
	 * Register with WordPress API on construct
	 */
	function __construct( $title ) {
		$this->title = $title;
		$this->id = strtolower( str_replace(' ', '_', $title ) );
	}

	public function name() {
		return $this->title;
	}

	public function process() {
		$this->data['log'] = 123;
	}

}

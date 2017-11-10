<?php

class WPBP_Debug_Panel extends Debug_Bar_Panel {

	protected $history = array();

	/**
	 * Register with WordPress API on construct
	 */
	function __construct( $title ) {
		$this->title( $title );
	}

        /**
        * @return void
        */
	function render() {
		echo "<pre>";
		foreach ( $GLOBALS['WPBP_Debug'] as $debug ) {
			echo $debug;
		}
		echo "</pre>";
	}

        /**
        * 
        * @return void
        */
	function prerender() {
		if ( empty( $GLOBALS['WPBP_Debug'] ) ) {
			$this->set_visible( false );
		}
	}

}

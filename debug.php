<?php

/**
 * Provides interface for debugging variables with Query Monitor
 *
 * @author    Mte90 <mte90net@gmail.com>
 * @license   GPL-2.0+
 * @copyright 2018
 *
 */
if ( !class_exists( 'WPBP_Debug' ) ) {

	class WPBP_Debug {

		/**
		 * Check user cap and WP_DEBUG on init to see if class should continue loading
		 */
		function __construct( $title ) {
			if( class_exists('QM_Collectors') ) {
				require_once( 'QM_Collector_WPBP_Debug.php' );
				$this->title = $title;

				QM_Collectors::add( new QM_Collector_WPBP_Debug( $this->title, $this ) );
			}

			/**
			* Register output. The filter won't run if Query Monitor is not
			* installed so we don't have to explicity check for it.
			*/
			add_filter( 'qm/outputter/html', function(array $output, QM_Collectors $collectors) {
				include 'QM_Collector_WPBP_Debug_Output.php';
				if ( $collector = QM_Collectors::get( 'wpbp' ) ) {
					$output['wpbp'] = new QM_Collector_WPBP_Debug_Output( $collector, $this->output, $this->title );
				}
				return $output;
			}, 101, 2 );
		}

		/**
		 * Debugs a variable
		 * Only visible to admins if WP_DEBUG is on
		 * @param mixed  $var      The var to debug.
		 * @param bool   $die      Whether to die after outputting.
		 * @param string $function The function to call, usually either print_r or var_dump, but can be anything.
		 * @return mixed
		 */
		function log( $var, $die = false, $function = 'var_dump' ) {
			ob_start();
			if ( is_string( $var ) ) {
				echo $var . "\n";
			} else {
				call_user_func( $function, $var );
			}

			if ( $die ) {
				die();
			}

			$this->output[] = ob_get_clean();
		}

		/**
		 * Print in Query Monitor Log panel, check https://querymonitor.com/blog/2018/07/profiling-and-logging/
		 * @param mixed  $var  The var to debug.
		 * @param string $type The error type based on Query Monitor methods.
		 * @return mixed
		 */
		function qm_log( $var, $type ) {
			QM::$type( $var );
		}

		/**
		 * Timer in Query Monitor, check https://querymonitor.com/blog/2018/07/profiling-and-logging/
		 * @param mixed  $var  The var to debug.
		 * @param string $type The error type based on Query Monitor methods.
		 * @return mixed
		 */
		function qm_log( $id, $callback ) {
			// Start the timer:
			do_action( 'qm/start', $id );

			// Run some code
			call_user_func( $callback );

			// Stop the timer:
			do_action( 'qm/stop', $id );
		}

	}

}

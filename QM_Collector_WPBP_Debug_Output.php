<?php

class QM_Collector_WPBP_Debug_Output extends QM_Output_Html {
	public function __construct( QM_Collector $collector, $output, $title ) {
		parent::__construct( $collector );
		$this->output = $output;
		$this->title = $title;
		$this->id = strtolower( str_replace(' ', '_', $title ) );
		add_filter( 'qm/output/menus', array( $this, 'admin_menu' ), 101 );
		add_filter( 'qm/output/title', array( $this, 'admin_title' ), 101 );
		add_filter( 'qm/output/menu_class', array( $this, 'admin_class' ) );
	}

	/**
	* Outputs data in the footer
	*/
	public function output() {
		if ( is_array( $this->output ) ) {
			echo '<div class="qm" id="' . esc_attr($this->collector->id()) . '">';
			echo '<table cellspacing="0"><tbody>';
			foreach ( $this->output as &$single ) {
				echo "<tr><td>" . $single . "</td></tr>";
			}
			echo '</tbody></table>';
			echo '</div>';
		}
	}

	/**
	* Adds data to top admin bar
	*
	* @param array $title
	*
	* @return array
	*/
	public function admin_title( array $title ) {
		$data = $this->collector->get_data();
		if ( isset( $data['log'] ) ) {
			$title[] = $this->title . ' (' .	count( $data['log'] ) . ')';
		}
		return $title;
	}

	/**
	* @param array $class
	*
	* @return array
	*/
	public function admin_class( array $class ) {
		$class[] = $this->id;
		return $class;
	}

	public function admin_menu( array $menu ) {
		$data = $this->collector->get_data();
		if ( isset( $data['log'] ) ) {
			$menu[] = $this->menu( array(
				'id'    => $this->id,
				'href'  => '#qm-' . str_replace( '_', '-', $this->id),
				'title' => $this->title . ' (' .	count( $data['log'] ) . ')'
			));
		}
		return $menu;
	}

}

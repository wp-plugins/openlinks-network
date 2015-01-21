<?php

	// Start class openlinks_widget //
	
	class openlinks_widget extends WP_Widget {

	// Constructor //

		function openlinks_widget() {
			$widget_ops = array( 'classname' => 'openlinks_widget', 'description' => 'Network for sharing a free links' ); // Widget Settings
			$control_ops = array( 'id_base' => 'openlinks_widget' ); // Widget Control Settings
			$this->WP_Widget( 'openlinks_widget', 'Sharing a free links', $widget_ops, $control_ops ); // Create the widget
		}

	// Extract Args //

		function widget($args, $instance) {
			// global $wpdb, $user_identity, $user_ID, $bp, $current_user;
			extract( $args );
			global $wpdb, $user_identity, $user_ID, $current_user;
			$title 				= apply_filters('widget_title', $instance['title']); // the widget title
			$num				= isset($instance['num']) ? $instance['num'] : 3; //how links
			$align				= isset($instance['align']) ? $instance['align'] : 'vertical'; //how links			

	// Before widget //

			echo $before_widget;

	// Title of widget //

			if ( $title ) { echo $before_title . $title . $after_title; }

	// Widget output //
			echo '<script type="text/javascript">how="' . $num . '"; vid="' . $align . '"; </script><script type="text/javascript" src="//openlinks.urlpr.com/olinks.js"></script>';
	// After widget //

			echo $after_widget;
	}

	// Update Settings //

		function update($new_instance, $old_instance) {
			$instance['title'] = strip_tags($new_instance['title']);
			$instance['num'] = strip_tags($new_instance['num']);
			$instance['align'] = strip_tags($new_instance['align']);
			return $instance;
		}

	
	// Widget Control Panel //

		function form($instance) {

		$defaults = array( 'title' => 'OpenLinks Network', 'num' => 3, 'align' => 'vertical');
		$instance = wp_parse_args( (array) $instance, $defaults ); ?>

		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo 'Title'; ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('num'); ?>"><?php echo 'Number of links'; ?></label>
			<select id="<?php echo $this->get_field_id('num'); ?>" name="<?php echo $this->get_field_name('num'); ?>" class="widefat" style="width:100%;">
				<option value="3" <?php selected('3', $instance['num']); ?>>3</option>
				<option value="4" <?php selected('4', $instance['num']); ?>>4</option>
				<option value="5" <?php selected('5', $instance['num']); ?>>5</option>
				<option value="6" <?php selected('6', $instance['num']); ?>>6</option>
				<option value="7" <?php selected('7', $instance['num']); ?>>7</option>
				<option value="8" <?php selected('8', $instance['num']); ?>>8</option>
				<option value="9" <?php selected('9', $instance['num']); ?>>9</option>
				<option value="10" <?php selected('10', $instance['num']); ?>>10</option>
			</select>
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('align'); ?>"><?php echo 'Type of box'; ?></label>
			<select id="<?php echo $this->get_field_id('align'); ?>" name="<?php echo $this->get_field_name('align'); ?>" class="widefat" style="width:100%;">
				<option value="vertical" <?php selected('vertical', $instance['align']); ?>>vertical</option>
				<option value="horizontal" <?php selected('horizontal', $instance['align']); ?>>horizontal</option>
			</select>
		</p>
		<p>
			No payment, no registration is required, but if you want to track some statistics you must <a href="http://openlinks.urlpr.com" target="_blank">create an account</a> and log in!
		</p>
        <?php }

}

// End class openlinks_widget

add_action('widgets_init', create_function('', 'return register_widget("openlinks_widget");'));
?>
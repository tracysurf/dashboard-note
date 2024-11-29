<?php
/*
Plugin Name: Dashboard Note
Description: 📝 Adds a simple, editable note widget to the WordPress admin dashboard to display custom documentation and production notes. Ideal for reference information about classes, resources, production details, and other important data related to this theme or WordPress installation. 
Version: .5
Author: Tracy Mikulec
*/

// Function to add the dashboard widget
function dashboard_note_add_widget() {
	wp_add_dashboard_widget(
		'dashboard_note_widget',         // Widget slug.
		'Admin Notes',        			  // Title.
		'dashboard_note_display_widget'  // Display function.
		// No control function
	);
}
add_action( 'wp_dashboard_setup', 'dashboard_note_add_widget' );

// Function to display the widget content and handle editing
function dashboard_note_display_widget() {
	// Check if the user wants to edit the note
	if ( isset( $_GET['edit_note'] ) && current_user_can( 'edit_dashboard' ) ) {
		// Handle form submission
		if ( isset( $_POST['dashboard_note_content'] ) ) {
			// Verify nonce for security
			if ( ! isset( $_POST['dashboard_note_nonce'] ) || ! wp_verify_nonce( $_POST['dashboard_note_nonce'], 'dashboard_note_update' ) ) {
				wp_die( 'Security check failed' );
			}

			// Sanitize and save the content
			$note_content = wp_kses_post( $_POST['dashboard_note_content'] );
			update_option( 'dashboard_note_content', $note_content );

			// Redirect to avoid resubmission and return to view mode
			$redirect_url = remove_query_arg( 'edit_note' );
			wp_redirect( $redirect_url );
			exit;
		} else {
			// Display the form to edit the note
			$note_content = get_option( 'dashboard_note_content', '' );
			echo '<form method="post">';
			wp_nonce_field( 'dashboard_note_update', 'dashboard_note_nonce' );
			echo '<textarea name="dashboard_note_content" rows="5" style="width:100%; margin-bottom:10px;">' . esc_textarea( $note_content ) . '</textarea>';
			echo '<input type="submit" value="Save Note" class="button is-secondary">';
			echo ' <a href="' . esc_url( remove_query_arg( 'edit_note' ) ) . '" class="button">Cancel</a>';
			echo '</form>';
		}
	} else {
		// Display the note content
		$note_content = get_option( 'dashboard_note_content', '' );

		echo '<div style="padding-bottom:20px">';
		echo wp_kses_post( $note_content );
		echo '</div>';

		// Show the "Edit Note" button if the user has permission
		if ( current_user_can( 'edit_dashboard' ) ) {
			$edit_url = add_query_arg( 'edit_note', '1' );
			echo '<p><a href="' . esc_url( $edit_url ) . '" class="button">Edit Note</a></p>';
		}
	}
}

// Enqueue custom CSS for the dashboard widget
function dashboard_note_enqueue_admin_styles() {
	echo '<style>
		#dashboard_note_widget {
			background-color: #feff9c !important;
		}
		#dashboard_note_widget p {
			margin:0
		}
		#dashboard_note_widget .inside {
			padding: 10px;
			margin: 0
		}
		#dashboard_note_widget .inside h1, #dashboard_note_widget .inside h2, #dashboard_note_widget .inside h3, #dashboard_note_widget .inside h4, #dashboard_note_widget .inside h5, #dashboard_note_widget .inside h6 {
			padding: 0;
			margin: 10px 0 0;
		}
		#dashboard_note_widget .inside h1 {font-size:2rem}
		#dashboard_note_widget .inside h2 {font-size:1.8rem}
		#dashboard_note_widget .inside h3 {font-size:1.6rem}
		#dashboard_note_widget .inside h4 {font-size:1.4rem}
		#dashboard_note_widget .inside h5 {font-size:1.2rem}
		#dashboard_note_widget .inside h6 {font-size:1rem}
	</style>';
}
add_action( 'admin_head', 'dashboard_note_enqueue_admin_styles' );

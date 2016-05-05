<?php
add_action('admin_init', function() {
  if (!get_role('longforms_editor')) {
    // Add longforms editor role
    add_role('longforms_editor',
      'Longforms Editor',
      array(
        'read' => true,
        'edit_posts' => true,
        'delete_posts' => true,
        'publish_posts' => true,
        'upload_files' => true,
      )
    );
  }
  // Add the roles you'd like to administer the custom post types
  $roles = array('longforms_editor','administrator');
  // Loop through each role and assign capabilities
  foreach($roles as $the_role) {
    $role = get_role($the_role);
    $role->add_cap('read_longform');
    $role->add_cap('read_private_longforms');
    $role->add_cap('edit_longform');
    $role->add_cap('edit_longforms');
    $role->add_cap('edit_others_longforms');
    $role->add_cap('edit_published_longforms');
    $role->add_cap('publish_longforms');
    $role->add_cap('delete_others_longforms');
    $role->add_cap('delete_private_longforms');
    $role->add_cap('delete_published_longforms');
  }
    get_role($roles[0])->remove_cap('edit_posts');
});

<?php
/**
 * Add an option page
 */
if (is_admin()) { // admin actions
    add_action('admin_menu', 'swe_post_menu');
    add_action('admin_init', 'swe_post_register_settings');
}

function swe_post_register_settings()
{ // whitelist options
    register_setting('swe_post_group', 'swe_post_blog_today');
    register_setting('swe_post_group', 'swe_post_roles');
    register_setting( 'swe_post_group', 'swe_post_show_row');
}


function swe_post_menu()
{
    add_options_page('Swe Post', 'Swe Post', 'manage_options', 'swepost', 'swe_post_options');
}

function swe_post_options()
{

    if (current_user_can('edit_users') && (isset($_GET['settings-updated']) && $_GET['settings-updated'] == true)) {
        global $wp_roles;
        $roles = $wp_roles->get_names();

        $dp_roles = get_option('swe_post_roles');
        if ($dp_roles == "") $dp_roles = array();

        foreach ($roles as $name => $display_name) {
            $role = get_role($name);

            // role should have at least edit_posts capability
            if (!$role->has_cap('edit_posts')) continue;

            /* If the role doesn't have the capability and it was selected, add it. */
            if (!$role->has_cap('edit_posts') && in_array($name, $dp_roles))
                $role->add_cap('edit_posts');

            /* If the role has the capability and it wasn't selected, remove it. */
            elseif ($role->has_cap('edit_posts') && !in_array($name, $dp_roles))
                $role->remove_cap('edit_posts');
        }
    }

    ?>
    <div class="wrap">
        <div id="icon-options-general" class="icon32">
            <br>
        </div>
        <h2>
            SWE POSTS SETTING
        </h2>
    </div>

    <form method="post" action="options.php">
        <?php settings_fields('swe_post_group'); ?>

        <table class="form-table">

            <tr valign="top">
                <th scope="row">Control Posts show in Today Customer</th>
                <td><input type="checkbox" name="swe_post_blog_today"
                           value="1" <?php if (get_option('swe_post_today') == 1) echo 'checked="checked"'; ?>"/>
                    <span class="description">Make the post show/hide in Today Customer</span>
                </td>
            </tr>
            <tr valign="top">
                <th scope="row">Roles allowed to Edit
                </th>
                <td><div style="height: 100px; width: 300px; padding: 5px; overflow: auto; border: 1px solid #ccc">
                        <?php	global $wp_roles;
                        $roles = $wp_roles->get_names();
                        foreach ($roles as $name => $display_name): $role = get_role($name);
                            if ( !$role->has_cap('edit_posts') ) continue; ?>
                            <label style="display: block;"> <input type="checkbox" name="swe_post_roles[]" value="<?php echo $name ?>" <?php if($role->has_cap('edit_posts')) echo 'checked="checked"'?> /><?php echo translate_user_role($display_name); ?> </label>
                        <?php endforeach; ?>
                    </div> <span class="description"><?php _e("Warning: users will be able to copy all posts, even those of other users", DUPLICATE_POST_I18N_DOMAIN); ?>
				</span>
                </td>
            </tr>
            <tr valign="top">
				<th scope="row">Show links in </th>
				<td><label style="display: block"><input type="checkbox"
						name="swe_post_show_row" value="1" <?php  if(get_option('swe_post_show_row') == 1) echo 'checked="checked"'; ?>"/>
                        Post list </label>
				</td>
			</tr>

        </table>
        <p class="submit">
            <input type="submit" class="button-primary" value="Submit"/>
        </p>

    </form>
    </div>
    <?php
}

?>
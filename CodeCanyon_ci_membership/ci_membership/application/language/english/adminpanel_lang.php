<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// only used by admin controller (loaded in Admin_Controller.php)

// dash
$lang['dashboard_title'] = 'Dashboard';
$lang['dash_new_members_week'] = "New members <small class=\"fg-white\"><em>this week</em></small>";
$lang['dash_new_members_month'] = "New members <small class=\"fg-white\"><em>this month</em></small>";
$lang['dash_new_members_year'] = "New members <small class=\"fg-white\"><em>this year</em></small>";
$lang['dash_total_members'] = "Total member count";
$lang['dash_latest_members_title'] = "Latest members";

// backup & export
$lang['backup_and_export_title'] = 'Backup & export';
$lang['backup_title'] = "Backup your database";
$lang['backup_e-mail_text_title'] = 'Database backup';
$lang['backup_e-mail_text'] = "The database file is attached as zip file.";
$lang['backup_text'] = "This e-mail will be sent to the admin e-mail entered in site settings.";
$lang['backup_warning1'] = "WARNING 1: for very large databases this might not be possible and you will have to export directly from the MySQL command line.";
$lang['backup_warning2'] = "WARNING 2: you might want to take your MySQL server offline before backing up. Disable site login before doing this.";
$lang['export_title'] = "Export members list";
$lang['export_e-mail_text_title'] = 'Members list';
$lang['export_members_success'] = 'The members export has been sent.';
$lang['export_members_failed'] = 'The members export has failed!';
$lang['export_database_success'] = 'The database export has been sent.';
$lang['export_database_failed'] = 'The database export has failed!';

// roles
$lang['roles_title'] = "Roles";
$lang['roles_admin_noedit'] = "Never allowed to change admin role description.";
$lang['role_updated'] = "Role with id %s updated.";
$lang['roles_admin_nodelete'] = "Never allowed to delete admin role.";
$lang['roles_member_nodelete'] = "Never allowed to delete member role - is needed by system.";
$lang['role_removed'] = "Role and all links to it removed.";
$lang['role_added'] = "Role added.";
$lang['roles_admin_permissions_noedit'] = "Never allowed to change admin role permissions.";
$lang['role_permission_updated'] = "Role permissions updated.";
$lang['role_name'] = "Role name";
$lang['roles_description'] = "Description";
$lang['roles_warning'] = "Warning: deleting roles will also remove all associations to users and permissions.";
$lang['roles_btn_toggle'] = "Toggle roles";
$lang['roles_btn_save'] = "Save";
$lang['roles_btn_delete'] = "Delete";
$lang['roles_btn_save_roles'] = "Save roles";
$lang['roles_add_title'] = "Create";
$lang['roles_manage'] = "Manage";

// permissions
$lang['permission_description'] = "Description";
$lang['permission_order'] = "Order";
$lang['permission_create'] = "Create";
$lang['permission_manage'] = "Manage";
$lang['permission_warning'] = "Warning: deleting permissions will also remove all associations to users and roles.";
$lang['permission_system'] = "System";
$lang['permission_yes'] = "yes";
$lang['permission_no'] = "no";
$lang['permission_edit'] = "Edit";
$lang['permission_delete'] = "Delete";
$lang['permission_system_noedit'] = "System permissions can not be edited.";
$lang['permission_updated'] = "Permission with id %s updated";
$lang['permission_system_nodelete'] = "System permissions can not be deleted.";
$lang['permission_removed'] = "Permission and all links to it removed.";
$lang['permission_unable_add'] = "Unable to add permission.";
$lang['permission_created'] = "Permission %s created.";
$lang['permissions_btn_create'] = "Create";

// list members and member detail
$lang['last_login'] = 'Last login';
$lang['banned'] = "banned";
$lang['unbanned'] = "unbanned";
$lang['activated'] = "activated";
$lang['deactivated'] = "deactivated";

// list members
$lang['list_members'] = 'List members';
$lang['list_members_total'] = "Total members";
$lang['list_members_empty_search'] = 'Please enter some search data.';
$lang['list_members_search_member'] = "Search member";
$lang['list_members_search_expand'] = "expand";
$lang['list_members_search_collapse'] = "collapse";
$lang['list_members_search'] = "search";
$lang['list_members_no_results'] = "No results found.";
$lang['list_members_nothing_selected'] = "Nothing selected.";
$lang['list_members_activate'] = "activate account";
$lang['list_members_deactivate'] = "deactivate account";
$lang['list_members_ban'] = "ban account";
$lang['list_members_unban'] = "unban account";
$lang['list_members_toggle_ban'] = "Member with username %s ";
$lang['list_members_toggle_active'] = "Member with username %s ";
$lang['list_members_deleted'] = "Selected members deleted.";
$lang['list_members_banned'] = "Banned %s members.";
$lang['list_members_unbanned'] = "Unbanned %s members.";
$lang['list_members_nobody_banned'] = "Nobody was banned.";
$lang['list_members_nobody_unbanned'] = "Nobody was unbanned.";
$lang['list_members_nobody_activated'] = "Nobody was activated.";
$lang['list_members_nobody_deactivated'] = "Nobody was deactivated.";
$lang['list_members_activated'] = "Activated %s members.";
$lang['list_members_deactivated'] = "Deactivated %s members.";
$lang['list_members_admin_noban'] = 'Not allowed to ban main administrator account.';
$lang['list_members_admin_nodeactivate'] = 'Not allowed to deactivate main administrator account.';
$lang['list_members_delete'] = "Are you sure you want to delete those members?";
$lang['list_members_activate'] = "Are you sure you want to activate those members?";
$lang['list_members_deactivate'] = "Are you sure you want to deactivate those members?";
$lang['list_members_ban'] = "Are you sure you want to ban those members?";
$lang['list_members_unban'] = "Are you sure you want to unban those members?";
$lang['list_members_could_not_remove_file'] = 'Could not remove file - aborted at %s.';
$lang['list_members_deletion_failed'] = "Deletion failed - aborted at %s.";
$lang['list_members_failed_to_remove_member_dir'] = "Failed to remove member directory - aborted at %s.";

// member detail
$lang['member_detail'] = 'Member detail';
$lang['member_detail_date_registered'] = 'Date registered';
$lang['member_detail_updated'] = 'Member with username %s and ID %s updated.';
$lang['member_detail_viewing_member'] = 'Viewing member';
$lang['member_detail_send_copy'] = 'E-mail member about profile updates made here.';
$lang['member_detail_save'] = 'Save member data';
$lang['member_detail_edited_subject'] = 'Your account info was changed';
$lang['member_detail_edited_msg'] = "Your account has been edited by us, please visit your profile to view the changes. In case we have changed your password you will not be able to log on: in that case, use the reset password procedure. \r\n Kind regards - the admin";

// add member
$lang['add_member'] = 'Add member';

// contact member
$lang['contact_member_title'] = "Contact member";
$lang['contact_member_message'] = "Message to member: ";
$lang['contact_member_success'] = "Message was sent correctly.";

// oauth providers
$lang['provider_saved'] = "Provider saved.";
$lang['provider_deleted'] = "Provider deleted.";
$lang['provider_name'] = 'Name';
$lang['provider_enabled'] = 'Enabled';
$lang['provider_btn_add'] = 'Add provider';
$lang['provider_subtitle'] = 'The name must be exactly the same as the provider for example "Google", not "google+".';
$lang['provider_delete'] = 'Delete';
$lang['provider_save'] = 'Save';
$lang['provider_name'] = 'Name';
$lang['provider_client_id'] = 'Client ID';
$lang['provider_client_secret'] = 'Client secret';
$lang['provider_success_add'] = 'New provider added.';
$lang['provider_add_title'] = "Add new";

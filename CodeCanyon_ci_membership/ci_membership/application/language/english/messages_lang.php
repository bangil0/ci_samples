<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// autoloaded language entries are always available (loaded in config.php)

// profile
$lang['username'] = 'Username';
$lang['first_name'] = 'First name';
$lang['last_name'] = 'Last name';
$lang['personal_details'] = 'Personal details';
$lang['change_email'] = 'Change e-mail address';
$lang['password_required_for_changes'] = 'Enter your password before updating profile';
$lang['update_profile'] = 'Update profile';
$lang['current_password'] = 'Current password';
$lang['new_password'] = 'New password';
$lang['new_password_again'] = 'New password again';
$lang['send_copy_to_email'] = 'Send a copy of your new password to your e-mail?';
$lang['update_password'] = 'Update password';
$lang['my_profile'] = 'My profile';
$lang['profile_subject'] = 'Your new password';
$lang['profile_message'] = ",\r\n\r\nYour new password is: ";
$lang['delete_account_now'] = "Delete account";
$lang['permanently_delete_account'] = 'Permanently delete account - action can\'t be undone!';
$lang['profile_admin_nodelete'] = "Not allowed to delete administrator account.";
$lang['profile_remove_error'] = "Failed to remove your profile. Please try again or contact us.";
$lang['edit_password'] = 'Edit password';

// forgot username
$lang['forgot_username_title'] = 'Retrieve username';
$lang['forgot_username_subject'] = 'Your username';
$lang['forgot_username_message'] = ",\r\n\r\nSomeone (probably you) requested to send this account info:\r\n\r\nYour username: ";
$lang['forgot_username_success'] = 'A username has been sent to your e-mail address.';
$lang['send_username'] = 'Send username';

// password
$lang['password'] = 'Password';
$lang['password_confirm'] = 'Confirm password';
$lang['password_renew_title'] = 'Forgot password';
$lang['password_forgot_subject'] = 'Reset password requested';
$lang['password_forgot_message'] = ",\r\n\r\nThe password reset procedure was initiated. Please click the link below and receive a new password via e-mail.\r\n\r\n";
$lang['password_forgot_success'] = 'A password link has been sent to your e-mail address.';
$lang['password_btn_send'] = 'Send password';
$lang['password_reset_subject'] = 'New password created';
$lang['password_reset_message'] = ",\r\n\r\nYour new password is: ";
$lang['password_reset_success'] = 'A new password was sent to your e-mail address.';
$lang['password_reset_failed_db'] = 'Unable to reset password.';
$lang['password_reset_failed_token'] = 'Security token verification failed.';

// resend activation
$lang['resend_activation'] = 'Resend activation link';
$lang['resend_activation_subject'] = 'Activation required - resend';
$lang['resend_activation_message'] = ",\r\n\r\nsomeone (probably you) requested to resend your activation link. To activate your account please visit the link below (or copy-paste into your browser).";
$lang['resend_activation_success'] = 'Activation e-mail has been resent - please check the link in your mailbox to activate your membership.';

// login
$lang['login'] = 'Log in';
$lang['login_remember_me'] = 'Remember me';
$lang['login_incorrect'] = 'Login incorrect.';
$lang['login_disabled'] = 'Login has been disabled.';
$lang['max_login_attempts_reached'] = 'Max login attempts hard ceiling reached. Please contact us to unlock your account.';
$lang['logout'] = 'Log out';

// auth links
$lang['auth_renew'] = 'Renew password';
$lang['auth_retrieve'] = 'Retrieve username';
$lang['auth_resend'] = 'Resend activation link';

// register
$lang['register_unable'] = 'Unable to register - please try again later.';
$lang['register_required_fields'] = '(All fields are required)';
$lang['register_email_subject'] = 'Activation required';
$lang['register_email_message'] = ",\r\n\r\nThank you for registering with us. To activate your account please visit the link below (or copy-paste into your browser).";
$lang['register_success'] = 'Account created - please check the link in your mailbox to activate your membership.';
$lang['register_failed_db'] = 'Unable to register - please try again later.';
$lang['register_req_first_name'] = 'Requirements: </strong><br>2-40 characters.';
$lang['register_req_last_name'] = 'Requirements:</strong><br>2-60 characters.';
$lang['register_req_email'] = 'Requirements:</strong><br>please provide a valid email address.';
$lang['register_req_username'] = 'Requirements:</strong><br>6-16 characters;<br>the characters a-z, A-Z, 0-9, "_" and "-" are allowed.';
$lang['register_req_password'] = 'Requirements:</strong><br>9-64 characters;<br>use at least one non alphabet character;<br>user at least one number.';
$lang['register_req_password_2'] = 'Requirements:</strong><br>Must be the same as chosen password.';

// RecaptchaV2
$lang['recaptchav2_response'] = "I am not a robot";
$lang['recaptcha_class_initialized'] = 'reCaptcha Library Initialized';
$lang['recaptcha_no_private_key'] = 'You did not supply an API key for Recaptcha';
$lang['recaptcha_no_remoteip'] = 'For security reasons, you must pass the remote ip to reCAPTCHA';
$lang['recaptcha_socket_fail'] = 'Could not open socket';
$lang['recaptcha_html_error'] = 'Error loading security image. Please try again later';

// account
$lang['account_create'] = 'Create account';
$lang['account_is_active'] = 'Account is not active. Please activate your account first.';
$lang['account_activate'] = 'Please activate your account by clicking the link in the e-mail you received.';
$lang['account_updated'] = 'Updated your profile.';
$lang['account_not_updated'] = 'Could not update your account.';
$lang['account_active'] = 'Account is already active.';
$lang['account_created'] = 'Account has been created.';
$lang['account_not_found'] = 'Account not found.';
$lang['account_is_banned'] = "Account is banned. You can contact us for extra inquiries regarding this status to find out more.";
$lang['account_access_denied'] = 'Access has been denied for this account.';
$lang['account_error'] = "An error occured, please try again.";
$lang['account_activation_link_expired'] = "Account is found but this activation link has expired. Please <a href=\"". base_url() ."auth/resend_activation\">click here to request a new activation link</a>.";
$lang['account_activated'] = "Your account was activated.";

// email
$lang['email'] = "Email";
$lang['email_address'] = 'E-mail address';
$lang['your_email_address'] = 'Your e-mail address';
$lang['email_send_activation'] = 'Send activation e-mail';
$lang['email_not_found'] = 'E-mail address not found.';
$lang['email_greeting'] = 'Hello';

// form validation library
$lang['is_valid_email'] = 'Please enter a correct e-mail address.';
$lang['is_valid_password'] = 'The password field must contain at least one of these characters: $.[]|()?*+{}@#! AND must contain at least one number.';
$lang['is_valid_username'] = 'The username field can only contain a-z A-Z 0-9 _ and - characters.';
$lang['is_db_cell_available'] = 'That %s already exists in our database.';
$lang['is_db_cell_available_by_id'] = 'That %s already exists in our database.';
$lang['check_captcha'] = 'Verification code is incorrect (reCaptcha).';
$lang['is_member_password'] = 'Your password is incorrect';

// access
$lang['no_access'] = 'Access denied';
$lang['no_access_text'] = 'You are not authorized to view this page.';

// Oauth2
$lang['oauth2_invalid_state'] = "Invalid state.";
$lang['oauth2_no_provider_found'] = "No provider found in DB in oauth2 method.";
$lang['oauth2_invalid_token'] = 'Invalid or expired token.';
$lang['oauth2_load_userdata_failed'] = "Could not load userdata.";
$lang['oauth2_email_not_returned'] = "No email was returned. For some providers making your email public will help.";
$lang['oauth2_refresh_token_failed'] = 'Unable to refresh token, please try again.';
$lang['oauth2_finish_account_creation'] = "Finish account creation";
$lang['oauth2_not_active'] = 'Account is inactive - please contact an admin.';
$lang['oauth2_illegal_provider_name'] = "Illegal provider name.";
$lang['oauth2_illegal_provider_init'] = "Illegal provider initiation.";
$lang['oauth2_social_login_disabled'] = "Social login has been temporarily disabled.";
$lang['oauth2_choose_username'] = "Choose a username:";

// img folder
$lang['create_imgfolder_failed'] = "Problem creating image directory - check and create it manually in assets/img/members.";

// messaging headers
$lang['message_error_heading'] = "Please verify the following:";
$lang['message_success_heading'] = "Success!!";

// page not found
$lang['pnf_title'] = "Page not found";
$lang['pnf_error_404_title'] = "Error 404: page not found";
$lang['pnf_error_404_msg'] = "Our apologies, it seems there was a slight mishap.";
$lang['pnf_explanation'] = "It could be that the address you tried to reach is unavailable or that the page has moved.<br>Please <a href=\"". base_url() ."\">click here to return to the home page</a> and go from there.";

// other
$lang['site_disabled'] = 'Site has been disabled.';
$lang['illegal_input'] = "Illegal input detected.";
$lang['illegal_request'] = "Illegal request.";
$lang['yes'] = "Yes";
$lang['no'] = "No";
$lang['nothing_deleted'] = "Nothing deleted.";

// js
$lang['confirm_delete'] = "Are you sure to delete?";

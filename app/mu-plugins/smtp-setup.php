<?php
/*
Plugin Name: SMTP Setup
Plugin URI:  http://onfire.space/
Description: Setup PHPMailer SMTP settings
Version:     1.0.0
Author:      Space Onfire
Author URI:  http://onfire.space/
License:     MIT
*/

if (env('SSMTP_URI')) {
	add_action('phpmailer_init', function ($phpmailer) {
		$ssmtp = parse_url(env('SSMTP_URI'));
		if (!$ssmtp['scheme'] || !$ssmtp['host']) { return; }
		$phpmailer->Host = $ssmtp['host'];
		$phpmailer->Port = $ssmtp['port'] ?: 25;
		if (isset($ssmtp['user'])) {
			$phpmailer->Username = $ssmtp['user'];
		}
		if (isset($ssmtp['pass'])) {
			$phpmailer->Password = $ssmtp['pass'];
		}
	});
}

if (env('SSMTP_DEFAULT_FROM')) {
	add_filter('wp_mail_from', function ($from) {
		return PHPMailer::validateAddress(trim($from)) ? $from : env('SSMTP_DEFAULT_FROM');
	});
}

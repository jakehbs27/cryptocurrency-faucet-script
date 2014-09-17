<?php
/*
* Cryptocurrency faucet script
* You are completely free to use/modify this script in any way. Credit is not required.
*/

// Modify these settings to suit your needs.

$config = array(
    
    // e.g. Dogecoin
    "coinname" => "Coinname",
    
	// RPC settings:
	// These are the settings you put into e.g. dogecoin.conf. They allow the faucet to interact with your wallet
    "rpc_user" => "rpcuser",
	"rpc_password" => "rpcpassword",
	"rpc_host" => "rpchost",
	"rpc_port" => "rpcport",

	// MySQL settings:
    "mysql_user" => "db_user",
	"mysql_password" => "db_password",
	"mysql_host" => "localhost",
	"mysql_database" => "db_name", // faucet database name
	"mysql_table_prefix" => "sf_", // table prefix to use

	// Coin values:
	"minimum_payout" => 1, // minimum coins to be awarded
	"maximum_payout" => 6, // maximum coins to be awarded
	"payout_threshold" => 10, // payout threshold, if the faucet contains less coins than this, display the 'dry_faucet' message
	"payout_interval" => "1h", // payout interval, the wait time for a user between payouts. Type any numerical value with either a "m" (minutes), "h" (hours), or "d" (days), attached. Examples: 50m for a 50 minute delay, 7h for a 7 hour delay, etc.

    
    // Payment system:
	"stage_payments" => true, // stage payments in the database, to be executed later
	"stage_payment_account_name" => "", // account name to send transactions with, needs to be valid // you also can leave it empty
	"staged_payment_threshold" => 25, // staged payment threshold, all staged payments are executed when this number is reached
	"staged_payment_cron_only" => false, // ignore the stage_amount counter, only execute staged payments when the cron script is called
    
	// this option has 3 possible values: "ip_address", "coin_address", and "both". It defines what to check for when a user enters a coin address in order to decide whether or not to award coins to this user.
	// "ip_address": checks the user IP address in the payout history.
	// "coin_address": checks the user coins address in the payout history.
	// "both": check both the IP and coins address in the payout history.
	"user_check" => "both",

	"captcha" => "recaptcha",

	// enter your private and public reCAPTCHA key here:
	    "captcha_config" => array(
		"private_key" => "privatekey",
		"public_key" => "publickey"
		),

    
    // proxy filter:
	"filter_proxies" => true, // whether to filter proxies or not. It's up to you to fill the proxy ban table. (see also the tor node cron job in ./lib/proxy_filter/cron/tor.php)
	"proxy_filter_use_faucet_database" => false, // whether the proxy filter should use the faucet database connection or not. (if set to false, the proxy filter will connect to the database set in ./lib/proxy_filter/config.php)
    
    // promo codes:
	"use_promo_codes" => true, // accept promo codes

    
	// if the wallet is encrypted, enter the PASSPHRASE here. Leave it blank otherwise!
	"wallet_passphrase" => "",

	// Donation address:
	"donation_address" => "DTiUqjQTXwgZfvcTcdoabp7uLezK47TPkN", // donation address to display

	// Faucet look and feel:
	"title" => "Cryptocurrency faucet script", // page title, may be used by the template too
	"template" => "default" // template to use (see the templates directory)
	);


// Do not change this.
defined("SIMPLE_FAUCET") || header(".");
?>
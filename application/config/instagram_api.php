<?php

/*
|--------------------------------------------------------------------------
| Instagram
|--------------------------------------------------------------------------
|
| Instagram client details
|
*/

$config['instagram_client_name']	= 'whereit';
$config['instagram_client_id']		= '579d1943ab7c473e8bdec2a46ac08344';
$config['instagram_client_secret']	= '8f9296820ed54b8dbde115319a9fb6a3';
$config['instagram_callback_url']	= 'http://whereit.com/authorize/get_code';//e.g. http://yourwebsite.com/authorize/get_code/
$config['instagram_website']		= 'http://whereit.com/';//e.g. http://yourwebsite.com/
$config['instagram_description']	= '';
	
/**
 * Instagram provides the following scope permissions which can be combined as likes+comments
 * 
 * basic - to read any and all data related to a user (e.g. following/followed-by lists, photos, etc.) (granted by default)
 * comments - to create or delete comments on a user’s behalf
 * relationships - to follow and unfollow users on a user’s behalf
 * likes - to like and unlike items on a user’s behalf
 * 
 */
$config['instagram_scope'] = '=basic+public_content+follower_list+comments+relationships+likes';

// There was issues with some servers not being able to retrieve the data through https
// If you have this problem set the following to FALSE 

$config['instagram_ssl_verify']		= TRUE;

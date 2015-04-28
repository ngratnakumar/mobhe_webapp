<?php
// My common functions
function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}

function asset_url()
{
	return URL::to('/');
}

function web_url()
{
	return URL::to('/');
}

function admin_asset_url()
{
	return URL::to('/').'/admin_asset/';
}

function upload_image($file){
	$file_name = time();
	$file_name .= rand();
    $ext =  $file->getClientOriginalExtension();
    $file->move(public_path()."/uploads",$file_name.".".$ext);
    $local_url = web_url()."/uploads/".$file_name.".".$ext;
    return $local_url;
}
?>
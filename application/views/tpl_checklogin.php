<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if(!isset($_SESSION['userid']))
{
	header('Location: '.base_url().'/admin/');
}
elseif($_SESSION['role']=="parent" || $_SESSION['role']=="clinical" || $_SESSION['role']=="teacher")
{
	header('Location: '.base_url().'/informant/');
}
?>

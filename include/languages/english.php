<?php

function lang($phrase)
{
	$lang= array(

			'HOME'        =>  'Home',
			'CATAGORIES'  =>  'Catagories',
			'ITEMS'       =>  'Items',
			'MEMBERS'     =>  'Members',
			'STATISTICS'  =>  'Statistcs',
			'LOGS'        =>  'Logs',
			'LOGOUT'      =>  'Log out',
			'EDITPRO'     =>  'Edit Profile',
			'SETTINGS'    =>  'Settings',
			'COMMENT'     =>  'Comment'
	);
	return $lang[$phrase];
}



?>
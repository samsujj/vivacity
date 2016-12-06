<?php
error_reporting(E_ALL);


//CONFIGURE
$HOST = trim(`hostname`);
$USER = 'vivacity';
$DBPASS = 'KutFixx_9_2itT';
$SITEBLURB = 'KutFnL3_quenElKutF'; //18 Characters

$DBUSER = $USER.'_dba';
$DBDATABASE = $USER.'_ai';

//REPLACEMENT ARRAY
$REPS=array(
	'[[REWRITEBASE]]' => '/~'.$USER.'/',
	'[[SITE_BLURB_KEY]]' => $SITEBLURB, 
	'[[DB_USERNAME]]' => $DBUSER,
	'[[DB_PASSWORD]]' => $DBPASS,
	'[[DB_DATABASE]]' => $DBDATABASE,
	'[[DEFAULT_HTTP_URL]]' => 'http://'.$HOST.'/~'.$USER.'/',
	'[[DEFAULT_HTTPS_URL]]' => 'https://'.$HOST.'/~'.$USER.'/',
);




//BEGIN

//ENFORCE REQUIREMENTS
echo "\n";
if(!chdir(dirname(__FILE__))) die('Cannot chdir to current directory');
if(!file_exists('INSTALL')) die('No install file!');

//checkout the files
if(!is_dir('includes')) {
	echo "\nPerform Checkout...\n";
	//PERFORM BASE CHECKOUT
	//exec('svn checkout http://svn.apogeegate.com/base_site/backbone ./');
	//REMOVE SVN FOLDERS
	exec('find . -type d -name .svn -exec rm -rf {} \;');
}

//PERFORM REPLACEMENTS
echo "\nPerform Replacements...\n";
$files = array('.htaccess', 'includes/config/config.php');
foreach($files as $fn) { file_put_contents($fn,    str_replace(array_keys($REPS),$REPS,file_get_contents($fn))   ); }


//CREATE MYSQL DATABASE & USER
echo "\nCreate Database...\n";
exec('mysql --execute="CREATE DATABASE '.$DBDATABASE.'_ai;"');
exec("mysql --execute=\"GRANT ALL ON $DBDATABASE.* to '$DBUSER'@'localhost' identified by '$DBPASS';\"");


//FIX OWNERSHIP & PERMISSIONS
exec("chmod 755 /home/$USER");

exec("chown -R $USER:nobody *");

exec("find ./tmp -type d -exec chmod 775 {} +");
exec("find ./tmp -type f -exec chmod 664 {} +");

exec("find ./uploads -type d -exec chmod 775 {} +");
exec("find ./uploads -type f -exec chmod 664 {} +");

exec("find ./system -type d -exec chmod 775 {} +");
exec("find ./system -type f -exec chmod 664 {} +");

echo "\n\nNOW RUN SITE INSTALLER: http://$HOST/~$USER/";
echo "\nTHEN REMOVE 'INSTALL' FILE.\n\n";


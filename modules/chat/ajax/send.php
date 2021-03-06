<?php
/*---------------------------------------------------------------+
| eXtreme-Fusion - Content Management System - version 5         |
+----------------------------------------------------------------+
| Copyright (c) 2005-2012 eXtreme-Fusion Crew                	 |
| http://extreme-fusion.org/                               		 |
+----------------------------------------------------------------+
| This product is licensed under the BSD License.				 |
| http://extreme-fusion.org/ef5/license/						 |
+---------------------------------------------------------------*/
try
{
	require_once '../../../system/sitecore.php';
	if ($_request->post('send')->show() == 'send' && $_request->post('content')->show() != '' && $_user->iUser())
	{
		$result = $_pdo->exec('INSERT INTO [chat_messages] (`user_id`, `content`, `datestamp`) VALUES ('.$_user->get('id').', :content, '.time().')',array(
			array(':content', $_request->post('content')->filters('trim', 'strip'), PDO::PARAM_STR)
		));
	}
	
	if ($_request->post('send')->show() == 'edit' && $_request->post('content')->show() != '' && $_user->iAdmin())
	{
		$result = $_pdo->exec('UPDATE [chat_messages] SET `content` = :content WHERE `id` = :id', array(
			array(':content', $_request->post('content')->filters('trim', 'strip'), PDO::PARAM_STR),
			array(':id', $_request->post('post_id')->show(), PDO::PARAM_INT)
		));
	}
	
}
catch(optException $exception)
{
    optErrorHandler($exception);
}
catch(systemException $exception)
{
    systemErrorHandler($exception);
}
catch(userException $exception)
{
    userErrorHandler($exception);
}
catch(PDOException $exception)
{
    PDOErrorHandler($exception);
}
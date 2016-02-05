<?php
function call($controller, $action){
	//require the file that matches the controller name
	require_once('controllers/'.$controller.'_controller.php');
	//create a new instance of the needed controller
	switch($controller){
		case'pages':
			$controller = new PagesController();
		break;
		//we need the model to query the db later in the controller
		case 'posts':
			require_once('models/post.php');
			$controller=new PostsController();
		break;
	}
	//call the action
	$controller->{$action}();
}
	//list of controlelrs we have and their actions
	$controllers = array('pages'=>['home','error'],
						'posts'=>['index','show']);
	//check if the requestion controller and action are both allowed
	if(array_key_exists($controller, $controllers)){
		if(in_array($action, $controllers[$controller])){
			call($controller,$action);
		}else{
			call('pages','error');
		}
	}else{
		call('pages','error');
	}

?>
<?php
class PostsController{
	//lists all posts
	public function index(){
		//store all the posts in  variable
		$posts = Post::all();
		require_once('views/posts/index.php');
	}
	//shows one post with passed id
	public function show(){
		if(!isset($_GET['id']))
			return call('pages','error');

		//use id to get the right post
		$post = Post::find($_GET['id']);
		require_once('views/posts/show.php');
	}
}

?>
<?php
class Post{
	//we define 3 attributes
	public $id;
	public $author;
	public $content;

	public function __construct($id,$author,$content){
		$this->id = $id;
		$this->author = $author;
		$this->content = $content;
	}
//Retrieves all posts from DB
	public static function all(){
		$list = [];
		$db = Db::getInstance();
		$req = $db->query('SELECT * FROM posts');

		//create a list of Post objects
		foreach($req->fetchAll() as $post){
			$list[] = new Post($post['id'],$post['author'],$post['content']);
		}
		return $list;
	}

//finds a Post with specific ID from DB
	public static function find($id){
		$db = Db::getInstance();
		//make sure id is an integer
		$id = intval($id);
		$req = $db->prepare('SELECT * FROM posts WHERE id = :id');
		//query prepd, now bind id with actual value
		$req->execute(array('id'=>$id));
		$post = $req->fetch();

		return new Post($post['id'],$post['author'],$post['content']);
	}

}
?>
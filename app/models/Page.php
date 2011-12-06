<?php
class Page extends Model {

  function __construct($id=0, $table='pages') {
    $this->id = $id;
	$this->pkname = 'id';
	$this->tablename = $table;
	parent::__construct('pages.sqlite',  $this->pkname, $this->tablename); //primary key = id; tablename = pages
    $this->rs['id'] = '';
    $this->rs['title'] = '';
    $this->rs['content'] = '';
    $this->rs['path'] = '';
    $this->rs['date']= '';
    $this->rs['tags']= '';
    $this->rs['template']= '';
    if ($id)
      $this->retrieve($id);
  }

  function create() {
    $this->rs['date']=date('Y-m-d H:i:s');
    return parent::create();
  }

  function update() {
    $this->rs['date']=date('Y-m-d H:i:s');
    return parent::update();
  }

  function get_page_from_path( $uri ) {
    $dbh= $this->getdbh();
    $sql = 'SELECT * FROM "pages" WHERE "path"="'. $uri . '" LIMIT 1';
    $results = $dbh->prepare($sql);
    //$results->bindValue(1,$username);
    $results->execute();
    $page = $results->fetch(PDO::FETCH_ASSOC);
    if (!$page)
      return false;
    foreach ($page as $k => $v)
      $this->set($k,$v);
    return true;
  }


  static function register($id, $key=false, $value="") {
	  
	
	// stop if variable already available
	//if(array_key_exists($table, $GLOBALS['pages']) && array_key_exists($key, $GLOBALS['pages'][$table])) return false;
	
	$page = new Page();
	$dbh= $page->getdbh();
    
	// check if the pages table exists
	$sql = "SELECT name FROM sqlite_master WHERE type='table' and name='pages'";
    $results = $dbh->prepare($sql);
    $results->execute();
    $table = $results->fetch(PDO::FETCH_ASSOC);
	
	// then check if the table exists
	if(!is_array($table)){
		$page->create_table("pages", "id,title,content,path,date,tags,template");
		
	}
	
	$sql = "SELECT * FROM 'pages' WHERE id='$id'";
    $results = $dbh->prepare($sql);
    $results->execute();
    $pages = $results->fetch(PDO::FETCH_ASSOC);
	
	// just create the key
	if( !$pages ) {
		$newpage = new Page();
		$newpage->set('id', "$id");
		if($key)
			$page->set("$key", "$value");
		$newpage->create();
		
	} else {
		if($key)
			$mypage = new Page($id);
			$mypage->set("$key", "$value");
			$mypage->update();
	}
			
  }

}
?>
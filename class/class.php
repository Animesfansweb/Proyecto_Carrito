<?php

$web = "http://animeid.ciberanime.net";
$titulopri = "CiberAnime";
$tituloweb = "CiberAnime.Net";
$twitter = "https://www.facebook.com/CiberAnimeHD";
$facebook = "https://www.facebook.com/CiberAnimeHD";
$rss = "http://feeds.feedburner.com/CiberAnime/";
$Ximg = "http://ciberanime.net/img/imgfb.jpg";
$descripcion = "En esta pagina encontraras Anime Online Gratis, así que podras disfrutar de Anime Online, sin ninguna clase de restricción. Naruto Shippuden | Bleach | One Piece | Fairy Tail | Ao no Exorcist";

session_start();
//User Log out
if(!empty($_GET['salir'])){
	session_unregister("user_zero");
	session_destroy();
	//devuelvo al usuario al formulario
	header("Location: index.php");
}

class Carrito {
//creamos las variables
	private $n;
	private $f;
        private $e;
	private $dbh;
//definimos las variables
	public function __construct(){
		$this->n=array();
		$this->f=array();
                $this->e=array();
		$this->dbh= new PDO('mysql:host=sql23.main-hosting.eu;dbname=u655770423_a', 'u655770423_b', 'cK0Y9ZPkgzGH');
        //$this->dbh= new PDO('mysql:host=amazonebay-mysqldbserver.mysql.database.azure.com;dbname=contactw_ecommerce', 'mysqldbuser@amazonebay-mysqldbserver', 'Universidad2018');
	}
//Tildes en español
	private function set_names(){
		return $this->dbh->query("SET NAMES 'latin1'");
	}


    //Listar todas las Categorias index
        public function lista_categorias(){
		self::set_names();
		$sql="SELECT * FROM ct_categoria ORDER BY nombre";
		foreach($this->dbh->query($sql) as $row) {
			$this->n[]=$row;
		}
		$this->dbh=null;
		return $this->n;
	}

//Listar 3 Categorias index
        public function lista_3_categorias(){
		self::set_names();
		$sql="SELECT * FROM ct_categoria ORDER BY hits desc limit 0,3";
		foreach($this->dbh->query($sql) as $row) {
			$this->n[]=$row;
		}
		$this->dbh=null;
		return $this->n;
	}
    }

?>

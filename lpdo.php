<?php


class lpdo
{
	public $bdd;
	public $lastquery=false;
	public $lastresult=false;

	
	

function __construct($host, $username, $password, $db)
{
   
 	$bdd=mysqli_connect( $host , $username, $password, $db);
    $this->bdd=$bdd;

}

public function connect($host, $username, $password, $db)
{
	
	mysqli_close($this->bdd);
	$bdd=mysqli_connect($host , $username, $password, $db);
	$this->bdd=$bdd;

}

function execute($query)
{
	$bdd=$this->bdd;
	$req="".$query."";
	$rep=mysqli_query($bdd, $req);
	$tab=mysqli_fetch_array($rep);
	
	$this->lastquery=$req;
	$this->lastresult=$tab;
	return(var_dump($tab));


}

public function close()
{

	mysqli_close($this->bdd);
}

public function getLastQuery()
{
	return(var_dump($this->lastquery));
}

public function getLastResult()
{
	return(var_dump($this->lastresult));
}

public function getTables()
{
	$table=[];
	$bdd=$this->bdd;
	$req1="SHOW TABLES";
	$rep1=mysqli_query($bdd, $req1);
	
	while($tab1=mysqli_fetch_array($rep1))
	{
	array_push($table, $tab1['Tables_in_classes']);
	}
	return(var_dump($table));
}

public function getFields($table)
{
	$field=[];
	$bdd=$this->bdd;
	$req2="SHOW COLUMNS FROM $table";
	$rep2=mysqli_query($bdd, $req2);


	while($tab2=mysqli_fetch_array($rep2))
	{
		array_push($field, $tab2['Field']);
	}

	return(var_dump($field));
}

function __destruct()
{
   mysqli_close($this->bdd);
}



}


$user = new lpdo('localhost','root','','classes');


// $user->connect('localhost','root','','classes');

// $user->close();


$user->execute("SELECT login FROM users");
// $user->getLastQuery();
// $user-> getLastResult();
// $user->getTables();
$user->getFields('users');
?>
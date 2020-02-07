<?php

try {
	$base = new PDO('mysql:host=localhost;dbname=classes', 'root', '',
		array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>
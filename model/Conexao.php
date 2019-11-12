<?php
require_once 'Config.php';

class Conexao {
	private static $pdo;

	public static function ConexaoDB() {
		if (!isset(self::$pdo)) {
			try {
				self::$pdo = new PDO("mysql:host=".HOST. ";dbname=".DB , USER, PASS);
				self::$pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
				self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				
			} catch (PDOException $e) {
				echo "Erro no DB ".$e->getMessage();
			}
		}
		return self::$pdo;
	}

	public function prepare($sql) {
		return self::ConexaoDB()->prepare($sql);
	}

}
$connect = new PDO("mysql:host=localhost;dbname=sistemamedico", "root", "");
?>
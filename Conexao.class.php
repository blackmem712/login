<?php
  try {
            if (!(defined('db_user'))) {
                define('db_user', 'root');
            }
            if (!(defined('db_host'))) {
                define('db_host', 'localhost');
            }
            if (!(defined('db_pass'))) {
                define('db_pass', '');
            }
            if (!(defined('db_name'))) {
                define('db_name', 'login');
            }
            if (!(defined('db_port'))) {
                define('db_port', 3307);
            }

        
        $db = new mysqli(db_host,db_user,db_pass,db_name,db_port);
        
    }
    catch(mysqli_sql_exception $e)
        {
          echo 'problema ao conectar o banco de dados';
          $e ->getMessage();
        }

    
?>
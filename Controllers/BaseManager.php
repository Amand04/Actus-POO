<?php

class BaseManager
{
    // Attributs 
    protected $pdo;

    // Méthode
    public function __construct()
    {
        $dbName = 'actu'; // Nom de la BDD
        $dbHost = 'localhost'; // Nom de l'hôte
        $port = '3307'; // ou '8889' 
        $dbUsername = 'root'; // Nom d'utilisateur MySQL
        $dbUserPassword = 'root'; // Mot de passe MySQL




        try {
            $this->setPdo(new PDO(
                "mysql:host=$dbHost;dbname=$dbName;port=$port",
                $dbUsername,
                $dbUserPassword
            ));
        } catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Get the value of pdo
     */
    public function getPdo()
    {
        return $this->pdo;
    }

    /**
     * Set the value of pdo
     *
     * @return  self
     */
    public function setPdo($pdo)
    {
        $this->pdo = $pdo;
        return $this;
    }
}

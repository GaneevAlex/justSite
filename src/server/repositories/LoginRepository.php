<?php

class LoginRepository {
    public function getTable () {
        return 'site.logins';
    }

    public function save ($login, $password) {
        $result = false;

        if (!$this->findByLogin($login)) {
            $query = "INSERT INTO {$this->getTable()} (login, password) VALUES ('$login', '$password')";
            $result = !!pg_query($query);
        }

        return $result;
    }

    public function findByLogin ($login) {
        $query = "SELECT * FROM {$this->getTable()} WHERE login=$1";
        return pg_fetch_array(pg_query_params($query, array($login)));
    }

    public function findAll () {
        $query = "SELECT * FROM {$this->getTable()} ORDER BY login ASC";
        return pg_fetch_all(pg_query($query));
    }
}
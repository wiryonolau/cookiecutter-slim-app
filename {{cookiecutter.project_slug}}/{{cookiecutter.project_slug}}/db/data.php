<?php
use Laminas\Db\Sql\Insert;

return [
    function() {
        $insert = new Insert("user");
        $insert->columns(["username", "email", "password"]);
        $insert->values(["admin", "admin@gmail.com", "888888"]);
        return $insert;
    },
    function() {
        $insert = new Insert("user");
        $insert->columns(["username", "email", "password"]);
        $insert->values(["supervisor", "supervisor@gmail.com", "888888"]);
        return $insert;
    }
];

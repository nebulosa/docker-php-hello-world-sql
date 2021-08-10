
<?php

class Libros
{

    function getLibros($sql)
    {
        $res = [];
        $query="SELECT * from libros";
        $resul = $sql->ExecQuery($query);

        $results = array();
        while ($result = $sql->FetchArray($resul)) {
            $results[] = $result;
        }

        return (array) $results;

    }
}

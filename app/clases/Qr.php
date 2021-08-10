<?php

class Qr 
{
    function saveQr($sql, $image , $hash)
    {
        $query="INSERT INTO qr(image, hash) 
                VALUES('$image', '$hash')";

        $sql->ExecQuery($query);

        $query="SELECT LAST_INSERT_ID() as id;";

        $resul = $sql->ExecQuery($query);

        $results = array();
        while ($result = $sql->FetchArray($resul)) {
            $results[] = $result;
        }

        return (array) $results;

    }

    function getQrGeneradoById($sql, $id)
    {
        $res = [];
        $query="SELECT pivot.id, qr.image, pivot.condicion, libros.name, encuesta.name as encuesta, pregunta_encuesta.id as pregunta_id, pregunta_encuesta.pregunta from pivot 
        inner join qr on pivot.code_id = qr.id
        inner join libros on libros.id = pivot.libro_id
        inner join encuesta on encuesta.libro_id = libros.id
        inner join pregunta_encuesta on pregunta_encuesta.encuesta_id = encuesta.id
        where qr.hash = '$id'
        order by pregunta_encuesta.id";

        $resul = $sql->ExecQuery($query);

        $results = array();
        while ($result = $sql->FetchArray($resul)) {
            $results[] = $result;
        }

        return (array) $results;
    }


    function getRespuestasById($sql, $id)
    {
        $res = [];
        $query="SELECT id, opcion, respuesta from respuesta_encuesta
        where pregunta_id = '$id'";

        $resul = $sql->ExecQuery($query);

        $results = array();
        while ($result = $sql->FetchArray($resul)) {
            $results[] = $result;
        }

        return (array) $results;
    }


    function setEncuestaById($sql, $id)
    {
            $query = "UPDATE pivot 
            SET condicion = 1
			WHERE id = ".$id;

        $sql->ExecQuery($query);
    }

    function getQrGenerados($sql)
    {
        $res = [];
        $query="SELECT pivot.id, qr.image, pivot.condicion, libros.name from pivot 
        inner join qr on pivot.code_id = qr.id
        inner join libros on libros.id = pivot.libro_id";

        $resul = $sql->ExecQuery($query);

        $results = array();
        while ($result = $sql->FetchArray($resul)) {
            $results[] = $result;
        }

        return (array) $results;
    }

    function getEncuesta($sql, $imageId, $bookId )
    {
        $query="SELECT id from encuesta where libro_id=".$bookId;
        $resul = $sql->ExecQuery($query);

        $results = array();
        while ($result = $sql->FetchArray($resul)) {
            $results[] = $result;
        }

        return $this->saveQrByBook($sql, $imageId, $bookId, $results[0]['id'] );

    }

    function saveQrByBook($sql, $imageId, $bookId, $encuestaId){

        $query="INSERT INTO pivot(libro_id,encuesta_id,code_id) 
                VALUES($bookId, $encuestaId, $imageId)";

        $sql->ExecQuery($query);

        $query="SELECT LAST_INSERT_ID() as id;";

        $resul = $sql->ExecQuery($query);

        $results = array();
        while ($result = $sql->FetchArray($resul)) {
            $results[] = $result;
        }

        return (array) $results;

    }

}
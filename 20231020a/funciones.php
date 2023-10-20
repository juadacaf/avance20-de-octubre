<?php

/**
 * Esta fucnion ConsultarPersona de encarga de consultar y mostra las personas 
 * de una base de datos.
 * @return texto los datos de las personas de una base de datos.
 * @param into un numero de identificar de la persona.
 * @param varchar password del usuario.
 */

function mostrar($u = null,$c = null ){
    //inicializa la variable
    $salida="";
    //conecta a una base de datos
    $conexion = mysqli_connect('localhost','root','','db_pro');
    //es una suma de una base de datos 
    $sql=" SELECT * from tb_usuarios ";
    if($u != null )  $sql .= "where id_usuario='$u' ";//para mostrar un usuario
    if($c != null )  $sql .= " and usuario_contrasena='$c'";//para mostrar un usuario con contraseña
    //da el resultado 
    $imprimir= $conexion->query($sql);
    //es para que muestre el resultado
    while($fila = $imprimir->fetch_assoc()) {
        $salida .= $fila['id_usuario']. "  ";//fila de documento
        $salida .= $fila['usuario_nombre']."  ";//fila del nombre
        $salida .= $fila['usuario_correo']. "  ";//fila del correo
        $salida .= $fila['usuario_contrasena']. "  ";//fila de la contraseña
        $salida .= $fila['categoria_nombre']. "  ";//fila de la categoria
         }
    //cierra la conexion
    $conexion->close();

    //retorna la función
     return $salida;
}

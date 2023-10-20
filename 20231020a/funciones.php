<?php

/**
 * Esta fucnion ConsultarPersona de encarga de consultar y mostra las personas 
 * de una base de datos.
 * @param into un numero de identificar de la persona.
 * @param varchar password del usuario.
 * @param varchar contar 
 * @return texto los datos de las personas de una base de datos.
 */
function mostrar($u = null,$c = null,$p = null)
{
    $conexion = mysqli_connect('localhost','root','','db_pro');// conexion a la base de batos
    $salida = "";// inicialisar la variable de saliad 
    $sql = "select * from tb_usuarios ";// sql 
    if($u != null )  $sql .= "where id_usuario='$u' ";//para mostrar un usuario
    if($c != null )  $sql .= " and usuario_contrasena='$c'";//para mostrar un usuario con contraseña
    if($p != null) $sql = "select count(*) as contar from tb_usuarios";//nuevo sql para hacer el conteo
    $resultado = $conexion->query($sql);//ejecucion del sql
    if($resultado->num_rows > 0)
    {
        if($sql != "select count(*) as contar from tb_usuarios")//cuando $sql sea diferente  de $p 
        // va ha mostar el codigo toda la tabla de la base de datos
        {
            while($fila = $resultado->fetch_assoc())//ciclo para mostrar en pantalla
            {
                //muestra todos los campos de la base de datos 
                $salida .= $fila['id_usuario']. "  ";//fila de documento
                $salida .= $fila['usuario_nombre']."  ";//fila del nombre
                $salida .= $fila['usuario_correo']. "  ";//fila del correo
                $salida .= $fila['usuario_contrasena']. "  ";//fila de la contraseña
                $salida .= $fila['categoria_nombre']. "  ";//fila de la categoria
            }
            
        }else{//si el $sql no es diferente va ha mostar el conteo de las perosnas 
            
            while($fila = $resultado->fetch_assoc())//ciclo para mostrar en pantalla
            {
                //muestra un conteo
                $salida .= $fila['contar']."<br> ";
            }
        }
        
    $conexion->close();//finalizar conexion 
    }else {
        $salida .= "LA DEFECASTE";// un mensaje de error
    }
    
    return $salida; //retornar salida 
}




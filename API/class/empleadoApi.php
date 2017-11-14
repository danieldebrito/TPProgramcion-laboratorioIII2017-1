<?php
require_once 'empleado.php';
require_once 'IApi.php';

class empleadoApi extends empleado implements IApi
{
 	public function TraerUno($request, $response, $args) {
     	$id=$args['id'];
    	$elEmp=empleado::TraerUnEmpleado($id);
     	$newResponse = $response->withJson($elEmp, 200);  
    	return $newResponse;
	}
	
	public function TraerTodos($request, $response, $args) {
      	$todosLosCds=empleado::TraerTodoLosEmpleados();
     	$newResponse = $response->withJson($todosLosCds, 200);  
    	return $newResponse;
	}
	
	public function CargarUno($request, $response, $args) {
		$ArrayDeParametros = $request->getParsedBody();
	
        $miEmp = new empleado();
		$miEmp->nombre=$ArrayDeParametros['nombre'];
		$miEmp->apellido=$ArrayDeParametros['apellido'];
		$miEmp->sexo=$ArrayDeParametros['sexo'];
		$miEmp->email=$ArrayDeParametros['email'];
		$miEmp->clave=$ArrayDeParametros['clave'];
		$miEmp->turno=$ArrayDeParametros['turno'];
		$miEmp->perfil=$ArrayDeParametros['perfil'];
		$miEmp->fecha_ingreso=$ArrayDeParametros['fecha_ingreso'];
		$miEmp->foto=$ArrayDeParametros['foto'];
        $miEmp->InsertarEmpleadoParametros();

		/*  VER GESTION DE ARCHIVOS  ////////////////////////////////////////////////////
        $archivos = $request->getUploadedFiles();
        $destino="./fotosEmpleados/";
        
        $nombreAnterior=$archivos['foto']->getClientFilename();
        $extension= explode(".", $nombreAnterior)  ;
        
        $extension=array_reverse($extension);

        $archivos['foto']->moveTo($destino.$titulo.".".$extension[0]);
        $response->getBody()->write("se guardo ok el empleado");
		//////////////////////////////////////////////////////////////////////////////////*/

        return $response;
	}
	

      public function BorrarUno($request, $response, $args) {
     	$ArrayDeParametros = $request->getParsedBody();
     	$id=$ArrayDeParametros['id'];
     	$cd= new cd();
     	$cd->id=$id;
     	$cantidadDeBorrados=$cd->BorrarCd();

     	$objDelaRespuesta= new stdclass();
	    $objDelaRespuesta->cantidad=$cantidadDeBorrados;
	    if($cantidadDeBorrados>0)
	    	{
	    		 $objDelaRespuesta->resultado="algo borro!!!";
	    	}
	    	else
	    	{
	    		$objDelaRespuesta->resultado="no Borro nada!!!";
	    	}
	    $newResponse = $response->withJson($objDelaRespuesta, 200);  
      	return $newResponse;
    }
     
     public function ModificarUno($request, $response, $args) {
     	//$response->getBody()->write("<h1>Modificar  uno</h1>");
     	$ArrayDeParametros = $request->getParsedBody();
	    //var_dump($ArrayDeParametros);    	
	    $micd = new cd();
	    $micd->id=$ArrayDeParametros['id'];
	    $micd->titulo=$ArrayDeParametros['titulo'];
	    $micd->cantante=$ArrayDeParametros['cantante'];
	    $micd->año=$ArrayDeParametros['anio'];

	   	$resultado =$micd->ModificarCdParametros();
	   	$objDelaRespuesta= new stdclass();
		//var_dump($resultado);
		$objDelaRespuesta->resultado=$resultado;
		return $response->withJson($objDelaRespuesta, 200);		
    }


}
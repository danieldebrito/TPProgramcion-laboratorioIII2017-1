<?php
class empleado{
	public $id;
 	public $nombre;
  	public $apellido;
    public $sexo;
    public $email;
    public $clave;
    public $turno;
    public $perfil;  
    public $fecha_ingreso;
    public $foto;

  	public function BorrarEmpleado(){
	 		$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				delete 
				from empleados 				
				WHERE id=:id");	
				$consulta->bindValue(':id',$this->id, PDO::PARAM_INT);		
				$consulta->execute();
				return $consulta->rowCount();
	}

	public function ModificarEmpleado(){
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
				update empleados set 
				nombre='$this->nombre',
				apellido='$this->apellido',
                sexo='$this->sexo',
                email='$this->email',
                clave='$this->clave',
                turno='$this->turno',
                perfil='$this->perfil',
                fecha_ingreso='$this->fecha_ingreso',
                foto='$this->foto'
				WHERE id='$this->id'");
			return $consulta->execute();
	}
	
    public function InsertarEmpleado(){
				$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
				$consulta =$objetoAccesoDato->RetornarConsulta("
                INSERT into empleados (nombre, apellido, sexo, email, clave, turno, perfil, fecha_ingreso, foto)
                values(
                    '$this->nombre',
                    '$this->apellido',
                    '$this->sexo',
                    '$this->email',
                    '$this->clave',
                    '$this->turno',
                    '$this->perfil',
                    '$this->fecha_ingreso',
                    '$this->foto'
                    )");
				$consulta->execute();
				return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }
    
    public function InsertarEmpleadoParametros()
    {
               $objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
               $consulta =$objetoAccesoDato->RetornarConsulta("
               INSERT into empleados (nombre, apellido, sexo, email, clave, turno, perfil, fecha_ingreso, foto)
               values(:nombre, :apellido, :sexo, :email, :clave, :turno, :perfil, :fecha_ingreso, :foto)");
               $consulta->bindValue(':nombre',$this->nombre, PDO::PARAM_STR);
               $consulta->bindValue(':apellido', $this->apellido, PDO::PARAM_STR);
               $consulta->bindValue(':sexo', $this->sexo, PDO::PARAM_STR);
               $consulta->bindValue(':email', $this->email, PDO::PARAM_STR);
               $consulta->bindValue(':clave', $this->clave, PDO::PARAM_STR);
               $consulta->bindValue(':turno', $this->turno, PDO::PARAM_STR);
               $consulta->bindValue(':perfil', $this->perfil, PDO::PARAM_STR);
               $consulta->bindValue(':fecha_ingreso', $this->fecha_ingreso, PDO::PARAM_STR);
               $consulta->bindValue(':foto', $this->foto, PDO::PARAM_STR);
               $consulta->execute();		
               return $objetoAccesoDato->RetornarUltimoIdInsertado();
    }

  	public static function TraerTodoLosEmpleados(){
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
            $consulta =$objetoAccesoDato->RetornarConsulta("
            SELECT * FROM `empleados` WHERE 1 ");
			$consulta->execute();			
            return $consulta->fetchAll(PDO::FETCH_CLASS, "empleado");
    }

	public static function TraerUnEmpleado($id) {
			$objetoAccesoDato = AccesoDatos::dameUnObjetoAcceso(); 
			$consulta =$objetoAccesoDato->RetornarConsulta("
            SELECT * FROM `empleados` WHERE `id` = $id");
			$consulta->execute();
			$empBuscado= $consulta->fetchObject('empleado');
            return $empBuscado;
    }

}
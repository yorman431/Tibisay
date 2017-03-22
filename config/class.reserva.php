
<?php
class Reserva{
	
	var $id;
	var $nombre;
	var $telefono;
	var $fecha_ida;
	var $fecha_vuelta;
	var $fecha_reserva;
	var $adulto;
	var $estatus;
	var $nino;
	var $edad;
	var $observacion;
	var $operador;
	var $mensaje;
	var $listado;
	
	function Reserva(){// Constructor
	}
	
	function asignar_valor(){
	$this->estatus=$_POST['estatus'];	
	}
	
	
	function listar_reserva(){
		$sql="SELECT * FROM reserva";	
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$operador=$resultado['operador_res'];
			$sql2="SELECT nombre_op, apellido_op FROM operador WHERE id_op='$operador'";
			$consulta2=mysql_query($sql2) or die(mysql_error());
			$resultado2 = mysql_fetch_array($consulta2);
			$resultado['fecha1_res']=$this->convertir_fecha($resultado['fecha1_res']);
			$resultado['fecha2_res']=$this->convertir_fecha($resultado['fecha2_res']);
			$resultado['operador_res']= $resultado2['nombre_op']." ".$resultado2['apellido_op'];
			$this->listado[]=$resultado;
			
		}
		
		
	}
	
	function detalle_reserva(){
		$id=$_GET['id'];
		$sql="SELECT * FROM reserva WHERE id_res='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		while ($resultado = mysql_fetch_array($consulta)){
			$this->mensaje="si";
			$operador=$resultado['operador_res'];
			$sql2="SELECT nombre_op, apellido_op FROM operador WHERE id_op='$operador'";
			$consulta2=mysql_query($sql2) or die(mysql_error());
			$resultado2 = mysql_fetch_array($consulta2);
			$resultado['fecha1_res']=$this->convertir_fecha($resultado['fecha1_res']);
			$resultado['fecha2_res']=$this->convertir_fecha($resultado['fecha2_res']);
			$resultado['fecha3_res']=$this->convertir_fecha2($resultado['fecha3_res']);
			$resultado['operador_res']= $resultado2['nombre_op']." ".$resultado2['apellido_op'];
			$this->listado[]=$resultado;
			
		}
		
	}
	function eliminar_reserva(){
		$id=$_GET['id'];
		$sql="SELECT operador_res, estatus_res FROM reserva WHERE id_res='$id'";
		$consulta=mysql_query($sql) or die(mysql_error());
		$resultado=mysql_fetch_array($consulta);
		if($resultado['estatus_res']=='Finalizado'){
			$id2=$resultado['operador_res'];
			$sql2="UPDATE operador SET cantidad_op=cantidad_op-1  WHERE id_op='$id2' AND cantidad_op > 0";
			$consulta2=mysql_query($sql2) or die(mysql_error());	
		}
		$sql3="DELETE FROM reserva WHERE id_res='$id'";
		$consulta3=mysql_query($sql3) or die(mysql_error());
		
		header("location:/admin/reserva/");	
	}
	
	function editar_reserva(){
		$this->asignar_valor();
		$id=$_GET['id'];
		$estatus=$this->estatus;
		if($estatus!= ""){
			$sql="UPDATE reserva SET estatus_res='$estatus' WHERE id_res='$id'";
			$consulta=mysql_query($sql) or die(mysql_error());	
			$this->mensaje="si";
		}
	}
	
	function convertir_fecha($CampoFecha){
		if(!empty($CampoFecha)){
			if(strpos($CampoFecha,"-")){
				$conv_fecha = explode("-",$CampoFecha);$conv_fecha = $conv_fecha[2]."/".$conv_fecha[1]."/".$conv_fecha[0];
			}else{
				$conv_fecha =explode("/",$CampoFecha); $conv_fecha = $conv_fecha[2]."-".$conv_fecha[1]."-".$conv_fecha[0];
			}
			return $conv_fecha;
		}
	}
	
     function convertir_fecha2($CampoFecha){
		 if(!empty($CampoFecha)){
			$i=strpos($CampoFecha," ");
			$hora=substr($CampoFecha,$i, $CampoFecha);
			$fecha=substr($CampoFecha,0,$i);
			return $this->convertir_fecha($fecha)." ".$hora;
			 
		 }
	}
}
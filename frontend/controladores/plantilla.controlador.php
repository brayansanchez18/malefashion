<?php

class ControladorPlantilla
{

	/*=============================================
	=            LLAMAMOS LA PLANTILLA            =
	=============================================*/

	public function plantilla()
	{
		include 'vistas/plantilla.php';
	}

	/*=====  End of LLAMAMOS LA PLANTILLA  ======*/

	/*=====================================================================
	=            TRAEMOS LOS ESTILOS DINAMICOS DE LA PLANTILLA            =
	=====================================================================*/

	static public function ctrEstiloPlantilla()
	{
		$tabla = 'plantilla';
		$respuesta = ModeloPlantilla::mdlEstiloPlantilla($tabla);
		return $respuesta;
	}

	/*=====  End of TRAEMOS LOS ESTILOS DINAMICOS DE LA PLANTILLA  ======*/

	/*=============================================
	=            TRAEMOS LAS CABECERAS            =
	=============================================*/

	static public function ctrTraerCabeceras($ruta)
	{
		$tabla = 'cabeceras';
		$respuesta = ModeloPlantilla::mdlTraerCabeceras($tabla, $ruta);
		return $respuesta;
	}

	/*=====  End of TRAEMOS LAS CABECERAS  ======*/

	/*=======================================================
	=            TRAER DIVISA DE MANERA DINAMICA            =
	=======================================================*/

	static public function ctrMostrarDivisa()
	{
		$tabla = 'comercio';
		$respuesta = ModeloPlantilla::mdlMostrarDivisa($tabla);
		return $respuesta;
	}

	/*=====  End of TRAER DIVISA DE MANERA DINAMICA  ======*/

	/*======================================================
	=            MOSTRAR INFORMACION DEL FOOTER            =
	======================================================*/

	static public function ctrMostrarFotter()
	{
		$tabla = 'footer';
		$respuesta = ModeloPlantilla::mdlMostrarFotter($tabla);
		return $respuesta;
	}

	/*=====  End of MOSTRAR INFORMACION DEL FOOTER  ======*/
}

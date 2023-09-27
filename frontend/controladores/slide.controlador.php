<?php

class ControladorSlide
{
  static public function ctrMostrarSlide()
  {
    $tabla = 'slide';
    $respuesta = ModeloSlide::mdlMostrarSlide($tabla);
    return $respuesta;
  }

  // traemos el abnner de call to action
  static public function ctrMostrarCTA()
  {
    $tabla = 'call_to_action';
    $respuesta = ModeloSlide::mdlMostrarCTA($tabla);
    return $respuesta;
  }
}

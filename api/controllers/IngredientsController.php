<?php
	#
	# Controladore para la coleccion Ingredients
	#

	class IngredientsController extends CoreController{

		protected function _default(){
			echo "Este es el metodo DEFAULT";
		}

		protected function id(){
			echo "Este es el metodo ID";
		}

		protected function metodo(){
			echo "Este es el metodo METODO";
		}

		protected function getUser(){
			$userData = MUsuario::getUserById(61);

			CoreHTTP::encodeResponse($userData);
		}
		
	}
?>
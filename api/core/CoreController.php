<?php
	#
	# CorePage class file
	# Clase maestra para la construccion de controladores (colecciones)

	abstract class CoreController{
		// Canal comunicacional 
		protected $data = array();


		## Constructor de clase ##
		public function __construct($data = array()){
			$this->data = $data;

			if(method_exists($this, 'init'))
				$this->init();
		}

		# Metodo que es llamadao por default
		abstract protected function _default();


		## Metodo para ejecutar controller
		public function run(){
			$method = (isset($this->data['method'])) ? $this->data['method'] : NULL;
			if($method == NULL){
				$this->_default();
				return;
			}

			if(is_numeric($method)){
				if(method_exists($this, 'id'))
				$this->id();
			} elseif(method_exists($this,$method)){
				$this->$method();
			}
		}


		## Metodos de objeto ##
		protected function GET(){
			CoreHTTP::setStatusCode(405);
		}
		protected function POST(){
			CoreHTTP::setStatusCode(405);
		}
		protected function PUT(){
			CoreHTTP::setStatusCode(405);
		}
		protected function DELETE(){
			CoreHTTP::setStatusCode(405);
		}
		protected function PATCH(){
			CoreHTTP::setStatusCode(405);
		}
		protected function HEAD(){
			CoreHTTP::setStatusCode(405);
		}
		//abstract protected function OPTIONS();

		
	}

?>

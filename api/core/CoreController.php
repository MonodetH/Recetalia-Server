<?php
	#
	# CorePage class file
	# Clase maestra para la construccion de controladores (colecciones)

	abstract class CoreController{
		## 

		// Permisos necesarios para ejecutar controlador
		protected $auth = array(
			'annon' => true,
			'registered' => array(
				'tipo1' => true,
				'tipo2' => true,
				),
			'moderator' => true,
			'admin' => true
		);

		// Funciones ejecutables via request
		protected $exec = array('render');

		// Canal comunicacional 
		protected $data = array();


		## Constructor de clase ##
		public function __construct($request = 'render', $data = array()){
			$this->data = $data;
			$this->data['title']=$this->title;

			if(method_exists($this, 'init'))
				$this->init();

			// si request es ejecutable y el usuario tiene permisos
			if(CAuth::requireAuth($this->auth, $this->data)){
				if (in_array($request, $this->exec)){
					$this->$request();
				}else{
					CBase::notFound();
				}
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
		abstract protected function OPTIONS();

		
	}

?>

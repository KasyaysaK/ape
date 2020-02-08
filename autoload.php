<?php
	
	function model_autoload($model)
	{
		$file_name =  'model/' . $model . '.php';

		if (file_exists($file_name)) {
			require $file_name;
		}

		
	}

	spl_autoload_register('model_autoload');
	
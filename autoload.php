<?php
	
	function model_autoload($model)
	{
		require "model/$model.php";

	}

	spl_autoload_register('model_autoload');
	
<?phpfunction despachar_parte_del_programa_segun_url(){	if(!isset($_GET['hacer'])){		$que_hacer='menu';	}else{		$que_hacer=$_GET['hacer'];	}	$funcion_a_despachar="despachable_$que_hacer";	$funcion_a_despachar();}?>
<?php
class Template
{
	public static function paneladmin($template,$data= null){
		$data['_content']= view($template,$data);
		return view('paneladmin/template',$data);
	}
	public static function website($template,$data= null){
		$data['_content']= view($template,$data);
		return view('website/template',$data);
	}
}
<?php

if (!function_exists('urlActive')){

	function urlActive($currentRequest)
	{
		return (Request::is($currentRequest . '*')) ? ' active' : '';
	}
}
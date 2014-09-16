<?php

function prepareUrl($str) {

	// Достаём параметры из урла
	$matches = [];
	preg_match_all (
			'#([^=&]+)=([^&])#',
			$str,
			$matches,
			PREG_SET_ORDER,
			strpos($str, '?')+1

	);

	// Удаляем параметр со значением '3' и формируем более удобный для работы массив.
	$params = [];
	foreach ($matches as $key => $value) {
		if($value[2] != '3') {
			$params[$value[1]] = $value[2];
		}
	}

	// Сортируем по значению
	asort($params);

	// Превращаем параметры обратно в строку
	$stringParams = '';
	foreach ($params as $key => $value) {
		$stringParams.= $key . '=' . $value . '&';
	}

	// Теперь достаём из переданного url корень и путь до скрипта
	$root = [];
	preg_match(
		'#(https?:\/\/.+?)(\/.+)\?#',
		$str,
		$root
	);

	// Складываем всё вместе и возвращаем результат
	return $root[1] . '/' . $stringParams . 'url=' . rawurlencode ($root[2]);
}



echo prepareUrl('https://www.somehost.com/test/index.html?param1=4&param2=3&param3=2&param4=1&param5=3');
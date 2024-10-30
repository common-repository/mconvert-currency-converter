<?php
function mccc_return_list_languages()
{
    return array(
        'en' => 'English', 
        'ru' => 'Русский', 
        'uk' => 'Украинский',
        'de' => 'Deutsch',
        'es' => 'Español',
        'fr' => 'Français',
        'cn' => '中国',
    );
}

function mccc_return_language_detected()
{
    $sl = substr(get_bloginfo('language'), 0, 2);

    return (in_array($sl, array_keys(mccc_return_list_languages()))) ? $sl : 'en';
}

function mccc_return_currency_list()
{
    $contents = file_get_contents(plugin_dir_path(__FILE__).'data/currencies_'.mccc_return_language_detected().'.json');

    return json_decode($contents, true);
}

function mccc_return_iframe($params, $width, $height, $signature = null, $text = null)
{
	if( $params['font'] == '' ){
		$params['font'] = '1';
	}

	if( $params['ssl'] == '' ){
		$params['ssl'] = '1';
	}

    if( $params['lang'] == 'uk') {
        $params['lang'] = "ua";
    }

	$params['from'] = strtolower($params['from']);
	$params['to'] = strtolower($params['to']);

    $target_url = strtolower('https://'.$params['from'].(('en' != $params['lang']) ? '.'.$params['lang'] : '').'.mconvert.net');

    $url = 'https://mconvert.net/get-converter-widget?'.http_build_query($params);
    $output = '<iframe src="'.$url.'" height="'.$height.'" width="'.$width.'" frameborder="0" scrolling="no" class="mc-iframe" name="mc-exchange-rates-widget"></iframe>';
    if ($signature) {
        $output .= '<p>'.(($text) ? $text.': ' : '').'<a href="'.$target_url.'" target="_blank" class="mc-base-currency-link">'.$params['from'].'</a></p>';
    }

    return $output;
}

function mccc_print_select_options($code, $arr, $o = false)
{
    $output_string = '';
    foreach ($arr as $k => $v) {
        $output_string .= '<option value="'.$k.'"'.(($code == $k) ? ' selected' : '').'>'.((true === $o) ? $k.' - '.$v : $v).'</option>'.PHP_EOL;
    }

    echo $output_string;
}

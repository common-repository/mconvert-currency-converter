<?php
/**
    Plugin Name: Currency Converter widget/calculator
    Plugin URI: https://mconvert.net/currency-converter-widget
    Description: Simple and powerful real-time currency converter widget for your website or blog.
    Version: 1.0
    Author: mconvert
    Author URI: https://mconvert.net
    License: GPLv2 or later
    Text Domain: mccc_currency_converter_calculator
*/


require_once 'includes/functions.php';
require_once 'includes/languages.php';

/*
    Init widget
*/
add_action('widgets_init', function () {
    register_widget('mccc_currency_converter_calculator');
});


/*
    Shortcode
*/
function callback_mccc_currency_converter_calculator($atts, $content = null)
{
    $_lg = mccc_return_language_detected();
    extract(shortcode_atts(array(
        'size_width' => '100%',
        'from' => 'EUR',
        'to' => 'USD',
        'theme' => 'blue',
        'lang' => $_lg,
        'font' => 1,
        'ssl' => 1,
    ), $atts, 'mccc_currency_converter'));

    $lang = (empty($lang)) ? $_lg : ((in_array($lang, array_keys(mccc_return_list_languages()))) ? $lang : 'en');
    $from = (empty($from)) ? 'USD' : $from;
    $to = (empty($to)) ? 'EUR' : $to;

    $height = (2 == $font) ? 306 : 289;
    $params_build = array(
      'from' => $from,
      'to' => $to,
      'theme' => $theme,
      'lang' => $lang,
      'font' => $font,
      'ssl' => $ssl,
    );

    $language = mccc_widget_language($lg);

    $output = mccc_return_iframe($params_build, $size_width, $height, 1, $language['title']);

    return $output;
}

add_shortcode('mccc_currency_converter', 'callback_mccc_currency_converter_calculator');

/*
    Class of widget
*/
class mccc_currency_converter_calculator extends WP_Widget
{
    /*
        Register widget with WordPress.
    */
    public function __construct()
    {
        parent::__construct(
            'mccc_currency_converter_calculator',
            esc_html__('Currency Converter widget/calculator', 'mccc_currency_converter_calculator'),
            array(
                'description' => esc_html__('Real-time currency calculator with 190+ currencies, cryptocurrenciesa and custom design.', 'mccc_currency_converter_calculator'),
            )
        );
    }

    /*
        Update the widget settings.
    */
    public function update($new_instance, $old_instance)
    {
        $currency_list = mccc_return_currency_list();

        $instance = $old_instance;

        $instance['from'] = sanitize_text_field($new_instance['from']);
        $instance['to'] = sanitize_text_field($new_instance['to']);
        $instance['lang'] = sanitize_text_field($new_instance['lang']);
        $instance['theme'] = sanitize_text_field($new_instance['theme']);
        $instance['font'] = sanitize_text_field($new_instance['font']);
        $instance['ssl'] = sanitize_text_field($new_instance['ssl']);
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['signature'] = sanitize_text_field($new_instance['signature']);
        $instance['size_width'] = sanitize_text_field($new_instance['size_width']);

        return $instance;
    }

    /*
        Update the widget settings.
        Make use of the get_field_id() and get_field_name() function when creating your form elements. This handles the confusing stuff.
    */
    public function form($instance)
    {
        /*
            Default widget settings
        */

        // Register script
        // admin_enqueue_scripts('mc-jscolor', plugin_dir_url(__FILE__).'assets/jscolor.min.js');

        $defaults = array(
            'currency_name' => 'Euro',
            'title' => $this->_lang('title'),
            'size_width' => '100%',
            'signature' => 1,
            'from' => 'EUR',
            'to' => 'USD',
            'lang' => mccc_return_language_detected(),
            'theme' => 'blue',
            'font' => 1,
            'ssl' => 1,
        );

        if (empty($instance)) {
            $instance = $defaults;
        }

        $currency_list = mccc_return_currency_list();

        $fm = sanitize_text_field($instance['from']);
        $to = sanitize_text_field($instance['to']);
        $lg = sanitize_text_field($instance['lang']);
        $st = sanitize_text_field($instance['theme']);
        $lr = sanitize_text_field($instance['font']);
        $rd = sanitize_text_field($instance['ssl']);
        $title = sanitize_text_field($instance['title']);
        $signature = sanitize_text_field($instance['signature']);
        $size_width = sanitize_text_field($instance['size_width']);

        echo '<p><label for="',$this->get_field_id('title'),'">',$this->_lang('heading'),':',
             '<input id="',$this->get_field_id('title'),'" type="text" name="',$this->get_field_name('title'),'" value="',$title,'" style="width:100%"></label></p>';

        echo '<p><label for="',$this->get_field_id('from'),'">',$this->_lang('from_currency'),':',
             '<select id="',$this->get_field_id('from'),'" name="',$this->get_field_name('from'),'" style="width:100%">',
             mccc_print_select_options($fm, $currency_list, true),
             '</select></label></p>';

        echo '<p><label for="',$this->get_field_id('to'),'">',$this->_lang('to_currency'),':',
             '<select id="',$this->get_field_id('to'),'" name="',$this->get_field_name('to'),'" style="width:100%">',
             mccc_print_select_options($to, $currency_list, true),
             '</select></label></p>';

        echo '<p><label for="',$this->get_field_id('lang'),'">',$this->_lang('language'),':',
             '<select id="',$this->get_field_id('lang'),'" name="',$this->get_field_name('lang'),'" style="width:100%">',
             mccc_print_select_options($lg, mccc_return_list_languages()),
             '</select></label></p>';

        echo '<p><label for="',$this->get_field_id('theme'),'">',$this->_lang('theme'),':',
             '<select id="',$this->get_field_id('theme'),'" name="',$this->get_field_name('theme'),'" style="width:100%">',
             mccc_print_select_options($st, $this->_lang('themes')),
             '</select></label></p>';

        echo '<p><label for="',$this->get_field_id('size_width'),'">',$this->_lang('size_width'),':',
             '<select id="',$this->get_field_id('size_width'),'" name="',$this->get_field_name('size_width'),'" style="width:100%">',
             mccc_print_select_options($size_width, $this->_lang('sizes')),
             '</select></label></p>';

        echo '<p><label for="',$this->get_field_id('font'),'">',
             '<input type="checkbox" ',checked($lr, 2),' id="',$this->get_field_id('font'),'" name="',$this->get_field_name('font'),'" value="2">',
             $this->_lang('large'),
             '</label></p>';

        echo '<p><label for="',$this->get_field_id('ssl'),'">',
             '<input type="checkbox" ',checked($rd, 2),' id="',$this->get_field_id('ssl'),'" name="',$this->get_field_name('ssl'),'" value="2">',
             $this->_lang('ssl'),
             '</label></p>';

        echo '<p><label for="',$this->get_field_id('signature'),'">',
             '<input type="checkbox" ',checked($signature, 1),' id="',$this->get_field_id('signature'),'" name="',$this->get_field_name('signature'),'" value="1">',
             $this->_lang('signature'),
             '</label></p>';

        $widget_params = array(
            'lang' => $lg,
            'from' => $fm,
            'to' => $to,
            'theme' => $st,
            'font' => $lr != '' ? $lr : 1,
            'ssl' => $rd != '' ? $rd : 1,
        );

        echo '<hr><div><h3>',$this->_lang('preview'),'</h3>',
            $this->_output_widget($widget_params, $size_width),
            '</div>';

        $short_attrs = '';

        foreach ($widget_params as $key => $value) {
            $short_attrs .= $key.'="'.$value.'" ';
        }

        echo '<hr>',
             '<div><h3>',$this->_lang('generated_shortcode'),'</h3>',
             '<textarea onclick="this.select()" style="width:100%;height:80px;">[mccc_currency_converter ',trim($short_attrs),'][/mccc_currency_converter]</textarea></div>',
             '<hr>';
    }

    /*
        Output widget
    */
    public function widget($args, $instance)
    {
        // Register style
        wp_register_style('mc-currency-converter-calculator', plugin_dir_url(__FILE__).'assets/frontend.css');
        wp_enqueue_style('mc-currency-converter-calculator', plugin_dir_url(__FILE__).'assets/frontend.css');

        // Get values
        extract($args);

        $currency_list = mccc_return_currency_list();

        $lg = sanitize_text_field($instance['lang']);
        $fm = sanitize_text_field($instance['from']);
        $to = sanitize_text_field($instance['to']);
        $st = sanitize_text_field($instance['theme']);
        $lr = sanitize_text_field($instance['font']);
        $rd = sanitize_text_field($instance['ssl']);
        $title = sanitize_text_field($instance['title']);
        $signature = sanitize_text_field($instance['signature']);
        $size_width = sanitize_text_field($instance['size_width']);

        //$target_url = strtolower('http://'.$fm.(('en' != $lg) ? '.'.$lg : '').'.currencyrate.today'.DIRECTORY_SEPARATOR.$to);

        echo $args['before_widget'];

        // Title
        echo $args['before_title'].$title.$args['after_title'];

        // Load language
        $language = mccc_widget_language($lg);

        // Output
        echo $this->_output_widget(array(
            'lang' => $lg,
            'from' => $fm,
            'to' => $to,
            'theme' => $st,
            'font' => $lr,
            'ssl' => $rd,
        ), $size_width, $signature, $language['title']);

        echo $args['after_widget'];
    }

    // Private


    /*
        Output widget
    */
    private function _output_widget($params, $width, $signature = null, $text = null)
    {
        $height = (1 == $params['font']) ? 306 : 289;
        $output = mccc_return_iframe($params, $width, $height, $signature, $text);

        return $output;
    }

    /*
        Load languages text
    */
    private function _lang($value)
    {
        $_mccc_widget_language = mccc_widget_language(mccc_return_language_detected());

        return $_mccc_widget_language[$value];
    }
}

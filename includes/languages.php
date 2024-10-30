<?php

function mccc_widget_language($lg)
{
    $lang = array();

    if ('en' == $lg) {
        $lang['preview'] = 'Preview';
        $lang['title'] = 'Currency Converter';
        $lang['heading'] = 'Heading';
        $lang['from_currency'] = 'From';
        $lang['to_currency'] = 'To';
        $lang['large'] = 'Large';
        $lang['ssl'] = 'SSL';
        $lang['language'] = 'Language';
        $lang['theme'] = 'Theme';
        $lang['size_width'] = 'Size (width)';
        $lang['signature'] = 'Signed at bottom of widget';
        $lang['sizes']['100%'] = 'Auto size';
        $lang['background'] = 'Background color';
        $lang['generated_shortcode'] = 'Generated shortcode';
        // Themes
        $lang['themes']['darkblue'] = 'Blue';
        $lang['themes']['green'] = 'Green';
        $lang['themes']['blue'] = 'Blue';
        $lang['themes']['yellow'] = 'Yellow';
        $lang['themes']['red'] = 'Red';
        $lang['themes']['gray'] = 'Gray';
    } elseif ('ru' == $lg) {
        $lang['preview'] = 'Превью';
        $lang['title'] = 'Конвертер валют';
        $lang['heading'] = 'Заголовок';
        $lang['from_currency'] = 'Из';
        $lang['to_currency'] = 'В';
        $lang['large'] = 'Крупный';
        $lang['ssl'] = 'SSL';
        $lang['language'] = 'Язык';
        $lang['timezone'] = 'Часовой пояс';
        $lang['theme'] = 'Цветовое оформление';
        $lang['size_width'] = 'Размер (ширина)';
        $lang['signature'] = 'Подпись внизу виджета';
        $lang['sizes']['100%'] = 'Авто размер';
        $lang['background'] = 'Цвет фона';
        $lang['generated_shortcode'] = 'Шорткод для страниц';
        // Themes
        $lang['themes']['darkblue'] = 'Синий';
        $lang['themes']['green'] = 'Зеленый';
        $lang['themes']['blue'] = 'Голубой';
        $lang['themes']['yellow'] = 'Желтый';
        $lang['themes']['red'] = 'Красный';
        $lang['themes']['gray'] = 'Серый';
    } elseif ('uk' == $lg) {
        $lang['preview'] = "Прев'ю";
        $lang['title'] = 'Конвертер валют';
        $lang['heading'] = 'Заголовок';
        $lang['from_currency'] = 'З якої';
        $lang['to_currency'] = 'В яку';
        $lang['large'] = 'Великий';
        $lang['ssl'] = 'SSL';
        $lang['language'] = 'Мова';
        $lang['theme'] = 'Кольорове оформлення';
        $lang['size_width'] = 'Розмір (ширина)';
        $lang['signature'] = 'Підпис внизу віджету';
        $lang['sizes']['100%'] = 'Авто розмір';
        $lang['background'] = 'Колір фону';
        $lang['generated_shortcode'] = 'Шорткод для сторінок';
        // Themes
        $lang['themes']['darkblue'] = 'Синій';
        $lang['themes']['green'] = 'Зелений';
        $lang['themes']['blue'] = 'Блакитний';
        $lang['themes']['yellow'] = 'Жовтий';
        $lang['themes']['red'] = 'Червоний';
        $lang['themes']['gray'] = 'Сірий';
    } elseif ('fr' == $lg) {
        $lang['preview'] = 'Aperçu';
        $lang['title'] = 'Convertisseur de devise';
        $lang['heading'] = 'Titre';
        $lang['from_currency'] = 'De';
        $lang['to_currency'] = 'À';
        $lang['large'] = 'Grand';
        $lang['ssl'] = 'SSL';
        $lang['language'] = 'La langue';
        $lang['theme'] = 'Thème';
        $lang['size_width'] = 'Taille (largeur)';
        $lang['signature'] = 'Signé en bas';
        $lang['sizes']['100%'] = 'Taille automatique';
        $lang['background'] = 'Couleur de fond';
        $lang['generated_shortcode'] = 'Généré Shortcode';
        // Themes
        $lang['themes']['darkblue'] = 'Bleu foncé';
        $lang['themes']['green'] = 'Vert';
        $lang['themes']['blue'] = 'Bleu';
        $lang['themes']['yellow'] = 'Jaune';
        $lang['themes']['red'] = 'Rouge';
        $lang['themes']['gray'] = 'Gris';
    } elseif ('es' == $lg) {
        $lang['preview'] = 'Avance';
        $lang['title'] = 'Convertidor de moneda';
        $lang['heading'] = 'Título';
        $lang['from_currency'] = 'De';
        $lang['to_currency'] = 'A';
        $lang['large'] = 'Grande';
        $lang['ssl'] = 'SSL';
        $lang['language'] = 'Idioma';
        $lang['theme'] = 'Tema';
        $lang['size_width'] = 'Tamaño (ancho)';
        $lang['signature'] = 'Firmado en la parte inferior';
        $lang['sizes']['100%'] = 'Tamaño automático';
        $lang['background'] = 'Color de fondo';
        $lang['generated_shortcode'] = 'Código abreviado generado';
        // Themes
        $lang['themes']['darkblue'] = 'Azul oscuro';
        $lang['themes']['green'] = 'Verde';
        $lang['themes']['blue'] = 'Azul';
        $lang['themes']['yellow'] = 'Amarillo';
        $lang['themes']['red'] = 'Rojo';
        $lang['themes']['gray'] = 'Gris';
    } elseif ('de' == $lg) {
        $lang['preview'] = 'Vorschau';
        $lang['title'] = 'Währungsrechner';
        $lang['heading'] = 'Überschrift';
        $lang['from_currency'] = 'Von';
        $lang['to_currency'] = 'Zu';
        $lang['large'] = 'Groß';
        $lang['ssl'] = 'SSL';
        $lang['language'] = 'Sprache';
        $lang['theme'] = 'Thema';
        $lang['size_width'] = 'Größe (Breite)';
        $lang['signature'] = 'Unten signiert';
        $lang['sizes']['100%'] = 'Automatische skalierung';
        $lang['background'] = 'Hintergrundfarbe';
        $lang['generated_shortcode'] = 'Generierter kurzwahlcode';
        // Themes
        $lang['themes']['darkblue'] = 'Dunkelblau';
        $lang['themes']['green'] = 'Grün';
        $lang['themes']['blue'] = 'Blau';
        $lang['themes']['yellow'] = 'Gelb';
        $lang['themes']['red'] = 'Rot';
        $lang['themes']['gray'] = 'Grau';
    } elseif ('cn' == $lg) {
        $lang['preview'] = '预习';
        $lang['title'] = '货币换算';
        $lang['heading'] = '标题';
        $lang['from_currency'] = '从';
        $lang['to_currency'] = '至';
        $lang['large'] = '大';
        $lang['ssl'] = 'SSL';
        $lang['language'] = '语言';
        $lang['theme'] = '颜色';
        $lang['size_width'] = '大小（宽度）';
        $lang['signature'] = '在底部签名';
        $lang['sizes']['100%'] = '自动尺寸';
        $lang['background'] = '背景颜色';
        $lang['generated_shortcode'] = '生成的简码';
        // Themes
        $lang['themes']['darkblue'] = '深蓝';
        $lang['themes']['green'] = '绿色';
        $lang['themes']['blue'] = '蓝色';
        $lang['themes']['yellow'] = '黄色';
        $lang['themes']['red'] = '红';
        $lang['themes']['gray'] = '灰色';
    }

    $lang['sizes']['160px'] = '160px';

    return $lang;
}

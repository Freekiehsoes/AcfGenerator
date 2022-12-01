<?php

namespace Freekattema\Wordpress\Acf;

use Freekattema\Wordpress\Acf\FieldTypes\AcfFlexibleContent;
use Freekattema\Wordpress\Acf\FieldTypes\AcfIconSelector;
use Freekattema\Wordpress\Acf\FieldTypes\AcfImage;
use Freekattema\Wordpress\Acf\FieldTypes\AcfRepeater;
use Freekattema\Wordpress\Acf\FieldTypes\AcfText;
use Freekattema\Wordpress\Acf\FieldTypes\AcfWysiwyg;

final class AcfPresets
{
    private function __construct()
    {
    }

    public static function image($label = "Afbeelding", $name = "image"): AcfImage
    {
        return AcfImage::create($label, $name);
    }

    public static function text($label = "Tekst", $name = "text"): AcfText
    {
        return AcfText::create($label, $name);
    }

    public static function wysiwyg($label = "Tekst", $name = "text"): AcfWysiwyg
    {
        return AcfWysiwyg::create($label, $name);
    }

    public static function images($minPerRow = 1, $maxPerRow = 3, $label = "Afbeeldingen", $name = "images"): AcfRepeater
    {
        $row = AcfRepeater::create('Rij', 'image_row');
        $row->add_field(self::image());
        $row->min($minPerRow);
        $row->max($maxPerRow);

        $repeater = AcfRepeater::create($label, $name);
        $repeater->add_field($row);

        return $repeater;
    }
}
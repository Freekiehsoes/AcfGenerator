<?php

namespace Freekattema\AdvancedCustomFieldsHelper;

use Freekattema\AdvancedCustomFieldsHelper\FieldTypes\AcfFlexibleContent;
use Freekattema\AdvancedCustomFieldsHelper\FieldTypes\AcfIconSelector;
use Freekattema\AdvancedCustomFieldsHelper\FieldTypes\AcfImage;
use Freekattema\AdvancedCustomFieldsHelper\FieldTypes\AcfRepeater;
use Freekattema\AdvancedCustomFieldsHelper\FieldTypes\AcfText;
use Freekattema\AdvancedCustomFieldsHelper\FieldTypes\AcfWysiwyg;

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

    public static function usps(): AcfRepeater
    {
        return AcfRepeater::create('Usps', 'usps')->add_fields([
            AcfIconSelector::create('Icoon', 'icon')->width(40)->default_value('sharp,solid,check'),
            AcfText::create('Titel', 'title')->width(60),
        ]);
    }
}
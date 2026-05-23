<?php

namespace Profolio\Setup;

class I18n
{
    public static function load(): void
    {
        load_theme_textdomain(
            'profolio-theme',
            get_template_directory() . '/languages'
        );
    }
}
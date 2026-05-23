<?php

namespace Profolio\Core;

use Profolio\Setup\I18n;
use Profolio\PostTypes\ProjectCPT;
use Profolio\Meta\ProjectMeta;
use Profolio\Rest\ProjectRoutes;

class Theme
{
    public static function init(): void
    {
        add_action('after_setup_theme', [self::class, 'setup']);

        add_action('init', [self::class, 'boot'], 0);

    }

    public static function setup(): void
    {
        I18n::load();
    }

   public static function boot(): void
    {
    
        $cpt = new \Profolio\PostTypes\ProjectCPT();
    
        $cpt->register();

        new \Profolio\Meta\ProjectMeta();
        new \Profolio\Rest\ProjectRoutes();
    }
}
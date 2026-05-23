<?php

namespace Profolio\Core;

use Profolio\Setup\I18n;
use Profolio\PostTypes\ProjectCPT;
use Profolio\Meta\ProjectMeta;
use Profolio\Rest\ProjectRoutes;
use Profolio\Assets\AssetManager;

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
        // Add Support for thumbnail in project
        add_theme_support('post-thumbnails');

        $cpt = new \Profolio\PostTypes\ProjectCPT();
        $assets = new \Profolio\Assets\AssetManager();
        $cpt->register();
        $assets->register();

    
        new \Profolio\Meta\ProjectMeta();
        new \Profolio\Rest\ProjectRoutes();
    }
}
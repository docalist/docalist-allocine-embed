<?php
/**
 * This file is part of the 'Docalist Allocine Embed' plugin.
 *
 * Copyright (C) 2014-2014 Daniel Ménard
 *
 * For copyright and license information, please view the
 * LICENSE.txt file that was distributed with this source code.
 *
 * Plugin Name: Docalist Allocine Embed
 * Plugin URI:  http://docalist.org/
 * Description: Docalist: embeds videos from allocine.fr.
 * Version:     0.1
 * Author:      Daniel Ménard
 * Author URI:  http://docalist.org/
 * Text Domain: docalist-allocine-embed
 * Domain Path: /languages
 *
 * @package     Docalist
 * @subpackage  Allocine
 * @author      Daniel Ménard <daniel.menard@laposte.net>
 * @version     SVN: $Id$
 */
add_action('plugins_loaded', function () {
    $re = '~http://(?:www)\.allocine\.fr/video/player_gen_cmedia=(\d+).*~';

    wp_embed_register_handler('allocine-fr', $re, function($matches, $attr, $url, $rawattr) {
        $url = 'http://www.allocine.fr/_video/iblogvision.aspx?cmedia=' . $matches[1];
        return sprintf(
            '<iframe src="%s" style="width:%dpx; height:%dpx" frameborder="0"></iframe>',
            $url,
            $attr['width'],
            $attr['height']
        );
    }, 10);
});
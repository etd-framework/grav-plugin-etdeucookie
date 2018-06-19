<?php
namespace Grav\Plugin;

use Grav\Common\Plugin;

/**
 * Class ETDEUCookiePlugin
 * @package Grav\Plugin
 */
class ETDEUCookiePlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents()
    {
        return [
            'onPluginsInitialized' => ['onPluginsInitialized', 0]
        ];
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized()
    {
        if ($this->isAdmin()) {
            $this->active = false;
            return;
        }

        $this->enable([
            'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
            'onTwigSiteVariables' => ['onTwigSiteVariables', 0],
        ]);
    }

    /**
     * Add current directory to twig lookup paths.
     */
    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }

    /**
     * if enabled on this page, load the JS + CSS theme.
     */
    public function onTwigSiteVariables()
    {
        // Retrieve the cookie.
        $cookie = isset($_COOKIE['etdeucookie']) ? (string) $_COOKIE['etdeucookie'] : '';

        // If the cookie has not been accepted yet.
        if ($cookie !== "ok") {

            // Retrieve the type.
            $type     = strtolower($this->config->get('plugins.etdeucookie.type'));
            $position = $this->config->get('plugins.etdeucookie.position');
            $bgcolor  = $this->config->get('plugins.etdeucookie.bgcolor');
            $color    = $this->config->get('plugins.etdeucookie.textcolor');

            if (!preg_grep("/" . $type . "/i", array(
                "bar",
                "dialog",
            ))) {
                throw new \InvalidArgumentException(sprintf('The ETD EU Cookie type variable value must be one of "bar" or "dialog". You gave "%s"', $type));
            }

            $this->grav['assets']->addJs('plugin://etdeucookie/assets/js/etdeucookie.min.js');
            $this->grav['assets']->addCss('plugin://etdeucookie/assets/css/etdeucookie_' . $type . '.min.css', -999);
            $this->grav['assets']->addInlineCss('#etd-cookie{' . $position . ':0;background:' . $bgcolor . ';color:' . $color . ';}', -999);

            $twig = $this->grav['twig'];
            $twig->twig_vars['etdeucookie_type'] = $type;

            $this->grav['assets']->addInlineJs($twig->twig->render('partials/etdeucookie_' . $type . '.html.twig', array('config' => $this->config->toArray())));
        }
    }
}

<?php
declare(strict_types=1);

namespace {{cookiecutter.project_namespace}}\View\Helper;

use Itseasy\View\Helper\UrlHelper;
use Itseasy\Navigation\Navigation;

class NavigationHelper
{
    protected $navigation;
    protected $container = null;

    public function __construct(Navigation $navigation)
    {
        $this->navigation = $navigation;
    }

    public function __invoke(?string $name = "default")
    {
        $this->container = $this->navigation->getContainer($name);
        return $this;
    }

    public function render()
    {
        $html = [];
        $html[] = "<div class=\"navigation\">";
        $html[] = "<ul class=\"navigation\">";
        foreach ($this->container->getPages() as $page) {
            $html[] = $this->renderPage($page);
        }
        $html[] = "</ul>";
        $html[] = "</div>";
        $html[] = "<div style=\"clear:both\"></div>";
        return implode("", $html);
    }

    protected function renderPage($page)
    {
        $html = [];
        $html[] = "<li>";
        $html[] = sprintf('<a href="%s">%s</a>', $page->getHref(), $page->getLabel());
        $html[] = "</li>";
        return implode("", $html);
    }
}

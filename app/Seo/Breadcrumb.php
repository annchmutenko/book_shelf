<?php

namespace App\Seo;

use Illuminate\Contracts\Support\Htmlable;

class Breadcrumb implements Htmlable
{
    protected $crumbs = [];

    public function addCrumb(string $title, string $url)
    {
        $this->crumbs[] = new Crumb($title, $url);
    }

    public function getCrumbs()
    {
        return $this->crumbs;
    }

    public function toHtml()
    {
        $i = 0;
        $breadcrumbItems = '';
        foreach ($this->crumbs as $crumb)
        {
            if($i != count($this->crumbs)-1) {
                $breadcrumbItems .= "<li class='breadcrumb-item'><a href='{$crumb->getUrl()}'>{$crumb->getTitle()}</a></li>";
            } else {
                $breadcrumbItems .= "<li class='breadcrumb-item active' aria-current='page'><a href='#'>{$crumb->getTitle()}</a></li>";
            }
            ++$i;
        }
        return '
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    '.$breadcrumbItems.'
                </ol>
            </nav>';
    }
}

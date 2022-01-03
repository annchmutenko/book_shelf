<?php

namespace App\Seo;

final class Crumb
{
    private string $title;

    private string $url;

    public function __construct(string $title, string $url)
    {
        $this->title = $title;
        $this->url = $url;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getUrl()
    {
        return $this->url;
    }
}

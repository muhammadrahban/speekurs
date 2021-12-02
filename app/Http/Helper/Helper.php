<?php

function getPage()
{
    $result = App\Page::get();
    return $result;
}

function getCategories(){
    return App\Category::get();
}

function getFeaturedPost(){
    return App\Post::where('featured', '1')->with('Category')->take(5)->get();
}

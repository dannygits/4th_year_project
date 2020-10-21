<?php

use Carbon\Carbon;

function presentPrice($price)
{
    return "sh".number_format($price);
}

function setActivecategory($category, $output = 'active')
{
    return request()->category == $category ? $output : '';
}

function presentDate($date)
{
    return Carbon::parse($date)->format('M d, Y');
}

function getStockLevel($quantity)
{
    if ($quantity > setting('site.Stock_threshold')) {
        $stockLevel = '<div class="badge badge-success"> In Stock</div>';
    } elseif($quantity <= setting('site.Stock_threshold') && $quantity > 0) {
        $stockLevel = '<div class="badge badge-warning"> Low Stock</div>';
    }else {
        $stockLevel = '<div class="badge badge-danger"> Out of Stock</div>';
    }

    return $stockLevel;
}

function productImage($path)
{
    return $path && file_exists('storage/'.$path) ? asset('storage/'.$path) : asset('img/not-found.jpg');
}
<?php

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\CategoryModel;
class CategoryController
{
	// function::__construct(){
	// }
    function index()
    {
    	 $menus = CategoryModel::orderBy('id')->get();
    	 return $this->showCategories($menus);
    } 
    function showCategories($categories, $parent_id = 0, $char = '')
	{
	    $cate_child = array();
	    foreach ($categories as $key => $item)
	    {
	        if ($item['parent_id'] == $parent_id)
	        {
	            $cate_child[] = $item;
	            unset($categories[$key]);
	        }
	    }
	    if ($cate_child)
	    {
	        echo '<ul>';
	        foreach ($cate_child as $key => $item)
	        {
	            echo '<li><a href="">'.$item['title'].'</a>';
	            $this->showCategories($categories, $item['id'], $char.'|---');
	            echo '</li>';
	        }
	        echo '</ul>';
	    }
	}
}

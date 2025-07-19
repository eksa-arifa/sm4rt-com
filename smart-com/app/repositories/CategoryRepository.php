<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository{
    protected Category $category;


    public function __construct()
    {
        $category = new Category();

        $this->category = $category;
    }

    public function getAll(){
        return $this->category->all();
    }
}
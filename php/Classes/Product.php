<?php

class Product
{
    private $title;
    private $price;
    private $category;
    private $description;
    private $avatar;

    public function __construct($title, $price, $category, $description, $avatar = null)
    {
        $this->title = $title;
        $this->price = $price;
        $this->category = $category;
        $this->description = $description;
        $this->avatar = $avatar;
    }


    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;

    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;

    }

    public function getAvatar()
    {
        return $this->avatar;
    }

    public function setAvatar($avatar)
    {
        $this->avatar = $avatar;

    }
}
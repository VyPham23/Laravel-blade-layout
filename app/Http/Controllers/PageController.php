<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slide;
use App\Models\Product;
use App\Models\ProductType;

class PageController extends Controller
{
    public function getIndex(){
        $slide = Slide::all();

        $top_product = Product::where('promotion_price','<>',0)->paginate(4);

        return view('page.trangchu', compact('slide', 'top_product'));
    }

    public function getLoaiSp($type){
        $type_product = ProductType::all();

        $sp_theoloai = Product::where('id_type', $type)->get();

        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);

        return view('page.loai_sanpham', compact('sp_theoloai','type_product','sp_khac'));
    }

    public function getChitiet(){
        return view('page.chitiet_sanpham');
    }

    public function getContact(){
        return view('page.contact');
    }

    public function getAbout(){
        return view('page.about');
    }
}
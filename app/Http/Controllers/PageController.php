<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function getIndex(){
        return view('page.trangchu');
    }

    public function getLoaiSp($type){
        $type_product = ProductType::all();

        $sp_theoloai = Product::where('id_type', $type)->get();

        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);

        return view('page.loai_sanpham', compact('sp_theoloai','type_prodcut','sp_khac'));
    }

    public function getChitiet(){
        return view('page.chitiet_sanpham');
    }

    public function getContact(){
        return view('page.lienhe');
    }

    public function getAbout(){
        return view('page.about');
    }
}
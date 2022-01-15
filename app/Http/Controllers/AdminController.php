<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.dashboard');
    }
    public function applicant(){
        return view('admin.applicant');
    }
    public function member(){
        return view('admin.member');
    }
    public function settings(){
        return view('admin.settings');
    }
    public function announcement(){
        return view('admin.announcement');
    }
    public function report(){
        return view('admin.report');
    }
    public function print(){
        return view('admin.print');
    }
    public function printId($id){
        return view('admin.printId',[
            'id' => $id,
        ]);
    }
}

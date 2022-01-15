<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangayController extends Controller
{
    public function index(){
       return view('barangay.dashboard');
    }
    public function applicants(){
       return view('barangay.applicant');
    }
    public function members(){
       return view('barangay.members');
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
  public function settings(){
   return view('admin.settings');
}
}

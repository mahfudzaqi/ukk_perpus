<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    function index() {
        return view('admin');
    }

    function administrator() {
        return view('admin.rak');
    }

    function petugas() {
        return view('admin');
    }

    function peminjam() {
        return view('admin');
    }
}

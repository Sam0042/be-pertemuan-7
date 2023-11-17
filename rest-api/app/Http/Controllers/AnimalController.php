<?php

#NAMA: MUHAMMAD HISYAM MUBARAK
#NIM: 0110220068

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    #buat property animals (array)
    public $animals = ["Kucing","Ayam","Ikan"];
    public function loopIndex(){
        foreach($this->animals as $animal){
            echo "- $animal <br>";
        }
    }

    public function index(){
        #tampilkan data animals
        echo "Menampilkan data animals <br>";
        $this->loopIndex();
    }

    public function store(Request $request){
        #menambahkan hewan baru
        echo "Menambahkan hewan baru dan menampilkan data animals";
        echo "<br>";
        array_push($this->animals,$request->nama);
        $this->loopIndex();
    }

    public function update(Request $request,$id){
        #mengupdate data hewan
        echo "Mengupdate hewan id $id dan menampilkan data animals";
        echo "<br>";
        $this->animals[$id] = $request->nama;
        $this->loopIndex();
    }

    public function destroy($id){
        #menghapus data hewan
        echo "Menghapus data hewan id $id dan menampilkan data animals";
        echo "<br>";
        unset($this->animals[$id]);
        $this->loopIndex();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    // property animals
    public $animals=["Beruang"];

    // method untuk menampilkan semua hewan
    public function index(){
        echo "menampilkan data animals<br>";

        // loop property animals
        foreach($this->animals as $animal){
            echo "- $animal <br>";
        }
    }

    // method untuk menambahkan data hewan
    public function store(Request $request){
        echo "menambahkan data hewan";

        // menambakan data ke property animals
        array_push($this->animals, $request->animal);

        // panggil method index
        $this->index();
    }

    // method untuk mengedit data hewan
    public function update($id, Request $request){
        echo "Mengupdate Data hewan id $id, <br>";

        // update data ke propery animals
        $this->animals[$id] = $request->animal;

        // panggil method index
        $this->index();
    }

    public function destroy($id)
    {
        echo "menghapus data hewan id $id, <br>";
        
        unset($this->animals[$id]);

        // panggil method index
        $this->index();
    }
}

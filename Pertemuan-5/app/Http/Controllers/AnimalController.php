<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ['kambing','sapi', 'onta'];

    public function index() {
        echo "Menampilkan data animals :</br>";

        foreach ($this->animals as $animal) {
            echo "- $animal <br>";
        }
    }
    public function store(Request $request) {
        echo "Menambahkan data animals - $request->nama";

        array_push($this->Animals ,$request->nama);
        foreach($this->animals as $animal){
        echo "<br> $animal";
        }
    }
    public function update(Request $request ,$id) {
        echo "Mengedit data animals - id $id -- $request->nama";
        array_replace($this->animal,[$id]);
    }
    public function destroy(Request $request ,$id) {
        echo "Menghapus data animals :";
        array_splice($this->animals,[$id]);
    }

    
}

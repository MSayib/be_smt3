<?php

# membuat class Animal
class Animal
{
    # property animals
    public $animals;

    # method constructor - mengisi data awal
    # parameter: data hewan (array)
    public function __construct($data)
    {
        $this->animals = $data;
    }

    # method index - menampilkan data animals
    public function index()
    {
        foreach ($this->animals as $animal) {
            echo $animal . PHP_EOL;
        }
        # gunakan foreach untuk menampilkan data animals (array)
    }

    # method store - menambahkan hewan baru
    # parameter: hewan baru
    public function store($data)
    {
        array_push($this->animals, $data);
        # gunakan method array_push untuk menambahkan data baru
    }

    # method update - mengupdate hewan
    # parameter: index dan hewan baru
    public function update($index, $data)
    {
        $this->animals[$index] = $data;
        # gunakan method array_push untuk mengupdate data
    }

    # method delete - menghapus hewan
    # parameter: index
    public function destroy($index)
    {
        unset($this->animals[$index]);
        # gunakan method unset atau array_splice untuk menghapus data array
    }
}

# membuat object
# kirimkan data hewan (array) ke constructor
$animal = new Animal(['Kuda', 'Kambing', 'Kucing', 'Keledai']);

echo "Index - Menampilkan seluruh hewan \n";
$animal->index();
echo "\n";

echo "Store - Menambahkan hewan baru \n";
$animal->store('Kancil');
$animal->index();
echo "\n";

echo "Update - Mengupdate hewan \n";
$animal->update(1, 'Kambing Jantan');
$animal->index();
echo "\n";

echo "Destroy - Menghapus hewan \n";
$animal->destroy(3);
$animal->index();
echo "\n";

echo "Muhamad Sayib - TI16 \n";
echo "0110221023 \n";

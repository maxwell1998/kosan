<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JenisKamarController
{
    public function index(){
        return view("adminLayouts.partialLayouts.jenisKamar",[
            "categories" => Category::all()
        ]);
    }

    public function showFormTambah(){
        return view("adminLayouts.childLayouts.tambah_jenisKamar");
    }
    
    public function showFormEdit(Category $category){
        return view("adminLayouts.childLayouts.edit_jenisKamar",[
            "categories" => Category::where("id",$category->id)->get()
        ]);
    }
    
    public function store(Request $request){
        $validatedData = $request->validate([
            'image' => 'image',
            'name' => 'required',
            'fasilitas' => 'required',
            'priceDay' => ['required','min:6'],
            'priceWeek' => ['required','min:6'],
            'priceMonth' => ['required','min:6']
        ]);

        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('category-images');
        }
        Category::create($validatedData);

        return redirect("/jnsKamar")->with('successStore','Kategori berhasil ditambahkan!');
    }

    public function update(Request $request, Category $category){
        $validatedData = $request->validate([
            'image' => 'image',
            'name' => 'required',
            'fasilitas' => 'required',
            'priceDay' => ['required','min:6'],
            'priceWeek' => ['required','min:6'],
            'priceMonth' => ['required','min:6']
        ]);
        if($request->file('image')){
            if($request->oldImage){
                Storage::delete($request->oldImage);
            }
            $validatedData['image'] = $request->file('image')->store('category-images');
        }
        Category::where("id",$category->id)->update($validatedData);

        return redirect("/jnsKamar")->with('successUpdate','Kategori berhasil diubah!');
    }

    public function destroy(Category $category){
        $room = Room::where("category_id",$category->id)->count();
        
        if ($room>0){
            return redirect("/jnsKamar")->with('destroyError','Maaf, kamu tidak bisa menghapus kategori. silahkan hapus kamar yang memiliki kategori ini.');
        }else{
            if($category->image){
                Storage::delete($category->image);
            }
            Category::destroy($category->id);
            return redirect("/jnsKamar")->with('successDestroy','Kategori berhasil dihapus!');
        }
    }
}
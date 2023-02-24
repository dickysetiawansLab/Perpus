<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\Penerbit;
use App\Models\Kategori;
use App\Models\Buku;

class BukuController extends Controller
{
	public function index(){
		$buku = Buku::all();
		return view('Buku/index', compact('buku'));
	}
	public function tambah(){
		$role = Auth::user()->role;
		$penerbits = Penerbit::latest()->paginate(5);
		$kategoris = Kategori::latest()->paginate(5);
		return view('Buku/tambah',[
				'penerbits'=> $penerbits,
				'kategoris'=> $kategoris
			]);
		
	}
	public function store(Request $request){
		$book = new Buku();

		$bukus = $request -> validate([
			'judul_buku'=>'required',
			'kategori_buku' =>'required',
			'penerbit_buku'=>'required',
			'pengarang'=>'required',
			'tahun_terbit'=>'required',
			'isbn'=>'unique:bukus|required',
			'id_buku_baik'=>'required',
			'id_buku_rusak'=>'required',
			'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
		]);
		$file_image = 'images';

		$bukus['image']->move($file_image, $bukus['image']->getClientOriginalName());
		$file_name_image = $bukus['image']->getClientOriginalName();

		$book->judul_buku = $bukus['judul_buku'];
		$book->kategori_buku = $bukus['kategori_buku'];
		$book->penerbit_buku = $bukus['penerbit_buku'];
		$book->pengarang = $bukus['pengarang'];
		$book->tahun_terbit = $bukus['tahun_terbit'];
		$book->isbn = $bukus['isbn'];
		$book->id_buku_baik = $bukus['id_buku_baik'];
		$book->id_buku_rusak = $bukus['id_buku_rusak'];
		$book->image = $file_name_image;
		$book->save();
		// $bukus['image']->storeAs('public/images', $bukus['image']->hashName());
		// $bukus->judul_buku = $request->judul_buku;
		// $bukus->kategori_buku = $request->kategori_buku;
		// $bukus->penerbit_buku = $request->penerbit_buku;
		// $bukus->tahun_terbit = $request->tahun_terbit;
		// $bukus->isbn = $request->isbn;
		// $bukus->id_buku_baik = $request->id_buku_baik;
		// $bukus->id_buku_rusak = $request->id_buku_rusak;
		// Buku::create($book);
		return redirect('/buku');

	}
	public function edit(Request $request){
		$bukus = Buku::find($request->id);
		$penerbits = Penerbit::all();
		$kategoris = Kategori::all();
		return view('Buku/edit', compact('bukus','penerbits','kategoris'));
	}
	public function update(Request $request){


		$bukus = $request -> validate([
			'judul_buku'=>'required',
			'kategori_buku' =>'required',
			'penerbit_buku'=>'required',
			'pengarang'=>'required',
			'tahun_terbit'=>'required',
			'isbn'=>'required',
			'id_buku_baik'=>'required',
			'id_buku_rusak'=>'required',
			'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
		]);
		// dd($bukus);

		$file_image = 'images';

		$bukus['image']->move($file_image, $bukus['image']->getClientOriginalName());
		$file_name_image = $bukus['image']->getClientOriginalName();

		$data_buku = Buku::find($request->id);	
		$data_buku->judul_buku = $bukus['judul_buku'];
		$data_buku->kategori_buku = $bukus['kategori_buku'];
		$data_buku->penerbit_buku = $bukus['penerbit_buku'];
		$data_buku->pengarang = $bukus['pengarang'];
		$data_buku->tahun_terbit = $bukus['tahun_terbit'];
		$data_buku->isbn = $bukus['isbn'];
		$data_buku->id_buku_baik = $bukus['id_buku_baik'];
		$data_buku->id_buku_rusak = $bukus['id_buku_rusak'];
		$data_buku->image = $file_name_image;
		$data_buku->update();
		return redirect('/buku');
		
	}
	public function destroy(Request $request){
		$data_buku = Buku::find($request->id);	
		$data_buku->delete();
		return redirect('/buku');
	}
}



?>
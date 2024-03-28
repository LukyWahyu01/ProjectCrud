<?php

namespace App\Http\Controllers;
use App\Models\ProfileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class userController extends Controller

{ 
    
    public function index()
    {
        $profileModel = new ProfileModel();
        $db = $profileModel->alldata();
       
       
        // dd($db);
        
        return view('profile', compact('db'));
    }


    public function __construct()
    {
      $this->profileModel = new ProfileModel;
    }

    public function tambah()
    {
      return view('tambahuser');
    }

    public function add(Request $request)
    {
      $this->validate($request, [
        'nama' => 'required|min:3|max:50',
        'kontak' => 'required',
        'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
      ], [
        'nama.required' => 'Nama harus diisi',
        'nama.min' => 'Nama minimal 3 karakter',
        'nama.max' => 'Nama maksimal 50 karakter',

        'foto.image' => 'Foto harus berupa gambar',
        'foto.mimes' => 'Format foto hanya bisa jpg, png, gif, atau svg',
        'foto.max' => 'Ukuran foto terlalu besar, maksimal 2MB',
      ]);
    
      if ($request->file('foto')) {
        $imgname = $request->nama.'.'.$request->foto->extension();
        $request->foto->move(public_path('asset/img/'), $imgname);
      } else {
        $imgname = 'default.png';
      }
    
      $user = new ProfileModel;
      $data = [
        'nama' => $request->nama,
        'kontak' => $request->kontak,
        'foto' => $imgname,
      ];
      $user->addData($data);
      return redirect('/profile')->with('status', 'Tambah data berhasil');
    }
public function detail($id)
{
  $ProfileModel = new ProfileModel();
  $user =$ProfileModel->find($id);
  return view('detailUser',compact('user'));
  
}
   public function detailedit($id)
   {
    $ProfileModel = new ProfileModel();
    $user = $ProfileModel->find($id);
    return view('editUser',compact('user'));
   } 
   public function edit(Request $request, $id)
   {
    if($request->foto<> "")
    {
      $imgname = $request->nama.'.'.$request->foto->extension();
      $request->foto->move(public_path('gambar'),$imgname);
      $data = [
        'id' => $request->id,
        'nama' => $request->nama,
        'kontak'=> $request->kontak,
        'foto' => $imgname,
      ];
      $ProfileModel = new ProfileModel();
      $user = $ProfileModel->editData($data, $id);


    } else{
      $data = [
        'id' => $request-> id,
        'nama'=> $request-> nama,
        'kontak'=> $request->kontak,
      ];
      $ProfileModel = new ProfileModel();
      $user = $ProfileModel->editData($data, $id);
   
    }
    return redirect('/profile')->with('status','Edit Data Berhasil');
   }
   public function delete($id)
    {
      // $this->profileModel->deleteData($id);
      // Lanjutkan dengan logika penghapusan lainnya...
      // $profileModel = new ProfileModel();
      // $profileModel->deleteData($id);

      DB::table("profile")
       ->where('id',$id)
       ->delete();
      return redirect('/profile');
    }
   
}
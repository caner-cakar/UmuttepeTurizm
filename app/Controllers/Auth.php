<?php

namespace App\Controllers;
use CodeIgniter\Controller;
use App\Libraries\Hash;

class Auth extends BaseController
{
    public function __construct()
    {
        helper(['url', 'form']); // 'form' helper'ını ekliyoruz
        helper('Form');  // Yeni yardımcıyı yükleme
    }

    public function index()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }
    
    public function save(){
        

        $validation = $this->validate([
            'tcKimlik'=>[
                'rules'=>'required|numeric|exact_length[11]|is_unique[kullanicilar.tcKimlik]',
                'errors'=>[
                    'required'=>'TC girmen gerek',
                    'numeric' =>'Sadece sayı girmeniz gerekli',
                    'exact_length' => 'TC Kimlik No 11 haneli olmalı',
                    'is_unique' => 'Bu TC No zaten kullanılıyor'
                ]
                ],

            'ad'=>[
                'rules'=>'required',  
                'errors'=>[
                    'required'=>'İsmini girmen gerek'
                ]
                ],

            'soyad'=>[
                    'rules'=>'required',  
                    'errors'=>[
                        'required'=>'Soyismini girmen gerek'
                    ]
                    ],

            'dogumTarihi' => [
                        'rules' => 'required',
                        'errors' => [
                            'required' => 'Doğum tarihi girmeniz gerekiyor'
                        ]
                    ],

            'mail'=>[
                'rules'=>'required|valid_email|is_unique[kullanicilar.mail]',
                'errors'=>[
                    'required'=>'Email girmeniz gerek',
                    'valid_email'=>'Geçerli bir email adresi girmeniz gerek',
                    'is_unique'=>'Bu email zaten kullanılıyor'
                ]
                ],

            'sifre' => [
                    'rules' => 'required|min_length[5]|max_length[20]',
                    'errors' => [
                        'required' => 'Şifre girmeniz gerekiyor',
                        'min_length' => 'Şifre en az 5 karakterden oluşmalı',
                        'max_length' => 'Şifre en fazla 20 karakterden oluşmalı'
                    ]
                ]
            
        ]);

        if(!$validation){
            return view('auth/register', ['validation' => $this->validator]);
        }else{
            $tcKimlik = $this->request->getPost('tcKimlik');
            $ad = $this->request->getPost('ad');
            $soyad = $this->request->getPost('soyad');
            $dogumTarihi = $this->request->getPost('dogumTarihi');
            $mail = $this->request->getPost('mail');
            $sifre = $this->request->getPost('sifre');

            $values = [
                'tcKimlik' => $tcKimlik,
                'ad' => $ad,
                'soyad' => $soyad,
                'dogumTarihi' => $dogumTarihi,
                'mail' => $mail,
                'sifre' =>Hash::make($sifre),
            ];

            $usersModel = new \App\Models\UsersModel();
            $query = $usersModel->insert($values);
            if(!$query){
                return redirect()->back()->with('fail','Something went wrong');
                //return redirect()->to('register')->with('fail','Something went wrong');
            }else{
                //return redirect()->to('auth/register')->with('success','Başarıyla Giriş Yaptınız ');
                $last_id = $usersModel->insertID();
                session()->set('loggedUser', $last_id);
                return redirect()->to('main/index');
            }

        }
    }

    function check(){
        $validation = $this->validate([
            'mail' =>[
                'rules' =>'required|valid_email|is_not_unique[kullanicilar.mail]',
                'errors'=>[
                    'required'=>'Lütfen mail giriniz',
                    'valid_email'=>'Lütfen geçerli bir mail giriniz',
                    'is_not_unique'=>'Bu maille kayıt olunmamış'
                ]
                ],
            'sifre'=>[
                'rules'=>'required|min_length[5]|max_length[20]',
                'errors'=>[
                    'required'=>'Lütfen şifre giriniz',
                    'min_length'=>'Şifre en az 5 karakterli olmalı',
                    'max_length'=>'Şifre en fazla 20 karakterli olmalı'
                ]
            ]
        ]);

        if(!$validation){
            return view('auth/login',['validation'=> $this->validator]);
        }else{
            $mail = $this->request->getPost('mail');
            $sifre = $this->request->getPost('sifre');
            $usersModel = new \App\Models\UsersModel();
            $user_info = $usersModel->where('mail',$mail)->first();
            $check_password = Hash::check($sifre,$user_info['sifre']);
            
            if(!$check_password){
                session()->setFlashdata('fail','Yanlış şifre');
                return redirect()->to('auth/login')->withInput();
            }else{
                $user_id = $user_info['kullaniciID'];
                session()->set('loggedUser', $user_id);
                return redirect()->to('main/index');
            }

        }
    }

    function logout(){
        if(session()->has('loggedUser')){
            session()->remove('loggedUser');
            return redirect()->to('/auth/login?access=out')->with('fail','Çıkış yaptınız');
        }
    }
}

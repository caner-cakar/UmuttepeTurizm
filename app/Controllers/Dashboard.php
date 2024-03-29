<?php

namespace App\Controllers;
use App\Models\BiletlerModel;
use App\Models\KullanicilarModel;
use App\Models\KoltukModel;
use App\Models\OdemelerModel;

class Dashboard extends BaseController
{
    public function index()
    {
        $usersModel = new \App\Models\UsersModel();
        $loggedUserId = session()->get('loggedUser');
        $userInfo = $usersModel->find($loggedUserId);
        $kullanicilarModel = new KullanicilarModel();
        $loggedUserId = session()->get('loggedUser');
        $data['loggedUser'] = $loggedUserId;
        $biletlerModel = new BiletlerModel();
        $biletler = $biletlerModel->where('kullaniciID', $loggedUserId)->findAll();

        $kullanici = $kullanicilarModel->find($loggedUserId); // Kullanıcıyı bulun

       


        if ($this->request->getMethod() === 'post') {
            $biletId = $this->request->getPost('biletID');
            
            // Ödeme tablosundan ilgili kaydı bulun
            $odemelerModel = new OdemelerModel();
            $odemeKaydi = $odemelerModel->where('biletID', $biletId)->first();
    
            if ($odemeKaydi) {
                // Ödeme tablosundaki bakiye miktarını alın
                $odemeMiktari = $odemeKaydi['odemeMiktar'];
    
                // Kullanıcı tablosundaki ilgili kullanıcıyı bulun
                $kullanicilarModel = new KullanicilarModel();
                $kullaniciId = $odemeKaydi['kullaniciID'];
                $kullanici = $kullanicilarModel->find($kullaniciId);
    
                if ($kullanici) {
                    // Kullanıcı tablosundaki bakiye değerini alın ve ödeme miktarını ekleyin
                    $bakiye = $kullanici['bakiye'] + $odemeMiktari;
    
                    // Kullanıcı tablosundaki bakiye değerini güncelleyin
                    $kullanici['bakiye'] = $bakiye;
                    $kullanicilarModel->save($kullanici);
    
                    // Ödeme tablosundaki ilgili kaydı silin
                    $odemelerModel->delete($odemeKaydi['odemeID']);
                }
            }
            
            // İlgili biletin koltuk ve ödeme kayıtlarını silmek için modelleri kullanarak işlemi gerçekleştirin
            $biletlerModel->delete($biletId); // Bilet kaydını sil
            // İlgili koltuk kaydını sil
            $koltuklarModel = new KoltukModel();
            $koltuklarModel->where('biletID', $biletId)->delete();
        }

            if ($kullanici) {
                $bakiye = $kullanici['bakiye']; // Kullanıcının bakiye değerini alın
                $data['bakiye'] =  $bakiye;
            } else {
                
            }

            $data['biletler'] = $biletler;
            $data['userInfo'] = $userInfo;
        return view('dashboard/account',$data);
    }

    
    
}

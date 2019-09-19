<?php
namespace App\Http\Controllers;

class Pages extends Controller
{

    public function committees()
    {
        return view('pages.committees')->with('committees',$this->getPublicCommittees());
    }

    public function aloalerj(){
        return view('pages.aloalerj');
    }

    public function telefones(){
        return view('pages.telefones');
    }

    public function protocolo(){
        return view('pages.telefones');
    }

    public function contact(){
        return view('pages.contact');
    }

    private function getPublicCommittees(){
        return $this->committeesRepository->findByColumn('public',true)->get();
    }


//Route::get('pages/telefones', ['as' => 'pages.telefones', 'uses' => 'Pages@telefones']);
//Route::get('pages/protocolo', ['as' => 'pages.protocolo', 'uses' => 'Pages@protocolo']);
//Route::get('pages/contact', ['as' => 'pages.contact', 'uses' => 'Pages@contact']);
}

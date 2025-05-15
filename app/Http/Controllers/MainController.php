<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class MainController extends Controller
{
   
    public function verify($category, $uuid)
    {

       $document = Document::select('document_id', 'category')->where('category', $category)
                       ->where('document_id', $uuid)->first();
        if($document){
            return view('main', compact('document'));
       }

       abort(404);
        
    }


    public function verifyDocument(Request $request, $category, $uuid){

        $rules = [
            'captcha' => 'required|lowercase|captcha'
        ];
    
        $messages = [
            'captcha.required' => 'Kode Verifikasi tidak boleh kosong.',
            'captcha.captcha' => 'Kode Verifikasi yang dimasukkan tidak sesuai!'
        ];
    
       
        $validator = validator()->make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }


        $document = null;

        if($category == "ijazah") {
            $document = Document::where('document_id', $uuid)
            ->where('sign_status', '2')
            ->whereJsonContains('document_verify', ['nim' => $request->nim])
            ->whereJsonContains('document_verify', ['no_ijazah' => $request->no_ijazah])
            ->latest()
            ->first();
        } else if($category == "transkrip") {
            $document = Document::where('document_id', $uuid)
            ->where('sign_status', '2')
            ->whereJsonContains('document_verify', ['nim' => $request->nim])
            ->whereJsonContains('document_verify', ['no_ijazah' => $request->no_ijazah])
            ->latest()
            ->first();

        } else if($category == "surat"){
            $document = Document::where('document_id', $uuid)
            ->where('sign_status', '2')
            ->whereJsonContains('document_verify', ['no_surat' => $request->no_surat])
            ->latest()
            ->first();
        } else{
            $document = Document::where('document_id', $uuid)
            ->where('sign_status', '2')
            ->latest()
            ->first();
        }

    

        if($document){
            if (Storage::disk('s3')->exists(str_replace(env('AWS_BUCKET')."/", "", $document->signed_file))) {
                $document->temporary_url = Storage::disk('s3')->temporaryUrl(
                    str_replace(env('AWS_BUCKET')."/", "", $document->signed_file), now()->addMinutes(10)
                );
            }
           
             return view('result', compact('document'));
             
        }else{

            $key = 'rate_limit_' . $request->ip();
            $rateLimit = Session::get($key, ['attempts' => 0, 'timestamp' => time()]);
            
            $rateLimit['attempts']++;
            Session::put($key, $rateLimit);

            return back()->with('error','Dokumen Tidak Ditemukan, Silakan coba lagi!');
        }
            


        
        

    }


}

<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use App\Models\Document;

class DownloadMinIOFiles extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'minio:download-files';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Download File from MinIO';

    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Execute the console command.
     */
    public function handle()
    {
    //     $diskMinio = Storage::disk('s3');
         $diskLocal = Storage::disk();
    //     $documents = Document::where('sign_status', 1)->get();
       
    //     foreach($documents as $document){
    //         $filePath = "temporary_documents/".$document->client_id."/".$document->document_id.".pdf";
    //        if ($diskMinio->exists($filePath)) {
    //             $contents = $diskMinio->get($filePath);
                
    //             // Cek jika direktori belum ada, maka buat direktorinya
    //             $directory = dirname($filePath); // Mendapatkan direktori dari path file
    //             if (!$diskLocal->exists($directory)) {
    //                 $diskLocal->makeDirectory($directory, 0755, true); // true untuk recursive creation
    //             }
                
    //             // Simpan file dengan path lengkap, mempertahankan struktur folder
    //             $diskLocal->put($filePath, $contents);
                
    //             $this->info("Downloaded and saved: {$filePath}");
    //         } else {
    //             $this->error("File does not exist: {$filePath}");
    //         }    
    //   }

        $allFiles = $diskLocal->allFiles('signed_documents/siat');

        // Menghitung jumlah file termasuk dalam subdirektori
        $fileCount = count($allFiles);

        echo "There are {$fileCount} files in the directory, including subdirectories.";
    }
}

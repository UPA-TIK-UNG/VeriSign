<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title>Verifikasi Dokumen</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="App manajemen akses dokumen public UNG" name="description" />
        <meta content="UPA TIK UNG" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link rel="shortcut icon" href="https://files.ung.ac.id/images/logo/favicon.png">
		@vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="authentication-bg authentication-bg-pattern">

        <div class="account-pages mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern">
                            <div class="card-body p-4">
                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        <a href="#" class="logo text-center">
                                            <span class="">
                                                <img src="{{url('images/logo.png');}}" alt="" height="70">
                                            </span>
                                        </a>
                                    </div>
                                    <p class="text-muted mb-4 mt-3">Masukkan data di bawah dengan benar untuk melihat dokumen</p>
                                </div>
                                @if ($errors->any())
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                          </div>
                                    </div>
                                </div>
                                @endif

                                @if ($message = Session::get('error'))
                                <div class="row">
                                    <div class="col-12">
                                        <div class="alert alert-danger" role="alert">
                                            {{ $message }}
                                          </div>
                                    </div>
                                </div>
                                @endif
                               

                                <form method="POST" action="{{ route('document.verify', ['uuid' => $document->document_id, 'category' => $document->category]) }}" accept-charset="UTF-8">

                                    {{ csrf_field() }}

                                    {{-- FORM UNTUK IJAZAH --}}
                                    @if($document->category == 'ijazah')
                                    <div class="mb-3">
                                        <label>
                                            NIM
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control" placeholder="Masukan NIM" name="nim" type="text">
                                    </div>
                                        <div class="mb-3">
                                        <label>
                                            Nomor Ijazah
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control" placeholder="Masukan nomor Ijazah" name="no_ijazah" type="text">
                                    </div>

                                    {{-- END FORM UNTUK IJAZAH --}}

                                    {{-- FORM UNTUK TRANSKRIP --}}
                                 
                                    @elseif($document->category == 'transkrip')
                                    <div class="mb-3">
                                        <label>
                                            NIM
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control" placeholder="Masukan NIM" name="nim" type="text">
                                    </div>
                                        <div class="mb-3">
                                        <label>
                                            Nomor Ijazah
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control" placeholder="Masukan nomor Ijazah" name="document" type="text">
                                    </div>

                                    {{-- END FORM UNTUK TRANSKRIP --}}

                                    {{-- FORM UNTUK SURAT --}}

                                    @elseif($document->category == 'surat')
                                    <div class="mb-3">
                                        <label> Nomor Surat <span class="text-danger">*</span>
                                        </label>
                                        <input class="form-control" placeholder="Isikan nomor Ijazah" name="document" type="text">
                                    </div>
                                    @endif
                                        
                                    {{-- END FORM UNTUK SURAT --}}
                                    
                                    <div class="mb-3">
                                        <img src="{{ captcha_src(); }}" >
                                    </div>

                                    <div class="mb-3">
                                        <label for="captcha">
                                            Kode Verifikasi
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input type="text" class="form-control" autocomplete="off" id="captcha" name="captcha" placeholder="Masukkan captcha di atas">
                                    </div>

                                    <div class="text-center d-grid">
                                       <button type="submit" class="btn btn-primary me-1 mb-1 btn-submit " ><span class="spinner-border spinner-border-sm loading-spinner me-1" role="status" aria-hidden="true" style="display:none;"></span><span style="display:none;" class="loading-spinner-text"> Loading...</span> <span class="btn-text">Verify</span></button>
                                    </div>

                                </form>

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->


        <footer class="footer footer-alt text-white-50">
            2024 &copy; VeriSign-File Manager by <a href="https://tik.ung.ac.id" class="text-white-50">UPA Teknologi Informasi Komunikasi</a>
        </footer>
    </body>
</html>

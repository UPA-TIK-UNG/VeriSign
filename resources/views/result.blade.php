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
                    <div class="col-md-8 col-lg-6 col-xl-6">
                        <div class="card bg-pattern">

                            <div class="card-body p-4">

                                <div class="text-center text-success mb-4">
                                    <i class="bi bi-shield-check mb-0 pb-0" style="font-size: 125px;"></i>
                                    <h3 class="mt-0 pt-0">Dokumen Valid</h3>
                                </div>

                                <form action="#" method="POST" class="mb-4">
                                    <div class="mb-3">
                                        <label>Dokumen</label>
                                        <input class="form-control fw-bold" disabled name="" type="text" value="{{ $document->title }}">
                                    </div>

                                    <div class="mb-3">
                                        <label>Deskripsi</label>
                                        

                                <textarea class="form-control fw-bold text-start" disabled rows="3" name="" cols="50">
Detail lengkap dokumen → {{ $document->description }}
</textarea>
                                    </div>

                                    

                                </form>

                                <div class="text-center w-75 m-auto mb-4">
                                    <a href="{{ $document->temporary_url }}" class="btn btn-lg btn-outline-success"><span class="bi bi-cloud-arrow-down-fill"></span> Unduh Dokumen</a>
                                </div>

                                <div class="text-center w-75 m-auto">
                                    <div class="auth-logo">
                                        <a href="#" class="logo text-center">
                                            <span class="">
                                                <img src="https://files.unnes.ac.id/logo/logo-bsre.png" height="50">
                                                <span>&nbsp;&nbsp;</span>
                                                <img src="{{url('images/logo.png');}}" alt="" height="40">
                                            </span>
                                        </a>
                                    </div>
                                    <p class="mb-4 mt-3">Dokumen ini telah ditandatangani secara elektronik menggunakan sertifikat elektronik yang diterbitkan oleh Balai Sertifikasi Elektronik (BSrE), BSSN.</p>
                                </div>

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

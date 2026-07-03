<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SIMAS - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-info">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-flex align-items-center justify-content-center">
                                <img src="{{ asset('storage/logo_semangko/logo_area_semangko.jpeg') }}"
                                    class="mx-auto d-block mb-3" alt="BSI Logo"
                                    style="width: 350px; height: 350px;">
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><b>Register Your Account!</b></h1>
                                    </div>
                                    <form action="{{ route('register') }}" method="POST">
                                        @csrf
                                        <div class="form-group mb-0">
                                            <label for="name" class="text-gray-900"
                                                style="font-size: 14px;">Name</label>
                                            <input type="name" class="form-control form-control-user mb-1"
                                                id="name" aria-describedby="emailHelp" placeholder="Enter Name"
                                                name="name">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="nip" class="text-gray-900"
                                                style="font-size: 14px;">NIP</label>
                                            <input type="nip" class="form-control form-control-user mb-1"
                                                id="nip" aria-describedby="emailHelp" placeholder="NIP"
                                                name="nip">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="exampleInputEmail" class="text-gray-900"
                                                style="font-size: 14px;">Email Address</label>
                                            <input type="email" class="form-control form-control-user mb-1"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address" name="email">
                                        </div>
                                        <div class="form-groupmb-0">
                                            <label for="exampleInputPassword" class="text-gray-900"
                                                style="font-size: 14px;">Password</label>
                                            <input type="password" class="form-control form-control-user mb-1"
                                                id="exampleInputPassword" placeholder="Password" name="password">
                                        </div>
                                        <div class="form-group mb-0">
                                            <label for="unit" class="text-gray-900"
                                                style="font-size: 14px;">Unit</label>
                                            <select class="form-control mb-1" id="unit" name="unit">
                                                <option value="pilih_unit">--Pilih Unit--</option>
                                                <option value="ACR">ACR</option>
                                                <option value="Consumer">Consumer</option>
                                                <option value="FTRM">FTRM</option>
                                                <option value="RBC">RBC</option>
                                                <option value="Risk">Risk</option>
                                                <option value="SME">SME</option>
                                                <option value="Operasional">Operasional</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telepon" class="text-gray-900" style="font-size: 14px;">No
                                                Telepon</label>
                                            <input type="no_telepon" class="form-control form-control-user"
                                                id="no_telepon" placeholder="No Telepon" name="no_telepon">
                                        </div>
                                        <button type="submit" class="btn btn-info btn-user btn-block">
                                            Register
                                        </button>
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ route('login') }}">Already Have Account!</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>

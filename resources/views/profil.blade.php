@extends('layouts.main')
@section('container')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="py-3 d-flex flex-row align-items-center justify-content-between">
                <h4 class="pl-3 m-0 font-weight-bold text-primary ">Riwayat Aktivitas</h4>
            </div>
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                           

                            <img src="{{ asset('storage/Profil/' . Auth::user()->foto) }}" alt="Profile" width="200px"
                                class="rounded-circle">
                            <h2>{{ Auth::user()->name }}</h2>
                            <h3>{{ Auth::user()->email }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered">
                                <li class="nav-item">
                                    <button class="nav-link active" data-bs-toggle="tab"
                                        data-bs-target="#profile-overview">Overview</button>
                                </li>
                                <li class="nav-item">
                                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit
                                        Profile</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-2">
                                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                                    <div class="col-md-12 mb-4 mt-4" style="position: relative">
                                        <div
                                            class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-1 border-bottom">
                                        </div>
                                        <p class="text-primary bg-white px-1 ml-3"
                                            style="position: absolute; top:10px;">
                                            Detail Profil</p>
                                    </div>
                                    <div class="d-flex col-md-6 mb-3">
                                        <label for="nis" class="form-control-label fw-semibold text-dark col-lg-5 col-md-8">Nama Lengkap
                                        </label>
                                        <input disabled value="{{ Auth::user()->name }}" type="text"
                                            class="form-control form-control-md col-lg-9 col-md-8" id="nis" placeholder="Masukkan NIS"
                                            name="nis">
                                    </div>
                                    <div class="d-flex col-md-6 mb-3">
                                        <label for="nis" class="form-control-label fw-semibold text-dark col-lg-5 col-md-8">Email
                                        </label>
                                        <input disabled value="{{ Auth::user()->email }}" type="text"
                                            class="form-control form-control-md col-lg-9 col-md-8" id="nis" placeholder="Masukkan NIS"
                                            name="nis">
                                    </div>
                                 
                                </div>
                                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                                    <!-- Profile Edit Form -->
                                    <form action="{{ url('profil/editprofile') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Foto
                                                Profil</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input type="file" class="form-control" id="formFile" name="foto">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Nama
                                                Lengkap</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="name" type="text" class="form-control" id="fullName"
                                                    value="{{ Auth::user()->name }}">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="text" class="form-control" id="fullName"
                                                    value="{{ Auth::user()->email }}" disabled>
                                            </div>
                                        </div>
                                        @if (Auth::user()->role == 'siswa')
                                            <div class="row mb-3">
                                                <label for="company"
                                                    class="col-md-4 col-lg-3 col-form-label">Alamat</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="alamat" type="text" class="form-control" id="fullName"
                                                        value="{{ $siswa->alamat }}">
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <label for="Job" class="col-md-4 col-lg-3 col-form-label">Nomor
                                                    Telepon</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="no_hp" type="text" class="form-control" id="fullName"
                                                        value="{{ $siswa->no_hp }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Job" class="col-md-4 col-lg-3 col-form-label">NIS</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="nis" type="text" class="form-control" id="fullName"
                                                        value="{{ $siswa->nis }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Job" class="col-md-4 col-lg-3 col-form-label">Tempat
                                                    Lahir</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="tempat_lahir" type="text" class="form-control"
                                                        id="fullName" value="{{ $siswa->tempat_lahir }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Job" class="col-md-4 col-lg-3 col-form-label">Tanggal
                                                    Lahir</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="tanggal_lahir" type="text" class="form-control"
                                                        id="fullName" value="{{ $siswa->tanggal_lahir }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Job" class="col-md-4 col-lg-3 col-form-label">Agama</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="agama" type="text" class="form-control"
                                                        id="fullName" value="{{ $siswa->agama }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Job" class="col-md-4 col-lg-3 col-form-label">Ayah</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="ayah" type="text" class="form-control"
                                                        id="fullName" value="{{ $siswa->ayah }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <label for="Job" class="col-md-4 col-lg-3 col-form-label">Ibu</label>
                                                <div class="col-md-8 col-lg-9">
                                                    <input name="ibu" type="text" class="form-control"
                                                        id="fullName" value="{{ $siswa->ibu }}">
                                                </div>
                                            </div>
                                        @endif
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->
                                </div>

                                {{-- <div class="tab-pane fade pt-3" id="profile-settings">

                                    <!-- Settings Form -->
                                    <form>
                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                                Notifications</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="changesMade"
                                                        checked>
                                                    <label class="form-check-label" for="changesMade">
                                                        Changes made to your account
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="newProducts"
                                                        checked>
                                                    <label class="form-check-label" for="newProducts">
                                                        Information on new products and services
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="proOffers">
                                                    <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityNotify"
                                                        checked disabled>
                                                    <label class="form-check-label" for="securityNotify">
                                                        Security alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End settings Form -->
                                </div> --}}

                                {{-- <div class="tab-pane fade pt-3" id="profile-change-password">
                                    <!-- Change Password Form -->
                                    <form method="post" action="">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" id="password"
                                                    class="form-control" id="password">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password_confirmation" id="confirm_password" type="password"
                                                    class="form-control">
                                                <span id='message'></span>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" id="submitpassword" class="btn btn-primary">Change
                                                Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->
                                </div> --}}
                            </div><!-- End Bordered Tabs -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

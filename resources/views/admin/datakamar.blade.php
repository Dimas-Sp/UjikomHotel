<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>AdminPage | Dashboard</title>
  <link href="{{ url('RuangAdmin') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{ url('RuangAdmin') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="{{ url('RuangAdmin') }}/css/ruang-admin.min.css" rel="stylesheet">
  <script src="https://unpkg.com/feather-icons"></script>
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon ">
          <img class="rounded-circle" src="{{ url('RuangAdmin') }}/img/logo/logo2.png">
        </div>
        <div class="sidebar-brand-text mx-3">Page Admin</div>
      </a>
      <hr class="sidebar-divider my-0">
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/login/dashboard'); }}">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>
      <hr class="sidebar-divider">
      <div class="sidebar-heading">
        Features
      </div>
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTable" aria-expanded="true"
          aria-controls="collapseTable">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span>
        </a>
        <div id="collapseTable" class="collapse" aria-labelledby="headingTable" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Tables</h6>
            <a class="collapse-item" href="...">Data Kamar</a>
            <a class="collapse-item" href="{{ url('/DatFasKam') }}">Data Fasilitas Kamar</a>
            <a class="collapse-item" href="{{ url('/DatFasHotel') }}">Data Fasilitas Umum Hotel</a>
          </div>
        </div>
      </li>

      <hr class="sidebar-divider">
      <div class="version" id="version-ruangadmin"></div>
    </ul>
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="{{ url('RuangAdmin') }}/img/boy.png" style="max-width: 60px">
                <span class="ml-2 d-none d-lg-inline text-white small">{{ dd($data); }}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tabel Data Kamar</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="">Dashboard</a></li>
            </ol>
          </div>

          <div class="row ml-3 mr-3">
          <!-- Simple Tables -->
          <div class="card" style="width: 1650px;">
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>Tipe Kamar</th>
                        <th>Jumlah Kamar</th>
                        <!-- <th>Foto Kamar</th> -->
                        <th>Aksi</th> 
                      </tr>
                    </thead>
                    <tbody>
                    @foreach ($data as $d) 
                      <tr>
                        <td>{{ $d->nama_tipe }}</td>
                        <td>{{ $d->jml_kamar }}</td>
                        <!-- <td>
                          <img src="{{ asset('img') }}/{{ $d->gambar_tipekamar }}" alt="" width="100px">
                        </td> -->
                        <td>
                          <a href="{{ url('/kamar/ubah', $d->id_kamar) }}" class="btn btn-sm btn-success">Ubah</a>
                          <a href="..." class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal">Detail</a>

                          <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">{{ $d->nama_tipe }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                ...
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Save changes</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        </td>
                        <!-- <td><span class="badge badge-warning">Shipping</span></td> -->
                      </tr>
                                            
                    @endforeach

                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
              </div>
            </div>
              <div class="d-sm-flex flex-row-reverse">
              <a href="{{ url('/kamar', $d->id_kamar) }}/tambahData" class="btn btn btn-primary rounded-circle mr-3 mt-3" style="height:50px; width: 50px; padding-top:11px;"><i data-feather="plus"></i></a>
              </div>
          </div>
            
          <!-- Modal Logout -->
          <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <p>Are you sure you want to logout?</p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                  <a href="login.html" class="btn btn-primary">Logout</a>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!-- Footer -->
      <footer class="sticky-footer bg-white mt-5">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>copyright &copy; <script> document.write(new Date().getFullYear()); </script> - developed by
              <b><a href="https://indrijunanda.gitlab.io/" target="_blank">indrijunanda</a></b>
            </span>
          </div>
        </div>
      </footer>
      <!-- Footer -->
        <!---Container Fluid-->
      </div>
      
    </div>
  </div>

  <!-- Scroll to top -->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <script src="{{ url('RuangAdmin') }}/vendor/jquery/jquery.min.js"></script>
  <script src="{{ url('RuangAdmin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ url('RuangAdmin') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="{{ url('RuangAdmin') }}/js/ruang-admin.min.js"></script>
  <script src="{{ url('RuangAdmin') }}/vendor/chart.js/Chart.min.js"></script>
  <script src="{{ url('RuangAdmin') }}/js/demo/chart-area-demo.js"></script>  
  <script>
      feather.replace()
    </script>
</body>

</html>


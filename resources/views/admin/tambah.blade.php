<!-- <!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>

	



</body>
</html> -->

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
        <a class="nav-link" href="{{ url('/login'); }}">
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
            <a class="collapse-item" href="{{ url('/DataKamar') }}">Data Kamar</a>
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
                <span class="ml-2 d-none d-lg-inline text-white small">aa</span>
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

          <div class="row ml-3 mr-3" style="margin-bottom:483px; margin-left:50px; margin-right:550px;">
          <!-- Simple Tables -->
          @foreach($tipe_kamar as $t)
			<form action="{{ url('kamar/update'); }}" method="post">
				{{ csrf_field() }}
				<input type="hidden" name="id_kamar" value="{{ $t->id_kamar }}"> <br/>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Tambah Tipe Kamar</label>
					<select class="form-control" name="id_tipe" id="exampleFormControlSelect1" required="required">
						<option>{{ $t->nama_tipe }}</option>
						<option>Deluxe</option>
						<option>Superior</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="exampleInputJumlah1" class="form-label">Jumlah Kamar</label>
					<input type="text" class="form-control" id="exampleInputPassword1" name="jml_kamar" required="required">
				</div>
				<button type="submit" class="btn btn-warning">Simpan Data</button>
			</form>
			@endforeach
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
</body>

</html>


<!DOCTYPE html>
<html lang="en">
<head>
  @include('includes.head')
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">IOT GateWay</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$fullname}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
             @include('includes.form')
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row" id="device__details">
          <!-- left column -->

            <!-- /.card -->



          <!--/.col (left) -->


        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   @include('includes.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- Page specific script -->
<script>
$(function () {
  bsCustomFileInput.init();
});

const container = document.getElementById("device__details");


var settings = {
  "url": "http://127.0.0.1:8000/api/device-state?id=0",
  "method": "GET",
  "timeout": 0,

};

$.ajax(settings).done(function (res) {
 res.forEach((element) => {
 console.log(element);
const widget = document.createElement("div");
widget.setAttribute("class", "col-md-4");
widget.innerHTML = `

            <div class="card card-widget widget-user">
              <div class="widget-user-header bg-primary">
                <h3 class="widget-user-username" id="device_name_${element.device_id}">${element.device_name}</h3>
                <h5 class="widget-user-desc" id="device_owner_${element.device_id}">Owner- ${element.created_by}  </h5>
              </div>
              <div class="card-footer p-0">
                <ul class="nav flex-column">
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Temparature <span class="float-right badge bg-primary" id="temp_${element.device_id}" > ${element.device_temp}°C</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="#" class="nav-link">
                      Humidity <span class="float-right badge bg-info" id="humidity_${element.device_id}" > ${element.device_humidity}%</span>
                    </a>
                  </li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
         `;

    container.appendChild(widget);

 })});



 const autoUpdate = ()=>{
  $.ajax(settings).done(function (res) {
 res.forEach((element) => {

  document.getElementById(`device_name_${element.device_id}`).innerHTML = element.device_name;
  document.getElementById(`device_owner_${element.device_id}`).innerHTML = `Owner- ${element.created_by}` ;
  document.getElementById(`temp_${element.device_id}`).innerHTML = `${element.device_temp}°C` ;
  document.getElementById(`humidity_${element.device_id}`).innerHTML = `${element.device_humidity}%` ;



 })

  })

 }

 setInterval(() => {
  autoUpdate();
 }, 10000);

</script>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= $title; ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/fontawesome/css/all.min.css">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/summernote/summernote-bs4.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/select2/dist/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/jquery-selectric/selectric.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/dropify/css/dropify.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/prism/prism.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/izitoast/css/iziToast.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/datatables.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">

  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url(); ?>assets/css/components.css">
  <!-- Drop Zone -->
  <link rel="stylesheet" href="<?= base_url(); ?>assets/modules/dropzonejs/dropzone.css">

<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<script>
  function startTime(){
  var today = new Date();
  var h =today.getHours();
  var m =today.getMinutes();
  var s =today.getSeconds();

  m = checkTime(m);
  s = checkTime(s);
  document.getElementById('clock').innerHTML =  
    h + ":" + m + ":" + s;
    var t =setTimeout(startTime,500);
  }
    function checkTime(i){
      if(i<10){
        i="0" + i
      };
      return i;
    }
</script>
</style>
<!-- /END GA -->
</head>

<!-- Header -->
<body onload="startTime()">
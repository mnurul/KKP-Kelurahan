<!DOCTYPE html>
<html>
<head>
<title>Sweet Alert</title>
<!-- <link rel="stylesheet" type="text/css" href="dist/sweetalert.css"> -->
<!-- <script src="../sweetalert2-8.10.7/package/dist/sweetalert2.min.css"></script> -->
<!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script> -->
<!-- <script src="sweetalert2.all.min.js"></script> -->
<!-- Optional: include a polyfill for ES6 Promises for IE11 and Android browser -->
<!-- <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script> -->
<!-- <script src="sweetalert2.min.js"></script> -->
<!-- <link rel="stylesheet" href="sweetalert2.min.css"> -->
<!-- <script type="text/javascript" src="dist/sweetalert.min.js"></script> -->
<script type="text/javascript" src="../sweetalert-master/docs/assets/sweetalert/sweetalert.min.js"></script>
</head>
<body>
<button onclick="fire()">Normal Alert</button>
<button onclick="sweet()" >Sweet Alert</button>
<script>


function normal () {
alert("Normal Alert!");
}
function sweet (){
  swal("Permintaan Anda Akan Kami Proses", "Tunggu hingga 3 sampai 5 hari", "success");
}




</script>
<!-- <script src="../sweetalert2-8.10.7/package/dist/sweetalert2.all.min.js"></script> -->
</body>
</html>
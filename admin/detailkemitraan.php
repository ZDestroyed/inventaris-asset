<?php
require '../function.php';
require '../cek.php';

$idkemitraan = $_GET['id'];
$get = mysqli_query($conn,"select * from kemitraan where idkemitraan='$idkemitraan'");
$fetch = mysqli_fetch_assoc($get);

$namalembaga = $fetch['namalembaga'];
                                                $namaaset = $fetch['namaaset'];
                                                $keterangan = $fetch['keterangan'];
                                                $kodebarang = $fetch['kodebarang'];
                                                $golongan4 = $fetch['golongan4'];
                                                $tanggal = $fetch['tanggal'];
                                                $asal = $fetch['asal'];
                                                $jumlah = $fetch['jumlah'];
                                                $harga = $fetch['harga'];
                                                $luas = $fetch['luas'];
                                                $lokasi = $fetch['lokasi'];
                                                $titikkoor = $fetch['titikkoor'];
                                                $bahan = $fetch['bahan'];
                                                $ukuran = $fetch['ukuran'];
                                                $keteranganlainnya = $fetch['keteranganlainnya'];
                                                $gambar = $fetch['image'];
// if{$gambar==null}{
//     $img = 'No Photo';
// }else{
//     $img= '<img src="../uploadPhoto/'.$gambar.'" class="zoomable">';
// }
?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>keterangan Barang</title>
        <link href="../css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <style>
            .zoomable{
                width: 200px;
            }
            .zoomable:hover{
                transform: scale(2.5);
                transition: 0.2s ease;
            }
        </style>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="#">DPPPAKB</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
            <!-- Navbar-->
            
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                        <a class="nav-link" href="tanah.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                tanah
                            </a>
                            <a class="nav-link" href="alatmesin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Peralatan dan Mesin
                            </a>
                            <a class="nav-link" href="gedungbangunan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Gedung dan Bangunan
                            </a>
                            <a class="nav-link" href="jalan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Jalan,Irigasi dan Jaringan
                            </a>
                            <a class="nav-link" href="asettetaplain.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Aset Tetap Lainnya
                            </a>
                            <a class="nav-link" href="konstruksi.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Konstruksi Dalam Pengerjaan
                            </a>
                            <a class="nav-link" href="kemitraan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Kemitraan Dengan Pihak ke 3
                            </a>
                            <a class="nav-link" href="asettidakberwujud.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Aset Tidak Berwujud
                            </a>
                            <a class="nav-link" href="asetlainlain.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Aset Lain-Lain
                            </a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                    <a class="nav-link" href="logout.php">
                                Logout
                            </a>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Detail</h1>
                         
                            <?php
                                $ambilsemuadatgedung = mysqli_query($conn,"select * from kemitraan");

                                while($fetch=mysqli_fetch_array($ambilsemuadatgedung)){
                                    
                                    $namaaset = $fetch['namaaset'];
                                }
                            ?>
                            
                            
                            <div class="card-body">
                                
                            
                            <div class="table-responsive">
                                    
                                        
                                        <tbody>

                                            
                                            <?php
                                            $ambilsemuadatgedung = mysqli_query($conn,"select * from kemitraan where idkemitraan='$idkemitraan'");
                                            $i = 1;
                                            while($data=mysqli_fetch_array($ambilsemuadatgedung)){
                                                
                                                $namalembaga = $data['namalembaga'];
                                                $namaaset = $data['namaaset'];
                                                $keterangan = $data['keterangan'];
                                                $kodebarang = $data['kodebarang'];
                                                $golongan4 = $data['golongan4'];
                                                $tanggal = $data['tanggal'];
                                                $asal = $data['asal'];
                                                $jumlah = $data['jumlah'];
                                                $harga = $data['harga'];
                                                $luas = $data['luas'];
                                                $lokasi = $data['lokasi'];
                                                $titikkoor = $data['titikkoor'];
                                                $bahan = $data['bahan'];
                                                $ukuran = $data['ukuran'];
                                                $keteranganlainnya = $data['keteranganlainnya'];
                                                $gambar = $data['image'];
                                                $idkemitraan = $data['idkemitraan'];

                                                if($gambar==null){
                                                    //gaada gambar
                                                    $img = 'No Photo';
                                                }else{
                                                    //ada
                                                    $img ='<img src="../images/'.$gambar.'" class="zoomable">';
                                                }

                                                
                                        
                                                 //echo json_encode($namalembaga);
                                            ?>

                                            <div class="card mb-4">
                                            <div class="card-header" style="font-size: 24px;">
                                            <strong><?=$namaaset;?></strong>
                                            </div>     
                                            <!-- foto -->
                                            <div class="row">
                                            <div class="col"><?=$img;?></div> 
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2">Nama Lembaga</div>
                                            <div class="col-md-9">: <?=$namalembaga;?></div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2">Nama Aset</div>
                                            <div class="col-md-9">: <?=$namaaset;?></div>
                                            </div >
                                            <div class="row">
                                            <div class="col-md-2">Keterangan</div>
                                            <div class="col-md-9">: <?=$keterangan;?></div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2">Kode Barang</div>
                                            <div class="col-md-9">: <?=$kodebarang;?></div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2">Golongan di lv.4</div>
                                            <div class="col-md-9">: <?=$golongan4;?></div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2">tanggal</div>
                                            <div class="col-md-9">: <?=$tanggal;?></div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2">asal usul</div>
                                            <div class="col-md-9">: <?=$asal;?></div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2">jumlah</div>
                                            <div class="col-md-9">: <?=$jumlah;?></div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2">harga</div>
                                            <div class="col-md-9">: <?=$harga;?></div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2">luas</div>
                                            <div class="col-md-9">: <?=$luas;?></div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2">lokasi</div>
                                            <div class="col-md-9">: <?=$lokasi;?></div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2">titikkoor </div>
                                            <div class="col-md-9">: <?=$titikkoor;?></div>
                                            </div>
                                            
                                            <div class="row">
                                            <div class="col-md-2">bahan</div>
                                            <div class="col-md-9">: <?=$bahan;?></div>
                                            </div>
                                            <div class="row">
                                            <div class="col-md-2">ukuran </div>
                                            <div class="col-md-9">: <?=$ukuran;?></div>
                                            </div>
                                           
                                            <div class="row">
                                            <div class="col-md-2">keteranganlainnya</div>
                                            <div class="col-md-9">: <?=$keteranganlainnya;?></div>
                                            </div>
                                            
                                            
                                               
                                                    
                                                </div>
                                                </div>
                                            </div>


                                           

                                

                                            <?php
                                            };

                                            ?>
                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>

        <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
   
        <script src="./plugin/sweetalert/sweetalert.min.js"></script>
        <script src="./plugin/webcamjs/webcam.min.js"></script>
        
    </body>
               
        
</html>

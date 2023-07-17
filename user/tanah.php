<?php
require '../function.php';
require '../cek.php';

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

        <style>
            .zoomable{
                width: 100px;
            }
            .zoomable:hover{
                transform: scale(2.5);
                transition: 0.2s ease;
            }
        </style>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">DPPPAKB</a>
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
                    <a class="nav-link" href="../logout.php">
                                Logout
                            </a>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Tanah</h1>
                        
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                    Tambah data
                                </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Gambar</th>
                                                <th>Nama lembaga</th>
                                                <th>nama aset</th>
                                                <th>keterangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        
                                        <tbody>

                                            
                                            <?php
                                            $ambilsemuadatatanah = mysqli_query($conn,"select * from tanah");
                                            $i = 1;
                                            while($data=mysqli_fetch_array($ambilsemuadatatanah)){
                                                
                                                $namalembaga = $data['namalembaga'];
                                                $namaaset = $data['namaaset'];
                                                $keterangan = $data['keterangan'];
                                                $kodebarang = $data['kodebarang'];
                                                $golongan4 = $data['golongan4'];
                                                $asal = $data['asal'];
                                                $jumlah = $data['jumlah'];
                                                $harga = $data['harga'];
                                                $luas = $data['luas'];
                                                $tanggal = $data['tanggal'];
                                                $penggunaan = $data['penggunaan'];
                                                $alamat = $data['alamat'];
                                                $thak = $data['thak'];
                                                $tnomor = $data['tnomor'];
                                                $tanggalditerbitkan = $data['tanggalditerbitkan'];
                                                $gambar = $data['image'];
                                                $idt = $data['idtanah'];

                                                if($gambar==null){
                                                    //gaada gambar
                                                    $img = 'No Photo';
                                                }else{
                                                    //ada
                                                    $img ='<img src="../images/'.$gambar.'" class="zoomable">';
                                                }
                                        
                                                 //echo json_encode($namalembaga);
                                            ?>
                                           
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$img;?></td>
                                                <td><?= $namalembaga;?></td>
                                                <td><?= $namaaset;?></td>
                                                <td><?= $keterangan;?></td>
                                                <td>
                                                
                                                <button class="btn btn-warning text-white" id="accesscamera" data-toggle="modal" data-target="#photoModal<?$idt;?>">
                                                    Capture Photo
                                                </button>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#gambarmodal<?=$idt;?>">
                                                    Upload gambar
                                                </button>
                                                <a href="detailtanah.php?id=<?=$idt;?>" class="w3-button w3-teal">Detail</a>
                                                </td>
                                            </tr>

                                             <!--foto Modal-->
                                            <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Capture Photo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>
                                                                <div id="my_camera" class="d-block mx-auto rounded overflow-hidden"></div>
                                                            </div>
                                                            <div id="results" class="d-none"></div>
                                                            <form method="post" id="photoForm">
                                                                <input type="hidden" id="photoStore" name="photoStore" value="">
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning mx-auto text-white" id="takephoto">Capture Photo</button>
                                                            <button type="button" class="btn btn-warning mx-auto text-white d-none" id="retakephoto">Retake</button>
                                                            <button type="submit" class="btn btn-warning mx-auto text-white d-none" id="uploadphoto" form="photoForm">Upload</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                            <!--foto Modal camera-->
                                            <div class="modal fade" id="photoModal<?=$idt;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Capture Photo</h5>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>
                                                                <div id="my_camera" class="d-block mx-auto rounded overflow-hidden"></div>
                                                            </div>
                                                            <div id="results" class="d-none"></div>
                                                            <form method="post" id="photoForm">
                                                                <input type="hidden" id="photoStore" name="photoStore" value="">
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-warning mx-auto text-white" id="takephoto">Capture Photo</button>
                                                            <button type="button" class="btn btn-warning mx-auto text-white d-none" id="retakephoto">Retake</button>
                                                            <input type="hidden" name="idt" value="<?=$idt;?>">
                                                            <button type="submit" class="btn btn-warning mx-auto text-white d-none" id="uploadphoto" form="photoForm">Upload</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- upload gambar -->
                                            <div class="modal fade" id="gambarmodal<?=$idt;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Upload Gambar</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post" enctype="multipart/form-data">
                                                    <div class="modal-body"> 
                                                    <input type="file" name= "file"  class="form-control" >
                                                    <!-- <input type="file" name= "image" value="<?=$image;?>" class="form-control" > -->
                                                    <br>
                                                    
                                                    <!-- <input type="hidden" name="idt" value="<?=$idt;?>"> -->
                                                    <button type="submit" class="btn btn-primary" id="uploadgambar" name="uploadgambar">upload</button>
                                                    </div>
                                                    </form>


                                            <!-- edit Modal -->
                                            <div class="modal fade" id="edit<?=$idt;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit Barang</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                    
                                                    nama lembaga 
                                                    <input type="text" name= "namalembaga" value="<?=$namalembaga;?>" class="form-control" required>
                                                    <br>
                                                    nama aset
                                                    <input type="text" name= "namaaset" value="<?=$namaaset;?>" class="form-control" required>
                                                    <br>
                                                    keterangan
                                                    <input type="text" name= "keterangan" value="<?=$keterangan;?>" class="form-control" required>
                                                    <br>
                                                    kode barang
                                                    <input type="text" name= "kodebarang" value="<?=$kodebarang;?>" class="form-control" >
                                                    <br>
                                                    golongan di lv.4
                                                    <input type="text" name= "golongan4" value="<?=$golongan4;?>" class="form-control" >
                                                    <br>
                                                    asal Usul
                                                    <input type="text" name= "asal" value="<?=$asal;?> "class=" form-control" >
                                                    <br>
                                                    jumlah
                                                    <input type="num" name= "jumlah" value="<?=$jumlah;?>" class="form-control" >
                                                    <br>
                                                    harga Perolehan
                                                    <input type="num" name= "harga" value="<?=$harga;?>" class="form-control" >
                                                    <br>
                                                    luas
                                                    <input type="text" name= "luas" value="<?=$luas;?>" class="form-control" >
                                                    <br>
                                                    tanggal Pembelian
                                                    <input type="date" name= "tanggal" value="<?=$tanggal;?>" class="form-control" >
                                                    <br>
                                                    penggunaan
                                                    <input type="text" name= "penggunaan" value="<?=$penggunaan;?>" class="form-control" >
                                                    <br>
                                                    alamat
                                                    <input type="text" name= "alamat" value="<?=$alamat;?>" class="form-control" >
                                                    <br>
                                                    hak tanah
                                                    <input type="text" name= "thak" value="<?=$thak;?>" class="form-control" >
                                                    <br>
                                                    nomor tanah
                                                    <input type="text" name= "tnomor" value="<?=$tnomor;?>" class="form-control" >
                                                    <br>
                                                    tanggal di terbitkan
                                                    <input type="date" name= "tanggalditerbitkan" value="<?=$tanggalditerbitkan;?> "class="form-control" >
                                                    <br>
                                                    <br>
                                                    <input type="hidden" name="idt" value="<?=$idt;?>">
                                                    <button type="submit" class="btn btn-primary" id="updatetanah" name="updatetanah">update</button>
                                                    </div>
                                                    </form>
                                                    
                                                    
                                                </div>
                                                </div>
                                            </div>


                                            <!-- delete Modal -->
                                            <div class="modal fade" id="delete<?=$idt;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Hapus Barang</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post">
                                                    <div class="modal-body">
                                                        Ingin Menghapus <?=$namaaset;?>?
                                                        <input type="hidden" name="idt" value="<?=$idt;?>">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-danger" name="hapustanah">hapus</button>
                                                    </div>
                                                    </form>
                                                    
                                                    
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
           <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Tambah Tanah</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form method="post">
            <div class="modal-body">
            nama lembaga 
            <input type="text" name= "namalembaga"  class="form-control" required>
            <br>
            nama aset
            <input type="text" name= "namaaset"  class="form-control" required>
            <br>
            keterangan
            <input type="text" name= "keterangan"  class="form-control" required>
            <br>
            kode barang
            <input type="text" name= "kodebarang"  class="form-control">
            <br>
            golongan 4
            <input type="text" name= "golongan4"  class="form-control" >
            <br>
            asal
            <input type="text" name= "asal"  class="form-control" >
            <br>
            jumlah
            <input type="num" name= "jumlah"  class="form-control">
            <br>
            harga Perolehan
            <input type="num" name= "harga"  class="form-control" >
            <br>
            luas
            <input type="text" name= "luas"  class="form-control">
            <br>
            tanggal Pembelian
            <input type="date" name= "tanggal"  class="form-control" >
            <br>
            penggunaan
            <input type="text" name= "penggunaan"  class="form-control" >
            <br>
            alamat
            <input type="text" name= "alamat"  class="form-control" >
            <br>
            hak tanah
            <input type="text" name= "thak"  class="form-control">
            <br>
            nomor tanah
            <input type="text" name= "tnomor"  class="form-control" >
            <br>
            tanggal di terbitkan
            <input type="date" name= "tanggalditerbitkan"  class="form-control" >
            <br>
            
            
            <button type="submit" class="btn btn-primary" name="addnewtanah">Submit</button>
            </div>
            </form>
            
            
        </div>
        </div>
    </div>
            
        
</html>

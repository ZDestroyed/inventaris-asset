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
    </head>
    <style>
            .zoomable{
                width: 70px;
            }
            .zoomable:hover{
                transform: scale(2.5);
                transition: 0.2s ease;
            }
        </style>
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
                        <h1 class="mt-4">Aset Tidak Berwujud</h1>
                        
                        
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
                                            $ambilsemuadatatidak = mysqli_query($conn,"select * from asettidakberwujud");
                                            $i = 1;
                                            while($data=mysqli_fetch_array($ambilsemuadatatidak)){
                                                
                                                $namalembaga = $data['namalembaga'];
                                                $namaaset = $data['namaaset'];
                                                $keterangan = $data['keterangan'];
                                                $kodebarang = $data['kodebarang'];
                                                $golongan4 = $data['golongan4'];
                                                $tanggalkontrak = $data['tanggalkontrak'];
                                                $tanggalakhirkontrak = $data['tanggalakhirkontrak'];
                                                $status = $data['status'];
                                                $asal = $data['asal'];
                                                $jumlah = $data['jumlah'];
                                                $harga = $data['harga'];
                                                $keteranganlainnya = $data['keteranganlainnya'];
                                                $gambar = $data['image'];
                                                $noatb = $data['noatb'];
                                                
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
                                                    
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$noatb;?>">
                                                        Edit
                                                </button>
                                                <input type="hidden" name="noatbyangmaudihapus" value="<?=$noatb;?>">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$noatb;?>">
                                                        Delete
                                                </button>
                                                <a href="detailasettidakberwujud.php?id=<?=$noatb;?>" class="w3-button w3-teal">Detail</a>
                                                <br>
                                                <button type="button" class="<?php if (empty($gambar)) { echo "btn btn-warning";
                                                }else{ echo "btn btn-success";} ?>" data-toggle="modal" data-target="#gambarmodal<?=$noatb;?>">
                                                    Upload gambar
                                                </button>
                                                
                                                </td>
                                                
                                            </tr>
                                        

                                             
                                            <!-- upload gambar -->
                                            <div class="modal fade" id="gambarmodal<?=$noatb;?>">
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
                                                        <input type="hidden" name="id" value="<?=$noatb?>">
                                                    <input type="file" name= "file"  class="form-control" >
                                                    <!-- <input type="file" name= "image" value="<?=$image;?>" class="form-control" > -->
                                                    <br>
                                                    
                                                    <!-- <input type="hidden" name="noatb" value="<?=$noatb;?>"> -->
                                                    <button type="submit" class="btn btn-primary" name="uploadgambartidak">upload</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>


                                            <!-- edit Modal -->
                                            <div class="modal fade" id="edit<?=$noatb;?>">
                                                <div class="modal-dialog">
                                                <div class="modal-content">
                                                
                                                    <!-- Modal Header -->
                                                    <div class="modal-header">
                                                    <h4 class="modal-title">Edit Barang</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    </div>
                                                    
                                                    <!-- Modal body -->
                                                    <form method="post" enctype="multipart/form-data">
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
                                                    tanggal kontrak 
                                                    <input type="date" name= "tanggalkontrak" value="<?=$tanggalkontrak;?>" class="form-control" >
                                                    <br>
                                                    tanggal akhir kontrak
                                                    <input type="date" name= "tanggalakhirkontrak" value="<?=$tanggalakhirkontrak;?>" class="form-control" >
                                                    <br>
                                                    status
                                                    <input type="text" name= "status" value="<?=$status;?>" class="form-control" >
                                                    <br>
                                                    asal Usul
                                                    <input type="text" name= "asal" value="<?=$asal;?> "class=" form-control" >
                                                    <br>
                                                    
                                                    jumlah
                                                    <input type="num" name= "jumlah" value="<?=$jumlah;?>" class="form-control" >
                                                    <br>
                                                    harga 
                                                    <input type="num" name= "harga" value="<?=$harga;?>" class="form-control" >
                                                    <br>
                                                    
                                                    keteranganlainnya
                                                    <input type="text" name= "keteranganlainnya" value="<?=$keteranganlainnya;?>" class="form-control" >
                                                    <br>
                                                    <input type="hidden" name="noatb" value="<?=$noatb;?>">
                                                    <button type="submit" class="btn btn-primary" id="updatetidak" name="updatetidak">update</button>
                                                    </div>
                                                    </form>
                                                    
                                                    
                                                </div>
                                                </div>
                                            </div>


                                            <!-- delete Modal -->
                                            <div class="modal fade" id="delete<?=$noatb;?>">
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
                                                        <input type="hidden" name="noatb" value="<?=$noatb;?>">
                                                    <br>
                                                    <br>
                                                    <button type="submit" class="btn btn-danger" name="hapustidak">hapus</button>
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
        <script src="../js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/chart-area-demo.js"></script>
        <script src="../assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="../assets/demo/datatables-demo.js"></script>
    
        <!-- <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
        <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script> -->
   
        <script src="../plugin/sweetalert/sweetalert.min.js"></script>
        <script src="../plugin/webcamjs/webcam.min.js"></script>
        
    </body>
           <!-- The Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
        <div class="modal-content">
        
            <!-- Modal Header -->
            <div class="modal-header">
            <h4 class="modal-title">Tambah Data</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            
            <!-- Modal body -->
            <form method="post">
            <div class="modal-body">
            nama lembaga 
                                                    <input type="text" name= "namalembaga" class="form-control" required>
                                                    <br>
                                                    nama aset
                                                    <input type="text" name= "namaaset" class="form-control" required>
                                                    <br>
                                                    keterangan
                                                    <input type="text" name= "keterangan"  class="form-control" required>
                                                    <br>
                                                    kode barang
                                                    <input type="text" name= "kodebarang" class="form-control" >
                                                    <br>
                                                    golongan di lv.4
                                                    <input type="text" name= "golongan4" class="form-control" >
                                                    <br>
                                                    tanggal kontrak 
                                                    <input type="date" name= "tanggalkontrak"  class="form-control" >
                                                    <br>
                                                    tanggal akhir kontrak
                                                    <input type="date" name= "tanggalakhirkontrak"  class="form-control" >
                                                    <br>
                                                    status
                                                    <input type="text" name= "status"  class="form-control" >
                                                    <br>
                                                    asal Usul
                                                    <input type="text" name= "asal" class=" form-control" >
                                                    <br>
                                                    
                                                    jumlah
                                                    <input type="num" name= "jumlah"  class="form-control" >
                                                    <br>
                                                    harga 
                                                    <input type="num" name= "harga" class="form-control" >
                                                    <br>
                                                    
                                                    keteranganlainnya
                                                    <input type="text" name= "keteranganlainnya"  class="form-control" >
                                                    <br>

            <button type="submit" class="btn btn-primary" name="addnewtidak">Submit</button>
            </div>
            </form>
            
            
        </div>
        </div>
    </div>

     
            
        
</html>
<?php
session_start();


$conn = mysqli_connect("localhost","root","","stockbarang_db");

//tambah barang
if(isset($_POST['addnewbarang'])){
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    $addtotable = mysqli_query($conn,"insert into stock (namabarang, deskripsi, stock) values('$namabarang','$deskripsi','$stock')");
    if($addtotable){
        header('location:index.php');
    }else{
        echo 'gagal';
        header('location:index.php');
    }
};


//update barang
if(isset($_POST['updatebarang'])){
    $idb = $_POST['idb'];
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];

    $update = mysqli_query($conn,"update stock set namabarang='$namabarang', deskripsi='$deskripsi' where idbarang = '$idb'");
    if($update){
        header('location:index.php');
    }else{
        echo 'gagal';
        header('location:index.php');
    }
};

//hapus barang
if(isset($_POST['hapusbarang'])){
    $idb = $_POST['idb'];

    $hapus = mysqli_query($conn,"delete from stock where idbarang='$idb'");
    if($hapus){
        header('location:index.php');
    }else{
        echo 'gagal';
        header('location:index.php');
    }
};


//---------------------------TANAH-----------------------


//tambah tanah
if(isset($_POST['addnewtanah'])){
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $luas = $_POST['luas'];
    $tanggal = $_POST['tanggal'];
    $penggunaan = $_POST['penggunaan'];
    $alamat = $_POST['alamat'];
    $thak = $_POST['thak'];
    $tnomor = $_POST['tnomor'];
    $tanggalditerbitkan = $_POST['tanggalditerbitkan'];

    $addtotable = mysqli_query($conn,"insert into tanah (namalembaga,namaaset,keterangan,kodebarang,golongan4,asal,jumlah,harga,luas,tanggal,penggunaan,alamat,thak,tnomor,tanggalditerbitkan) values('$namalembaga','$namaaset','$keterangan','$kodebarang','$golongan4','$asal','$jumlah','$harga','$luas','$tanggal','$penggunaan','$alamat','$thak','$tnomor','$tanggalditerbitkan')");
    if($addtotable){
        header('location:tanah.php');
    }else{
        echo 'gagal';
        header('location:tanah.php');
    }
};

//update tanah
if(isset($_POST['updatetanah'])){
    $idt = $_POST['idt'];
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $luas = $_POST['luas'];
    $tanggal = $_POST['tanggal'];
    $penggunaan = $_POST['penggunaan'];
    $alamat = $_POST['alamat'];
    $thak = $_POST['thak'];
    $tnomor = $_POST['tnomor'];
    $tanggalditerbitkan = $_POST['tanggalditerbitkan'];
    

    
        $update = mysqli_query($conn,"update tanah set 
        namalembaga='$namalembaga', 
        namaaset='$namaaset',
        keterangan='$keterangan' ,
        kodebarang='$kodebarang',
        golongan4='$golongan4',
        asal='$asal',
        jumlah='$jumlah',
        harga='$harga',
        luas='$luas',
        tanggal='$tanggal',
        penggunaan='$penggunaan',
        alamat='$alamat',
        thak='$thak',
        tnomor='$tnomor',
        tanggalditerbitkan='$tanggalditerbitkan'
        where idtanah = '$idt'");
        if($update){
        
            header('location:tanah.php');
        }else{
            echo 'gagal';
            header('location:tanah.php');
        }
   

    
};

//hapus tanah
if(isset($_POST['hapustanah'])){
    $idt = $_POST['idt'];

    $gambar = mysqli_query($conn,"select from tanah where idtanah='$idt'");
    $get = mysqli_fetch_array($gambar);
    $img = '../images/'.$get['image'];
    @unlink($img);

    $hapus = mysqli_query($conn,"delete from tanah where idtanah='$idt'");
    if($hapus){
        header('location:tanah.php');
    }else{
        echo 'gagal';
        header('location:tanah.php');
    }
};

//gambar tanah
if(isset($_POST['uploadgambar'])){
    $allowed_extension = array('png','jpg','jpeg'); 
    $name = $_FILES['file']['name'];
    $ekstensi = strtolower(pathinfo($name, PATHINFO_EXTENSION));;
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $id = $_POST['id'];

    $image = md5(uniqid($name,true).time()).'.'.$ekstensi;  
    if(in_array($ekstensi, $allowed_extension)){
        if($ukuran < 10000000){
            move_uploaded_file($file_tmp, '../images/'.$image);
            $addtotable = mysqli_query($conn,"UPDATE tanah SET image='$image' WHERE idtanah=$id");
            if($addtotable){
                echo'
            <script>
                alert("Success Upload");
                window.location.href="tanah.php";
            </script>
            ';
            }else{
                echo'
            <script>
                alert("Gagal Upload");
                window.location.href="tanah.php";
            </script>
            ';
            } 
        }else{
            //uk lebih
            echo'
            <script>
                alert("ukuran file terlalu besar");
                window.location.href="tanah.php";
            </script>
            ';
        }
    }else{
        //type file
        echo'
            <script>
                alert("file harus jpg/png");
                window.location.href="tanah.php";
            </script>
            ';
    }
    
};

//---------------------------ALAT MESIN-----------------------

//tambah alatmesin
if(isset($_POST['addnewalatmesin'])){
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $merk = $_POST['merk'];
    $tanggal = $_POST['tanggal'];
    $type = $_POST['type'];
    $ukuran = $_POST['ukuran'];
    $bahan = $_POST['bahan'];
    $nopabrik = $_POST['nopabrik'];
    $norangka = $_POST['norangka'];
    $nomesin = $_POST['nomesin'];
    $nopolisi = $_POST['nopolisi'];
    $bpkb = $_POST['bpkb'];
    $kondisi = $_POST['kondisi'];
    $keteranganlainnya = $_POST['keteranganlainnya'];

    
    $addtotablemesin = mysqli_query($conn,"insert into alatmesin (namalembaga,namaaset,keterangan,kodebarang,golongan4,asal,
    jumlah,harga,merk,tanggal,type,ukuran,bahan,nopabrik,norangka,nomesin,nopolisi,bpkb,kondisi,keteranganlainnya) 
    values('$namalembaga','$namaaset','$keterangan','$kodebarang','$golongan4','$asal','$jumlah','$harga','$merk','$tanggal',
    '$type','$ukuran','$bahan','$nopabrik','$norangka','$nomesin','$nopolisi','$bpkb','$kondisi','$keteranganlainnya')") ;
    // var_dump($addtotablemesin); die;
    if($addtotablemesin){
        header('location:alatmesin.php');
    }else{
        echo 'gagal';
        header('location:alatmesin.php');
    }
};
    
//update alat
if(isset($_POST['updatealatmesin'])){
    $idadm = $_POST['idadm'];
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $merk = $_POST['merk'];
    $tanggal = $_POST['tanggal'];
    $type = $_POST['type'];
    $ukuran = $_POST['ukuran'];
    $bahan = $_POST['bahan'];
    $nopabrik = $_POST['nopabrik'];
    $norangka = $_POST['norangka'];
    $nomesin = $_POST['nomesin'];
    $nopolisi = $_POST['nopolisi'];
    $bpkb = $_POST['bpkb'];
    $kondisi = $_POST['kondisi'];
    $keteranganlainnya = $_POST['keteranganlainnya'];
    

    
        $update = mysqli_query($conn,"update alatmesin set 
        namalembaga='$namalembaga', 
        namaaset='$namaaset',
        keterangan='$keterangan',
        kodebarang='$kodebarang',
        golongan4='$golongan4',
        asal='$asal',
        jumlah='$jumlah',
        harga='$harga',
        merk='$merk',
        tanggal='$tanggal',
        type='$type',
        ukuran='$ukuran',
        bahan='$bahan',
        nopabrik='$nopabrik',
        norangka='$norangka',
        nomesin='$nomesin',
        nopolisi='$nopolisi',
        bpkb='$bpkb',
        kondisi='$kondisi',
        keteranganlainnya='$keteranganlainnya'
        where idadm = '$idadm'");
        if($update){
        
            header('location:alatmesin.php');
        }else{
            echo 'gagal';
            header('location:alatmesin.php');
        }
   

    
};

//hapus alat
if(isset($_POST['hapusalatmesin'])){
    $idadm = $_POST['idadm'];

    $gambar = mysqli_query($conn,"select from alatmesin where idadm='$idadm'");
    $get = mysqli_fetch_array($gambar);
    $img = '../images/'.$get['image'];
    @unlink($img);

    $hapus = mysqli_query($conn,"delete from alatmesin where idadm='$idadm'");
    if($hapus){
        header('location:alatmesin.php');
    }else{
        echo 'gagal';
        header('location:alatmesin.php');
    }
};

//gambar alat
if(isset($_POST['uploadgambaralatmesin'])){
    $allowed_extension = array('png','jpg','jpeg'); 
    $name = $_FILES['file']['name'];
    $ekstensi = strtolower(pathinfo($name, PATHINFO_EXTENSION));;
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $id = $_POST['id'];

    $image = md5(uniqid($name,true).time()).'.'.$ekstensi;  
    if(in_array($ekstensi, $allowed_extension)){
        if($ukuran < 10000000){
            move_uploaded_file($file_tmp, '../images/'.$image);
            $addtotable = mysqli_query($conn,"UPDATE alatmesin SET image='$image' WHERE idadm=$id");
            if($addtotable){
                echo'
            <script>
                alert("Success Upload");
                window.location.href="alatmesin.php";
            </script>
            ';
            }else{
                echo'
            <script>
                alert("Gagal Upload");
                window.location.href="alatmesin.php";
            </script>
            ';
            } 
        }else{
            //uk lebih
            echo'
            <script>
                alert("ukuran file terlalu besar");
                window.location.href="alatmesin.php";
            </script>
            ';
        }
    }else{
        //type file
        echo'
            <script>
                alert("file harus jpg/png");
                window.location.href="alatmesin.php";
            </script>
            ';
    }
    
};


//---------------------------GEDUNG DAN BANGUNAN-----------------------

//tambah gedung
if(isset($_POST['addnewgedung'])){
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $luas = $_POST['luas'];
    $alamat = $_POST['alamat'];
    $titikkoor = $_POST['titikkoor'];
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $kondisi = $_POST['kondisi'];
    $tingkat = $_POST['tingkat'];
    $beton = $_POST['beton'];
    $keteranganlainnya = $_POST['keteranganlainnya'];

    
    $addtotablgedung = mysqli_query($conn,"insert into alatmesin (namalembaga,namaaset,keterangan,kodebarang,golongan4,
    luas,alamat,titikkoor,tanggal,asal,jumlah,harga,kondisi,tingkat,beton,keteranganlainnya) 
    values('$namalembaga','$namaaset','$keterangan','$kodebarang','$golongan4','$luas',
    '$alamat','$titikkoor','$tanggal','$asal','$jumlah','$harga','$kondisi','$tingkat','$beton','$keteranganlainnya')") ;
    // var_dump($addtotablemesin); die;
    if($addtotablegedung){
        header('location:gedungbangunan.php');
    }else{
        echo 'gagal';
        header('location:gedungbangunan.php');
    }
};
    
//update gedung
if(isset($_POST['updategedung'])){
    $nogb = $_POST['nogb'];
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $luas = $_POST['luas'];
    $alamat = $_POST['alamat'];
    $titikkoor = $_POST['titikkoor'];
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $kondisi = $_POST['kondisi'];
    $tingkat = $_POST['tingkat'];
    $beton = $_POST['beton'];
    $keteranganlainnya = $_POST['keteranganlainnya'];
    

    
        $update = mysqli_query($conn,"update gedungbangunan set 
        namalembaga='$namalembaga',
        namaaset='$namaaset',
        keterangan='$keterangan',
        kodebarang='$kodebarang',
        golongan4='$golongan4',
        luas='$luas',
        alamat='$alamat',
        titikkoor='$titikkoor',
        tanggal='$tanggal',
        asal='$asal',
        jumlah='$jumlah',
        harga='$harga',
        kondisi='$kondisi',
        tingkat='$tingkat',
        beton='$beton',
        keteranganlainnya='$keteranganlainnya'
        where nogb = '$nogb'");
        if($update){
        
            header('location:gedungbangunan.php');
        }else{
            echo 'gagal';
            header('location:gedungbangunan.php');
        }
   

    
};

//hapus gedung
if(isset($_POST['hapusgedung'])){
    $nogb = $_POST['nogb'];

    $gambar = mysqli_query($conn,"select from gedungbangunan where nogb='$nogb'");
    $get = mysqli_fetch_array($gambar);
    $img = '../images/'.$get['image'];
    @unlink($img);

    $hapus = mysqli_query($conn,"delete from gedungbangunan where nogb='$nogb'");
    if($hapus){
        header('location:gedungbangunan.php');
    }else{
        echo 'gagal';
        header('location:gedungbangunan.php');
    }
};

//gambar gedung
if(isset($_POST['uploadgambargedung'])){
    $allowed_extension = array('png','jpg','jpeg'); 
    $name = $_FILES['file']['name'];
    $ekstensi = strtolower(pathinfo($name, PATHINFO_EXTENSION));;
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $id = $_POST['id'];

    $image = md5(uniqid($name,true).time()).'.'.$ekstensi;  
    if(in_array($ekstensi, $allowed_extension)){
        if($ukuran < 10000000){
            move_uploaded_file($file_tmp, '../images/'.$image);
            $addtotable = mysqli_query($conn,"UPDATE gedungbangunan SET image='$image' WHERE nogb=$id");
            if($addtotable){
                echo'
            <script>
                alert("Success Upload");
                window.location.href="gedungbangunan.php";
            </script>
            ';
            }else{
                echo'
            <script>
                alert("Gagal Upload");
                window.location.href="gedungbangunan.php";
            </script>
            ';
            } 
        }else{
            //uk lebih
            echo'
            <script>
                alert("ukuran file terlalu besar");
                window.location.href="gedungbangunan.php";
            </script>
            ';
        }
    }else{
        //type file
        echo'
            <script>
                alert("file harus jpg/png");
                window.location.href="gedungbangunan.php";
            </script>
            ';
    }
    
};


//---------------------------JALAN-----------------------
//tambah jalan
if(isset($_POST['addnewjalan'])){
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $luas = $_POST['luas'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $kondisi = $_POST['kondisi'];
    $keteranganlainnya = $_POST['keteranganlainnya'];

    
    $addtotablejalan = mysqli_query($conn,"insert into jalan (namalembaga,namaaset,keterangan,kodebarang,golongan4,
    panjang,lebar,luas,alamat,tanggal,asal,jumlah,harga,kondisi,keteranganlainnya) 
    values('$namalembaga','$namaaset','$keterangan','$kodebarang','$golongan4','$panjang','$lebar','$luas',
    '$alamat','$tanggal','$asal','$jumlah','$harga','$kondisi','$keteranganlainnya')") ;
    // var_dump($addtotablemesin); die;
    if($addtotablejalan){
        header('location:jalan.php');
    }else{
        echo 'gagal';
        header('location:jalan.php');
    }
};
    
//update jalan
if(isset($_POST['updatejalan'])){
    $idjalan = $_POST['idjalan'];
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $panjang = $_POST['panjang'];
    $lebar = $_POST['lebar'];
    $luas = $_POST['luas'];
    $alamat = $_POST['alamat'];
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $kondisi = $_POST['kondisi'];
    $keteranganlainnya = $_POST['keteranganlainnya'];
    

    
        $update = mysqli_query($conn,"update jalan set 
        namalembaga='$namalembaga',
        namaaset='$namaaset',
        keterangan='$keterangan',
        kodebarang='$kodebarang',
        golongan4='$golongan4',
        panjang = '$panjang',
        lebar ='$lebar',
        luas='$luas',
        alamat='$alamat',
        tanggal='$tanggal',
        asal='$asal',
        jumlah='$jumlah',
        harga='$harga',
        kondisi='$kondisi',
        keteranganlainnya='$keteranganlainnya'
        where idjalan = '$idjalan'");
        if($update){
        
            header('location:jalan.php');
        }else{
            echo 'gagal';
            header('location:jalan.php');
        }
   

    
};

//hapus jalan
if(isset($_POST['hapusjalan'])){
    $idjalan = $_POST['idjalan'];

    $gambar = mysqli_query($conn,"select from jalan where idjalan='$idjalan'");
    $get = mysqli_fetch_array($gambar);
    $img = '../images/'.$get['image'];
    @unlink($img);

    $hapus = mysqli_query($conn,"delete from jalan where idjalan='$idjalan'");
    if($hapus){
        header('location:jalan.php');
    }else{
        echo 'gagal';
        header('location:jalan.php');
    }
};

//gambar jalan
if(isset($_POST['uploadgambarjalan'])){
    $allowed_extension = array('png','jpg','jpeg'); 
    $name = $_FILES['file']['name'];
    $ekstensi = strtolower(pathinfo($name, PATHINFO_EXTENSION));;
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $id = $_POST['id'];

    $image = md5(uniqid($name,true).time()).'.'.$ekstensi;  
    if(in_array($ekstensi, $allowed_extension)){
        if($ukuran < 10000000){
            move_uploaded_file($file_tmp, '../images/'.$image);
            $addtotable = mysqli_query($conn,"UPDATE jalan SET image='$image' WHERE idjalan=$id");
            if($addtotable){
                echo'
            <script>
                alert("Success Upload");
                window.location.href="jalan.php";
            </script>
            ';
            }else{
                echo'
            <script>
                alert("Gagal Upload");
                window.location.href="jalan.php";
            </script>
            ';
            } 
        }else{
            //uk lebih
            echo'
            <script>
                alert("ukuran file terlalu besar");
                window.location.href="jalan.php";
            </script>
            ';
        }
    }else{
        //type file
        echo'
            <script>
                alert("file harus jpg/png");
                window.location.href="jalan.php";
            </script>
            ';
    }
    
};

//---------------------------KONSTRUKSI-----------------------
//tambah konstruksi
if(isset($_POST['addnewkonstruksi'])){
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $luas = $_POST['luas'];
    $lokasi = $_POST['lokasi'];
    $titikkoor = $_POST['titikkoor'];
    $bahan = $_POST['bahan'];
    $ukuran = $_POST['ukuran'];
    $keteranganlainnya = $_POST['keteranganlainnya'];

    
    $addtotablekonstruksi = mysqli_query($conn,"insert into konstruksi (namalembaga,namaaset,keterangan,kodebarang,golongan4,
    tanggal,asal,jumlah,harga,luas,lokasi,titikkoor,bahan,ukuran,keteranganlainnya) 
    values('$namalembaga','$namaaset','$keterangan','$kodebarang','$golongan4','$tanggal','$asal','$jumlah','$harga',
    '$luas','$lokasi','$titikkoor','$bahan','$ukuran','$keteranganlainnya')") ;
    // var_dump($addtotablemesin); die;
    if($addtotablekonstruksi){
        header('location:konstruksi.php');
    }else{
        echo 'gagal';
        header('location:konstruksi.php');
    }
};
    
//update konstruksi
if(isset($_POST['updatekonstruksi'])){
    $nokonstruksi = $_POST['nokonstruksi'];
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $luas = $_POST['luas'];
    $lokasi = $_POST['lokasi'];
    $titikkoor = $_POST['titikkoor'];
    $bahan = $_POST['bahan'];
    $ukuran = $_POST['ukuran'];
    $keteranganlainnya = $_POST['keteranganlainnya'];
    

    
        $update = mysqli_query($conn,"update konstruksi set 
        namalembaga='$namalembaga',
        namaaset='$namaaset',
        keterangan='$keterangan',
        kodebarang='$kodebarang',
        golongan4='$golongan4',
        tanggal='$tanggal',
        asal='$asal',
        jumlah='$jumlah',
        harga='$harga',
        luas='$luas',
        lokasi='$lokasi',
        titikkoor='$titikkoor',
        bahan='$bahan',
        ukuran='$ukuran',
        keteranganlainnya='$keteranganlainnya'
        where nokonstruksi = '$nokonstruksi'");
        if($update){
        
            header('location:konstruksi.php');
        }else{
            echo 'gagal';
            header('location:konstruksi.php');
        }
   

    
};

//hapus konstruksi
if(isset($_POST['hapuskonstruksi'])){
    $nokonstruksi = $_POST['nokonstruksi'];

    $gambar = mysqli_query($conn,"select from konstruksi where nokonstruksi='$nokonstruksi'");
    $get = mysqli_fetch_array($gambar);
    $img = '../images/'.$get['image'];
    @unlink($img);

    $hapus = mysqli_query($conn,"delete from konstruksi where nokonstruksi='$nokonstruksi'");
    if($hapus){
        header('location:konstruksi.php');
    }else{
        echo 'gagal';
        header('location:konstruksi.php');
    }
};

//gambar konstruksi
if(isset($_POST['uploadgambarkonstruksi'])){
    $allowed_extension = array('png','jpg','jpeg'); 
    $name = $_FILES['file']['name'];
    $ekstensi = strtolower(pathinfo($name, PATHINFO_EXTENSION));;
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $id = $_POST['id'];

    $image = md5(uniqid($name,true).time()).'.'.$ekstensi;  
    if(in_array($ekstensi, $allowed_extension)){
        if($ukuran < 10000000){
            move_uploaded_file($file_tmp, '../images/'.$image);
            $addtotable = mysqli_query($conn,"UPDATE konstruksi SET image='$image' WHERE nokonstruksi=$id");
            if($addtotable){
                echo'
            <script>
                alert("Success Upload");
                window.location.href="konstruksi.php";
            </script>
            ';
            }else{
                echo'
            <script>
                alert("Gagal Upload");
                window.location.href="konstruksi.php";
            </script>
            ';
            } 
        }else{
            //uk lebih
            echo'
            <script>
                alert("ukuran file terlalu besar");
                window.location.href="konstruksi.php";
            </script>
            ';
        }
    }else{
        //type file
        echo'
            <script>
                alert("file harus jpg/png");
                window.location.href="konstruksi.php";
            </script>
            ';
    }
    
};
//---------------------------KEMITRAAN-----------------------
//tambah kemitraan
if(isset($_POST['addnewkemitraan'])){
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $luas = $_POST['luas'];
    $lokasi = $_POST['lokasi'];
    $titikkoor = $_POST['titikkoor'];
    $bahan = $_POST['bahan'];
    $ukuran = $_POST['ukuran'];
    $keteranganlainnya = $_POST['keteranganlainnya'];

    
    $addtotablekemitraan = mysqli_query($conn,"insert into kemitraan (namalembaga,namaaset,keterangan,kodebarang,golongan4,
    tanggal,asal,jumlah,harga,luas,lokasi,titikkoor,bahan,ukuran,keteranganlainnya) 
    values('$namalembaga','$namaaset','$keterangan','$kodebarang','$golongan4','$tanggal','$asal','$jumlah','$harga',
    '$luas','$lokasi','$titikkoor','$bahan','$ukuran','$keteranganlainnya')") ;
    // var_dump($addtotablemesin); die;
    if($addtotablekemitraan){
        header('location:kemitraan.php');
    }else{
        echo 'gagal';
        header('location:kemitraan.php');
    }
};
    
//update kemitraan
if(isset($_POST['updatekemitraan'])){
    $idkemitraan = $_POST['idkemitraan'];
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $luas = $_POST['luas'];
    $lokasi = $_POST['lokasi'];
    $titikkoor = $_POST['titikkoor'];
    $bahan = $_POST['bahan'];
    $ukuran = $_POST['ukuran'];
    $keteranganlainnya = $_POST['keteranganlainnya'];
    

    
        $update = mysqli_query($conn,"update kemitraan set 
        namalembaga='$namalembaga',
        namaaset='$namaaset',
        keterangan='$keterangan',
        kodebarang='$kodebarang',
        golongan4='$golongan4',
        tanggal='$tanggal',
        asal='$asal',
        jumlah='$jumlah',
        harga='$harga',
        luas='$luas',
        lokasi='$lokasi',
        titikkoor='$titikkoor',
        bahan='$bahan',
        ukuran='$ukuran',
        keteranganlainnya='$keteranganlainnya'
        where idkemitraan = '$idkemitraan'");
        if($update){
        
            header('location:kemitraan.php');
        }else{
            echo 'gagal';
            header('location:kemitraan.php');
        }
   

    
};

//hapus kemitraan
if(isset($_POST['hapuskemitraan'])){
    $idkemitraan = $_POST['idkemitraan'];

    $gambar = mysqli_query($conn,"select from kemitraan where idkemitraan='$idkemitraan'");
    $get = mysqli_fetch_array($gambar);
    $img = '../images/'.$get['image'];
    @unlink($img);

    $hapus = mysqli_query($conn,"delete from kemitraan where idkemitraan='$idkemitraan'");
    if($hapus){
        header('location:kemitraan.php');
    }else{
        echo 'gagal';
        header('location:kemitraan.php');
    }
};

//gambar kemitraan
if(isset($_POST['uploadgambarkemitraan'])){
    $allowed_extension = array('png','jpg','jpeg'); 
    $name = $_FILES['file']['name'];
    $ekstensi = strtolower(pathinfo($name, PATHINFO_EXTENSION));;
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $id = $_POST['id'];

    $image = md5(uniqid($name,true).time()).'.'.$ekstensi;  
    if(in_array($ekstensi, $allowed_extension)){
        if($ukuran < 10000000){
            move_uploaded_file($file_tmp, '../images/'.$image);
            $addtotable = mysqli_query($conn,"UPDATE kemitraan SET image='$image' WHERE idkemitraan=$id");
            if($addtotable){
                echo'
            <script>
                alert("Success Upload");
                window.location.href="kemitraan.php";
            </script>
            ';
            }else{
                echo'
            <script>
                alert("Gagal Upload");
                window.location.href="kemitraan.php";
            </script>
            ';
            } 
        }else{
            //uk lebih
            echo'
            <script>
                alert("ukuran file terlalu besar");
                window.location.href="kemitraan.php";
            </script>
            ';
        }
    }else{
        //type file
        echo'
            <script>
                alert("file harus jpg/png");
                window.location.href="kemitraan.php";
            </script>
            ';
    }
    
};
//---------------------------ASET TETAP LAIN-----------------------
//tambah aset tetap lain
if(isset($_POST['addnewtetap'])){
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $judulbuku = $_POST['judulbuku'];
    $penciptabuku = $_POST['penciptabuku'];
    $asalbarang = $_POST['asalbarang'];
    $penciptabarang = $_POST['penciptabarang'];
    $bahanbarang = $_POST['bahanbarang'];
    $jenishewan = $_POST['jenishewan'];
    $ukuranhewan = $_POST['ukuranhewan'];
    $asetluas = $_POST['asetluas'];
    $asetalamat = $_POST['asetalamat'];
    $asettitik = $_POST['asettitik'];
    $asetketerangan = $_POST['asetketerangan'];
    $kondisi = $_POST['kondisi'];
    $keteranganlainnya = $_POST['keteranganlainnya'];

    
    $addtotabletetap = mysqli_query($conn,"insert into asettetaplain (namalembaga,namaaset,keterangan,kodebarang,golongan4,
    tanggal,asal,jumlah,harga,judulbuku,penciptabuku,asalbarang,penciptabarang,bahanbarang,jenishewan,
    ukuranhewan,asetluas,asetalamat,asettitik,asetketerangan,kondisi,keteranganlainnya) 
    values('$namalembaga','$namaaset','$keterangan','$kodebarang','$golongan4','$tanggal','$asal','$jumlah','$harga',
    '$judulbuku','$penciptabuku','$asalbarang','$penciptabarang','$bahanbarang','$jenishewan','$ukuranhewan',
    '$asetluas','$asetalamat','$asettitik','$asetketerangan','$kondisi','$keteranganlainnya')") ;
    // var_dump($addtotablemesin); die;
    if($addtotabletetap){
        header('location:asettetaplain.php');
    }else{
        echo 'gagal';
        header('location:asettetaplain.php');
    }
};
    
//update aset tetap lain
if(isset($_POST['updatetetap'])){
    $idatl = $_POST['idatl'];
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $judulbuku = $_POST['judulbuku'];
    $penciptabuku = $_POST['penciptabuku'];
    $asalbarang = $_POST['asalbarang'];
    $penciptabarang = $_POST['penciptabarang'];
    $bahanbarang = $_POST['bahanbarang'];
    $jenishewan = $_POST['jenishewan'];
    $ukuranhewan = $_POST['ukuranhewan'];
    $asetluas = $_POST['asetluas'];
    $asetalamat = $_POST['asetalamat'];
    $asettitik = $_POST['asettitik'];
    $asetketerangan = $_POST['asetketerangan'];
    $kondisi = $_POST['kondisi'];
    $keteranganlainnya = $_POST['keteranganlainnya'];
    

    
        $update = mysqli_query($conn,"update asettetaplain set 
        namalembaga='$namalembaga',
        namaaset='$namaaset',
        keterangan='$keterangan',
        kodebarang='$kodebarang',
        golongan4='$golongan4',
        tanggal='$tanggal',
        asal='$asal',
        jumlah='$jumlah',
        harga='$harga',
        judulbuku='$judulbuku',
        penciptabuku='$penciptabuku',
        asalbarang='$asalbarang',
        penciptabarang='$penciptabarang',
        bahanbarang='$bahanbarang',
        jenishewan='$jenishewan',
        ukuranhewan='$ukuranhewan',
        asetluas='$asetluas',
        asetalamat='$asetalamat',
        asettitik='$asettitik',
        asetketerangan='$asetketerangan',
        kondisi='$kondisi',
        keteranganlainnya$keteranganlainnya'
        where idatl = '$idatl'");
        if($update){
        
            header('location:asettetaplain.php');
        }else{
            echo 'gagal';
            header('location:asettetaplain.php');
        }
   

    
};

//hapus aset tetap lain
if(isset($_POST['hapustetap'])){
    $idatl = $_POST['idatl'];

    $gambar = mysqli_query($conn,"select from asettetaplain where idatl='$idatl'");
    $get = mysqli_fetch_array($gambar);
    $img = '../images/'.$get['image'];
    @unlink($img);

    $hapus = mysqli_query($conn,"delete from asettetaplain where idatl='$idatl'");
    if($hapus){
        header('location:asettetaplain.php');
    }else{
        echo 'gagal';
        header('location:asettetaplain.php');
    }
};

//gambar aset tetap lain
if(isset($_POST['uploadgambartetap'])){
    $allowed_extension = array('png','jpg','jpeg'); 
    $name = $_FILES['file']['name'];
    $ekstensi = strtolower(pathinfo($name, PATHINFO_EXTENSION));;
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $id = $_POST['id'];

    $image = md5(uniqid($name,true).time()).'.'.$ekstensi;  
    if(in_array($ekstensi, $allowed_extension)){
        if($ukuran < 10000000){
            move_uploaded_file($file_tmp, '../images/'.$image);
            $addtotable = mysqli_query($conn,"UPDATE asettetaplain SET image='$image' WHERE idatl=$id");
            if($addtotable){
                echo'
            <script>
                alert("Success Upload");
                window.location.href="asettetaplain.php";
            </script>
            ';
            }else{
                echo'
            <script>
                alert("Gagal Upload");
                window.location.href="asettetaplain.php";
            </script>
            ';
            } 
        }else{
            //uk lebih
            echo'
            <script>
                alert("ukuran file terlalu besar");
                window.location.href="asettetaplain.php";
            </script>
            ';
        }
    }else{
        //type file
        echo'
            <script>
                alert("file harus jpg/png");
                window.location.href="asettetaplain.php";
            </script>
            ';
    }
    
};
//---------------------------ASET TIDAK BERWUJUD-----------------------
//tambah asettidakberwujud
if(isset($_POST['addnewtidak'])){
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $tanggalkontrak = $_POST['tanggalkontrak'];
    $tanggalakhirkontrak = $_POST['tanggalakhirkontrak'];
    $status = $_POST['status'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $keteranganlainnya = $_POST['keteranganlainnya'];

    
    $addtotabletidak = mysqli_query($conn,"insert into asettidakberwujud (namalembaga,namaaset,keterangan,kodebarang,golongan4,
    tanggalkontrak,tanggalakhirkontrak,status,asal,jumlah,harga,keteranganlainnya) 
    values('$namalembaga','$namaaset','$keterangan','$kodebarang','$golongan4','$asal','$jumlah','$harga',
    '$tanggalkontrak','$tanggalakhirkontrak','$status','$keteranganlainnya')") ;
    // var_dump($addtotablemesin); die;
    if($addtotabletidak){
        header('location:asettidakberwujud.php');
    }else{
        echo 'gagal';
        header('location:asettidakberwujud.php');
    }
};
    
//update asettidakberwujud
if(isset($_POST['updatetidak'])){
    $noatb = $_POST['noatb'];
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $tanggalkontrak = $_POST['tanggalkontrak'];
    $tanggalakhirkontrak = $_POST['tanggalakhirkontrak'];
    $status = $_POST['status'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $keteranganlainnya = $_POST['keteranganlainnya'];
    

    
        $update = mysqli_query($conn,"update asettidakberwujud set 
        namalembaga='$namalembaga',
        namaaset='$namaaset',
        keterangan='$keterangan',
        kodebarang='$kodebarang',
        golongan4='$golongan4',
        asal='$asal',
        jumlah='$jumlah',
        harga='$harga',
        tanggalkontrak='$tanggalkontrak',
        tanggalakhirkontrak='$tanggalakhirkontrak',
        status='$status',
        keteranganlainnya='$keteranganlainnya'
        where noatb = '$noatb'");
        if($update){
        
            header('location:asettidakberwujud.php');
        }else{
            echo 'gagal';
            header('location:asettidakberwujud.php');
        }
   

    
};

//hapus asettidakberwujud
if(isset($_POST['hapustidak'])){
    $noatb = $_POST['noatb'];

    $gambar = mysqli_query($conn,"select from asettidakberwujud where noatb='$noatb'");
    $get = mysqli_fetch_array($gambar);
    $img = '../images/'.$get['image'];
    @unlink($img);

    $hapus = mysqli_query($conn,"delete from asettidakberwujud where noatb='$noatb'");
    if($hapus){
        header('location:asettidakberwujud.php');
    }else{
        echo 'gagal';
        header('location:asettidakberwujud.php');
    }
};

//gambar asettidakberwujud
if(isset($_POST['uploadgambartidak'])){
    $allowed_extension = array('png','jpg','jpeg'); 
    $name = $_FILES['file']['name'];
    $ekstensi = strtolower(pathinfo($name, PATHINFO_EXTENSION));;
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $id = $_POST['id'];

    $image = md5(uniqid($name,true).time()).'.'.$ekstensi;  
    if(in_array($ekstensi, $allowed_extension)){
        if($ukuran < 10000000){
            move_uploaded_file($file_tmp, '../images/'.$image);
            $addtotable = mysqli_query($conn,"UPDATE asettidakberwujud SET image='$image' WHERE noatb=$id");
            if($addtotable){
                echo'
            <script>
                alert("Success Upload");
                window.location.href="asettidakberwujud.php";
            </script>
            ';
            }else{
                echo'
            <script>
                alert("Gagal Upload");
                window.location.href="asettidakberwujud.php";
            </script>
            ';
            } 
        }else{
            //uk lebih
            echo'
            <script>
                alert("ukuran file terlalu besar");
                window.location.href="asettidakberwujud.php";
            </script>
            ';
        }
    }else{
        //type file
        echo'
            <script>
                alert("file harus jpg/png");
                window.location.href="asettidakberwujud.php";
            </script>
            ';
    }
    
};
//---------------------------ASET LAIN LAIN-----------------------
//tambah asetlainlain
if(isset($_POST['addnewlain'])){
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $luas = $_POST['luas'];
    $lokasi = $_POST['lokasi'];
    $titikkoor = $_POST['titikkoor'];
    $bahan = $_POST['bahan'];
    $ukuran = $_POST['ukuran'];
    $keteranganlainnya = $_POST['keteranganlainnya'];

    
    $addtotablelain = mysqli_query($conn,"insert into asetlainlain (namalembaga,namaaset,keterangan,kodebarang,golongan4,
    tanggal,asal,jumlah,harga,luas,lokasi,titikkoor,bahan,ukuran,keteranganlainnya) 
    values('$namalembaga','$namaaset','$keterangan','$kodebarang','$golongan4','$tanggal','$asal','$jumlah','$harga',
    '$luas','$lokasi','$titikkoor','$bahan','$ukuran','$keteranganlainnya')") ;
    // var_dump($addtotablemesin); die;
    if($addtotablelain){
        header('location:asetlainlain.php');
    }else{
        echo 'gagal';
        header('location:asetlainlain.php');
    }
};
    
//update asetlainlain
if(isset($_POST['updatelain'])){
    $idall = $_POST['idall'];
    $namalembaga = $_POST['namalembaga'];
    $namaaset = $_POST['namaaset'];
    $keterangan = $_POST['keterangan'];
    $kodebarang = $_POST['kodebarang'];
    $golongan4 = $_POST['golongan4'];
    $tanggal = $_POST['tanggal'];
    $asal = $_POST['asal'];
    $jumlah = $_POST['jumlah'];
    $harga = $_POST['harga'];
    $luas = $_POST['luas'];
    $lokasi = $_POST['lokasi'];
    $titikkoor = $_POST['titikkoor'];
    $bahan = $_POST['bahan'];
    $ukuran = $_POST['ukuran'];
    $keteranganlainnya = $_POST['keteranganlainnya'];
    

    
        $update = mysqli_query($conn,"update asetlainlain set 
        namalembaga='$namalembaga',
        namaaset='$namaaset',
        keterangan='$keterangan',
        kodebarang='$kodebarang',
        golongan4='$golongan4',
        tanggal='$tanggal',
        asal='$asal',
        jumlah='$jumlah',
        harga='$harga',
        luas='$luas',
        lokasi='$lokasi',
        titikkoor='$titikkoor',
        bahan='$bahan',
        ukuran='$ukuran',
        keteranganlainnya='$keteranganlainnya'
        where idall = '$idall'");
        if($update){
        
            header('location:asetlainlain.php');
        }else{
            echo 'gagal';
            header('location:asetlainlain.php');
        }
   

    
};

//hapus asetlainlain
if(isset($_POST['hapuslain'])){
    $idall = $_POST['idall'];

    $gambar = mysqli_query($conn,"select from asetlainlain where idall='$idall'");
    $get = mysqli_fetch_array($gambar);
    $img = '../images/'.$get['image'];
    @unlink($img);

    $hapus = mysqli_query($conn,"delete from asetlainlain where idall='$idall'");
    if($hapus){
        header('location:asetlainlain.php');
    }else{
        echo 'gagal';
        header('location:asetlainlain.php');
    }
};

//gambar asetlainlain
if(isset($_POST['uploadgambarlain'])){
    $allowed_extension = array('png','jpg','jpeg'); 
    $name = $_FILES['file']['name'];
    $ekstensi = strtolower(pathinfo($name, PATHINFO_EXTENSION));;
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $id = $_POST['id'];

    $image = md5(uniqid($name,true).time()).'.'.$ekstensi;  
    if(in_array($ekstensi, $allowed_extension)){
        if($ukuran < 10000000){
            move_uploaded_file($file_tmp, '../images/'.$image);
            $addtotable = mysqli_query($conn,"UPDATE asetlainlain SET image='$image' WHERE idall=$id");
            if($addtotable){
                echo'
            <script>
                alert("Success Upload");
                window.location.href="asetlainlain.php";
            </script>
            ';
            }else{
                echo'
            <script>
                alert("Gagal Upload");
                window.location.href="asetlainlain.php";
            </script>
            ';
            } 
        }else{
            //uk lebih
            echo'
            <script>
                alert("ukuran file terlalu besar");
                window.location.href="asetlainlain.php";
            </script>
            ';
        }
    }else{
        //type file
        echo'
            <script>
                alert("file harus jpg/png");
                window.location.href="asetlainlain.php";
            </script>
            ';
    }
    
};




?>
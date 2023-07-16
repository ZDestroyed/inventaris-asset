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
//tambah barang masuk
if(isset($_POST['barangmasuk'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahakanstocksekarangdenganquantity = $stocksekarang+$qty;

    $addtomasuk =mysqli_query($conn,"insert into masuk (idbarang, keterangan, qty) values('$barangnya','$penerima','$qty')");
    $updatestockmasuk = mysqli_query($conn,"update stock set stock ='$tambahakanstocksekarangdenganquantity' where idbarang='$barangnya' ");

    if($addtomasuk&&$updatestockmasuk){
        header('location:barangmasuk.php');
    }else{
        echo 'gagal';
        header('location:barangmasuk.php');
    }
};

//tambah barang keluar
if(isset($_POST['addbarangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahakanstocksekarangdenganquantity = $stocksekarang-$qty;

    $addtokeluar =mysqli_query($conn,"insert into keluar (idbarang, penerima, qty) values('$barangnya','$penerima','$qty')");
    $updatestockmasuk = mysqli_query($conn,"update stock set stock ='$tambahakanstocksekarangdenganquantity' where idbarang='$barangnya' ");

    if($addtokeluar&&$updatestockmasuk){
        header('location:barangkeluar.php');
    }else{
        echo 'gagal';
        header('location:barangkeluar.php');
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



//mengubah data barang masuk
if(isset($_POST['updatebarangmasuk'])){
    $idb = $_POST['idb'];
    $idm = $_POST['idm'];
    $deskripsi = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn,"select * from stock Where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrng = $stocknya['stock'];

    $qtyskrng = mysqli_query($conn,"select * from masuk where idmasuk='$idm'");
    $qtynya = mysqli_fetch_array($qtyskrng);
    $qtyskrng = $qtynya['qty'];

    if($qty>$qtyskrng){
        $selisih = $qty-$qtyskrng;
        $kurangin = $stockskrng + $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update masuk set qty='$qty', keterangan='$deskripsi' where idmasuk='$idm'");

        if($kurangistocknya&&$updatenya){
            header('location:barangmasuk.php');
        }else{
            echo 'gagal';
            header('location:barangmasuk.php');  
        }
    }else{
        $selisih = $qtyskrng-$qty;
        $kurangin = $stockskrng - $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update masuk set qty='$qty',keterangan='$deskripsi' where idmasuk='$idm'");

        if($kurangistocknya&&$updatenya){
            header('location:barangmasuk.php');
        }else{
            echo 'gagal';
            header('location:barangmasuk.php');  
        }
    }
};

//hapus barang masuk
if(isset($_POST['hapusbarangmasuk'])){
    $idb = $_POST['idb'];
    $qty = $_POST['kty'];
    $idm = $_POST['idm'];

    $getdatastock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];

    $selisih = $stock-$qty;

    $update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn,"delete from masuk where idmasuk='$idm'");
    if($update&&$hapusdata){
        header('location:barangmasuk.php');
    }else{
        echo 'gagal';
        header('location:barangmasuk.php');
    }
};

//mengubah data barang keluar
if(isset($_POST['updatebarangkeluar'])){
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn,"select * from stock Where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrng = $stocknya['stock'];

    $qtyskrng = mysqli_query($conn,"select * from keluar where idkeluar='$idk'");
    $qtynya = mysqli_fetch_array($qtyskrng);
    $qtyskrng = $qtynya['qty'];

    if($qty>$qtyskrng){
        $selisih = $qty-$qtyskrng;
        $kurangin = $stockskrng - $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");

        if($kurangistocknya&&$updatenya){
            header('location:barangkeluar.php');
        }else{
            echo 'gagal';
            header('location:barangkeluar.php');  
        }
    }else{
        $selisih = $qtyskrng-$qty;
        $kurangin = $stockskrng + $selisih;
        $kurangistocknya = mysqli_query($conn, "update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn, "update keluar set qty='$qty', penerima='$penerima' where idkeluar='$idk'");

        if($kurangistocknya&&$updatenya){
            header('location:barangkeluar.php');
        }else{
            echo 'gagal';
            header('location:barangkeluar.php');  
        }
    }
};

//hapus barang keluar
if(isset($_POST['hapusbarangkeluar'])){
    $idb = $_POST['idb'];
    $qty = $_POST['kty'];
    $idk = $_POST['idk'];

    $getdatastock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];

    $selisih = $stock+$qty;

    $update = mysqli_query($conn,"update stock set stock='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn,"delete from keluar where idkeluar='$idk'");
    if($update&&$hapusdata){
        header('location:barangkeluar.php');
    }else{
        echo 'gagal';
        header('location:barangkeluar.php');
    }
};


if(isset($_POST['photoStore'])) {
    $encoded_data = $_POST['photoStore'];
    $binary_data = base64_decode($encoded_data);

    $photoname = uniqid().'.jpeg';

    $result = file_put_contents('uploadPhoto/'.$photoname, $binary_data);

    if($result) {
        echo 'success';
    } else {
        echo die('Could not save image! check file permission.');
    }

}
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

    $allowed_extension = array('png','jpg'); 
    $image = $_FILES['file']['name'];
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $image = md5(uniqid($nama,true).time()).'.'.$ekstensi;

    if($ukuran==0){
        //klo gamau upload
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
        tanggalditerbitkan='$tanggalditerbitkan',
        where idtanah = '$idt'");
        if($update){
        
            header('location:tanah.php');
        }else{
            echo 'gagal';
            header('location:tanah.php');
        }
    }else{
        //klo upload
        move_uploaded_file($file_tmp, '../images/'.$image);
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
        tanggalditerbitkan='$tanggalditerbitkan',
        image='$image'
        where idtanah = '$idt'");
        if($update){
        
            header('location:tanah.php');
        }else{
            echo 'gagal';
            header('location:tanah.php');
        }
    }

    
};

//hapus tanah
if(isset($_POST['hapustanah'])){
    $idt = $_POST['idt'];

    $gambar = mysqli_query($conn,"select from tanah where idtanah='$idt'");
    $get = mysqli_fetch_array($gambar);
    $img = '../images/'.$get['image'];
    unlink($img);

    $hapus = mysqli_query($conn,"delete from tanah where idtanah='$idt'");
    if($hapus){
        header('location:tanah.php');
    }else{
        echo 'gagal';
        header('location:tanah.php');
    }
};

//gambar 
if(isset($_POST['uploadgambar'])){
    $allowed_extension = array('png','jpg'); 
    $image = $_FILES['file']['name'];
    $dot = explode('.',$nama);
    $ekstensi = strtolower(end($dot));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];

    $image = md5(uniqid($nama,true).time()).'.'.$ekstensi;
    if(in_array($ekstensi, $allowed_extension) === true){
        if($ukuran < 10000000){
            move_uploaded_file($file_tmp, '../images/'.$image);
            $addtotable = mysqli_query($conn,"insert into tanah (image) values('$image')");
            if($addtotable){
                header('location:tanah.php');
            }else{
                echo 'gagal';
            header('location:tanah.php');
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


    
}

    






?>
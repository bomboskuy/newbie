<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up()
    {
        // Table: role
        DB::statement("
                CREATE TABLE role (
                idrole BIGINT PRIMARY KEY AUTO_INCREMENT,
                nama_role VARCHAR(100)
            );
        ");

        // Table: user
        DB::statement("
            CREATE TABLE user (
                iduser BIGINT PRIMARY KEY AUTO_INCREMENT,
                username VARCHAR(45),
                password VARCHAR(100),
        
                idrole BIGINT,
                FOREIGN KEY (idrole) REFERENCES role(idrole) ON DELETE SET NULL
            );
        ");

        // Table: vendor
        DB::statement("
            CREATE TABLE vendor (
                idvendor BIGINT PRIMARY KEY AUTO_INCREMENT,
                nama_vendor VARCHAR(100),
                badan_hukum CHAR(1),
                status TINYINT
            );
        ");

        // Table: satuan
        DB::statement("
            CREATE TABLE satuan (
                idsatuan BIGINT PRIMARY KEY AUTO_INCREMENT,
                nama_satuan VARCHAR(45),
                status TINYINT
            );
        ");

        // Table: barang
        DB::statement("
            CREATE TABLE barang (
                idbarang BIGINT PRIMARY KEY AUTO_INCREMENT,
                jenis CHAR(1),
                nama VARCHAR(100),
                idsatuan BIGINT,
                harga DECIMAL(15,2),
                status TINYINT,
        
                FOREIGN KEY (idsatuan) REFERENCES satuan(idsatuan) ON DELETE SET NULL
            );
        ");

        // Table: kartu_stok
        DB::statement("
            CREATE TABLE kartu_stok (
                idkartu_stok BIGINT PRIMARY KEY AUTO_INCREMENT,
                idbarang BIGINT,
                jenis_transaksi CHAR(1),
                stok_init INT,
                stok_akhir INT,
        
                FOREIGN KEY (idbarang) REFERENCES barang(idbarang) ON DELETE CASCADE
            );
        ");

        // Table: pengadaan
        DB::statement("
            CREATE TABLE pengadaan (
                idpengadaan BIGINT PRIMARY KEY AUTO_INCREMENT,
                idvendor BIGINT,
                iduser BIGINT,
                subtotal_awal DECIMAL(15,2),
                subtotal_akhir DECIMAL(15,2),
                ppn DECIMAL(15,2),
                status VARCHAR(1),
        
                FOREIGN KEY (idvendor) REFERENCES vendor(idvendor) ON DELETE SET NULL,
                FOREIGN KEY (iduser) REFERENCES user(iduser) ON DELETE SET NULL
            );
        ");

        // Table: detail_pengadaan
        DB::statement("
            CREATE TABLE detail_pengadaan (
                iddetail_pengadaan BIGINT PRIMARY KEY AUTO_INCREMENT,
                idpengadaan BIGINT,
                idbarang BIGINT,
                harga_satuan DECIMAL(15,2),
                jumlah INT,
                sub_total DECIMAL(15,2),
        
                FOREIGN KEY (idpengadaan) REFERENCES pengadaan(idpengadaan) ON DELETE CASCADE,
                FOREIGN KEY (idbarang) REFERENCES barang(idbarang) ON DELETE SET NULL
            );
        ");

        // Table: penerimaan
        DB::statement("
            CREATE TABLE penerimaan (
                idpenerimaan BIGINT PRIMARY KEY AUTO_INCREMENT,
                idpengadaan BIGINT,
                iduser BIGINT,
                status VARCHAR(1),
        
                FOREIGN KEY (idpengadaan) REFERENCES pengadaan(idpengadaan) ON DELETE CASCADE,
                FOREIGN KEY (iduser) REFERENCES user(iduser) ON DELETE SET NULL
            );
        ");

        // Table: detail_penerimaan
        DB::statement("
            CREATE TABLE detail_penerimaan (
                iddetail_penerimaan BIGINT PRIMARY KEY AUTO_INCREMENT,
                idpenerimaan BIGINT,
                idbarang BIGINT,
                harga_satuan DECIMAL(15,2),
                jumlah_terima INT,
                sub_total DECIMAL(15,2),
        
                FOREIGN KEY (idpenerimaan) REFERENCES penerimaan(idpenerimaan) ON DELETE CASCADE,
                FOREIGN KEY (idbarang) REFERENCES barang(idbarang) ON DELETE SET NULL
            );
        ");

        // Table: retur
        DB::statement("
            CREATE TABLE retur (
                idretur BIGINT PRIMARY KEY AUTO_INCREMENT,
                idpenerimaan BIGINT,
                iduser BIGINT,
                jumlah INT,
        
                FOREIGN KEY (idpenerimaan) REFERENCES penerimaan(idpenerimaan) ON DELETE CASCADE,
                FOREIGN KEY (iduser) REFERENCES user(iduser) ON DELETE SET NULL
            );
        ");

        // Table: detail_retur
        DB::statement("
            CREATE TABLE detail_retur (
                iddetail_retur BIGINT PRIMARY KEY AUTO_INCREMENT,
                idretur BIGINT,
                idbarang BIGINT,
                iddetail_penerimaan BIGINT,
                alasan VARCHAR(200),
                jumlah INT,
        
                FOREIGN KEY (idretur) REFERENCES retur(idretur) ON DELETE CASCADE,
                FOREIGN KEY (iddetail_penerimaan) REFERENCES detail_penerimaan(iddetail_penerimaan) ON DELETE CASCADE
            );
        ");

        DB::statement("
        CREATE TABLE margin_penjualan (
            idmargin_penjualan BIGINT PRIMARY KEY AUTO_INCREMENT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            persen DECIMAL(5,2),
            status TINYINT,
            iduser BIGINT,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (iduser) REFERENCES user(iduser) ON DELETE SET NULL
        );
    ");

        // Table: penjualan
        DB::statement("
            CREATE TABLE penjualan (
                idpenjualan BIGINT PRIMARY KEY AUTO_INCREMENT,
                subtotal_awal DECIMAL(15,2),
                subtotal_akhir DECIMAL(15,2),
                ppn DECIMAL(15,2),
                idmargin_penjualan BIGINT,
                iduser BIGINT,
        
                FOREIGN KEY (iduser) REFERENCES user(iduser) ON DELETE SET NULL,
                FOREIGN KEY (idmargin_penjualan) REFERENCES margin_penjualan(idmargin_penjualan) ON DELETE CASCADE
            );
        ");

        // Table: detail_penjualan
        DB::statement("
            CREATE TABLE detail_penjualan (
                iddetail_penjualan BIGINT PRIMARY KEY AUTO_INCREMENT,
                idpenjualan BIGINT,
                idbarang BIGINT,
                harga_satuan DECIMAL(15,2),
                jumlah INT,
                sub_total DECIMAL(15,2),
        
                FOREIGN KEY (idpenjualan) REFERENCES penjualan(idpenjualan) ON DELETE CASCADE,
                FOREIGN KEY (idbarang) REFERENCES barang(idbarang) ON DELETE SET NULL
            );
        ");
    }

    public function down()
    {
        // Drop all tables in reverse order of their creation
        DB::statement("DROP TABLE IF EXISTS detail_penjualan;");
        DB::statement("DROP TABLE IF EXISTS penjualan;");
        DB::statement("DROP TABLE IF EXISTS detail_retur;");
        DB::statement("DROP TABLE IF EXISTS retur;");
        DB::statement("DROP TABLE IF EXISTS detail_penerimaan;");
        DB::statement("DROP TABLE IF EXISTS penerimaan;");
        DB::statement("DROP TABLE IF EXISTS detail_pengadaan;");
        DB::statement("DROP TABLE IF EXISTS pengadaan;");
        DB::statement("DROP TABLE IF EXISTS kartu_stok;");
        DB::statement("DROP TABLE IF EXISTS barang;");
        DB::statement("DROP TABLE IF EXISTS satuan;");
        DB::statement("DROP TABLE IF EXISTS vendor;");
        DB::statement("DROP TABLE IF EXISTS user;");
        DB::statement("DROP TABLE IF EXISTS role;");
        DB::statement("DROP TABLE IF EXISTS margin_penjualan;");
    }
};
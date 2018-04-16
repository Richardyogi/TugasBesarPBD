<?php
    class Jadwal_ujian_model extends CI_Model
    {
        public $aListJadwalUTS;
        public $aListJadwalUAS;
        public function __construct(){
            parent::__construct();
        }
        public function funcParseJSONUTS($JSONstring){
            $temp=json_decode($JSONstring);
            $length=count($temp->{'list'});
            $this->aListJadwalUTS=array();
            for ($i=0; $i < $length; $i++) { 
                $jadwal_ujian=new jadwal_ujian($temp->{'list'}[$i]);
                array_push($this->aListJadwalUTS,$jadwal_ujian);
            }
            usort($this->aListJadwalUTS, array("jadwal_ujian","funcCompareTo"));
        }
        public function funcParseJSONUAS($JSONstring){
            $temp=json_decode($JSONstring);
            $length=count($temp->{'list'});
            $this->aListJadwalUAS=array();
            for ($i=0; $i < $length; $i++) { 
                $jadwal_ujian=new jadwal_ujian($temp->{'list'}[$i]);
                array_push($this->aListJadwalUAS,$jadwal_ujian);
            }
            usort($this->aListJadwalUAS, array("jadwal_ujian","funcCompareTo"));
        }
    }

    class jadwal_ujian{
        public $sKodeMatkul;
        public $sNamaMatkul;
        public $sSingkatanMatkul;
        public $sNomorRuang;
        public $sWaktuMulai;
        public $sWaktuSelesai;
        public $sTanggalUjian;
        public $iJumlahSKS;
        public $iNomorKursi;
        public $cKelas;

        public function __construct($JSONobject){
            $this->sKodeMatkul=$JSONobject->{'Kode_mata_kuliah'};
            $this->sNamaMatkul=$JSONobject->{'Nama_mata_kuliah'};
            $this->sNomorRuang=$JSONobject->{'Ruangan'};
            $this->sWaktuMulai=$JSONobject->{'Waktu_mulai'};
            $this->sWaktuSelesai=$JSONobject->{'Waktu_berakhir'};
            $this->sTanggalUjian=$JSONobject->{'Tanggal_ujian'};
            $this->iJumlahSKS=$JSONobject->{'Jumlah_SKS'};
            $this->iNomorKursi=$JSONobject->{'Nomor_kursi'};
            $this->cKelas=$JSONobject->{'Kelas'};
        }
        static function funcCompareTo($oA,$oB){
            $iTanggalCmp=strcmp($oA->sTanggalUjian, $oB->sTanggalUjian);
            return $iTanggalCmp==0?strcmp($oA->sWaktuMulai, $oB->sWaktuMulai):$iTanggalCmp;
        }
    }
?>
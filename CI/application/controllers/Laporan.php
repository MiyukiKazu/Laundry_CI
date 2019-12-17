<?php
Class Laporan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->library('Pdf.php');
    }
    
    function index(){
        $pdf = new FPDF('l','mm','A5');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(190,7,'LAPORAN',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'PESANAN TELANG LAUNDRY',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',8);
        $pdf->Cell(20,6,'ID Transaksi',1,0);
        $pdf->Cell(25,6,'Pelanggan',1,0);
        $pdf->Cell(15,6,'Paket',1,0);
        $pdf->Cell(25,6,'Status cucian',1,0);
        $pdf->Cell(30,6,'Tanggal Terima',1,0);
        $pdf->Cell(30,6,'Tanggal Selesai',1,0);
        $pdf->Cell(20,6,'Jumlah',1,0);
        $pdf->Cell(20,6,'Total Harga',1,0);
        $pdf->Ln();
        $pdf->SetFont('Arial','',8);
        $query = $this->db->query("SELECT * FROM detail_cucian,status_cucian WHERE  detail_cucian.id_statuscucian = status_cucian.id_statuscucian AND detail_cucian.id_statuscucian = 4 ORDER BY id_transaksi DESC");

        foreach ($query->result() as $row)
        {
            $pdf->Cell(20,6,$row->id_transaksi,1,0);
            $pdf->Cell(25,6,$row->id_pelanggan,1,0);
            $pdf->Cell(15,6,$row->id_tbarang,1,0);
            $pdf->Cell(25,6,$row->nama_statuscucian,1,0);
            $pdf->Cell(30,6,$row->tgl_terima,1,0); 
            $pdf->Cell(30,6,$row->tgl_selesai,1,0);
            $pdf->Cell(20,6,$row->jumlah,1,0); 
            $pdf->Cell(20,6,$row->harga,1,0);
        }
        $pdf->Output();
    }
}
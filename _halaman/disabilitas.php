<!DOCTYPE html>
<html>
<?php
  $title="Disabilitas";
  $judul=$title;
  $url='disabilitas';
  if ($session->get('level')!='admin'){
	header("Location: http://localhost/webgis/?halaman=beranda");
  }
  //var_dump($_POST);
if(isset($_POST['simpan'])){
var_dump($_POST);
	if($_POST['id']==""){
		$data['latitude']=$_POST['latitude'];
		$data['longitude']=$_POST['longitude'];
		$data['kategori']=$_POST['kategori'];
		$data['rt']=$_POST['rt'];
		$data['rw']=$_POST['rw'];
		$data['pedukuhan']=$_POST['pedukuhan'];
		$data['desa']=$_POST['desa'];
		$data['kode_kecamatan']=$_POST['kode_kecamatan'];
        $data['nama']=$_POST['nama'];
		$data['nik']=$_POST['nik'];
		$data['no_kk']=$_POST['no_kk'];
		$data['netra']=$_POST['netra'];
		$data['rungu']=$_POST['rungu'];
		$data['fisik']=$_POST['fisik'];
		$data['intelektual']=$_POST['intelektual'];
		$data['emosiperilaku']=$_POST['emosiperilaku'];
		$data['rehabilitasi']=$_POST['rehabilitasi'];
		$data['jenis_rehab']=$_POST['jenis_rehab'];
		$data['penyelenggara_rehab']=$_POST['penyelenggara_rehab'];
		$data['bantuan']=$_POST['bantuan'];
		$data['sumber_bantuan']=$_POST['sumber_bantuan'];
		$data['jenis_bantuan']=$_POST['jenis_bantuan'];
		$data['kartu_jaminan']=$_POST['kartu_jaminan'];
		$data['pendapatan']=$_POST['pendapatan'];
		$data['transportasi']=$_POST['transportasi'];
		$data['hambatan_trans']=$_POST['hambatan_trans'];
		$data['pendidikan']=$_POST['pendidikan'];
		$data['hambatan_pend']=$_POST['hambatan_pend'];
		$data['kesehatan']=$_POST['kesehatan'];
		$data['hambatan_kes']=$_POST['hambatan_kes'];
		$data['sekolah']=$_POST['sekolah'];
		$data['dmn_sekolah']=$_POST['dmn_sekolah'];
		$data['jjg_tertinggi']=$_POST['jjg_tertinggi'];
		$db->insert('disabilitas',$data);
		?>
		<script type="text/javascript">
			window.alert('sukses disimpan');
			window.location.href="<?=url('disabilitas')?>";
		</script>
		<?php
	}
	else{
		$data['latitude']=$_POST['latitude'];
		$data['longitude']=$_POST['longitude'];
        $data['kategori']=$_POST['kategori'];
		$data['rt']=$_POST['rt'];
		$data['rw']=$_POST['rw'];
		$data['pedukuhan']=$_POST['pedukuhan'];
		$data['desa']=$_POST['desa'];
		$data['kode_kecamatan']=$_POST['kode_kecamatan'];
        $data['nama']=$_POST['nama'];
		$data['nik']=$_POST['nik'];
		$data['no_kk']=$_POST['no_kk'];
		$data['netra']=$_POST['netra'];
		$data['rungu']=$_POST['rungu'];
		$data['fisik']=$_POST['fisik'];
		$data['intelektual']=$_POST['intelektual'];
		$data['emosiperilaku']=$_POST['emosiperilaku'];
		$data['rehabilitasi']=$_POST['rehabilitasi'];
		$data['jenis_rehab']=$_POST['jenis_rehab'];
		$data['penyelenggara_rehab']=$_POST['penyelenggara_rehab'];
		$data['bantuan']=$_POST['bantuan'];
		$data['sumber_bantuan']=$_POST['sumber_bantuan'];
		$data['jenis_bantuan']=$_POST['jenis_bantuan'];
		$data['kartu_jaminan']=$_POST['kartu_jaminan'];
		$data['pendapatan']=$_POST['pendapatan'];
		$data['transportasi']=$_POST['transportasi'];
		$data['hambatan_trans']=$_POST['hambatan_trans'];
		$data['pendidikan']=$_POST['pendidikan'];
		$data['hambatan_pend']=$_POST['hambatan_pend'];
		$data['kesehatan']=$_POST['kesehatan'];
		$data['hambatan_kes']=$_POST['hambatan_kes'];
		$data['sekolah']=$_POST['sekolah'];
		$data['dmn_sekolah']=$_POST['dmn_sekolah'];
		$data['jjg_tertinggi']=$_POST['jjg_tertinggi'];
		$db->where('id',$_POST['id']);
		$db->update('disabilitas',$data);
		?>
		<script type="text/javascript">
			window.alert('sukses diubah');
			window.location.href="<?=url('disabilitas')?>";
		</script>
		<?php
	}
} 

if(isset($_GET['hapus'])){
	$db->where("id",$_GET['id']);
	$db->delete("disabilitas");
	?>
	<script type="text/javascript">
			window.alert('sukses dihapus');
			window.location.href="<?=url('disabilitas')?>";
		</script>
		<?php
}

if(isset($_GET['tambah']) OR isset($_GET['ubah'])){
  $id="";
  $latitude="";
  $longitude="";
  $kategori="";
  $rt="";
  $rw="";
  $pedukuhan="";
  $desa="";
  $kode_kecamatan="";
  $nama="";
  $nik="";
  $no_kk="";
  $netra="";
  $rungu="";
  $fisik="";
  $intelektual="";
  $emosiperilaku="";
  $rehabilitasi="";
  $jenis_rehab="";
  $penyelenggara_rehab="";
  $bantuan="";
  $sumber_bantuan="";
  $jenis_bantuan="";
  $kartu_jaminan="";
  $pendapatan="";
  $transportasi="";
  $hambatan_trans="";
  $pendidikan="";
  $hambatan_pend="";
  $kesehatan="";
  $hambatan_kes="";
  $sekolah="";
  $dmn_sekolah="";
  $jjg_tertinggi="";
  if(isset($_GET['ubah']) AND isset($_GET['id'])){
	$id=$_GET['id'];
	$db->where('id',$id);  
	$row=$db->ObjectBuilder()->getOne('disabilitas');
	if($db->count>0){
		$id=$row->id;
		$latitude=$row->latitude;
		$longitude=$row->longitude;
		$kategori=$row->kategori;
		$rt=$row->rt;
		$rw=$row->rw;
		$pedukuhan=$row->pedukuhan;
		$desa=$row->desa;
		$kode_kecamatan=$row->kode_kecamatan;
        $nama=$row->nama;
		$nik=$row->nik;
		$no_kk=$row->no_kk;
		$netra=$row->netra;
		$rungu=$row->rungu;
		$fisik=$row->fisik;
		$intelektual=$row->intelektual;
		$emosiperilaku=$row->emosiperilaku;
		$rehabilitasi=$row->rehabilitasi;
		$jenis_rehab=$row->jenis_rehab;
		$penyelenggara_rehab=$row->penyelenggara_rehab;
		$bantuan=$row->bantuan;
		$sumber_bantuan=$row->sumber_bantuan;
		$jenis_bantuan=$row->jenis_bantuan;
		$kartu_jaminan=$row->kartu_jaminan;
		$pendapatan=$row->pendapatan;
		$transportasi=$row->transportasi;
		$hambatan_trans=$row->hambatan_trans;
		$pendidikan=$row->pendidikan;
		$hambatan_pend=$row->hambatan_pend;
		$kesehatan=$row->kesehatan;
		$hambatan_kes=$row->hambatan_kes;
		$sekolah=$row->sekolah;
		$dmn_sekolah=$row->dmn_sekolah;
		$jjg_tertinggi=$row->jjg_tertinggi;
	}
  }
?>
<?=content_open('Form Disabilitas')?>
	<form method="post">
		<?=input_hidden('id',$id)?>
		<div class="form-group">
			<label>Latitude</label>
			<?=input_text('latitude',$latitude)?>
		</div>
		<div class="form-group">
			<label>Longitude</label>
			<?=input_text('longitude',$longitude)?>
		</div>
		<div class="form-group">
			<label>Kategori</label>
			<?=input_text('kategori',$kategori)?>
		</div>
		<div class="form-group">
			<label>RT</label>
			<?=input_text('rt',$rt)?>
		</div>
		<div class="form-group">
			<label>RW</label>
			<?=input_text('rw',$rw)?>
		</div>
		<div class="form-group">
			<label>Pedukuhan</label>
			<?=input_text('pedukuhan',$pedukuhan)?>
		</div>
		<div class="form-group">
			<label>Desa</label>
			<?=input_text('desa',$desa)?>
		</div>
		<div class="form-group">
			<label>Kode Kecamatan</label>
			<?=input_text('kode_kecamatan',$kode_kecamatan)?>
		</div>
        <div class="form-group">
			<label>Nama</label>
			<?=input_text('nama',$nama)?>
		</div>
		<div class="form-group">
			<label>NIK</label>
			<?=input_text('nik',$nik)?>
		</div>
		<div class="form-group">
			<label>No KK</label>
			<?=input_text('no_kk',$no_kk)?>
		</div>
		<div class="form-group">
			<label>Netra</label>
			<?=input_text('netra',$netra)?>
		</div>
		<div class="form-group">
			<label>Rungu</label>
			<?=input_text('rungu',$rungu)?>
		</div>
		<div class="form-group">
			<label>Fisik</label>
			<?=input_text('fisik',$fisik)?>
		</div>
		<div class="form-group">
			<label>Intelektual</label>
			<?=input_text('intelektual',$intelektual)?>
		</div>
		<div class="form-group">
			<label>Emosi/Perilaku</label>
			<?=input_text('emosiperilaku',$emosiperilaku)?>
		</div>
		<div class="form-group">
			<label>Rehabilitasi</label>
			<?=input_text('rehabilitasi',$rehabilitasi)?>
		</div>
		<div class="form-group">
			<label>Jenis Rehabilitasi</label>
			<?=input_text('jenis_rehab',$jenis_rehab)?>
		</div>
		<div class="form-group">
			<label>Penyelenggara Rehabilitasi</label>
			<?=input_text('penyelenggara_rehab',$penyelenggara_rehab)?>
		</div>
		<div class="form-group">
			<label>Bantuan</label>
			<?=input_text('bantuan',$bantuan)?>
		</div>
		<div class="form-group">
			<label>Sumber Bantuan</label>
			<?=input_text('sumber_bantuan',$sumber_bantuan)?>
		</div>
		<div class="form-group">
			<label>Jenis Bantuan</label>
			<?=input_text('jenis_bantuan',$jenis_bantuan)?>
		</div>
		<div class="form-group">
			<label>Kartu Jaminan</label>
			<?=input_text('kartu_jaminan',$kartu_jaminan)?>
		</div><div class="form-group">
			<label>Pendapatan</label>
			<?=input_text('pendapatan',$pendapatan)?>
		</div>
		<div class="form-group">
			<label>Transportasi</label>
			<?=input_text('transportasi',$transportasi)?>
		</div>
		<div class="form-group">
			<label>Hambatan Transportasi</label>
			<?=input_text('hambatan_trans',$hambatan_trans)?>
		</div>
		<div class="form-group">
			<label>Pendidikan</label>
			<?=input_text('pendidikan',$pendidikan)?>
		</div>
		<div class="form-group">
			<label>Hambatan Pendidikan</label>
			<?=input_text('hambatan_pend',$hambatan_pend)?>
		</div>
		<div class="form-group">
			<label>Kesehatan</label>
			<?=input_text('kesehatan',$kesehatan)?>
		</div>
		<div class="form-group">
			<label>Hambatan Kesehatan</label>
			<?=input_text('hambatan_kes',$hambatan_kes)?>
		</div>
		<div class="form-group">
			<label>Sekolah</label>
			<?=input_text('sekolah',$sekolah)?>
		</div>
		<div class="form-group">
			<label>Dimana Bersekolah</label>
			<?=input_text('dmn_sekolah',$dmn_sekolah)?>
		</div>
		<div class="form-group">
			<label>Jenjang Pendidikan Tertinggi</label>
			<?=input_text('jjg_tertinggi',$jjg_tertinggi)?>
		</div>
		<div class="form-group">
			<button type="submit" name="simpan" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
			<a href="<?=url($url)?>" class="btn btn-danger"><i class="fa fa-reply"></i> Kembali</a>
		</div>
	</form>
<?=content_close()?>

<?php } else { ?>

<?=content_open('Data Disabilitas')?>

<a href="<?=url($url.'&tambah')?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah</a>
<hr>

<link href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" />
<link href="//cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" rel="stylesheet" />

<script src="//code.jquery.com/jquery-3.5.1.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js" defer></script>

<script src="//cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js" defer></script>
<script src="//cdn.datatables.net/buttons/1.6.2/js/buttons.flash.min.js" defer></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="//cdn.datatables.net/buttons/1.6.2/js/buttons.html5.min.js" defer></script>
<script src="//cdn.datatables.net/buttons/1.6.2/js/buttons.print.min.js" defer></script>

<table id="example" class="display">
    <thead>
        <tr>
            <th style="text-align:center;">No</th>
			<th style="text-align:center;">Kategori</th>
			<th style="text-align:center;">Kecamatan</th>
            <th style="text-align:center;">Nama</th>
			<th style="text-align:center;">NIK</th>
			<th style="text-align:center;">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $no=1;
			$db->join('kecamatan b','a.kode_kecamatan=b.kode_kecamatan','LEFT');
            $getdata=$db->ObjectBuilder()->get('disabilitas a');
            foreach ($getdata as $row) {
                ?>
                    <tr>
                        <td><?=$no?></td>
						<td><?=$row->kategori?></td>
						<td><?=$row->nama_kecamatan?></td>
                        <td><?=$row->nama?></td>
						<td><?=$row->nik?></td>
                        <td>
							<a href="<?=url($url.'&ubah&id='.$row->id)?>" class="btn btn-info"><i class="fa fa-edit"></i> Ubah</a>
							<a href="<?=url($url.'&hapus&id='.$row->id)?>" class="btn btn-danger" onclick="return confirm('Hapus data?')"><i class="fa fa-trash"></i> Hapus</a>
						</td>
                    </tr>
                <?php
                $no++;
            }
        ?>
    </tbody>
</table>
<script>
$(document).ready( function () {
    $('table#example').DataTable({
		dom: 'Bfrtip',
		"paging": true,
		"order": [[ 0, "asc" ]],
		"ordering": true,
		"columnDefs": [{
			"targets": [3], /* column index */
			"orderable": false
		},
		{
			"targets": [ 1 ],
			"visible": true,
			"searchable": true
		}],
		buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
	});
});
</script>
<?=content_close()?>
<?php } ?>
</html>
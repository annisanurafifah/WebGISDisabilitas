<script src="https://unpkg.com/leaflet@1.3.4/dist/leaflet.js"
   integrity="sha512-nMMmRyTVoLYqjP9hrbed9S+FzjZHW5gY1TWCHA5ckwXZBadntCNs8kEqAWdrb9O7rxbCaA4lKTIWjDXZxflOcA=="
   crossorigin=""></script>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
	integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
	crossorigin=""></script>

<script src="assets/js/leaflet-panel-layers-master/src/leaflet-panel-layers.js"></script>
<script src="assets/js/leaflet.ajax.js"></script>

<!-- Bar Chart -->
<script src="https://unpkg.com/leaflet.minichart/dist/leaflet.minichart.min.js" charset="utf-8"></script>

<!-- Marker Cluster -->
<link rel="stylesheet" href="assets/js/Leaflet.markercluster-master/dist/MarkerCluster.css" />
<link rel="stylesheet" href="assets/js/Leaflet.markercluster-master/dist/MarkerCluster.Default.css" />
<script src="assets/js/Leaflet.markercluster-master/dist/leaflet.markercluster-src.js"></script>

<!-- Heat Map -->
<script src="assets/js/Leaflet.heat-gh-pages/dist/leaflet-heat.js"></script>

<!-- Group Layer -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/0.7.3/leaflet.css" />
<link rel="stylesheet" href="assets/js/leaflet-groupedlayercontrol-gh-pages/src/leaflet.groupedlayercontrol.css" />
<script src="assets/js/leaflet-groupedlayercontrol-gh-pages/src/leaflet.groupedlayercontrol.js"></script>

<!-- Buffer TurfJS -->
<script src="https://cdn.jsdelivr.net/npm/@turf/turf@5/turf.min.js"></script>

<!-- Search Control -->
<link rel="stylesheet" href="assets/js/leaflet-search-master/src/leaflet-search.css" />
<script src="assets/js/leaflet-search-master/src/leaflet-search.js"></script>

   <script type="text/javascript">

    //Choropleth - Jumlah Penyandang Disabilitas
    <?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
		$db->get('disabilitas');
		$data[$row->kode_kecamatan]=$db->count;
	}
   	?>

    var disabilitas = <?=json_encode($data)?>; 

	<?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->get('disabilitas');
		$total[$row->kode_kecamatan]=$db->count;
	}
   	?>

    var total = <?=json_encode($total)?>;
    //Choropleth-end

    //Choropleth - Pendapatan
    <?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
        $stats = $db->getOne ("disabilitas", "avg(pendapatan) as rerata");
		$dataIncome[$row->kode_kecamatan]=round($stats['rerata'],0);
	}
   	?>

    var income = <?=json_encode($dataIncome)?>; 
    //Choropleth-end

//Get Data Bar Chart (Kartu Jaminan)
		//ASKES
		<?php
            $getKecamatan=$db->ObjectBuilder()->get('kecamatan');
            foreach ($getKecamatan as $row) {
            $db->where('kode_kecamatan',$row->kode_kecamatan);
            $db->where("kartu_jaminan", 'ASKES%', 'like');
            $db->get('disabilitas');
            $dataAskes[$row->kode_kecamatan]=$db->count;
            }
        ?>
        var Askes = <?=json_encode($dataAskes)?>; 
    
	//BPJS
	<?php
            $getKecamatan=$db->ObjectBuilder()->get('kecamatan');
            foreach ($getKecamatan as $row) {
            $db->where('kode_kecamatan',$row->kode_kecamatan);
            $db->where("kartu_jaminan", 'BPJS%', 'like');
            $db->get('disabilitas');
            $dataBPJS[$row->kode_kecamatan]=$db->count;
            }
        ?>
        var BPJS = <?=json_encode($dataBPJS)?>; 
	
	//KIS
	<?php
            $getKecamatan=$db->ObjectBuilder()->get('kecamatan');
            foreach ($getKecamatan as $row) {
            $db->where('kode_kecamatan',$row->kode_kecamatan);
            $db->where("kartu_jaminan", 'KIS%', 'like');
            $db->get('disabilitas');
            $dataKIS[$row->kode_kecamatan]=$db->count;
            }
        ?>
        var KIS = <?=json_encode($dataKIS)?>; 
	
	//Jamkesmas
	<?php
            $getKecamatan=$db->ObjectBuilder()->get('kecamatan');
            foreach ($getKecamatan as $row) {
            $db->where('kode_kecamatan',$row->kode_kecamatan);
            $db->where("kartu_jaminan", 'Jamkesmas%', 'like');
            $db->get('disabilitas');
            $dataJamkesmas[$row->kode_kecamatan]=$db->count;
            }
        ?>
        var Jamkesmas = <?=json_encode($dataJamkesmas)?>; 
	
	//Jamkesda
	<?php
            $getKecamatan=$db->ObjectBuilder()->get('kecamatan');
            foreach ($getKecamatan as $row) {
            $db->where('kode_kecamatan',$row->kode_kecamatan);
            $db->where("kartu_jaminan", 'Jamkesda%', 'like');
            $db->get('disabilitas');
            $dataJamkesda[$row->kode_kecamatan]=$db->count;
            }
        ?>
        var Jamkesda = <?=json_encode($dataJamkesda)?>;
	
	//Jamkesos
	<?php
            $getKecamatan=$db->ObjectBuilder()->get('kecamatan');
            foreach ($getKecamatan as $row) {
            $db->where('kode_kecamatan',$row->kode_kecamatan);
            $db->where("kartu_jaminan", 'Jamkesos%', 'like');
            $db->get('disabilitas');
            $dataJamkesos[$row->kode_kecamatan]=$db->count;
            }
        ?>
        var Jamkesos = <?=json_encode($dataJamkesos)?>;
	
	//Jamkesus
	<?php
            $getKecamatan=$db->ObjectBuilder()->get('kecamatan');
            foreach ($getKecamatan as $row) {
            $db->where('kode_kecamatan',$row->kode_kecamatan);
            $db->where("kartu_jaminan", 'Jamkesus%', 'like');
            $db->get('disabilitas');
            $dataJamkesus[$row->kode_kecamatan]=$db->count;
            }
        ?>
        var Jamkesus = <?=json_encode($dataJamkesus)?>;
	
	//Tidak memiliki jaminan
	<?php
            $getKecamatan=$db->ObjectBuilder()->get('kecamatan');
            foreach ($getKecamatan as $row) {
            $db->where('kode_kecamatan',$row->kode_kecamatan);
            $db->where("kartu_jaminan", NULL, 'IS');
            $db->get('disabilitas');
            $dataTidakJaminan[$row->kode_kecamatan]=$db->count;
            }
        ?>
        var TidakJaminan = <?=json_encode($dataTidakJaminan)?>;
    
    <?php
        $getKecamatan=$db->ObjectBuilder()->get('kecamatan');
        foreach ($getKecamatan as $row) {
        ?>

        <?php
            $arrayKecBarChart[]='{
            location: ['.$row->latitude_kec.','.$row->longitude_kec.'],
            nama: "'.$row->nama_kecamatan.'",
            ASKES: '.$dataAskes[$row->kode_kecamatan].',
            BPJS: '.$dataBPJS[$row->kode_kecamatan].',
            KIS: '.$dataKIS[$row->kode_kecamatan].',
            Jamkesmas: '.$dataJamkesmas[$row->kode_kecamatan].',
            Jamkesda: '.$dataJamkesda[$row->kode_kecamatan].',
            Jamkesos: '.$dataJamkesos[$row->kode_kecamatan].',
            Jamkesus: '.$dataJamkesus[$row->kode_kecamatan].',
            TidakJaminan: '.$dataTidakJaminan[$row->kode_kecamatan].'
            }';
        }
    ?>

    var bars = 
			[<?=implode(',', $arrayKecBarChart);?>]
//Get Data Bar Chart (Kartu Jaminan) - end

//Get Data SARPRAS
//Count jumlah penyandang disabilitas
<?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
		$db->get('disabilitas');
		$data[$row->kode_kecamatan]=$db->count;
		$data2[$row->kode_kecamatan]=sqrt($db->count);
	}
   	?>

    var disabilitas = <?=json_encode($data)?>;
	var diameter = <?=json_encode($data2)?>; 
	//Count jumlah penyandang disabilitas - end

    //Count Transportasi
    //Count hambatan transportasi (ya)
	<?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
        $db->where('hambatan_trans',"ya");
		$db->get('disabilitas');
		$dataTransYa[$row->kode_kecamatan]=$db->count;
		$data2[$row->kode_kecamatan]=sqrt($db->count);
	}
   	?>

    var hambatantransya = <?=json_encode($dataTransYa)?>;
	var diametertransya = <?=json_encode($data2)?>; 

    //Count hambatan transportasi (tidak)
    <?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
        $db->where('hambatan_trans',"tidak");
		$db->get('disabilitas');
		$dataTransTidak[$row->kode_kecamatan]=$db->count;
		$data2[$row->kode_kecamatan]=sqrt($db->count);
	}
   	?>

    var hambatantranstidak = <?=json_encode($dataTransTidak)?>;
	var diametertranstidak = <?=json_encode($data2)?>; 

    //Count hambatan transportasi (tidak mengakses)
    <?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
        $db->where('hambatan_trans',"tidak mengakses sarana transportasi umum");
		$db->get('disabilitas');
		$dataTransTidakAkses[$row->kode_kecamatan]=$db->count;
		$data2[$row->kode_kecamatan]=sqrt($db->count);
	}
   	?>

    var hambatantranstidakmengakses = <?=json_encode($dataTransTidakAkses)?>;
	var diametertranstidakmengakses = <?=json_encode($data2)?>;

    //Count hambatan transportasi (lainnya)
    <?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
        $db->where('hambatan_trans',NULL, 'IS');
		$db->get('disabilitas');
		$dataTransLainnya[$row->kode_kecamatan]=$db->count;
		$data2[$row->kode_kecamatan]=sqrt($db->count);
	}
   	?>

    var hambatantranslainnya = <?=json_encode($dataTransLainnya)?>;
	var diametertranslainnya = <?=json_encode($data2)?>; 
	//Count hambatan transportasi - end

    //Count Pendidikan
    //Count hambatan pendidikan (ya)
	<?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
        $db->where('hambatan_pend',"ya");
		$db->get('disabilitas');
		$dataPendYa[$row->kode_kecamatan]=$db->count;
		$data2[$row->kode_kecamatan]=sqrt($db->count);
	}
   	?>

    var hambatanpendya = <?=json_encode($dataPendYa)?>;
	var diameterpendya = <?=json_encode($data2)?>; 

    //Count hambatan pendidikan (tidak)
    <?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
        $db->where('hambatan_pend',"tidak");
		$db->get('disabilitas');
		$dataPendTidak[$row->kode_kecamatan]=$db->count;
		$data2[$row->kode_kecamatan]=sqrt($db->count);
	}
   	?>

    var hambatanpendtidak = <?=json_encode($dataPendTidak)?>;
	var diameterpendtidak = <?=json_encode($data2)?>; 

    //Count hambatan pendidikan (tidak mengakses)
    <?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
        $db->where('hambatan_pend',"tidak mengakses sarana sekolah/pendidikan");
		$db->get('disabilitas');
		$dataPendTidakAkses[$row->kode_kecamatan]=$db->count;
		$data2[$row->kode_kecamatan]=sqrt($db->count);
	}
   	?>

    var hambatanpendtidakmengakses = <?=json_encode($dataPendTidakAkses)?>;
	var diameterpendtidakmengakses = <?=json_encode($data2)?>; 

    //Count hambatan pendidikan (lainnya)
    <?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
        $db->where('hambatan_pend',NULL, 'IS');
		$db->get('disabilitas');
		$dataPendLainnya[$row->kode_kecamatan]=$db->count;
		$data2[$row->kode_kecamatan]=sqrt($db->count);
	}
   	?>

    var hambatanpendlainnya = <?=json_encode($dataPendLainnya)?>;
	var diameterpendlainnya = <?=json_encode($data2)?>; 
	//Count hambatan pendidikan - end

    //Count Kesehatan
    //Count hambatan kesehatan (ya)
	<?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
        $db->where('hambatan_kes',"ya");
		$db->get('disabilitas');
		$dataKesYa[$row->kode_kecamatan]=$db->count;
		$data2[$row->kode_kecamatan]=sqrt($db->count);
	}
   	?>

    var hambatankesya = <?=json_encode($dataKesYa)?>;
	var diameterkesya = <?=json_encode($data2)?>; 

    //Count hambatan kesehatan (tidak)
    <?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
        $db->where('hambatan_kes',"tidak");
		$db->get('disabilitas');
		$dataKesTidak[$row->kode_kecamatan]=$db->count;
		$data2[$row->kode_kecamatan]=sqrt($db->count);
	}
   	?>

    var hambatankestidak = <?=json_encode($dataKesTidak)?>;
	var diameterkestidak = <?=json_encode($data2)?>; 

    //Count hambatan kesehatan (tidak mengakses)
    <?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
        $db->where('hambatan_kes',"tidak mengakses fasilitas kesehatan");
		$db->get('disabilitas');
		$dataKesTidakAkses[$row->kode_kecamatan]=$db->count;
		$data2[$row->kode_kecamatan]=sqrt($db->count);
	}
   	?>

    var hambatankestidakmengakses = <?=json_encode($dataKesTidakAkses)?>;
	var diameterkestidakmengakses = <?=json_encode($data2)?>; 

    //Count hambatan kesehatan (lainnya)
    <?php
   	$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
	foreach ($getKecamatan as $row) {
		$db->where('kode_kecamatan',$row->kode_kecamatan);
        $db->where('hambatan_kes',NULL, 'IS');
		$db->get('disabilitas');
		$dataKesLainnya[$row->kode_kecamatan]=$db->count;
		$data2[$row->kode_kecamatan]=sqrt($db->count);
	}
   	?>

    var hambatankeslainnya = <?=json_encode($dataKesLainnya)?>;
	var diameterkeslainnya = <?=json_encode($data2)?>; 
	//Count hambatan kesehatan - end
//Get Data SARPRAS -end

	//GeoJSON all marker penyandang disabilitas
	<?php
	$db->join('kecamatan b','a.kode_kecamatan=b.kode_kecamatan','LEFT');
	$getdata=$db->ObjectBuilder()->get('disabilitas a');
	$jsonPoint=array();
	foreach ($getdata as $row) {
		$saveJson=null;
		$saveJson['type']="Feature";
		$saveJson['properties']=[
									"kategori"=>$row->kategori,
									"nama"=>$row->nama,
									"nik"=>$row->nik,
									"nokk"=>$row->no_kk,
									"alamat"=>$row->rt.'/'.$row->rw.','.$row->desa. ', Kecamatan '.$row->nama_kecamatan,
									"netra"=>$row->netra,
									"rungu"=>$row->rungu,
									"fisik"=>$row->fisik,
									"intelektual"=>$row->intelektual,
									"emosiperilaku"=>$row->emosiperilaku,
									"rehabilitasi"=>$row->rehabilitasi.'('.$row->jenis_rehab.')',
									"penyelenggara rehabilitasi"=>$row->penyelenggara_rehab,
									"bantuan"=>$row->bantuan.'('.$row->jenis_bantuan.')',
									"sumber bantuan"=>$row->sumber_bantuan,
									"kartu jaminan"=>$row->kartu_jaminan,
									"pendapatan"=>$row->pendapatan,
									"sekolah"=>$row->sekolah.'('.$row->dmn_sekolah.')',
									"jjg tertinggi"=>$row->jjg_tertinggi
									];
		$saveJson['geometry']=[
									"type" => "Point",
									"coordinates" => [$row->longitude, $row->latitude]
									];
		$jsonPoint[]=$saveJson;

	}
	?>

	var geojsonPoint = <?=json_encode($jsonPoint, JSON_PRETTY_PRINT)?>
	//GeoJSON all marker penyandang disabilitas - end


	 //GeoJSON Bantuan
	 <?php
	$db->join('kecamatan b','a.kode_kecamatan=b.kode_kecamatan','LEFT');
	$getdata=$db->ObjectBuilder()->where('bantuan',"Ya")->get('disabilitas a');
	$jsonPoint=array();
	foreach ($getdata as $row) {
		$saveJson=null;
		$saveJson['type']="Feature";
		$saveJson['properties']=[
									"nama"=>$row->nama,
									"alamat"=>$row->desa. ', Kecamatan '.$row->nama_kecamatan,
									"netra"=>$row->netra,
									"netra"=>$row->netra,
									"rungu"=>$row->rungu,
									"fisik"=>$row->fisik,
									"intelektual"=>$row->intelektual,
									"emosiperilaku"=>$row->emosiperilaku
									];
		$saveJson['geometry']=[
									"type" => "Point",
									"coordinates" => [$row->longitude, $row->latitude]
									];
		$jsonPoint[]=$saveJson;
	}
	?>

	var geojsonPointBantuan = <?=json_encode($jsonPoint, JSON_PRETTY_PRINT)?>
    //GeoJSON Bantuan - end

	//Membuat GeoJSON Point dari Latitude Longitude (SARPRAS)
	//GeoJSON center kecamatan
	<?php
		$getdata=$db->ObjectBuilder()->get('kecamatan');
		$jsonPoint=array();
		foreach ($getdata as $row) {
			$saveJson=null;
			$saveJson['type']="Feature";
			$saveJson['properties']=[
										"kode_kecamatan"=>$row->kode_kecamatan,
										"nama_kecamatan"=>$row->nama_kecamatan,
										"latitude_kec"=>$row->latitude_kec,
										"longitude_kec"=>$row->longitude_kec
										];
			$saveJson['geometry']=[
										"type" => "Point",
										"coordinates" => [$row->longitude_kec, $row->latitude_kec]
										];
			$jsonPointKec[]=$saveJson;
		}
	?>
	var geojsonPointKec = <?=json_encode($jsonPointKec, JSON_PRETTY_PRINT)?>
	//GeoJSON center kecamatan - end

    //JSON Sekolah
    <?php
	$getdata=$db->ObjectBuilder()->get('sarpras_sekolah');
	$jsonPoint=array();
	foreach ($getdata as $row) {
		$saveJson=null;
		$saveJson['type']="Feature";
		$saveJson['properties']=[
									"nama_sarpras"=>$row->nama_sarpras_sekolah,
									"alamat_sarpras"=>$row->alamat_sarpras_sekolah,
									"latitude_sarpras"=>$row->latitude_sarpras_sekolah,
									"longitude_sarpras"=>$row->longitude_sarpras_sekolah
									];
		$saveJson['geometry']=[
									"type" => "Point",
									"coordinates" => [$row->longitude_sarpras_sekolah, $row->latitude_sarpras_sekolah]
									];
		$jsonPointSarprasSekolah[]=$saveJson;
	}
	?>
	var geojsonPointSarprasSekolah = <?=json_encode($jsonPointSarprasSekolah, JSON_PRETTY_PRINT)?>

    //JSON Kesehatan
    <?php
	$getdata=$db->ObjectBuilder()->get('sarpras_kesehatan');
	$jsonPoint=array();
	foreach ($getdata as $row) {
		$saveJson=null;
		$saveJson['type']="Feature";
		$saveJson['properties']=[
									"nama_sarpras"=>$row->nama_sarpras_kesehatan,
									"alamat_sarpras"=>$row->alamat_sarpras_kesehatan,
									"latitude_sarpras"=>$row->latitude_sarpras_kesehatan,
									"longitude_sarpras"=>$row->longitude_sarpras_kesehatan
									];
		$saveJson['geometry']=[
									"type" => "Point",
									"coordinates" => [$row->longitude_sarpras_kesehatan, $row->latitude_sarpras_kesehatan]
									];
		$jsonPointSarprasKesehatan[]=$saveJson;
	}
	?>
	var geojsonPointSarprasKesehatan = <?=json_encode($jsonPointSarprasKesehatan, JSON_PRETTY_PRINT)?>

    //JSON Transportasi
    <?php
	$getdata=$db->ObjectBuilder()->get('sarpras_transportasi');
	$jsonPoint=array();
	foreach ($getdata as $row) {
		$saveJson=null;
		$saveJson['type']="Feature";
		$saveJson['properties']=[
									"nama_sarpras"=>$row->nama_sarpras_transportasi,
									"alamat_sarpras"=>$row->alamat_sarpras_transportasi,
									"latitude_sarpras"=>$row->latitude_sarpras_transportasi,
									"longitude_sarpras"=>$row->longitude_sarpras_transportasi
									];
		$saveJson['geometry']=[
									"type" => "Point",
									"coordinates" => [$row->longitude_sarpras_transportasi, $row->latitude_sarpras_transportasi]
									];
		$jsonPointSarprasTransportasi[]=$saveJson;
	}
	?>
	var geojsonPointSarprasTransportasi = <?=json_encode($jsonPointSarprasTransportasi, JSON_PRETTY_PRINT)?>
	//Membuat GeoJSON Point dari Latitude Longitude - end

	var map = L.map('mapid').setView([-7.7951371, 110.1039079], 11);
	var LayerKita = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
    maxZoom: 18,
    id: 'mapbox/streets-v11',
    tileSize: 512,
    zoomOffset: -1,
    accessToken: 'pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw'
});
	map.addLayer(LayerKita);

	var OpenTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
	maxZoom: 17,
	attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
});

	var Esri_WorldImagery = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
	attribution: 'Tiles &copy; Esri &mdash; Source: Esri, i-cubed, USDA, USGS, AEX, GeoEye, Getmapping, Aerogrid, IGN, IGP, UPR-EGP, and the GIS User Community'
});

    //Control Choropleth
    // control that shows state info on hover
	var info = L.control();

    info.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info');
        this.update();
        return this._div;
    };

    info.update = function (props) {
        this._div.innerHTML = '<h4>Jumlah Penyandang Disabilitas</h4>' + '<a href="http://localhost/webgis/?halaman=spiderchart">Chart</a> <br>'  +  (props ?
            '<b>' + props.Objek + '</b><br />' + disabilitas[props.Kode_Kec]/total[props.Kode_Kec]*100 + '% atau ' + disabilitas[props.Kode_Kec] + ' orang'
            : 'Dekatkan mouse untuk melihat');
    };

    info.addTo(map);
    //info panel


    var myStyle2 = {
        "color": "#ffff00",
        "weight": 1,
        "opacity": 0.9
    };

    function popUp(f,l){
        var out = [];
        if (f.properties){
            // for(key in f.properties){
            // 	console.log(key);

            // }
            out.push("Kecamatan: "+f.properties['Objek']);
            l.bindPopup(out.join("<br />"));
        }
    }
	//Control Choropleth-end

	//Function popupmarker
	function popUpmarker(f,l){
        var html=' ';
        if (f.properties){
            html+='<table border : 1>';
				html+='<tr>';
					html+='<td colspan="2" align=center><b>Data Profil Penyandang Disabilitas</b></td>';
				html+='</tr>';
				// html+='<tr bgcolor=#e0ebeb>';
				// 	html+='<td>Nama</td>';
				// 	html+='<td>'+f.properties['nama']+'</td>';
				// html+='</tr>';
				// html+='<tr>';
				// 	html+='<td>NIK</td>';
				// 	html+='<td>'+f.properties['nik']+'</td>';
				// html+='</tr>';
				// html+='<tr bgcolor=#e0ebeb>';
				// 	html+='<td>No KK</td>';
				// 	html+='<td>'+f.properties['nokk']+'</td>';
				// html+='</tr>';
				html+='<tr>';
					html+='<td>Kategori</td>';
					html+='<td>'+f.properties['kategori']+'</td>';
				html+='</tr>';
				// html+='<tr bgcolor=#e0ebeb>';
				// 	html+='<td>Alamat</td>';
				// 	html+='<td>'+f.properties['alamat']+'</td>';
				// html+='</tr>';
				// html+='<tr>';
				// 	html+='<td>Netra</td>';
				// 	html+='<td>'+f.properties['netra']+'</td>';
				// html+='</tr>';
				// html+='<tr bgcolor=#e0ebeb>';
				// 	html+='<td>Rungu</td>';
				// 	html+='<td>'+f.properties['rungu']+'</td>';
				// html+='</tr>';
				// html+='<tr>';
				// 	html+='<td>Fisik</td>';
				// 	html+='<td>'+f.properties['fisik']+'</td>';
				// html+='</tr>';
				// html+='<tr bgcolor=#e0ebeb>';
				// 	html+='<td>Intelektual</td>';
				// 	html+='<td>'+f.properties['intelektual']+'</td>';
				// html+='</tr>';
				// html+='<tr>';
				// 	html+='<td>Emosi/Perilaku</td>';
				// 	html+='<td>'+f.properties['emosiperilaku']+'</td>';
				// html+='</tr>';
				// html+='<tr bgcolor=#e0ebeb>';
				// 	html+='<td>Rehabilitasi</td>';
				// 	html+='<td>'+f.properties['rehabilitasi']+'</td>';
				// html+='</tr>';
				// html+='<tr>';
				// 	html+='<td>Penyelenggara Rehabilitasi</td>';
				// 	html+='<td>'+f.properties['penyelenggara rehabilitasi']+'</td>';
				// html+='</tr>';
				html+='<tr bgcolor=#e0ebeb>';
					html+='<td>Bantuan</td>';
					html+='<td>'+f.properties['bantuan']+'</td>';
				html+='</tr>';
				html+='<tr>';
					html+='<td>Sumber Bantuan</td>';
					html+='<td>'+f.properties['sumber bantuan']+'</td>';
				html+='</tr>';
				// html+='<tr bgcolor=#e0ebeb>';
				// 	html+='<td>Kartu Jaminan</td>';
				// 	html+='<td>'+f.properties['kartu jaminan']+'</td>';
				// html+='</tr>';
				// html+='<tr>';
				// 	html+='<td>Pendapatan (Rp)</td>';
				// 	html+='<td>'+f.properties['pendapatan']+'</td>';
				// html+='</tr>';
				html+='<tr bgcolor=#e0ebeb>';
					html+='<td>Status Bersekolah</td>';
					html+='<td>'+f.properties['sekolah']+'</td>';
				html+='</tr>';
				html+='<tr>';
					html+='<td>Jenjang Tertinggi</td>';
					html+='<td>'+f.properties['jjg tertinggi']+'</td>';
				html+='</tr>';
			html+='</table>';
            l.bindPopup(html);
        }
    }
	//Function popupmarker

	// legend

	function iconByName(name) {
		return '<i class="icon icon-'+name+'"></i>';
	}

	function featureToMarker(feature, latlng) {
		return L.marker(latlng, {
			icon: L.divIcon({
				className: 'marker-'+feature.properties.amenity,
				html: iconByName(feature.properties.amenity),
				iconUrl: '../images/markers/'+feature.properties.amenity+'.png',
				iconSize: [25, 41],
				iconAnchor: [12, 41],
				popupAnchor: [1, -34],
				shadowSize: [41, 41]
			})
		});
	}

    //Feature Choropleth
	function getColor(d) {
		return d > 20 ? '#990000' :
				d > 10  ? '#d7301f' :
				d > 5  ? '#fc8d59' :
				d > 0   ? '#fee8c8' :
							'#fff7ec';
	}

	
	var legend = L.control({position: 'bottomleft'});

	
	legend.onAdd = function (map) {

		var div = L.DomUtil.create('div', 'info legend'),
			grades = [0, 5, 10, 20],
			labels = ['<center> <strong> Jumlah Penyandang </br> Disabilitas (Persen) </strong> </center>'],
			from, to;

		for (var i = 0; i < grades.length; i++) {
			from = grades[i];
			to = grades[i + 1];

			labels.push(
				'<i style="background:' + getColor(from + 1) + '"></i> ' +
				from + (to ? '&ndash;' + to : '+'));
		}

		div.innerHTML = labels.join('<br>');
		return div;
	};


	function style(feature) {
		return {
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 1,
			fillColor: getColor(disabilitas[feature.properties.Kode_Kec]/total[feature.properties.Kode_Kec]*100)
		};
	}

	function highlightFeature(e) {
		var layer = e.target;

		layer.setStyle({
			weight: 5,
			color: '#666',
			dashArray: '',
			fillOpacity: 1
		});

		if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
			layer.bringToFront();
		}

		info.update(layer.feature.properties);
	}

	function resetHighlight(e) {
		var layer = e.target;

		layer.setStyle({
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3'
		});

		info.update();
	}

	function zoomToFeature(e) {
		map.fitBounds(e.target.getBounds()); 
	}

	function onEachFeature(feature, layer) {
		layer.on({
			mouseover: highlightFeature,
			mouseout: resetHighlight,
			click: zoomToFeature
		});
	}
    //Feature Choropleth-end

    //Feature Pendapatan
    function getColorIncome(d) {
		return 	d > 1500000 ? '#0515fa' :
                d > 1000000   ? '#008000' :
				d > 750000   ? '#FFFF00' :
				d > 500000   ? '#ff8000' :
                d > 0   ? '#FF0000' :
							'#FFFFFF';
	}

	
	
	var legendIncome = L.control({position: 'bottomleft'});

	legendIncome.onAdd = function (map) {

		var div = L.DomUtil.create("div", "legend");
        div.innerHTML += "<h4>Rerata Pendapatan per Bulan (Rp)</h4>";
        div.innerHTML += '<i style="background: #FF0000"></i><span>0 - 500.000</span><br>';
        div.innerHTML += '<i style="background: #ff8000"></i><span>500.000 - 750.000</span><br>';
        div.innerHTML += '<i style="background: #FFFF00"></i><span>750.000 - 1.000.000</span><br>';
        div.innerHTML += '<i style="background: #008000"></i><span>1.000.000 - 1.500.000</span><br>';
        div.innerHTML += '<i style="background: #0515fa"></i><span>1.500.000+</span><br>';

		return div;
	};


    function styleIncome(feature) {
		return {
			weight: 2,
			opacity: 1,
			color: 'white',
			dashArray: '3',
			fillOpacity: 1,
			fillColor: getColorIncome(income[feature.properties.Kode_Kec])
		};
	}
    //Feature Pendapatan - end
	//Feature Batas Kecamatan
	function styleBatasKecamatan(feature) {
		return {
			weight: 2,
			opacity: 1,
			color: 'black',
			dashArray: '3',
			fillOpacity: 0
		};
	}
	//Feature Batas Kecamatan - end
 
    //Menampilkan data kecamatan choropleth
	var JumlahDisabilitasGroup = L.featureGroup();
    <?php
		$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
		foreach ($getKecamatan as $row) {
			?>

			<?php
			$arrayKec[]='{
			name: "'.$row->nama_kecamatan.'",
			icon: iconByName("'.$row->warna_kecamatan.'"),
			layer: new L.GeoJSON.AJAX(["assets/unggah_kecamatan/geojson/'.$row->geojson_kecamatan.'"],{
				style: style,
				onEachFeature:onEachFeature,
			}).addTo(JumlahDisabilitasGroup)
			}';
		}
	?>
    //Menampilkan data kecamatan choropleth-end
	//Menampilkan data choropleth income
	var IncomeGroup = L.featureGroup();
	<?php
		$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
		foreach ($getKecamatan as $row) {
			?>

			<?php
			$arrayKecIncome[]='{
			name: "'.$row->nama_kecamatan.'",
			layer: new L.GeoJSON.AJAX(["assets/unggah_kecamatan/geojson/'.$row->geojson_kecamatan.'"],{
				style: styleIncome
			}).addTo(IncomeGroup).bindPopup(
				"Kecamatan : '.$row->nama_kecamatan.'<br>Pendapatan Rerata (Rp) : '.$dataIncome[$row->kode_kecamatan].'")
			}';
		}
	?>
	//Menampilkan data choropleth income - end
	//Menampilkan data batas kecamatan
	var BatasKecamatan = L.featureGroup();
    <?php
		$getKecamatan=$db->ObjectBuilder()->get('kecamatan');
		foreach ($getKecamatan as $row) {
			?>

			<?php
			$arrayBatasKec[]='{
			name: "'.$row->nama_kecamatan.'",
			icon: iconByName("'.$row->warna_kecamatan.'"),
			layer: new L.GeoJSON.AJAX(["assets/unggah_kecamatan/geojson/'.$row->geojson_kecamatan.'"],{
				style: styleBatasKecamatan
			}).addTo(BatasKecamatan).bindPopup(
				"Kecamatan : '.$row->nama_kecamatan.'")
			}';
		}
	?>
    //Menampilkan data batas kecamatan-end

	var array = [
			<?=implode(',', $arrayKec);?>,
			<?=implode(',', $arrayKecIncome);?>,
			<?=implode(',', $arrayBatasKec);?>
		];
	//Menampilkan data choropleth - end

	//Feature Kartu Jaminan
        /*Legend specific*/
        var legendKartuJaminan = L.control({ position: "bottomleft" });

        legendKartuJaminan.onAdd = function(map) {
        var div = L.DomUtil.create("div", "legend");
        div.innerHTML += "<h4>Jenis Kartu Jaminan</h4>";
        div.innerHTML += '<i style="background: #1f77b4"></i><span>ASKES</span><br>';
        div.innerHTML += '<i style="background: #ff7f0e"></i><span>BPJS</span><br>';
        div.innerHTML += '<i style="background: #2ca02c"></i><span>KIS</span><br>';
        div.innerHTML += '<i style="background: #d62728"></i><span>Jamkesmas</span><br>';
        div.innerHTML += '<i style="background: #9467bd"></i><span>Jamkesda</span><br>';
        div.innerHTML += '<i style="background: #8c564b"></i><span>Jamkesos</span><br>';
        div.innerHTML += '<i style="background: #e377c2"></i><span>Jamkesus</span><br>';
        div.innerHTML += '<i style="background: #7f7f7f"></i><span>Tidak punya jaminan</span><br>';

        return div;
        };

    //Feature Karu Jaminan - end
	//Bar Chart Karu Jaminan - end
	// script bar chart coba dari github
    var barChartGroup = L.featureGroup();
    bars.forEach(bar => {

	var options = {
    data: [
		bar.ASKES / 3,
		bar.BPJS / 3,
        bar.KIS / 3,
		bar.Jamkesmas / 3,
		bar.Jamkesda / 3,
		bar.Jamkesos / 3,
		bar.Jamkesus / 3,
		bar.TidakJaminan / 3
	],
	chartOptions: {
		'dataPoint1': {
			fillColor: '#FEE5D9',
			minValue: 0,
			maxValue: 30,
			maxHeight: 30,
			displayText: function (value) {
				return value.toFixed(2);
			}
		},
		'dataPoint2': {
			fillColor: '#FCAE91',
			minValue: 0,
			maxValue: 30,
			maxHeight: 30,
			displayText: function (value) {
				return value.toFixed(2);
			}
		},
        'dataPoint3': {
			fillColor: '#FB6A4A',
			minValue: 0,
			maxValue: 30,
			maxHeight: 30,
			displayText: function (value) {
				return value.toFixed(2);
			}
		},
		'dataPoint4': {
			fillColor: '#d44000',
			minValue: 0,
			maxValue: 30,
			maxHeight: 30,
			displayText: function (value) {
				return value.toFixed(2);
			}
		},
		'dataPoint5': {
			fillColor: '#CB181D',
			minValue: 0,
			maxValue: 30,
			maxHeight: 30,
			displayText: function (value) {
				return value.toFixed(2);
			}
		},
		'dataPoint6': {
			fillColor: '#ffc996',
			minValue: 0,
			maxValue: 30,
			maxHeight:30,
			displayText: function (value) {
				return value.toFixed(2);
			}
		},
		'dataPoint7': {
			fillColor: '#845460',
			minValue: 0,
			maxValue: 30,
			maxHeight: 30,
			displayText: function (value) {
				return value.toFixed(2);
			}
		},
		'dataPoint8': {
			fillColor: '#81b214',
			minValue: 0,
			maxValue: 30,
			maxHeight: 30,
			displayText: function (value) {
				return value.toFixed(2);
			}
		}
	},
    
	weight: 1,
	color: '#000000',
	}
        
    var barChartMarker = L.minichart(bar.location, options);
    barChartGroup.addLayer(barChartMarker);
     
    })
	//Bar Chart Karu Jaminan - end

	//marker
	var MarkerClusterGroup = L.featureGroup().addTo(map);
    
	var markers = L.markerClusterGroup();

	var geojsonMarkerOptions = {
    radius: 8,
    fillColor: "#ff7800",
    color: "#000",
    weight: 1,
    opacity: 1,
    fillOpacity: 0.8
	};

	var marker = L.geoJSON(geojsonPoint, {
    pointToLayer: function (feature, latlng) {
        return L.circleMarker(latlng, geojsonMarkerOptions);
    	},
		onEachFeature: popUpmarker
	})
	markers.addLayer(marker);

	MarkerClusterGroup.addLayer(markers);

	//Heat Map
    <?php
	$db->join('kecamatan b','a.kode_kecamatan=b.kode_kecamatan','LEFT');
	$getdata=$db->ObjectBuilder()->where('bantuan',"Ya")->get('disabilitas a');
	$heatmapArray=array();
	foreach ($getdata as $row) {
		$heatmapArray[]="[".$row->latitude.",".$row->longitude.",10]";
    }
    $heatmapData=implode(',', $heatmapArray);
	?>
    var heat = L.heatLayer([
        <?=$heatmapData?>
    ], {radius : 25});
    //Heat Map - end

	//SARPRAS
	<?php
        $getKecamatan=$db->ObjectBuilder()->get('kecamatan');
        foreach ($getKecamatan as $row) {
        ?>
        <?php
            $arrayKecCircle[]='{
            location: ['.$row->latitude_kec.','.$row->longitude_kec.'],
            nama: "'.$row->nama_kecamatan.'",
            Transportasi_Ya: '.$dataTransYa[$row->kode_kecamatan].',
            Transportasi_Tidak: '.$dataTransTidak[$row->kode_kecamatan].',
            Transportasi_TidakMengakses: '.$dataTransTidakAkses[$row->kode_kecamatan].',
            Transportasi_Lainnya: '.$dataTransLainnya[$row->kode_kecamatan].',
            Pendidikan_Ya: '.$dataPendYa[$row->kode_kecamatan].',
            Pendidikan_Tidak: '.$dataPendTidak[$row->kode_kecamatan].',
            Pendidikan_TidakMengakses: '.$dataPendTidakAkses[$row->kode_kecamatan].',
            Pendidikan_Lainnya: '.$dataPendLainnya[$row->kode_kecamatan].',
            Kesehatan_Ya: '.$dataKesYa[$row->kode_kecamatan].',
            Kesehatan_Tidak: '.$dataKesTidak[$row->kode_kecamatan].',
            Kesehatan_TidakMengakses: '.$dataKesTidakAkses[$row->kode_kecamatan].',
            Kesehatan_Lainnya: '.$dataKesLainnya[$row->kode_kecamatan].',
            }';
        }
    ?>
        
    var circles = 
		[<?=implode(',', $arrayKecCircle);?>]


	 //marker
		//Marker Sekolah
		var IconSekolah = L.icon({
			iconUrl: './assets/icon_sarpras/school.png',
			iconSize: [30, 30]
		});

		var bufferSekolah = L.featureGroup();
        var Sekolah = L.geoJSON(geojsonPointSarprasSekolah, {
			
			pointToLayer: function (feature, latlng) {
				return L.marker(latlng, {
					icon: IconSekolah
				}).bindTooltip(
						""+feature.properties.nama_sarpras+"<br>"+
						""+feature.properties.alamat_sarpras+"");
			},
			onEachFeature: function (feature, latlng) {
                var bufferedsekolah = turf.buffer(feature, 3, {units: 'kilometers'});
                L.geoJSON(bufferedsekolah, {style: {color: "#fdb462"}, fillOpacity:0.3}).addTo(bufferSekolah)
            }
            
	    });

        //Marker Kesehatan
		var IconKesehatan = L.icon({
			iconUrl: './assets/icon_sarpras/health.png',
			iconSize: [30, 30]
		});

		var bufferKesehatan = L.featureGroup();
        var Kesehatan = L.geoJSON(geojsonPointSarprasKesehatan, {
			
			pointToLayer: function (feature, latlng) {
				return L.marker(latlng, {
					icon: IconKesehatan
				}).bindTooltip(
						""+feature.properties.nama_sarpras+"<br>"+
						""+feature.properties.alamat_sarpras+"");
			},
			onEachFeature: function (feature, latlng) {
                var bufferedkesehatan = turf.buffer(feature, 4, {units: 'kilometers'});
                L.geoJSON(bufferedkesehatan, {style: {color: "#fb8072"}, fillOpacity:0.3}).addTo(bufferKesehatan)
            }
            
	    });

        //Marker Transportasi
		var IconTransportasi = L.icon({
			iconUrl: './assets/icon_sarpras/transportation.png',
			iconSize: [30, 30]
		});

		var bufferTransportasi = L.featureGroup();
        var Transportasi = L.geoJSON(geojsonPointSarprasTransportasi, {
			
			pointToLayer: function (feature, latlng) {
				return L.marker(latlng, {
					icon: IconTransportasi
				}).bindTooltip(
						""+feature.properties.nama_sarpras+"<br>"+
						""+feature.properties.alamat_sarpras+"");
			},
			onEachFeature: function (feature, latlng) {
                var bufferedtransportasi = turf.buffer(feature, 10, {units: 'kilometers'});
                L.geoJSON(bufferedtransportasi, {style: {color: "#80b1d3"}, fillOpacity:0.3}).addTo(bufferTransportasi)
            }
            
	    });
	//marker - end

	//Circle Hambatan
		var hambatanGroup = L.featureGroup();

		circles.forEach(circle => {
		var circle = L.circle(circle.location, {
			color: '#ef8d32',
			fillColor: '#ef8d32',
			fillOpacity: 1,
			radius: (circle.Transportasi_Ya + circle.Pendidikan_Ya + circle.Kesehatan_Ya) * 50
		}).bindPopup("Jumlah orang yang mengalami hambatan: </br>"+
						"Sekolah = "+circle.Pendidikan_Ya+"<br>"+
						"Kesehatan = "+circle.Kesehatan_Ya+"<br>"+
						"Transportasi = "+circle.Transportasi_Ya+"<br>"
						).addTo(hambatanGroup);
		})
	//Circle Hambatan - end
	//SARPRAS - end

	var baseLayers = {
		"OpenStreetMap": LayerKita,
		"OpenTopoMap": OpenTopoMap,
		"Esri_WorldImagery": Esri_WorldImagery
	};
	
	// var overlays = {
	// 	"Titik Penyandang Disabilitas" : MarkerClusterGroup,
    // 	"Jumlah Penyandang Disabilitas": JumlahDisabilitasGroup,
	// 	"Income": IncomeGroup,
	// 	"Jaminan Kesehatan" : barChartGroup,
	// 	"Heat Map Bantuan" : heat,
	// 	"<img src='./assets/icon_sarpras/school.png' height=20>Sekolah": Sekolah,
	// 	"<img src='./assets/icon_sarpras/health.png' height=20>Kesehatan": Kesehatan,
	// 	"<img src='./assets/icon_sarpras/transportation.png' height=20>Transportasi": Transportasi,
	// 	"Buffer Sekolah": bufferSekolah,
	// 	"Buffer Kesehatan": bufferKesehatan,
	// 	"Buffer Transportasi": bufferTransportasi,
	// 	"Hambatan mengakses sarpras": hambatanGroup
	// };

	
	// L.control.layers(baseLayers, overlays).addTo(map);

	var groupedOverlays = {
		"": {
		"Batas Kapanewon" : BatasKecamatan
      },
		"DISABILITAS": {
		"Titik Penyandang Disabilitas" : MarkerClusterGroup,
    	"Jumlah Penyandang Disabilitas": JumlahDisabilitasGroup,
		"Income": IncomeGroup,
		"Jaminan Kesehatan" : barChartGroup,
		"Heat Map Bantuan" : heat
      },
	  "SARANA PRASARANA": {
        "<img src='./assets/icon_sarpras/school.png' height=20>Sekolah": Sekolah,
		"Buffer Sekolah": bufferSekolah,
		"<img src='./assets/icon_sarpras/health.png' height=20>Kesehatan": Kesehatan,
		"Buffer Kesehatan": bufferKesehatan,
		"<img src='./assets/icon_sarpras/transportation.png' height=20>Transportasi": Transportasi,
		"Hambatan mengakses sarpras": hambatanGroup
      },
    };

    // Use the custom grouped layer control, not "L.control.layers"
    L.control.groupedLayers(baseLayers, groupedOverlays).addTo(map);

	//Control Legend
	map.on('overlayadd', function (eventLayer) {
    if (eventLayer.name === 'Jumlah Penyandang Disabilitas') {
        map.removeControl(legendIncome, legendKartuJaminan);
        legend.addTo(map);
    } else if (eventLayer.name === 'Income') {
        map.removeControl(legend, legendKartuJaminan);
        legendIncome.addTo(map);
	} else if (eventLayer.name === 'Jaminan Kesehatan') {
        map.removeControl(legend, legendIncome);
        legendKartuJaminan.addTo(map);
    } else {
        map.removeControl(legend, legendIncome, legendKartuJaminan);
    }
});
	//Control Legend - end

	//Search Control
	var searchControl = new L.Control.Search({
		position:'topleft',
		layer: markers,
		propertyName: 'nama',
		marker: false,
		zoom: 30,
		initial: false,
		collapsed: true
	});

	searchControl.on('search:locationfound', function(e) {
		
		//console.log('search:locationfound', );

		//map.removeLayer(this._markerSearch)

		e.layer.setStyle({fillColor: '#3f0', color: '#0f0'});
		if(e.layer._popup)
			e.layer.openPopup();

	}).on('search:collapsed', function(e) {

		featuresLayer.eachLayer(function(layer) {	//restore feature color
			featuresLayer.resetStyle(layer);
		});	
	});
	
	map.addControl( searchControl );  //inizialize search control
	//Search Control - end
	

   </script>
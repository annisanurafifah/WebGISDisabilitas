<?php
  $title="WebGIS-Admin";
  $judul=$title;
  $url='leaflet-controladmin';
  $fileJs='leaflet-controlJs';
  if ($session->get('level')!='admin'){
    header("Location: http://localhost/webgis/?halaman=beranda");
    }
 ?>
 <style type="text/css">
 	.info { padding: 6px 8px; font: 14px/16px Arial, Helvetica, sans-serif; background: white; background: rgba(255,255,255,0.8); box-shadow: 0 0 15px rgba(0,0,0,0.2); border-radius: 5px; } .info h4 { margin: 0 0 5px; color: #777; }
 </style>
<?=content_open($title)?>
 	<div id="mapid"></div>
   <style>
   .legend {
    padding: 6px 8px;
    font: 14px Arial, Helvetica, sans-serif;
    background: white;
    background: rgba(255, 255, 255, 1);
    /*box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);*/
    /*border-radius: 5px;*/
    line-height: 24px;
    color: #555;
    }
    .legend h4 {
    text-align: center;
    font-size: 16px;
    margin: 2px 12px 8px;
    color: #777;
    }

    .legend span {
    position: relative;
    bottom: 3px;
    }

    .legend i {
    width: 18px;
    height: 18px;
    float: left;
    margin: 0 8px 0 0;
    opacity: 1;
    }

    .legend i.icon {
    background-size: 18px;
    background-color: rgba(255, 255, 255, 1);
    }
   </style>
<?=content_close()?>

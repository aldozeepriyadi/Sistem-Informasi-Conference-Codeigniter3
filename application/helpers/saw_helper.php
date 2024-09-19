<?php 
function nilai_normalisasi($assesor,$id_pegawai,$id_kriteria){

	$x = get_instance();
	$normalisasi = $x->db->query("select * from normalisasi where id_pegawai='$id_pegawai' and id_kriteria='$id_kriteria' and assesor='$assesor'");
	if($normalisasi->num_rows() > 0){
		$n = $normalisasi->row();
		return $n->nilai_normalisasi;
	}else{
		return 0;
	}
}
?>

<?php 
function nilai_normalisasi_penilai($id_pegawai,$id_kriteria){

	$x = get_instance();
	$assesor = $x->session->userdata('assesor');
	$normalisasi = $x->db->query("select * from normalisasi where id_pegawai='$id_pegawai' and id_kriteria='$id_kriteria' and assesor='$assesor'");
	if($normalisasi->num_rows() > 0){
		$n = $normalisasi->row();
		return $n->nilai_normalisasi;
	}else{
		return 0;
	}
}
?>





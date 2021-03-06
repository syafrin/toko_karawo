<?php
class Mod_kategori extends CI_Model{

	function selectAll(){
		return $this->db->get('tabel_kategori');
	}

	function selectParent(){
		return $this->db->get_where('tabel_kategori',array('parent'=>0));
	}
	function save(){
		$data=array('nama_kategori'=>$this->input->post('nama'),
			        'parent'=>$this->input->post('parent'),
			        'link'=>$this->input->post('link'),
			        'nama_kategori_seo'=>seo_title($this->input->post('nama')));
		$this->db->insert('tabel_kategori',$data);
		return true;
	}

	function selectOne($id){
		return $this->db->get_where('tabel_kategori',array('kategori_id'=>$id));
	}

	function update(){
			$data=array('nama_kategori'=>$this->input->post('nama'),
			        'parent'=>$this->input->post('parent'),
			        'link'=>$this->input->post('link'),
			        'nama_kategori_seo'=>seo_title($this->input->post('nama')));
			$this->db->where('kategori_id',$this->input->post('idx'));
			$this->db->update('tabel_kategori',$data);
			return true;
	}
}

?>
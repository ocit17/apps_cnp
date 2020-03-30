<h2>
	<?php 
		
		$id = "";

		if ($this->uri->segment(2) != FALSE)
		{
		    $id =  $this->uri->segment(2);
		    echo $id;

		}
		elseif($this->uri->segment(1) != FALSE)
		{
		    $id =  $this->uri->segment(1);
		    //echo $id;
		    $data = $this->db->get_where('fmenu', array('link' => $id));
				foreach ($data->result() as $title) {
					echo $title->nama_menu;
			}
		}
	?>
</h2>
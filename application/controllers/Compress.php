<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compress extends CI_Controller {

	public function index()
	{
		$handle = opendir('assets/pictures');
        while($file = readdir($handle))
        {
        if($file !== '.' && $file !== '..')
            {
                // Configuration
                $config['image_library'] = 'gd2';
                $config['source_image'] = 'assets/pictures/'.$file;
                $config['new_image'] = 'assets/compress/'.$file;
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = FALSE;
                $config['width'] = 200;
                $config['height'] = 200;

                $this->load->library('image_lib', $config);

                $this->image_lib->clear();
                $this->image_lib->initialize($config);
                $this->image_lib->resize();
            }
        }
        echo "<center><h2>Image has been compressed</h2></center>";
	}
}

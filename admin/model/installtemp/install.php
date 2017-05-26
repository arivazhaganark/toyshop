<?php
class ModelInstalltempInstall extends Model {

	public function settup() {
		$this->setLayout(); 
		$this->createTableCms();
		$this ->createTableBlog();
		$this->createTableSlideshow(); 
		//$this->settupCmsblock(); 
		$this->createCategoryThumbnail(); 
		$this->createImageRotator(); 
	}
	
	public function setLayout() {
		    $this->db->query("TRUNCATE  TABLE " . DB_PREFIX . "module");
			$this->load->model('extension/extension');
			$this->load->model('setting/setting');	
			$this->load->model('design/layout');
			$this->load->model('user/user_group');
		
			$exts = array(
				0 => 'banner',
				1 => 'bestseller',
				2 => 'carousel',
				3 => 'cmsblock',
				4 => 'easy_blog',
				5 => 'hozmegamenu',
				6 => 'latest',
				7 => 'newslettersubscribe',
				8 => 'ocfeaturedcategory',
				9 => 'ocfeatureslider',
				10 => 'oclayerednavigation',
				11 => 'ocmostproduct',
				12 => 'ocnewproduct',
				13 => 'ocproductrotator',
				14 => 'ocquickview',
				15 => 'ocslideshow',
				16 => 'ocspecialproductslider',
				17 => 'octabcategoryslider',
				18 => 'slideshow',
				19 => 'ttlasttweeter',
			); 
			
			foreach($exts as $ext) {
				$this->model_extension_extension->install('module', $ext);
				$this->model_user_user_group->addPermission($this->user->getId(), 'access', 'module/' . $ext);
				$this->model_user_user_group->addPermission($this->user->getId(), 'modify', 'module/' . $ext);
			}
	}
	
	public function createCategoryThumbnail() {
	  $this->load->model('catalog/occategorythumbnail');
	  $this->model_catalog_occategorythumbnail->installCategoryThumbnail();
	 }
	 public function createImageRotator() {
	  $this->load->model('catalog/ocproductrotator');
	  $this->model_catalog_ocproductrotator->installProductRotator();
	}
	
	public function createTableCms(){
			$sql = " SHOW TABLES LIKE '".DB_PREFIX."cmsblock'";
			$query = $this->db->query( $sql );
			if( count($query->rows) >0 ){
				return true;
			}
			$sql = array();
			$sql[] = "
					CREATE TABLE IF NOT EXISTS `".DB_PREFIX."cmsblock` (
							  `cmsblock_id` int(11) NOT NULL AUTO_INCREMENT,
							  `status` tinyint(1) NOT NULL,
							  `sort_order` tinyint(1) DEFAULT NULL,
							  `identify` varchar(255) DEFAULT NULL,
							  `link` varchar(255) DEFAULT NULL,
							  `type` tinyint(1) DEFAULT NULL,
							  `banner_store` varchar(255) DEFAULT 0,
						  PRIMARY KEY (`cmsblock_id`)
						) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
			";

			$sql[] = "
					CREATE TABLE IF NOT EXISTS `".DB_PREFIX."cmsblock_description` (
					      `cmsblock_des_id` int(11) NOT NULL AUTO_INCREMENT,
						  `language_id` int(11) NOT NULL,
						  `cmsblock_id` int(11) NOT NULL,
						  `title` varchar(64) NOT NULL,
						  `sub_title` varchar(64) DEFAULT NULL,
						  `description` text,
					  PRIMARY KEY (`cmsblock_des_id`,`language_id`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8;
			";
			
			
			$sql[] = " 
				CREATE TABLE IF NOT EXISTS `".DB_PREFIX."cmsblock_to_store` (
				  `cmsblock_id` int(11) DEFAULT NULL,
				  `store_id` tinyint(4) DEFAULT NULL
				) ENGINE=MyISAM DEFAULT CHARSET=latin1;
			";
			
			foreach( $sql as $q ){
				$query = $this->db->query( $q );
			}
			return true;
			
	}
	
	public function createTableBlog(){
		$sql =  array();
        $res = $this->db->query(
			"CREATE TABLE IF NOT EXISTS `".DB_PREFIX."article` (
				`article_id` int(11) NOT NULL AUTO_INCREMENT,
				`sort_order` int(11) NOT NULL DEFAULT '0',
				`status` tinyint(1) NOT NULL DEFAULT '0',
				`date_added` datetime NOT NULL,
				`date_modified` datetime NOT NULL,
				`image` varchar(255) DEFAULT NULL,
				`author` varchar(100) DEFAULT NULL,
				PRIMARY KEY (`article_id`)
			  )
			  DEFAULT CHARSET=utf8 ;");
        $res &= $this->db->query(
            "CREATE TABLE IF NOT EXISTS `".DB_PREFIX."article_description`(
                `article_id` int(11) NOT NULL,
				`language_id` int(11) NOT NULL,
				`name` varchar(255) NOT NULL,
				`description` text NOT NULL,
				`intro_text` text NOT NULL,
				`meta_title` varchar(255) NOT NULL,
				`meta_description` varchar(255) NOT NULL,
				`meta_keyword` varchar(255) NOT NULL,
				PRIMARY KEY (`article_id`,`language_id`),
				KEY `name` (`name`)
			  )
			  DEFAULT CHARSET=utf8;");
		if($res){
            $sql[] = "INSERT INTO oc_article VALUES (1, 1, 1, '2015-07-22 09:06:31', '2015-07-26 08:52:35', 'catalog/blog1.jpg', 'Plazathems');";
            $sql[] = "INSERT INTO oc_article VALUES (5, 1, 1, '2015-07-22 14:11:01', '2015-07-26 08:38:31', 'catalog/blog2.jpg', 'Plazathems');";
            $sql[] = "INSERT INTO oc_article VALUES (6, 1, 1, '2015-07-22 14:11:07', '2015-07-24 16:57:44', 'catalog/blog3.jpg', 'Plazathems');";
            $sql[] = "INSERT INTO oc_article VALUES (7, 1, 1, '2015-07-22 14:11:08', '2015-07-24 16:58:33', 'catalog/blog2.jpg', 'Plazathems');";
            $sql[] = "INSERT INTO oc_article VALUES (8, 1, 1, '2015-07-24 17:18:16', '2015-07-24 17:18:28', 'catalog/blog1.jpg', 'Plazathems');";
            $sql[] = "INSERT INTO oc_article VALUES (9, 1, 1, '2015-07-24 17:18:16', '2015-07-24 17:18:39', 'catalog/blog2.jpg', 'Plazathems');";
            $sql[] = "INSERT INTO oc_article VALUES (10, 1, 1, '2015-07-24 17:18:17', '2015-07-24 17:18:51', 'catalog/blog3.jpg', 'Plazathems');";
            $sql[] = "INSERT INTO oc_article VALUES (11, 1, 1, '2015-07-24 17:18:17', '2015-07-24 17:19:02', 'catalog/blog2.jpg', 'Plazathems');";
            $sql[] = "INSERT INTO oc_article_description VALUES (1, 1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer...', 'Lorem ipsum dolor sit amet', '', '');";
			$sql[] = "INSERT INTO oc_article_description VALUES (5, 1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer...', 'Lorem ipsum dolor sit amet', '', '');";
			$sql[] = "INSERT INTO oc_article_description VALUES (6, 1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer...', 'Lorem ipsum dolor sit amet', '', '');";
			$sql[] = "INSERT INTO oc_article_description VALUES (7, 1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer...', 'Lorem ipsum dolor sit amet', '', '');";
			$sql[] = "INSERT INTO oc_article_description VALUES (8, 1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer...', 'Lorem ipsum dolor sit amet', '', '');";
			$sql[] = "INSERT INTO oc_article_description VALUES (9, 1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer...', 'Lorem ipsum dolor sit amet', '', '');";
			$sql[] = "INSERT INTO oc_article_description VALUES (10, 1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer...', 'Lorem ipsum dolor sit amet', '', '');";
			$sql[] = "INSERT INTO oc_article_description VALUES (11, 1, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt. Lorem ipsum dolor sit amet, consectetuer...', 'Lorem ipsum dolor sit amet', '', '');";
            foreach($sql as $q ){
                $query = $this->db->query( $q );
            }
            return $query;
        }
	}
	
	public function createTableSlideshow(){
			$sql = " SHOW TABLES LIKE '".DB_PREFIX."ocslideshow'";
			$query = $this->db->query( $sql );
			if( count($query->rows) >0 ){
				return true;
			}
			$sql = array();
			$sql[] = "
					CREATE TABLE IF NOT EXISTS `".DB_PREFIX."ocslideshow` (
						  `ocslideshow_id` int(11) NOT NULL AUTO_INCREMENT,
						  `name` varchar(64) NOT NULL,
						  `status` tinyint(1) NOT NULL,
						  `auto` tinyint(1) DEFAULT NULL,
						  `delay` int(11) DEFAULT NULL,
						  `hover` tinyint(1) DEFAULT NULL,
						  `nextback` tinyint(1) DEFAULT NULL,
						  `contrl` tinyint(1) DEFAULT NULL,
						  `effect` varchar(64) NOT NULL,
						  PRIMARY KEY (`ocslideshow_id`)
						) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;
			";
			$sql[] = "
				CREATE TABLE IF NOT EXISTS `".DB_PREFIX."ocslideshow_image` (
				  `ocslideshow_image_id` int(11) NOT NULL AUTO_INCREMENT,
				  `ocslideshow_id` int(11) NOT NULL,
				  `link` varchar(255) NOT NULL,
				  `type` int(11) NOT NULL,
				  `banner_store` varchar(100) DEFAULT 0,
				  `image` varchar(255) NOT NULL,
				  `small_image` varchar(255) NOT NULL,
				  PRIMARY KEY (`ocslideshow_image_id`)
				) ENGINE=MyISAM AUTO_INCREMENT=132 DEFAULT CHARSET=utf8;
				";
			$sql[] = "
					CREATE TABLE IF NOT EXISTS `".DB_PREFIX."ocslideshow_image_description` (
					  `ocslideshow_image_id` int(11) NOT NULL,
					  `language_id` int(11) NOT NULL,
					  `ocslideshow_id` int(11) NOT NULL,
					  `title` varchar(64) NOT NULL,
					  `sub_title` varchar(64) DEFAULT NULL,
					  `description` text,
					  PRIMARY KEY (`ocslideshow_image_id`,`language_id`)
					) ENGINE=MyISAM DEFAULT CHARSET=utf8;
			";
			
			foreach( $sql as $q ){
				$query = $this->db->query( $q );
			}
			return true;
			
	}
	
	public function reset() {
			//reset cms block 
			$this->db->query("TRUNCATE TABLE ". DB_PREFIX ."cmsblock");
			$this->db->query("TRUNCATE TABLE ". DB_PREFIX ."cmsblock_description");
			$this->db->query("TRUNCATE TABLE ". DB_PREFIX ."cmsblock_to_store");
			
			//uninstall module 
			$this->load->model('extension/extension');
			$this->load->model('extension/module');	
			$ex_modules = array(
				0 => 'banner',
				1 => 'bestseller',
				2 => 'carousel',
				3 => 'cmsblock',
				4 => 'easy_blog',
				5 => 'hozmegamenu',
				6 => 'latest',
				7 => 'newslettersubscribe',
				8 => 'ocfeaturedcategory',
				9 => 'ocfeatureslider',
				10 => 'oclayerednavigation',
				11 => 'ocmostproduct',
				12 => 'ocnewproduct',
				13 => 'ocproductrotator',
				14 => 'ocquickview',
				15 => 'ocslideshow',
				16 => 'ocspecialproductslider',
				17 => 'octabcategoryslider',
				18 => 'slideshow',
				19 => 'ttlasttweeter',
			);
			
			foreach($ex_modules as $module) {
				$this->model_extension_extension->uninstall('module', $module);

				$this->model_extension_module->deleteModulesByCode($module);

				$this->load->model('setting/setting');

				$this->model_setting_setting->deleteSetting($module);
				// Call uninstall method if it exsits
				$this->load->controller('module/' . $module . '/uninstall');
			}
			
			$config_template = "config_template";
			$template = 'default'; 
			$this->db->query("UPDATE " . DB_PREFIX . "setting SET `value` = '" . $template . "' WHERE `key` = '" . $config_template . "' ");
			
		
			
	}
	
	
	public function  settupCmsblock() {
		  $doc = new DOMDocument();
			
			$file = DIR_APPLICATION.'model/installtemp/sample/cms.xml';
			$doc->load($file);
			$cmsblocks = $doc->getElementsByTagName("cms");
		
			foreach ($cmsblocks as $block) {
			
				 $ids = $block->getElementsByTagName("cmsblock_id");
				 $cmsblock_id = $ids->item(0)->nodeValue;
				 
				 $statuss = $block->getElementsByTagName("status");
				 $status = $statuss->item(0)->nodeValue;				 
				 
				 $sort_orders = $block->getElementsByTagName("sort_order");
				 $sort_order = $sort_orders->item(0)->nodeValue;
				 
				 $identifys = $block->getElementsByTagName("identify");
				 $identify = $identifys->item(0)->nodeValue;
				
				 $links = $block->getElementsByTagName("link");
				 $link = $links->item(0)->nodeValue;
				 
				 $types = $block->getElementsByTagName("type");
				 $type = $types->item(0)->nodeValue;
				 
				 $this->db->query("INSERT INTO " . DB_PREFIX . "cmsblock SET cmsblock_id = '" . (int)$cmsblock_id . "', sort_order = '" . $sort_order . "', status = '" . $status . "', identify = '" . $identify . "', link = '" . $link . "', type = '" . $type . "'");
				 
		}
		
		
		   $cmsblock_des = $doc->getElementsByTagName("cms_des");
		
			foreach ($cmsblock_des as $block1) {
			
				 $cmsblock_des_ids = $block1->getElementsByTagName("cmsblock_des_id");
				 $cmsblock_des_id = $cmsblock_des_ids->item(0)->nodeValue;
				 
				 $language_ids = $block1->getElementsByTagName("language_id");
				 $language_id = $language_ids->item(0)->nodeValue;				 
				 
				 $cmsblock_ids = $block1->getElementsByTagName("cmsblock_id");
				 $cmsblock_id = $cmsblock_ids->item(0)->nodeValue;
				 
				 $titles = $block1->getElementsByTagName("title");
				 $title = $titles->item(0)->nodeValue;
				
				 $sub_titles = $block1->getElementsByTagName("sub_title");
				 $sub_title = $sub_titles->item(0)->nodeValue;
				 
				 $descriptions = $block1->getElementsByTagName("description");
				 $description = $descriptions->item(0)->nodeValue;
				 
				 $this->db->query("INSERT INTO " . DB_PREFIX . "cmsblock_description SET cmsblock_des_id = '" . (int)$cmsblock_des_id . "', language_id = '" . $language_id . "', cmsblock_id = '" . $cmsblock_id . "', title = '" . $title . "', sub_title = '" . $sub_title . "', description = '" . $description . "'");
		}
	
	
	}

	 
}
?>
<?php
class ControllerModuleOcspecialproductslider extends Controller {
	public function index($setting) {
		$this->load->language('module/ocspecialproductslider');

		$data['button_compare'] = $this->language->get('button_compare');

		$this->load->model('catalog/product');

		$this->load->model('tool/image');

		$data['products'] = array();

		$filter_data = array(
			'sort'  => 'pd.name',
			'order' => 'ASC',
			'start' => 0,
			'limit' => $setting['limit']
		);

		$results = $this->model_catalog_product->getProductSpecials($filter_data);

		if ($results) {
			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']);
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $setting['width'], $setting['height']);
				}

				if (($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$price = false;
				}

				if ((float)$result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')));
				} else {
					$special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = $result['rating'];
				} else {
					$rating = false;
				}
				if ((float)$result['special']) {
				 $price2 = $this->tax->calculate($result['price'],$result['tax_class_id'], $this->config->get('config_tax'));
								$special2 = $this->tax->calculate($result['special'],$result['tax_class_id'], $this->config->get('config_tax'));
				} else {
				 $price2 = false;
								$special2 = false;
				}
				
				/* Product Rotator */
				$product_rotator_status = (int) $this->config->get('ocproductrotator_status');
				if($product_rotator_status == 1) {
					$this->load->model('catalog/ocproductrotator');
					$this->load->model('tool/image');

					$product_id = $result['product_id'];
					$product_rotator_image = $this->model_catalog_ocproductrotator->getProductRotatorImage($product_id);

					if($product_rotator_image) {
						$rotator_image_width = 300;
						$rotator_image_height = 300;
						$rotator_image = $this->model_tool_image->resize($product_rotator_image, $rotator_image_width, $rotator_image_height);	
					} else {
						$rotator_image = false;
					}	
				} else {
					$rotator_image = false;				
				}
				/* End Product Rotator */

				$data['products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'rotator_image' => $rotator_image,
					'name'        => $result['name'],
					'description' => utf8_substr(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8')), 0, $this->config->get('config_product_description_length')) . '..',
					'price'       => $price,
					'special'     => $special,
					'price2'     => $price2,
					'special2'     => $special2,
					'tax'         => $tax,
					'rating'      => $rating,
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
				);
			}

			$data['heading_title'] = $this->language->get('heading_title');
			$data['heading_title_tools'] = $this->language->get('heading_title_tools');

			$data['text_tax'] = $this->language->get('text_tax');

			$data['button_cart'] = $this->language->get('button_cart');
			$data['button_wishlist'] = $this->language->get('button_wishlist');
		
			$data['config_slide'] = array(
					'items' => $setting['item'],
					'f_speed_slide' => $setting['autoplay'],
					'f_show_nextback' => $setting['shownextback'], 
					'f_show_ctr' => $setting['shownav'], 
					'f_ani_speed' => $setting['speed'],
					'f_show_price' => $setting['showprice'],
					'f_show_des' => $setting['showdes'],
					'f_show_addtocart' => $setting['showaddtocart'],
					'f_rows' => $setting['rows']
				);

		if ($data['products']) {
			if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/module/ocspecialproductslider.tpl')) {
				return $this->load->view($this->config->get('config_template') . '/template/module/ocspecialproductslider.tpl', $data);
			} else {
				return $this->load->view('default/template/module/ocspecialproductslider.tpl', $data);
			}
		}
		}
	}
}
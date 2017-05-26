<?php
class ControllerCommonFooter extends Controller {
	public function index() {
		$this->load->language('common/footer');

		$data['text_information'] = $this->language->get('text_information');
		$data['text_service'] = $this->language->get('text_service');
		$data['text_extra'] = $this->language->get('text_extra');
		$data['text_contact'] = $this->language->get('text_contact');
		$data['text_return'] = $this->language->get('text_return');
		$data['text_sitemap'] = $this->language->get('text_sitemap');
		$data['text_manufacturer'] = $this->language->get('text_manufacturer');
		$data['text_voucher'] = $this->language->get('text_voucher');
		$data['text_affiliate'] = $this->language->get('text_affiliate');
		$data['text_special'] = $this->language->get('text_special');
		$data['text_account'] = $this->language->get('text_account');
		$data['text_order'] = $this->language->get('text_order');
		$data['text_wishlist'] = $this->language->get('text_wishlist');
		$data['text_newsletter'] = $this->language->get('text_newsletter');

			$data['text_phone'] = $this->language->get('text_phone');
			$data['text1_phone'] = $this->language->get('text1_phone');
			$data['text_time'] = $this->language->get('text_time');
			$data['text1_time'] = $this->language->get('text1_time');
			$data['text_shipping'] = $this->language->get('text_shipping');
			$data['text1_shipping'] = $this->language->get('text1_shipping');
			$data['text_money'] = $this->language->get('text_money');
			$data['text1_money'] = $this->language->get('text1_money');
			$data['content_block2'] = $this->load->controller('common/content_block2');
			$data['content_block3'] = $this->load->controller('common/content_block3');
			$data['content_block5'] = $this->load->controller('common/content_block5');
			$data['content_block6'] = $this->load->controller('common/content_block6');
			$data['content_block7'] = $this->load->controller('common/content_block7');
			$data['footer_title'] = $this->language->get('footer_title');
			$data['text_about'] = $this->language->get('text_about');
			$data['contact_info'] = $this->language->get('contact_info');
			$data['text_newletter'] = $this->language->get('text_newletter');
			$data['popular_categories'] = $this->language->get('popular_categories');
			$data['category1'] = $this->language->get('category1');
			$data['category2'] = $this->language->get('category2');
			$data['category3'] = $this->language->get('category3');
			$data['category4'] = $this->language->get('category4');
			$data['category5'] = $this->language->get('category5');
			$data['category6'] = $this->language->get('category6');
			$data['category7'] = $this->language->get('category7');
			$data['category8'] = $this->language->get('category8');
			$data['category9'] = $this->language->get('category9');
			$data['category10'] = $this->language->get('category10');
			$data['category11'] = $this->language->get('category11');
			$data['category12'] = $this->language->get('category12');
			$data['text_info'] = $this->language->get('text_info');
			$data['text_dynamicus'] = $this->language->get('text_dynamicus');
			$data['text_terms'] = $this->language->get('text_terms');
			$data['text_gift'] = $this->language->get('text_gift');
			

		$this->load->model('catalog/information');


				$data['blog'] = array(
					'title' => $this->config->get('easy_blog_meta_title'),
					'href'  => $this->url->link('blog/blog')
				);
            
		$data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
		}

		$data['contact'] = $this->url->link('information/contact');
		$data['return'] = $this->url->link('account/return/add', '', 'SSL');
		$data['sitemap'] = $this->url->link('information/sitemap');
		$data['manufacturer'] = $this->url->link('product/manufacturer');
		$data['voucher'] = $this->url->link('account/voucher', '', 'SSL');
		$data['affiliate'] = $this->url->link('affiliate/account', '', 'SSL');
		$data['special'] = $this->url->link('product/special');
		$data['account'] = $this->url->link('account/account', '', 'SSL');
		$data['order'] = $this->url->link('account/order', '', 'SSL');
		$data['wishlist'] = $this->url->link('account/wishlist', '', 'SSL');
		$data['newsletter'] = $this->url->link('account/newsletter', '', 'SSL');

			$data['address'] = $this->config->get('config_address');
			$data['telephone'] = $this->config->get('config_telephone');
			$data['email'] = $this->config->get('config_email');
			$data['geocode'] = $this->config->get('config_geocode');
			

		$data['powered'] = sprintf($this->language->get('text_powered'), date('Y', time()), $this->config->get('config_name'));

		// Whos Online
		if ($this->config->get('config_customer_online')) {
			$this->load->model('tool/online');

			if (isset($this->request->server['REMOTE_ADDR'])) {
				$ip = $this->request->server['REMOTE_ADDR'];
			} else {
				$ip = '';
			}

			if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
				$url = 'http://' . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];
			} else {
				$url = '';
			}

			if (isset($this->request->server['HTTP_REFERER'])) {
				$referer = $this->request->server['HTTP_REFERER'];
			} else {
				$referer = '';
			}

			$this->model_tool_online->whosonline($ip, $this->customer->getId(), $url, $referer);
		}

		if (file_exists(DIR_TEMPLATE . $this->config->get('config_template') . '/template/common/footer.tpl')) {
			return $this->load->view($this->config->get('config_template') . '/template/common/footer.tpl', $data);
		} else {
			return $this->load->view('default/template/common/footer.tpl', $data);
		}
	}
}
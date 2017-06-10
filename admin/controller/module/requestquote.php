<?php

/**
 * Opencart module: Request Quote
 * For Opencart 1.5.x version
 *
 * @author Ajay
 * @vesrion 1.0
 *
 */
class ControllerModuleRequestquote extends Controller
{
    private $error = array();

    public function index() {

        $this->load->language('module/requestquote');
        $this->load->model('setting/setting');

        $this->document->setTitle($this->language->get('heading_title_nolink'));

        if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
            $this->model_setting_setting->editSetting('requestquote', $this->request->post);
            $this->session->data['success'] = $this->language->get('text_success');
            $this->response->redirect($this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'));
        }

        $data['heading_title'] = $this->language->get('heading_title_nolink');

        $data['text_enabled'] = $this->language->get('text_enabled');
        $data['text_disabled'] = $this->language->get('text_disabled');
        $data['text_yes'] = $this->language->get('text_yes');
        $data['text_no'] = $this->language->get('text_no');

        $data['button_save'] = $this->language->get('button_save');
        $data['button_cancel'] = $this->language->get('button_cancel');

        if (isset($this->error['warning'])) {
            $data['error_warning'] = $this->error['warning'];
        } else {
            $data['error_warning'] = '';
        }

        $data['breadcrumbs'] = array();

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_home'),
            'href'      => $this->url->link('common/home', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => false
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('text_module'),
            'href'      => $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $data['breadcrumbs'][] = array(
            'text'      => $this->language->get('heading_title_nolink'),
            'href'      => $this->url->link('module/requestquote', 'token=' . $this->session->data['token'], 'SSL'),
            'separator' => ' :: '
        );

        $data['action'] = $this->url->link('module/requestquote', 'token=' . $this->session->data['token'], 'SSL');
        $data['cancel'] = $this->url->link('extension/module', 'token=' . $this->session->data['token'], 'SSL');
        $data['token'] = $this->session->data['token'];

        if (isset($this->request->post['requestquote_use_module'])) {
            $data['requestquote_use_module'] = $this->request->post['requestquote_use_module'];
        } else {
            $data['requestquote_use_module'] = $this->config->get('requestquote_use_module');
        }

        $data['entry_use_module'] = $this->language->get('entry_use_module');

        $data['header'] = $this->load->controller('common/header');
        $data['column_left'] = $this->load->controller('common/column_left');
        $data['footer'] = $this->load->controller('common/footer');

        $this->response->setOutput($this->load->view('module/requestquote.tpl', $data));
    }

    public function install() {
        $this->load->model('setting/setting');
        $this->load->language('module/requestquote');

        $settings = array(
            'requestquote_use_module'   => 1, //(0/1)
        );

        $this->model_setting_setting->editSetting('requestquote', $settings);
    }

    public function uninstall() {
        $this->load->model('setting/setting');
        $this->model_setting_setting->deleteSetting('requestquote');
    }

    private function validate() {
        if (!$this->user->hasPermission('modify', 'module/requestquote')) {
            $this->error['warning'] = $this->language->get('error_permission');
        }

        if (!$this->error) {
            return true;
        } else {
            return false;
        }
    }
}

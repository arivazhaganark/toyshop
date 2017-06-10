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
    public function index()
    {
        // Validate cart has products and has stock.
        if (!$this->cart->hasProducts()) {
            $this->response->redirect($this->url->link('checkout/cart'));
        }

        $products = $this->cart->getProducts();
        $IP = $this->request->post;

        $message = "<b><u>Request Quote:</u></b> \n\n";
        $message .= "<b>Name : </b>" . $IP['name'] . "\n";
        if ($IP['email'])
            $message .= "<b>Email : </b>" . $IP['email'] . "\n";
        if ($IP['phone'])
            $message .= "<b>Phone : </b>" . $IP['phone'] . "\n";
        if ($IP['message'])
            $message .= "<b>Message : </b>" . $IP['name'] . "\n";

        $message .= "<b>Products : </b>" . $IP['name'] . "\n";
        foreach ($products as $product) {
            $message .= "<b>Name : </b>" . $product['name'] . "<b>Quantity : </b>" . $product['quantity'] . "\n";
        }

        $mail = new Mail();
        $mail->protocol = $this->config->get('config_mail_protocol');
        $mail->parameter = $this->config->get('config_mail_parameter');
        $mail->smtp_hostname = $this->config->get('config_mail_smtp_hostname');
        $mail->smtp_username = $this->config->get('config_mail_smtp_username');
        $mail->smtp_password = html_entity_decode($this->config->get('config_mail_smtp_password'), ENT_QUOTES, 'UTF-8');
        $mail->smtp_port = $this->config->get('config_mail_smtp_port');
        $mail->smtp_timeout = $this->config->get('config_mail_smtp_timeout');

        $mail->setTo($this->config->get('config_email'));
        $mail->setSubject("New Request Quote Notification");
        $mail->setText($message);
        $mail->send();
    }
}

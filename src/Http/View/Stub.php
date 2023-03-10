<?php

namespace Stub\Framework\Http\View;

use Stub\Framework\Contracts\Http\View;
use Stub\Framework\Contracts\Main\Application;

/**
 *Базовый класс вьюшки заглушки
 */
class Stub implements View
{

    private $docType;
    private $head;
    private $body;
    private $endHtmlScripts;
    private $app;

    /**
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
        $this->generate($app);
    }

    /**
     *
     */
    public function generate(Application $app)
    {
        $this->docType = "<!DOCTYPE html>";
        $this->head = /** @lang text */
            "
                    <title>{$app->get('base_title', 'Website in development')}</title>
                    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">
                    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
                    <meta charset=\"{$app->get('base_charset', 'utf-8')}\">
                    <meta content=\"{$app->get('base_description', 'SimpleStub')}\" name=\"description\">
                    <meta content=\"{$app->get('base_keywords', 'SimpleStub')}\" name=\"keywords\">
                
                    <!-- Google Fonts -->
                    <link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i\">
                
                    <!-- Favicons -->
                    <link href=\"img/favicon.png\" rel=\"icon\">
                    <link href=\"img/apple-touch-icon.png\" rel=\"apple-touch-icon\">
                
                    <!-- Vendor CSS Files -->
                    <link href=\"vendor/twbs/bootstrap/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
                    <link href=\"vendor/simplerest/icofont/icofont.min.css\" rel=\"stylesheet\">
                
                    <!-- Template Main CSS File -->
                    <link href=\"css/main.css\" rel=\"stylesheet\">
                ";

        $this->body = /** @lang text */
            "
                    <!-- ======= Header ======= -->
                    <header id=\"header\">
                        <div class=\"container-fluid\">
                            <div class=\"logo float-left\">
                                <h1 class=\"text-light\">
                                    <a href=\"index.php\">
                                        <span>
                                            {$app->get('domain', 'SimpleStub')}
                                        </span>
                                    </a>
                                </h1>
                            </div>
                            <div class=\"contact-link float-right\">
                                <a href=\"#contacts\" class=\"scrollto\">{$app->get('contacts_link_text', 'administrator contacts')}</a>
                            </div>
                        </div>
                    </header>
                    <!-- ======= End Header ======= -->
                    <!--<nav></nav>-->
                    <div class=\"container-fluid\" style=\"padding-right: 0; padding-left: 0;\">
                    <!-- ======= Base Stub Section ======= -->
                    <section id=\"stub\"
                             style=\"background-image: url('img/{$app->get('base_background', 'simpleplug-base-bg.jpg')}')\">
                        <div class=\"stub-container\">
                            <BR><BR>
                            <h1>{$app->get('base_title', 'We Build Simple REST')}</h1>
                            <h2>{$app->get('base_note', 'SimpleStub / We Build')}</h2>
                            <div id=\"countdown\" class=\"countdown-timer\"
                                 data-deadline=\"{$app->get('countdown_deadline', '2025/12/30')}\"
                                 data-pattern=\"{$app->get('countdown_pattern', '%w w %d d %H:%M:%S')}\"></div>
                        </div>
                    </section><!-- End Base Stub section -->
                    </div>
                    <main id=\"main\">
                    
                        <!-- ======= Contact Us Section ======= -->
                        <section id=\"contacts\" class=\"contact\">
                            <div class=\"container\">
                    
                                <div class=\"section-title\">
                                    <h2>{$app->get('contacts_section_title_text', 'Contacts')}</h2>
                                </div>
                    
                                <div class=\"row contact-info\">
                    
                                    <div class=\"col-md-4\">
                                        <div class=\"contact-address\">
                                            <i class=\"icofont-google-map\"></i>
                                            <h3>{$app->get('contacts_section_address_title_text', 'address')}</h3>
                                            <address>{$app->get('contacts_section_address_content_text', '___')}</address>
                                        </div>
                                    </div>
                    
                                    <div class=\"col-md-4\">
                                        <div class=\"contact-phone\">
                                            <i class=\"icofont-phone\"></i>
                                            <h3>{$app->get('contact_section_phone_title_text', 'Phone')}</h3>
                                            <p>
                                                <a href=\"tel:{$app->get('contact_phone_to_script', '')}\">
                                                    {$app->get('contact-phone_to_display', '+_ (___) ___-__-__')}</a>
                                            </p>
                                        </div>
                                    </div>
                    
                                    <div class=\" col-md-4\">
                                        <div class=\"contact-email\">
                                            <i class=\"icofont-envelope\"></i>
                                            <h3>{$app->get('contacts_section_email_title_text', 'Email')}</h3>
                                            <p>
                                                <a href=\"mailto: {$app->get('contact-email_to_script', '')}\">
                                                    {$app->get('contact-email_to_display', '')}
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                    
                                </div>
                    
                            </div>
                        </section><!-- End Contact Us Section -->
                    </main><!-- End #main -->
                
                    < <!-- ======= Footer ======= -->
                    <footer id=\"footer\">
                        <div class=\"container\">
                            <div class=\"copyright\">
                                &copy; Copyright <strong><span>{$app->get('http', 'simplerest.ru')}</span></strong>
                                All Rights Reserved
                            </div>
                            <div class=\"credits\">
                                Powered by <a href=\"https://simplerest.ru/\">SIMPLEREST.RU</a> v.{$app->version()}
                            </div>
                        </div>
                    </footer><!-- End #footer -->
                ";
        $this->endHtmlScripts = /** @lang text */
            "<script src=\"js/main.js\"></script>";
    }

    /**
     * @return string
     */
    public function getDocumentResult(): string
    {
        return sprintf(/** @lang text */ "%s<html lang=\"%s\">%s<body>%s%s</body></html>",
            $this->docType,
            $this->app->get('base_lang', 'en'),
            $this->head,
            $this->body,
            $this->endHtmlScripts);
    }
}
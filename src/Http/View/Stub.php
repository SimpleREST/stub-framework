<?php

namespace Stub\Framework\Http\View;

use Stub\Framework\Contracts\Http\View;
use Stub\Framework\Contracts\Main\Application;
use Stub\Framework\Main\Assets\BaseDefaultStubResource;

/**
 *Базовый класс вьюшки заглушки
 */
class Stub implements View
{

    private $docType;
    private $head;
    private $body;
    private $endHtmlScripts;

    private $stringResources;

    /**
     * Создание экземпляра класса заглушки
     * ----
     * Помимо прочего выполняется назначение класса ресурсов в зависимости от локали пользователя
     * @param Application $app
     * @param BaseDefaultStubResource $r
     */
    public function __construct(Application $app, BaseDefaultStubResource $r)
    {
        $this->stringResources = $r;
        $this->generate($app);
    }

    /**
     * Выполняется генерация наполнения основных блоков HTML документа заглушки
     * @param Application $app
     * @return void
     */
    private function generate(Application $app)
    {
        /**
         * Технический комментарий
         * @var \Stub\Framework\Main\Assets\BaseDefaultStubResource $r
         */
        $r = $this->stringResources;
        $this->docType = "<!DOCTYPE html>";
        $this->head = /** @lang text */
            "
                    <title>" . $r::$title_text . '</title>
                    <meta name="viewport" content="width=device-width, initial-scale=1">
                    <meta charset="' . $r::$charset . '">
                    <meta content="' . $r::$description . '" name="description">
                    <meta content="' . $r::$keywords . '" name="keywords">
                
                    <!-- Google Fonts -->
                    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i">
                
                    <!-- Favicons -->
                    <link href="/img/favicon.png" rel="icon">
                    <link href="/img/apple-touch-icon.png" rel="apple-touch-icon">
                
                    <!-- Vendor CSS Files -->
                    <link href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
                    <link href="/vendor/simplerest/icofont/icofont.min.css" rel="stylesheet">
                
                    <!-- Template Main CSS File -->
                    <link href="/css/main.css" rel="stylesheet">
                ';

        $this->body = /** @lang text */
            '
                    <!-- ======= Header ======= -->
                    <header id="header">
                        <div class="container-fluid">
                            <div class="logo float-left">
                                <h1 class="text-light">
                                    <a href="index.php">
                                        <span>' . $r::$domain . ' </span>
                                    </a>
                                </h1>
                            </div>
                            <div class="contact-link float-right">
                                <a href="#contacts" class="scrollto">' . $r::$contacts_link_text . '</a>
                            </div>
                        </div>
                    </header>
                    <!-- ======= End Header ======= -->
                    <!--<nav></nav>-->
                    <div class="container-fluid" style="padding-right: 0; padding-left: 0;">
                    <!-- ======= Base Stub Section ======= -->
                    <section id="stub"
                             style="background-image: url(\'/img/' . $r::$base_background . '\')">
                        <div class="stub-container">
                            <BR><BR>
                            <h1>' . $r::$base_title . "</h1>
                            <h2>" . $r::$base_note . '</h2>
                            <div id="countdown" class="countdown-timer"
                                 data-deadline="' . $r::$countdown_deadline . '"
                                 data-pattern="' . $r::$countdown_pattern . '"></div>
                        </div>
                    </section><!-- End Base Stub section -->
                    </div>
                    <main id="main">
                    
                        <!-- ======= Contact Us Section ======= -->
                        <section id="contacts" class="contact">
                            <div class="container">
                    
                                <div class="section-title">
                                    <h2>' . $r::$contacts_section_title . '</h2>
                                </div>
                    
                                <div class="row contact-info">
                    
                                    <div class="col-md-4">
                                        <div class="contact-address">
                                            <i class="icofont-google-map"></i>
                                            <h3>' . $r::$contacts_section_address_title . "</h3>
                                            <address>" . $r::$contacts_section_address_content . '</address>
                                        </div>
                                    </div>
                    
                                    <div class="col-md-4">
                                        <div class="contact-phone">
                                            <i class="icofont-phone"></i>
                                            <h3>' . $r::$contacts_section_phone_title . '</h3>
                                            <p>
                                                <a href="tel:' . $r::$contact_phone_to_script . "\">
                                                    " . $r::$contact_phone_to_display . '</a>
                                            </p>
                                        </div>
                                    </div>
                    
                                    <div class="col-md-4">
                                        <div class="contact-email">
                                            <i class="icofont-envelope"></i>
                                            <h3>' . $r::$contacts_section_email_title . '</h3>
                                            <p>
                                                <a href="mailto: ' . $r::$contact_email_to_script . "\">
                                                    " . $r::$contact_email_to_display . '
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                    
                                </div>
                    
                            </div>
                        </section><!-- End Contact Us Section -->
                    </main><!-- End #main -->
                
                    < <!-- ======= Footer ======= -->
                    <footer id="footer">
                        <div class="container">
                            <div class="copyright">
                                &copy; Copyright <strong><span>' . $r::$copyright . '</span></strong>
                                All Rights Reserved
                            </div>
                            <div class="credits">
                                Powered by <a href="https://simplerest.ru/">SIMPLEREST.RU</a> v.' . $app->version() . '
                            </div>
                        </div>
                    </footer><!-- End #footer -->
                ';
        $this->endHtmlScripts = /** @lang text */
            '<script src="/js/main.js"></script>';
    }

    /**
     * Выполняется сборка в единый ответ HTML документа и назначение HTML Lang и передача результата в поток вывода
     * @return string
     */
    public function getDocumentResult(): string
    {
        $r = $this->stringResources;
        return sprintf(/** @lang text */ '%s<html lang="%s">%s<body>%s%s</body></html>',
            $this->docType,
            $r::$lang,
            $this->head,
            $this->body,
            $this->endHtmlScripts);
    }
}
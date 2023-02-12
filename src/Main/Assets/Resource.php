<?php

namespace Stub\Framework\Main\Assets;

use Stub\Framework\Contracts\Main\ContainingResources;

/**
 * Основной набор строковых ресурсов (главный)  - на уровне фреймворка
 * ---
 * Класс содержит строковые ресурсы для представления без определения языкового параметра
 * Данные из этого набора подставляются всегда, когда не определен предпочтительный
 * язык на стороне клиента, или определенный язык не поддерживается.
 *
 */
class Resource implements ContainingResources
{
    /**
     *  Строки / основной набор / фреймворк
     * ----
     * Значение строки внутри HTML тега {TITLE}
     * @var string
     */
    public static $title_text = "Website in development";

    /**
     * *  Строки / основной набор / фреймворк
     * ----
     * Значение строки внутри HTML тега {TITLE}
     * @var string
     */
    public static $charset = "utf-8";
    public static $description = "SimpleStub";
    public static $keywords = "SimpleStub";
    public static $domain = "SimpleStub";
    public static $contacts_link_text = "administrator contacts";
    public static $base_background = "simpleplug-base-bg.jpg";
    public static $base_title = "We Build Simple REST";
    public static $base_note = "SimpleStub / We Build";
    public static $countdown_deadline = "2025/12/30";
    public static $countdown_pattern = "%w w %d d %H:%M:%S";
    public static $contacts_section_title_text = "Contacts";
    public static $contacts_section_address_title_text = "address";
    public static $contacts_section_address_content_text = "___";
    public static $contacts_section_phone_title_text = "Phone";
    public static $contact_phone_to_script = "";
    public static $contact_phone_to_display = "+_ (___) ___-__-__";
    public static $contacts_section_email_title_text = "Email";
    public static $contact_email_to_script = "";
    public static $contact_email_to_display = "";
    public static $http = "simplerest.ru";
    /**
     * Строки / основной набор / фреймворк
     * ----
     * Значение строки (языковой код) внутри тега {HTML}
     * ----
     * @var string
     */
    public static $html_lang = "en";

    public function __construct()
    {
    }
}
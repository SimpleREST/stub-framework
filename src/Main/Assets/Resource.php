<?php

namespace Stub\Framework\Main\Assets;
use Stub\Framework\Contracts\Main\ContainingResources;
use Stub\Framework\Main\Assets\StringResources as str;

class Resource implements ContainingResources
{
    /**
     * Предопределенное значение строкового параметра
     * ---
     * внутри HTML тега (<TITLE>...</TITLE>)
     * (На уровне фреймворка)
     * @final @var string::
     */
    public static $title = "Website in development";
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
    public static $base_lang = "en";

    public function __construct()
    {
    }
}
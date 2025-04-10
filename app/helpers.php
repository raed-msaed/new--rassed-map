<?php
if (!function_exists('format_arabic_date')) {
    function format_arabic_date($date)
    {
        $moisArabe = [
            1 => 'جانفي',
            2 => 'فيفري',
            3 => 'مارس',
            4 => 'أفريل',
            5 => 'ماي',
            6 => 'جوان',
            7 => 'جويلية',
            8 => 'أوت',
            9 => 'سبتمبر',
            10 => 'أكتوبر',
            11 => 'نوفمبر',
            12 => 'ديسمبر',
        ];

        $date = \Carbon\Carbon::parse($date);
        $jour = $date->format('d');
        $mois = $moisArabe[(int) $date->format('m')];
        $annee = $date->format('Y');

        return "$jour $mois $annee";
    }
}

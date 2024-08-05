<?php
// formatdateTime
if (! function_exists('formatDateTimeIndo')) {
    /**
     * Format date time
     *
     * @param  string  $dateTime
     * @param  string  $format
     * @return string
     */
    
    function formatDateTimeIndo($dateTime, $format = 'd-m-Y H:i:s')
    {
        $bulans =  [
            1 => 'Januari',
            2 => 'Februari',
            3 => 'Maret',
            4 => 'April',
            5 => 'Mei',
            6 => 'Juni',
            7 => 'Juli',
            8 => 'Agustus',
            9 => 'September',
            10 => 'Oktober',
            11 => 'November',
            12 => 'Desember',
        ];
        $date = date_create($dateTime);
        $bulan = $bulans[date_format($date, 'n')];
        $tanggal = date_format($date, 'j');
        $tahun = date_format($date, 'Y');
        $jam = date_format($date, 'H:i:s');
        return $tanggal . ' ' . $bulan . ' ' . $tahun . ' ' . $jam;
    }
}
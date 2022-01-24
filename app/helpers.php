<?php

    function tanggal_indo($tanggal, $cetak_hari = false){
        $hari = array ( 1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
            );

        $bulan = array (1 =>
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
            );
        $split    = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];

        if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));
        return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
    }

    function array_sort_by_column(&$arr, $col, $dir = SORT_ASC) {
        $sort_col = array();
        foreach ($arr as $key=> $row) {
            $sort_col[$key] = $row[$col];
        }

        array_multisort($sort_col, $dir, $arr);
    }

    function formatSizeUnits($bytes)
    {
        if ($bytes >= 1073741824)
        {
            $bytes = number_format($bytes / 1073741824, 2) . ' GB';
        }
        elseif ($bytes >= 1048576)
        {
            $bytes = number_format($bytes / 1048576, 2) . ' MB';
        }
        elseif ($bytes >= 1024)
        {
            $bytes = number_format($bytes / 1024, 2) . ' KB';
        }
        elseif ($bytes > 1)
        {
            $bytes = $bytes . ' bytes';
        }
        elseif ($bytes == 1)
        {
            $bytes = $bytes . ' byte';
        }
        else
        {
            $bytes = '0 bytes';
        }

        return $bytes;
    }

    function createThumbnail($source, $destination, $width, $height){
        $img = Image::make($source)->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        $img->save($destination);
        // $img->resize(400, 400, function ($constraint) {
        //     $constraint->aspectRatio();
        //     $constraint->upsize();
        // });
    }

    function hari_indo($tanggal){
        $hari = array ( 1 =>
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
            );
        $num = date('N', strtotime($tanggal));
        return $hari[$num];
    }

    function bulan_indo($tanggal){
        $bulan = array ( 1 =>
            'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
            );
        $num = date('n', strtotime($tanggal));
        return $bulan[$num];
    }

    function rupiah($angka, $prefix = null){

        $hasil_rupiah = $prefix . number_format($angka,0,',','.');
        return $hasil_rupiah;

    }

    function tanggal_indo_multiple($tanggal_mulai, $tanggal_selesai){
        $tanggal_pergi = $tanggal_mulai;
        $tanggal_pulang = $tanggal_selesai;

        if ($tanggal_pergi == $tanggal_pulang) {
            $tanggal_sp = tanggal_indo($tanggal_pergi);
            setlocale(LC_ALL,"id_ID");
            $date = DateTime::createFromFormat("Y-m-d", $tanggal_mulai);
            $hari_sp = strftime("%A",$date->getTimestamp());
            switch ($hari_sp) {
                case 'Sunday' : $hari_sp = "Minggu"; break;
                case 'Monday' : $hari_sp = "Senin"; break;
                case 'Tuesday' : $hari_sp = "Selasa"; break;
                case 'Wednesday' : $hari_sp = "Rabu"; break;
                case 'Thursday' : $hari_sp = "Kamis"; break;
                case 'Friday' : $hari_sp = "Jum'at"; break;
                case 'Saturday' : $hari_sp = "Sabtu"; break;

                }
        }
        else{
            if (date('m',strtotime($tanggal_mulai)) != date('m',strtotime($tanggal_pulang))) {
                $tanggal_sp = tanggal_indo($tanggal_mulai).' - '.tanggal_indo($tanggal_pulang);
            }else{
                $tanggal_sp = date('d', strtotime($tanggal_mulai)).' - '.tanggal_indo($tanggal_pulang);
            }
            setlocale(LC_ALL,"id_ID");
            $hari_pergi = DateTime::createFromFormat("Y-m-d", $tanggal_mulai);
            $hari_pulang = DateTime::createFromFormat("Y-m-d", $tanggal_selesai);
            $hari_sp_1 = strftime("%A",$hari_pergi->getTimestamp());
            $hari_sp_2 = strftime("%A",$hari_pulang->getTimestamp());
            switch ($hari_sp_1) {
                case 'Sunday' : $hari_sp_1 = "Minggu"; break;
                case 'Monday' : $hari_sp_1 = "Senin"; break;
                case 'Tuesday' : $hari_sp_1 = "Selasa"; break;
                case 'Wednesday' : $hari_sp_1 = "Rabu"; break;
                case 'Thursday' : $hari_sp_1 = "Kamis"; break;
                case 'Friday' : $hari_sp_1 = "Jum'at"; break;
                case 'Saturday' : $hari_sp_1 = "Sabtu"; break;

            }

            switch ($hari_sp_2) {
                case 'Sunday' : $hari_sp_2 = "Minggu"; break;
                case 'Monday' : $hari_sp_2 = "Senin"; break;
                case 'Tuesday' : $hari_sp_2 = "Selasa"; break;
                case 'Wednesday' : $hari_sp_2 = "Rabu"; break;
                case 'Thursday' : $hari_sp_2 = "Kamis"; break;
                case 'Friday' : $hari_sp_2 = "Jum'at"; break;
                case 'Saturday' : $hari_sp_2 = "Sabtu"; break;

            }

            $hari_sp = $hari_sp_1.' - '.$hari_sp_2;
        }

        return $hari_sp.',<br/> '.$tanggal_sp;
    }

?>

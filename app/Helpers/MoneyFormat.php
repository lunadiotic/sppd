<?php

namespace App\Helpers;

class MoneyFormat
{
    public static function rupiah ($angka)
    {
        $rupiah = number_format($angka ,0, ',' , '.' );
        return $rupiah;
    }

    public static function terbilang ($angka)
    {
        $angka = (float)$angka;
        $bilangan = array('','Satu','Dua','Tiga','Empat','Lima','Enam','Tujuh','Delapan','Sembilan','Sepuluh','Sebelas');
        if ($angka < 12) {
            return $bilangan[$angka];
        } else if ($angka < 20) {
            return $bilangan[$angka - 10] . ' Belas';
        } else if ($angka < 100) {
            $hasil_bagi = (int)($angka / 10);
            $hasil_mod = $angka % 10;
            return trim(sprintf('%s Puluh %s', $bilangan[$hasil_bagi], $bilangan[$hasil_mod]));
        } else if ($angka < 200) { return sprintf('Seratus %s', self::terbilang($angka - 100));
        } else if ($angka < 1000) { $hasil_bagi = (int)($angka / 100); $hasil_mod = $angka % 100; return trim(sprintf('%s Ratus %s', $bilangan[$hasil_bagi], self::terbilang($hasil_mod)));
        } else if ($angka < 2000) { return trim(sprintf('Seribu %s', self::terbilang($angka - 1000)));
        } else if ($angka < 1000000) { $hasil_bagi = (int)($angka / 1000); $hasil_mod = $angka % 1000; return sprintf('%s Ribu %s', self::terbilang($hasil_bagi), self::terbilang($hasil_mod));
        } else if ($angka < 1000000000) { $hasil_bagi = (int)($angka / 1000000); $hasil_mod = $angka % 1000000; return trim(sprintf('%s Juta %s', self::terbilang($hasil_bagi), self::terbilang($hasil_mod)));
        } else if ($angka < 1000000000000) { $hasil_bagi = (int)($angka / 1000000000); $hasil_mod = fmod($angka, 1000000000); return trim(sprintf('%s Milyar %s', self::terbilang($hasil_bagi), self::terbilang($hasil_mod)));
        } else if ($angka < 1000000000000000) { $hasil_bagi = $angka / 1000000000000; $hasil_mod = fmod($angka, 1000000000000); return trim(sprintf('%s Triliun %s', self::terbilang($hasil_bagi), self::terbilang($hasil_mod)));
        } else {
            return 'Data Salah';
        }
    }
}

<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('tgl_indo'))
{
	function tgl_indo($tgl)
	{
		$ubah = gmdate($tgl, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tanggal = $pecah[2];
		$bulan = bulan($pecah[1]);
		$tahun = $pecah[0];
		return $tanggal.' '.$bulan.' '.$tahun;
	}
}
if ( ! function_exists('bulan'))
{
	function bulan($bln)
	{
		switch ($bln)
		{
			case 1:
				return "Januari";
				break;
			case 2:
				return "Februari";
				break;
			case 3:
				return "Maret";
				break;
			case 4:
				return "April";
				break;
			case 5:
				return "Mei";
				break;
			case 6:
				return "Juni";
				break;
			case 7:
				return "Juli";
				break;
			case 8:
				return "Agustus";
				break;
			case 9:
				return "September";
				break;
			case 10:
				return "Oktober";
				break;
			case 11:
				return "November";
				break;
			case 12:
				return "Desember";
				break;
		}
	}
}

if ( ! function_exists('nama_hari'))
{
	function nama_hari($tanggal)
	{
		$ubah = gmdate($tanggal, time()+60*60*8);
		$pecah = explode("-",$ubah);
		$tgl = $pecah[2];
		$bln = $pecah[1];
		$thn = $pecah[0];

		$nama = date("l", mktime(0,0,0,$bln,$tgl,$thn));
		$nama_hari = "";
		if($nama=="Sunday") {$nama_hari="Minggu";}
		else if($nama=="Monday") {$nama_hari="Senin";}
		else if($nama=="Tuesday") {$nama_hari="Selasa";}
		else if($nama=="Wednesday") {$nama_hari="Rabu";}
		else if($nama=="Thursday") {$nama_hari="Kamis";}
		else if($nama=="Friday") {$nama_hari="Jumat";}
		else if($nama=="Saturday") {$nama_hari="Sabtu";}
		return $nama_hari;
	}
}

if ( ! function_exists('hitung_mundur'))
{
	function hitung_mundur($wkt)
	{
		$waktu=array(	365*24*60*60	=> "tahun",
						30*24*60*60		=> "bulan",
						7*24*60*60		=> "minggu",
						24*60*60		=> "hari",
						60*60			=> "jam",
						60				=> "menit",
						1				=> "detik");

		$hitung = strtotime(gmdate ("Y-m-d H:i:s", time () +60 * 60 * 8))-$wkt;
		$hasil = array();
		if($hitung<5)
		{
			$hasil = 'kurang dari 5 detik yang lalu';
		}
		else
		{
			$stop = 0;
			foreach($waktu as $periode => $satuan)
			{
				if($stop>=6 || ($stop>0 && $periode<60)) break;
				$bagi = floor($hitung/$periode);
				if($bagi > 0)
				{
					$hasil[] = $bagi.' '.$satuan;
					$hitung -= $bagi*$periode;
					$stop++;
				}
				else if($stop>0) $stop++;
			}
			$hasil=implode(' ',$hasil).' yang lalu';
		}
		return $hasil;
	}
function rupiah2($harga)
{
    $a=(string)$harga; //membuat $harga menjadi string
    $len=strlen($a); //menghitung panjang string $a
 
    if ( $len <=18 )
    {
        $ratril=$len-3-1;
        $ramil=$len-6-1;
        $rajut=$len-9-1; //untuk mengecek apakah ada nilai ratusan juta (9angka dari belakang)
        $juta=$len-12-1; //untuk mengecek apakah ada nilai jutaan (6angka belakang)
        $ribu=$len-15-1; //untuk mengecek apakah ada nilai ribuan (3angka belakang)
 
        $angka='';
        for ($i=0;$i<$len;$i++)
        {
            if ( $i == $ratril )
            {
                $angka=$angka.$a[$i].".";
            }
            else if ($i == $ramil )
            {
                $angka=$angka.$a[$i].".";
            }
            else if ( $i == $rajut )
            {
                $angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 3angka dari depan
            }
            else if ( $i == $juta )
            {
                $angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 6angka dari depan
            }
            else if ( $i == $ribu )
            {
                $angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 9angka dari depan
            }
            else
            {
                $angka=$angka.$a[$i];
            }
        }
    }
    echo "Rp  ".$angka.",00";
    }
    function rupiah3($harga)
{
    $a=(string)$harga; //membuat $harga menjadi string
    $len=strlen($a); //menghitung panjang string $a
 
    if ( $len <=18 )
    {
        $ratril=$len-3-1;
        $ramil=$len-6-1;
        $rajut=$len-9-1; //untuk mengecek apakah ada nilai ratusan juta (9angka dari belakang)
        $juta=$len-12-1; //untuk mengecek apakah ada nilai jutaan (6angka belakang)
        $ribu=$len-15-1; //untuk mengecek apakah ada nilai ribuan (3angka belakang)
 
        $angka='';
        for ($i=0;$i<$len;$i++)
        {
            if ( $i == $ratril )
            {
                $angka=$angka.$a[$i].".";
            }
            else if ($i == $ramil )
            {
                $angka=$angka.$a[$i].".";
            }
            else if ( $i == $rajut )
            {
                $angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 3angka dari depan
            }
            else if ( $i == $juta )
            {
                $angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 6angka dari depan
            }
            else if ( $i == $ribu )
            {
                $angka=$angka.$a[$i]."."; //meletakkan tanda titik setelah 9angka dari depan
            }
            else
            {
                $angka=$angka.$a[$i];
            }
        }
    }
    echo "".$angka.",00";
    }
if ( ! function_exists('terbilang'))
{
    function terbilang($number, $real_name='', $decimal_digit=0, $decimal_name='')
    {
        $res = '';
        $real = 0;
        $decimal = 0;
        if($number == 0)
        return 'Zero'.(($real_name == '')?'':' '.$real_name);
        if($number >= 0){
        $real = floor($number);
        $decimal = number_format($number - $real, $decimal_digit, '.', ',');
                }else{
        $real = ceil($number) * (-1);
        $number = abs($number);
        $decimal = number_format($number - $real, $decimal_digit, '.', ',');
                }
        $decimal = substr($decimal, strpos($decimal, '.') +1);
        $unit_name[0] = '';
        $unit_name[1] = 'thousand';
        $unit_name[2] = 'million';
        $unit_name[3] = 'billion';
        $unit_name[4] = 'trillion';
        $packet = array();  
        $number = strrev($real);
        $packet = str_split($number,3);
        for($i=0;$i<count($packet);$i++){
        $tmp = strrev($packet[$i]);
        $unit = $unit_name[$i];
        if((int)$tmp == 0)
        continue;
        $tmp_res = '';
        if(strlen($tmp) >= 2){
        $tmp_proc = substr($tmp,-2);
        switch($tmp_proc){
        case '10':
        $tmp_res = 'ten';
        break;
        case '11':
        $tmp_res = 'eleven';
        break;
        case '12':
        $tmp_res = 'twelve';
        break;
        case '13':
        $tmp_res = 'thirteen';
        break;
        case '15':
        $tmp_res = 'fifteen';
        break;
        case '20':
        $tmp_res = 'twenty';
        break;
        case '30':
        $tmp_res = 'thirty';
        break;
        case '40':
        $tmp_res = 'forty';
        break;
        case '50':
        $tmp_res = 'fifty';
        break;
        case '70':
        $tmp_res = 'seventy';
        break;
        case '80':
        $tmp_res = 'eighty';
        break;
        default:
        $tmp_begin = substr($tmp_proc,0,1);
        $tmp_end = substr($tmp_proc,1,1);
        if($tmp_begin == '1')
        $tmp_res = get_num_name($tmp_end).'teen';
        elseif($tmp_begin == '0')
        $tmp_res = get_num_name($tmp_end);
        elseif($tmp_end == '0')
        $tmp_res = get_num_name($tmp_begin).'ty';
        else{
        if($tmp_begin == '2')
        $tmp_res = 'twenty';
        elseif($tmp_begin == '3')
        $tmp_res = 'thirty';
        elseif($tmp_begin == '4')
        $tmp_res = 'forty';
        elseif($tmp_begin == '5')
        $tmp_res = 'fifty';
        elseif($tmp_begin == '6')
        $tmp_res = 'sixty';
        elseif($tmp_begin == '7')
        $tmp_res = 'seventy';
        elseif($tmp_begin == '8')
        $tmp_res = 'eighty';
        elseif($tmp_begin == '9')
        $tmp_res = 'ninety';
        $tmp_res = $tmp_res.' '.get_num_name($tmp_end);
                                }
        break;
                        }
        if(strlen($tmp) == 3){
        $tmp_begin = substr($tmp,0,1);
        $space = '';
        if(substr($tmp_res,0,1) != ' ' && $tmp_res != '')
        $space = ' ';
        if($tmp_begin != 0){
        if($tmp_begin != '0'){
        if($tmp_res != '')
        $tmp_res = 'and'.$space.$tmp_res;
                                }
        $tmp_res = get_num_name($tmp_begin).' hundred'.$space.$tmp_res;
                            }
                        }
                    }else
        $tmp_res = get_num_name($tmp);
        $space = '';
        if(substr($res,0,1) != ' ' && $res != '')
        $space = ' ';
        $res = $tmp_res.' '.$unit.$space.$res;
                }
        $space = '';
        if(substr($res,-1) != ' ' && $res != '')
        $space = ' ';
        if($res)
        $res .= $space.$real_name.(($real > 1 && $real_name != '')?'s':'');
        if($decimal > 0)
        $res .= ' '.terbilang($decimal, '', 0, '').' '.$decimal_name.(($decimal > 1 && $decimal_name != '')?'s':'');
        return ucfirst($res);
    } 
}
 
if ( ! function_exists('get_num_name'))
{
    function get_num_name($num)
    {
        switch($num)
        {
            case 1:return 'one';
            case 2:return 'two';
            case 3:return 'three';
            case 4:return 'four';
            case 5:return 'five';
            case 6:return 'six';
            case 7:return 'seven';
            case 8:return 'eight';
            case 9:return 'nine';
        }
    } 
}
if ( ! function_exists('number_to_words'))
{
	function number_to_words($number)
	{
		$before_comma = trim(to_word($number));
		$after_comma = trim(comma($number));
		return ucwords($results = $before_comma.' Rupiah '.$after_comma);
	}

	function to_word($number)
	{
		$words = "";
		$arr_number = array(
		"",
		"satu",
		"dua",
		"tiga",
		"empat",
		"lima",
		"enam",
		"tujuh",
		"delapan",
		"sembilan",
		"sepuluh",
		"sebelas");

		if($number<12)
		{
			$words = " ".$arr_number[$number];
		}
		else if($number<20)
		{
			$words = to_word($number-10)." belas";
		}
		else if($number<100)
		{
			$words = to_word($number/10)." puluh ".to_word($number%10);
		}
		else if($number<200)
		{
			$words = "seratus ".to_word($number-100);
		}
		else if($number<1000)
		{
			$words = to_word($number/100)." ratus ".to_word($number%100);
		}
		else if($number<2000)
		{
			$words = "seribu ".to_word($number-1000);
		}
		else if($number<1000000)
		{
			$words = to_word($number/1000)." ribu ".to_word($number%1000);
		}
		else if($number<1000000000)
		{
			$words = to_word($number/1000000)." juta ".to_word($number%1000000);
		}
		else
		{
			$words = "undefined";
		}
		return $words;
	}

	function comma($number)
	{
		$after_comma = stristr($number,',');
		$arr_number = array(
		"nol",
		"satu",
		"dua",
		"tiga",
		"empat",
		"lima",
		"enam",
		"tujuh",
		"delapan",
		"sembilan");

		$results = "";
		$length = strlen($after_comma);
		$i = 1;
		while($i<$length)
		{
			$get = substr($after_comma,$i,1);
			$results .= " ".$arr_number[$get];
			$i++;
		}
		return $results;
	}
}

}

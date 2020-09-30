<?php
namespace common\helpers;

Class TextHelper {
	
	private static $alfa = [
		'A'=>'a','B'=>'b','C'=>'c','D'=>'d','E'=>'e','F'=>'f','G'=>'g','H'=>'h','I'=>'i','J'=>'j','K'=>'k','L'=>'l','M'=>'m','N'=>'n','O'=>'o','P'=>'p','Q'=>'q','R'=>'r','S'=>'s','T'=>'t','U'=>'u','V'=>'v','W'=>'w','X'=>'x','Y'=>'y','Z'=>'z',
		'А'=>'а','Б'=>'б','В'=>'в','Г'=>'г','Д'=>'д','Е'=>'е','Ё'=>'ё','Ж'=>'ж','З'=>'з','И'=>'и','Й'=>'й','К'=>'к','Л'=>'л','М'=>'м','Н'=>'н','О'=>'о','П'=>'п','Р'=>'р','С'=>'с','Т'=>'т','У'=>'у','Ф'=>'ф','Х'=>'х','Ц'=>'ц','Ч'=>'ч','Ш'=>'ш','Щ'=>'щ','Ъ'=>'ъ','Ы'=>'ы','Ь'=>'ь','Э'=>'э','Ю'=>'ю','Я'=>'я'
	];

	//в нижний регистр
	public static function strtolower($str){
		return strtr($str,self::$alfa);
	}

	// в верхний регистр
	public static function strtoupper($str){
		$beta = array_flip(self::$alfa);
		return strtr($str,$beta);
	}

	// Транслитерация строк.
	public static function Transliterate($string){

        $string = trim($string);  // обрезать крайние пробелы

        $string = preg_replace("/([^-A-Za-zа-яА-ЯёЁ0-9_\s,]+)/iu", '', $string);

        $replace = array(
            "/" => "-",
            ' ' => '-',
            '%' => '',
            '.' => '',
            ','=>'',
            '+' => '',
            '*' => '',
            '^' => '',
            '$' => '',
            '@' => '',
            '?' => '',
            '!' => '',
            ':' => '',
            '«' => '',
            '»' => '',
            '"' => '',
            "'" => "",
            "`" => "",
            "а" => "a", "А" => "a",
            "б" => "b", "Б" => "b",
            "в" => "v", "В" => "v",
            "г" => "g", "Г" => "g",
            "д" => "d", "Д" => "d",
            "е" => "e", "Е" => "e",
            "ж" => "zh", "Ж" => "zh",
            "з" => "z", "З" => "z",
            "и" => "i", "И" => "i",
            "й" => "y", "Й" => "y",
            "к" => "k", "К" => "k",
            "л" => "l", "Л" => "l",
            "м" => "m", "М" => "m",
            "н" => "n", "Н" => "n",
            "о" => "o", "О" => "o",
            "п" => "p", "П" => "p",
            "р" => "r", "Р" => "r",
            "с" => "s", "С" => "s",
            "т" => "t", "Т" => "t",
            "у" => "u", "У" => "u",
            "ф" => "f", "Ф" => "f",
            "х" => "h", "Х" => "h",
            "ц" => "c", "Ц" => "c",
            "ч" => "ch", "Ч" => "ch",
            "ш" => "sh", "Ш" => "sh",
            "щ" => "sch", "Щ" => "sch",
            "ъ" => "", "Ъ" => "",
            "ы" => "y", "Ы" => "y",
            "ь" => "", "Ь" => "",
            "э" => "e", "Э" => "e",
            "ю" => "yu", "Ю" => "yu",
            "я" => "ya", "Я" => "ya",
            "і" => "i", "І" => "i",
            "ї" => "yi", "Ї" => "yi",
            "є" => "e", "Є" => "e"
        );
        $str = iconv("UTF-8", "UTF-8//IGNORE", strtolower(strtr($string, $replace)));

        return $str;
    	
	}

	public static function num2str($string, $stripkop=false) {
		 $nol = 'ноль';
		 $str[100]= array('','сто','двести','триста','четыреста','пятьсот','шестьсот', 'семьсот', 'восемьсот','девятьсот');
		 $str[11] = array('','десять','одиннадцать','двенадцать','тринадцать', 'четырнадцать','пятнадцать','шестнадцать','семнадцать', 'восемнадцать','девятнадцать','двадцать');
		 $str[10] = array('','десять','двадцать','тридцать','сорок','пятьдесят', 'шестьдесят','семьдесят','восемьдесят','девяносто');
		 $gender = array(
			 array('','один','два','три','четыре','пять','шесть','семь', 'восемь','девять'),// m
			 array('','одна','две','три','четыре','пять','шесть','семь', 'восемь','девять') // f
		 );
		 $forms = array(
		 //array('копейка', 'копейки', 'копеек', 1), // 10^-2
		 //array('рубль', 'рубля', 'рублей', 0), // 10^0
		 array('тийин', 'тийин', 'тийин', 1), // 10^-2
		 array('сум', 'сума', 'сумов', 0), // 10^0
		 array('тысяча', 'тысячи', 'тысяч', 1), // 10^ 3
		 array('миллион', 'миллиона', 'миллионов', 0), // 10^ 6
		 array('миллиард', 'миллиарда', 'миллиардов', 0), // 10^ 9
		 array('триллион', 'триллиона', 'триллионов', 0), // 10^12
		 );
		 $out = $tmp = array();
		 $tmp = explode('.', str_replace(',','.', $string));
		 $rub = number_format($tmp[ 0], 0,'','-');
		 if ($rub== 0) $out[] = $nol;
		 // нормализация копеек
		 $kop = isset($tmp[1]) ? mb_substr(str_pad($tmp[1], 2, '0', STR_PAD_RIGHT), 0,2) : '00';
		 $segments = explode('-', $rub);
		 $offset = sizeof($segments);
		if ((int)$rub== 0) { // если 0 рублей
			 $o[] = $nol;
			 $o[] = self::morph( 0, $forms[1][ 0],$forms[1][1],$forms[1][2]);
	    }else {
			foreach ($segments as $k=>$lev) {
				 $genders= (int) $forms[$offset][3]; // определяем род
				 $ri = (int) $lev; // текущий сегмент
				 if ($ri== 0 && $offset>1) {// если сегмент==0 & не последний уровень(там Units)
					 $offset--;
					 continue;
				 }
				 // нормализация
				 $ri = str_pad($ri, 3, '0', STR_PAD_LEFT);
				 // получаем циферки для анализа
				 $r1 = (int)mb_substr($ri, 0,1); //первая цифра
				 $r2 = (int)mb_substr($ri,1,1); //вторая
				 $r3 = (int)mb_substr($ri,2,1); //третья
				 $r22= (int)$r2.$r3; //вторая и третья
				 // разгребаем порядки
				 if ($ri>99) $o[] = $str[100][$r1]; // Сотни
				 if ($r22>20) { // >20
					 $o[] = $str[10][$r2];
					 $o[] = $gender[ $genders ][$r3];
				 }else { // <=20
					 if ($r22>9) $o[] = $str[11][$r22-9]; // 10-20
					 elseif($r22> 0) $o[] = $gender[ $genders ][$r3]; // 1-9
				 }
				 // Рубли
				 $o[] = self::morph($ri, $forms[$offset][ 0],$forms[$offset][1],$forms[$offset][2]);
				 $offset--;
			}
		 }
		 // Копейки
		 if (!$stripkop) {
			 $o[] = $kop;
			 $o[] = self::morph($kop,$forms[ 0][ 0],$forms[ 0][1],$forms[ 0][2]);
		 }
		 return self::mb_ucfirst( preg_replace("/\s{2,}/",' ',implode(' ',$o)) );
	}
	 
	/**
	 * Склоняем словоформу
	 */
	private static function morph($n, $f1, $f2, $f5) {
		 $n = abs($n) % 100;
		 $n1= $n % 10;
		 if ($n>10 && $n<20) return $f5;
		 if ($n1>1 && $n1<5) return $f2;
		 if ($n1==1) return $f1;
		 return $f5;
	}	
	
	private static function mb_ucfirst($s){ 	
		 $a = ['а'=>'А','б'=>'Б','в'=>'В','г'=>'Г','д'=>'Д','е'=>'Е','ё'=>'Ё','ж'=>'Ж','з'=>'З','и'=>'И','й'=>'Й','к'=>'К','л'=>'Л','м'=>'М','н'=>'Н','о'=>'О','п'=>'П','р'=>'Р','с'=>'С','т'=>'Т','у'=>'У','ф'=>'Ф','х'=>'Х','ц'=>'Ц','ч'=>'Ч','ш'=>'Ш','щ'=>'Щ','ъ'=>'Ъ','ы'=>'Ы','ь'=>'Ь','э'=>'Э','ю'=>'Ю','я'=>'Я'];
		 $s = iconv('utf-8','windows-1251',$s);
		 $fl = substr($s,0,1);		 
		 $fl_u = iconv('windows-1251','utf-8',$fl); 		 
		 $s = substr($s,1,strlen($s));
		 $s = iconv('windows-1251','utf-8',$s); 
		return $a[$fl_u] . $s;
	}

    // обрезка текста
    public static function trim($text,  $length = 32){

        if( mb_strlen( $text ) > $length ){
            $txt = explode( ' ', $text );
            $_txt = '';
            foreach($txt as $t){
                if( mb_strlen($_txt . ' ' . $t) <= $length ){
                    $_txt .= $t . ' ';
                }else{
                    return $_txt . '...';
                }
            }
        }
        return $text;

    }
    public static function custom_echo($x, $length)
    {
        if(strlen($x)<=$length)
        {
            echo $x;
        }
        else
        {
            $y=mb_substr($x,0,$length) . '...';
            echo $y;
        }
    }

    public static function ucfirst($str, $encoding='UTF-8')
    {
        $str = mb_ereg_replace('^[\ ]+', '', $str);
        $str = mb_strtoupper(mb_substr($str, 0, 1, $encoding), $encoding).
            mb_substr($str, 1, mb_strlen($str), $encoding);
        return $str;
    }

    public static function pre($data,$exit=false){
	    ob_start();
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        $res = ob_get_contents();

        if($exit){
            echo $res;
            exit;
        }
        return $res;
    }

	
}
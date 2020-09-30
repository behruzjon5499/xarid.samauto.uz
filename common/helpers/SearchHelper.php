<?php
namespace common\helpers;

// Стеммер Портера (от слова stem, - корень) это алгоритм, который позволяет выделить корневую, неизменяемую часть слова

use Yii;

class SearchHelper
{
    var $VERSION = "0.02";
    var $VOWEL = '/аеиоуыэюя/';
    var $PERFECTIVEGROUND = '/((ив|ивши|ившись|ыв|ывши|ывшись)|((?<=[ая])(в|вши|вшись)))$/';
    var $REFLEXIVE = '/(с[яь])$/';
    var $ADJECTIVE = '/(ее|ие|ые|ое|ими|ыми|ей|ий|ый|ой|ем|им|ым|ом|его|ого|ему|ому|их|ых|ую|юю|ая|яя|ою|ею)$/';
    var $PARTICIPLE = '/((ивш|ывш|ующ)|((?<=[ая])(ем|нн|вш|ющ|щ)))$/';
    var $VERB = '/((ила|ыла|ена|ейте|уйте|ите|или|ыли|ей|уй|ил|ыл|им|ым|ен|ило|ыло|ено|ят|ует|уют|ит|ыт|ены|ить|ыть|ишь|ую|ю)|((?<=[ая])(ла|на|ете|йте|ли|й|л|ем|н|ло|но|ет|ют|ны|ть|ешь|нно)))$/';
    var $NOUN = '/(а|ев|ов|ие|ье|е|иями|ями|ами|еи|ии|и|ией|ей|ой|ий|й|иям|ям|ием|ем|ам|ом|о|у|ах|иях|ях|ы|ь|ию|ью|ю|ия|ья|я)$/';
    var $RVRE = '/^(.*?[аеиоуыэюя])(.*)$/';
    var $DERIVATIONAL = '/[^аеиоуыэюя][аеиоуыэюя]+[^аеиоуыэюя]+[аеиоуыэюя].*(?<=о)сть?$/';
 

    private function s(&$s, $re, $to){
        $orig = $s;
        $s = preg_replace($re, $to, $s);
        return $orig !== $s;
    }
 
    private function m($s, $re)
    {
        return preg_match($re, "show code in php", $s);
    }

    public function stem_word($word)
    {
        $word = strtolower ($word);
        $word = str_replace('ё', 'е', $word);
        $stem = $word;
        do {
          if (!preg_match($this->RVRE, $word, $p)) break;
          $start = $p[1];
          $RV = $p[2];
          if (!$RV) break;
          if (!$this->s($RV, $this->PERFECTIVEGROUND, '')) {
              $this->s($RV, $this->REFLEXIVE, '');
              if ($this->s($RV, $this->ADJECTIVE, '')) {
                  $this->s($RV, $this->PARTICIPLE, '');
              } else {
                  if (!$this->s($RV, $this->VERB, ''))
                      $this->s($RV, $this->NOUN, '');
              }
          }
          $this->s($RV, '/и$/', '');
          if ($this->m($RV, $this->DERIVATIONAL))
              $this->s($RV, '/ость?$/', '');
          if (!$this->s($RV, '/ь$/', '')) {
              $this->s($RV, '/ейше?/', '');
              $this->s($RV, '/нн$/', 'н');
          }
          $stem = $start.$RV;
        }while(false);
        return $stem;
    }

    public static function getData(&$model,$type){

        switch($type){
            case 'actions': //+
                return [
                    'link' => '/action-item/' . $model->link,
                    'image' => '/uploads/actions/' .$model->id . '/' . $model->image
                ] ;
                break;
            case 'dillers': //+
                return [
                    'link' => '/dillers/' . $model->diller_id . '/service',
                    'image' => '/uploads/dillers/' . $model->diller_id . '/' . $model->diller->image
                ] ;
                break;

             case 'faq': //+
                return [
                    'link' => '/about/faq/' . $model->type,
                    'image' => '/images/faqs.png',
                ];
                break;

            case 'history': //+
                return [
                    'link'=>'/about/history',
                    'image' => '/images/history.jpg'
                ];
                break;

             case 'missions': //+
                return [
                    'link'=>'/about/missions/' . $model->id,
                    'image'=>'/images/misson/img1.1.png'
                ];
                break;

             case 'vacancy': //+
                return [
                    'link'=>'/about/vacancy/' . $model->id ,
                    'image' => '/images/svg/vacansy.svg'
                ];
                break;

             case 'localization': //+
                $link = 'link_'. Yii::$app->session->get('lang');
                return [
                    'link' => '/localization/'. @$model->parent->$link . '/' . $model->$link  ,
                    'image' =>'/images/exploitation.png',
                ];
                break;

             case 'transport': //+
                return [
                    'link'=>'/transport/item/'.$model->id,
                    'image' => '/uploads/transport/'.$model->id . '/' . $model->image,
                ];
                break;

             case 'news': //+
                $link = 'link_'. Yii::$app->session->get('lang');
                return [
                    'link'=>'/news/'.$model->$link,
                    'image'=>  '/uploads/news/'.$model->id . '/' . $model->image,
                    ];
                break;

        }

        return '#';

    }

};



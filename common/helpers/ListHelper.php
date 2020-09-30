<?php
/* вывод иерархических списков */
namespace common\helpers;

use common\models\Categories;
use Yii;

Class ListHelper
{

    private $lang = 'ru';

    private static $params;
    private static $cats = [0]; // список категорий

    public static $sub_cat_ids = []; // список категорий

    private static $class = [0=>'submenu',1=>'dropLevelOne',2=>'dropLevelTwo'];
    private static $list_class = [0 => 'sidebar-menu-item',1 => 'sidebar-menu-item', 2 => 'sidebar-menu-item-child', 3 => 'sidebar-menu-item-child' ];

    // li список для карты сайта, например
    private static function view_cat_li($dataset,$subitem = true)
    {
        $active_id = 0;
        $parent_id = 0;
        $has_parent_id = isset( self::$params['active_id'] );
        if($has_parent_id) $active_id = self::$params['active_id'];

        if($has_parent_id && isset(self::$params['parent_id'])) $parent_id = self::$params['parent_id'];

        $link = self::$params['link'];
        //echo $link; //exit;

        // echo '<pre>';print_r($dataset); echo '</pre>';
        $active = '';
        $parent_active = '';
        $arr = "";
        foreach ($dataset as $menu) {

            if( $has_parent_id ){

                if( $active_id == $menu['id'] ) {
                    $active = 'active';
                }else{
                    $active = '';
                }

                if( $parent_id == $menu['id'] ) {
                    $parent_active = 'active';
                }else{
                    $parent_active = '';
                }

            }
            if (isset($menu['id'])) {
                if ($subitem) {
                    $arr .= '<li><a class="parent_item ' . $active . '" data-id="' . $menu['id'] . '">' . $menu["title"] . '</a>';
                } else {
                    $arr .= '<li><a href="/catalog?category=' . $menu['id'] . '" class="' . $active . '" data-id="' . $menu['id'] . '">' . $menu["title"] . '</a>';
                }
            }

            if (!empty($menu['childs'])) {
                $arr .= '<ul class="submenu '. $parent_active .'">';
                $arr .= self::view_cat_li($menu['childs'], false);
                $arr .= '</ul>';
            }
            if(isset($menu['id'])) $arr .= '</li>';

        }
        return $arr;
    }

/*
 *
 * <ul class="ul-st-one">
        <li class="sidebar-menu-item active">
            <a href="#" class="parent_item active">Мебель/a>
            <div class="dropLevelOne">
                <ul>
                    <li class="sidebar-menu-item-child">
                        <a href="#">КРОВАТИ И МАТРАСЫ</a>
                        <div class="dropLevelTwo">
                            <a href="#">ДВУХСПАЛЬНЫЕ КРОВАТИ</a>
                        </div>
                    </li>
                    <li class="sidebar-menu-item-child"><a href="#">ШКАФЫ, КОМОДЫ, СТЕЛЛАЖИ</a></li>
                </ul>
            </div>
        </li>

 * */

    // li список меню
    private static function view_cat($dataset,$subitem = true)
    {
        $active_id = 0;
        $parent_id = 0;
        $has_parent_id = isset( self::$params['active_id'] );
        if($has_parent_id) $active_id = self::$params['active_id'];

        if($has_parent_id && isset(self::$params['parent_id'])) $parent_id = self::$params['parent_id'];

        //$link = self::$params['link'];

        // echo '<pre>';print_r($dataset); echo '</pre>';
        $active = '';
        $parent_active = '';
        $arr = "";
        foreach ($dataset as $menu) {

            if( $has_parent_id ){

                if( $active_id == $menu['id'] ) {
                    $active = 'active';
                }else{
                    $active = '';
                }

                if( $parent_id == $menu['id'] ) {
                    $parent_active = 'active';
                }else{
                    $parent_active = '';
                }

            }
            if ( isset($menu['id']) ) {
                if ($subitem) {
                    $arr .= '<li><a class="parent_item ' . $active . '" data-id="' . $menu['id'] . '">' . $menu["title"] . '</a>';
                } else {
                    $arr .= '<li><a href="/catalog?category=' . $menu['id'] . '" class="' . $active . '" data-id="' . $menu['id'] . '">' . $menu["title"] . '</a>';
                }
            }

            if ( !empty($menu['childs']) ) {
                $arr .= '<ul class="submenu '. $parent_active .'">';
                $arr .= self::view_cat($menu['childs'], false);
                $arr .= '</ul>';
            }

            if( isset($menu['id']) ) $arr .= '</li>';

        }
        return $arr;
    }

    // многоуровневое меню
    public static function view_cat_ex(&$dataset,$level) {


        $level++; // текущий уровень

        $active_id = 0;
        $parent_id = 0;
        $has_parent_id = isset( self::$params['active_id'] );
        if($has_parent_id) $active_id = self::$params['active_id'];

        if($has_parent_id && isset(self::$params['parent_id'])) $parent_id = self::$params['parent_id'];


        // $link = self::$params['link'];
        $active = '';
        $parent_active = '';
        $arr = "";

        foreach ($dataset as $menu) {

            if( $has_parent_id ){

                if( $active_id == $menu['id'] || in_array( $menu['id'], self::$cats) ) {
                    $active = 'active';
                }else{
                    $active = '';
                }

                //if( $parent_id == $menu['id'] ) {
                if( in_array( $menu['id'], self::$cats) ) {
                    $parent_active = 'active';
                }else{
                    $parent_active = '';
                }

            }

            if ( isset($menu['id']) ) {
                if (!empty($menu['childs'])) {
                    $arr .= '<li class="sidebar-menu-item"><a data-id="' . $menu['id'] . '" class="'.$active.'">' . $menu["title"] . '</a>';
                } else {
                    $arr .= '<li class="sidebar-menu-item"><a href="/catalog?category=' . $menu['id'] . @self::$params['query'] . '" data-id="' . $menu['id'] . '">' . $menu["title"] . '</a>';
                }
            }

            //$arr .= '<li class="'.self::$list_class[$level].' ' . $active . ' level_' . $level. '" data-id="'.$menu['id'].'"><a>' . $menu['title'] . '</a>';

            if(!empty($menu['childs'])) {
                $arr .= '<ul>';
                $arr .= self::view_cat_ex( $menu['childs'], $level );
                $arr .= '</ul>';
                //$level--;
            }
            $arr .= '</li>';

        }
        return $arr;
    }

    /* рабочий пример
    public static function view_cat_ex(&$dataset,$level) {

        $level++;
        $arr = "";
        foreach ($dataset as $menu) {

            $arr .= '<li class="'.self::$list_class[$level].'" data-level="'.$level.'"><a>' . $menu['title'] . '</a>';

            if(!empty($menu['childs'])) {
                $arr .= '<ul class="' . self::$class[$level] . '" data-level="' . $level .'">';
                $arr .= self::view_cat_ex( $menu['childs'], $level );
                $arr .= '</ul>';
                //$level--;
            }
            $arr .= '</li>';

        }
        return $arr;
    } */

    // выпадающий список
    private static function view_cat_option_full($dataset,&$level)
    {

        //$has_parent_id = isset($params['parent_id']);
        $active_id = isset( self::$params['active_id'] ) ? self::$params['active_id'] : 0;

        $arr = "";
        foreach ($dataset as $menu) {

            $selected = $active_id == $menu['id'] ? 'selected' : '';

            if (!empty($menu['childs'])) {
                $padding_main = str_repeat('•',$level);
                $level++;
                //$padding = $level*10;
                $padding = str_repeat('•',$level);
                $arr .= '<optgroup label="' . $menu["title"] . '">';

                //if($level<2) {
                    $arr .= '<option value="' . $menu['id'] . '" ' . $selected . '>' . $padding_main . $menu['title'] . '</option>';

                    $arr .= self::view_cat_option_full($menu['childs'], $level);
                    $arr .= '</optgroup>';
                    $level--;
               // }
            }else{
                //$padding = $level*10;
                $padding = str_repeat('•',$level);
                $arr .= '<option value="' . $menu['id'] . '" '. $selected .'>' .$padding . $menu['title'] ;
            }
            $arr .= '</opion>';


        }
        return $arr;
    }

    // выпадающий список
    private static function view_cat_option($dataset)
    {

        //$has_parent_id = isset($params['parent_id']);
        $active_id = isset( self::$params['active_id'] ) ? 0 : self::$params['active_id'];


        $arr = "";
        foreach ($dataset as $menu) {

            /* if( $has_parent_id ) {
                $active = $params['parent_id'] == $menu['id'] ? 'active' : '';
            }else{
                $active = '';
            }*/

            $selected = $active_id == $menu['id'] ? 'selected' : '';

            if (!empty($menu['childs'])) {
                $arr .= '<optgroup label="' . $menu["title"] . '">';
                $arr .= self::view_cat_option($menu['childs']);
                $arr .= '</optgroup>';
            }else{
                $arr .= '<option value="' . $menu['id'] . '" '. $selected .'>' . $menu['title'] ;
            }
            $arr .= '</opion>';

        }
        return $arr;
    }

    // получение цепочки id
    public static function getCategoryId(&$dataset,$id){

        foreach ( $dataset as $cat ) {

            if( $cat->id == $id && $id != 0 ){

                self::$cats[] = $id;

                self::getCategoryId( $dataset, $cat->parent_id );

            }

            /* $data[$cat->id] = [
                'id' => $cat->id,
                'title' => $cat->title,
                'parent_id' => $cat->parent_id
            ]; */

        }

        return;
    }

    // получение цепочки всех вложенных id
    public static function getSubCategoryIds(&$categories,$id){  // 48

        // получаем все id вложенных категорий
        foreach ( $categories as $cat ) {
            if( $id == $cat->parent_id /*|| $id==$cat->id */ ) { // поиск всех вложенных по parent_id

                if ( ! in_array( $cat->parent_id, self::$sub_cat_ids ) ) {
                    self::$sub_cat_ids[] = $cat->parent_id;
                }
                if ( ! in_array( $cat->id, self::$sub_cat_ids ) ) {
                    self::$sub_cat_ids[] = $cat->id;
                }
                self::getSubCategoryIds( $categories, $cat->id );

            }
        }
        return null;
    }

    public static function mapTree($dataset)
    {
        $lang = Yii::$app->session->get('lang');
        if($lang=='') $lang = 'ru';
        if(isset(self::$params['field'])){
            $title = self::$params['field'];
        }else {
            $title = 'title_' . $lang;
        }

        $data = [];

        foreach ($dataset as $cat) {
            $data[$cat->id] = [
                'id' => $cat->id,
                'title' => $cat->$title,
                'parent_id' => $cat->parent_id
            ];
        }

        $parent_id = isset( self::$params['parent_id'] ) ? self::$params['parent_id'] : 0;

        // получение цепочки id
        self::getCategoryId( $dataset, $parent_id );

        $tree = [];

        foreach ($data as $id => &$node) {
            if (!$node['parent_id']) {
                $tree[$id] = &$node;
            } else {
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }

        return $tree;

    }

    // ul список
    public static function getListLi(&$dataset, $params = false){

        self::$params = $params;

        $data = self::mapTree($dataset);

        return self::view_cat_li($data);

    }

    // ul список меню
    public static function getListEx($dataset, $params = false){

        self::$params = $params;

        $data = self::mapTree($dataset);

         // print_r([self::$params,self::$cats]);

        return self::view_cat_ex($data,0);

    }

    // select список
    public static function getSelectList(&$dataset,$params = false){

        self::$params = $params;

        $data = self::mapTree($dataset);

        return self::view_cat_option($data);

    }
    // select список
    public static function getSelectListFull(&$dataset,$params = false){

        self::$params = $params;

        $data = self::mapTree($dataset);
        $level = 0;
        return self::view_cat_option_full($data,$level);

    }

}
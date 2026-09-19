<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;
use Typecho\Plugin;
use Typecho\Db;
use Typecho\Widget;
class ZFonts_Action
{
    public static function start()
    {
        $db=Typecho_Db::get();
        $delete = $db->delete('table.options')->where ('name = ?', 'ZFontsFileSource');
        $db->query($delete);
        $delete = $db->delete('table.options')->where ('name = ?', 'ZFontsFileSourceWay');
        $db->query($delete);
        $insert = $db->insert('table.options')
        ->rows(array('name' => 'ZFontsFileSource','user' => '0','value' => ''));
        $insertId = $db->query($insert);
        $insert = $db->insert('table.options')
        ->rows(array('name' => 'ZFontsFileSourceWay','user' => '0','value' => 'JSON'));
        $insertId = $db->query($insert);
        Typecho_Plugin::factory('Widget_Archive')->header = array('ZFonts_Plugin', 'frontdesk');
        Typecho_Plugin::factory('admin/footer.php')->end = array('ZFonts_Plugin', 'backstage');
    }
    public static function disable()
    {
        $db=Typecho_Db::get();
        $delete=$db->delete('table.options')->where ('name = ?', 'ZFontsFileSource');
        $deletedRows=$db->query($delete);
        $delete=$db->delete('table.options')->where ('name = ?', 'ZFontsFileSourceWay');
        $deletedRows=$db->query($delete);
    }
    public static function fro($type,$fs,$pubf,$open,$yzkey,$gooi,$goot,$newyy,$tyk)
    {
        // echo '<script>console.log("%cZFonts v23.0 | Powered by ZhongZN","color:#fff;background:linear-gradient(270deg,#986fee,#8695e6,#68b7dd,#18d7d3);padding:8px 15px;border-radius:0 15px 0 15px");</script>';
        if($open==1)
        {
            $gse=strtolower(pathinfo((string) ($type ?? ''), PATHINFO_EXTENSION));
            $gs=array('ttf'=>'1', 'woff'=>'2', 'woff2'=>'3')[$gse] ?? null;
            if($fs==0)
            {
                if($tyk==0)
                {
                    $fontKey=(string) ($pubf ?? '');
                    $tnwo=json_decode((string) ($newyy ?? ''));
                    if(isset($tnwo->Fonts[0]->$fontKey))
                    echo '<style>@font-face{font-family:FontStyle;src:url("'.$tnwo->Fonts[0]->$fontKey.'");format("woff2");font-display:swap;}*{font-family:FontStyle;}</style>';
                }
                if($tyk==1)
                {
                    echo '<style>@font-face{font-family:FontStyle;src:url("'.$newyy.''.$pubf.'.woff2");format("woff2");font-display:swap;}*{font-family:FontStyle;}</style>';
                }
            } 
            if($fs==1)
            {
                echo $gooi;
                echo '<style>*{'.$goot.'}</style>';
            }
            if($fs==2)
            {
                echo'<script type="text/javascript" src="https://cdn.repository.webfont.com/wwwroot/js/wf/youziku.api.min.js"></script><script type="text/javascript">$webfont.load("header", "'.$yzkey.'", "FontStyle");$webfont.load("body", "'.$yzkey.'", "FontStyle");$webfont.load("footer", "'.$yzkey.'", "FontStyle");$webfont.draw();</script>';
            }
            if($fs==3)
            {
                if($gs==1)
                echo '<style>@font-face{font-family:FontStyle;src:url("'.$type.'");format("truetype");font-display:swap;}*{font-family:FontStyle;}</style>';
                if($gs==2)
                echo '<style>@font-face{font-family:FontStyle;src:url("' . $type . '");format("woff");font-display:swap;}*{font-family:FontStyle;}</style>';
                if($gs==3)
                echo '<style>@font-face{font-family:FontStyle;src:url("' . $type . '");format("woff2");font-display:swap;}*{font-family:FontStyle;}</style>';
            }
        }
    }
    public static function bac($type,$fs,$pubf,$open,$yzkey,$gooi,$goot,$newyy,$tyk)
    {
        self::getkk($newyy);
        if($tyk==0)self::getfs('JSON');
        if($tyk==1)self::getfs('CDN');
        if($open==1)
        {
            $gse=strtolower(pathinfo((string) ($type ?? ''), PATHINFO_EXTENSION));
            $gs=array('ttf'=>'1', 'woff'=>'2', 'woff2'=>'3')[$gse] ?? null;
            if($fs==0) 
            {
                if($tyk==0)
                {
                    $fontKey=(string) ($pubf ?? '');
                    $tnwo=json_decode((string) ($newyy ?? ''));
                    if(isset($tnwo->Fonts[0]->$fontKey))
                    echo '<style>@font-face{font-family:FontStyle;src:url("'.$tnwo->Fonts[0]->$fontKey.'");format("woff2");font-display:swap;}*{font-family:FontStyle;}</style>';
                }
                if($tyk==1)
                {
                    echo '<style>@font-face{font-family:FontStyle;src:url("'.$newyy.''.$pubf.'.woff2");format("woff2");font-display:swap;}*{font-family:FontStyle;}</style>';
                }
            } 
            if($fs==1)
            {
                echo $gooi;
                echo '<style>*{'.$goot.'}</style>';
            }
            if($fs==2)
            {
                echo'<script type="text/javascript" src="https://cdn.repository.webfont.com/wwwroot/js/wf/youziku.api.min.js"></script><script type="text/javascript">$webfont.load("header", "'.$yzkey.'", "FontStyle");$webfont.load("body", "'.$yzkey.'", "FontStyle");$webfont.load("footer", "'.$yzkey.'", "FontStyle");$webfont.draw();</script>';
            }
            if($fs==3)
            {
                if($gs==1)
                echo '<style>@font-face{font-family:FontStyle;src:url("'.$type.'");format("truetype");font-display:swap;}*{font-family:FontStyle;}</style>';
                if($gs==2)
                echo '<style>@font-face{font-family:FontStyle;src:url("' . $type . '");format("woff");font-display:swap;}*{font-family:FontStyle;}</style>';
                if($gs==3)
                echo '<style>@font-face{font-family:FontStyle;src:url("' . $type . '");format("woff2");font-display:swap;}*{font-family:FontStyle;}</style>';
            }
        }
    }
    public static function getkk($kka)
    {
        $db=Typecho_Db::get();
        $update = $db->update('table.options')->rows(array('value'=>$kka))->where('name = ?', 'ZFontsFileSource');
        $updateRows= $db->query($update);
    }
    public static function getokk()
    {
        $db=Typecho_Db::get();
        $rtwt=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'ZFontsFileSource'));
        $vmap=$rtwt['value'];
        return $vmap;
    }
    public static function getfs($kka)
    {
        $db=Typecho_Db::get();
        $update = $db->update('table.options')->rows(array('value'=>$kka))->where('name = ?', 'ZFontsFileSourceWay');
        $updateRows= $db->query($update);
    }
    public static function getztfs()
    {
        $db=Typecho_Db::get();
        $rtwt=$db->fetchRow($db->select()->from ('table.options')->where ('name = ?', 'ZFontsFileSourceWay'));
        $vmap=$rtwt['value'];
        return $vmap;
    }
}

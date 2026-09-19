<?php
/**
 * <strong style="color:red;">Typecho字体美化插件 更新时间: </strong><code style="padding: 2px 4px; font-size: 90%; color: #c7254e; background-color: #f9f2f4; border-radius: 4px;">2026-09-19</code> 
 *
 * @package ZFonts
 * @author ZhongZN
 * @version 26.0
 * @link https://github.com/ZhongZN
 */
require_once("Action.php");
class ZFonts_Plugin implements Typecho_Plugin_Interface
{
    public static function activate()
    {
        ZFonts_Action::start();
    }
    public static function deactivate()
    {
        ZFonts_Action::disable();
    }
    public static function config(Typecho_Widget_Helper_Form $form)
    {
        
        if (version_compare(\Typecho\Common::VERSION, '1.2.0', '>='))
        {
            require_once("libs/FormElements.php");
            require_once('libs/Checkbox.php');
            require_once('libs/Text.php');
            require_once('libs/Radio.php');
            require_once('libs/Select.php');
            require_once('libs/Textarea.php');
        }
        else
        {
            require_once("libs/ty_old/FormElements.php");
            require_once('libs/ty_old/Checkbox.php');
            require_once('libs/ty_old/Text.php');
            require_once('libs/ty_old/Radio.php');
            require_once('libs/ty_old/Select.php');
            require_once('libs/ty_old/Textarea.php');
        }
        $ztfs=ZFonts_Action::getztfs();
        $kkk=ZFonts_Action::getokk();
        if ($ztfs == 'JSON')
        {
            $jsex=json_decode($kkk);
            $jsonSourceValid=isset($jsex->Styles[0]->s1, $jsex->Styles[0]->s2, $jsex->Preview[0]->p21);
            for ($i=1; $jsonSourceValid && $i<=20; $i++)
            {
                $previewKey='p'.$i;
                $nameKey='n'.$i;
                $jsonSourceValid=isset($jsex->Preview[0]->$previewKey, $jsex->Names[0]->$nameKey);
            }
            if (!$jsonSourceValid)
            {
                $ztfs='CDN';
                $kkk=rtrim(Helper::options()->pluginUrl, '/').'/ZFonts/libs/fonts/';
            }
        }
        elseif ($ztfs != 'CDN' || empty($kkk))
        {
            $ztfs='CDN';
            $kkk=rtrim(Helper::options()->pluginUrl, '/').'/ZFonts/libs/fonts/';
        }
        if($ztfs=='CDN')
        echo '<style type="text/css">.typecho-option span{margin-right:100%;}</style><link rel="stylesheet" href="'.$kkk.'Preview/mdui.min.css"/><script src="'.$kkk.'Preview/mdui.min.js"></script><style>@font-face{font-family:pr1;src:url("'.$kkk.'Preview/s1.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr2;src:url("'.$kkk.'Preview/s2.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr3;src:url("'.$kkk.'Preview/s3.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr4;src:url("'.$kkk.'Preview/s4.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr5;src:url("'.$kkk.'Preview/s5.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr6;src:url("'.$kkk.'Preview/s6.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr7;src:url("'.$kkk.'Preview/s7.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr8;src:url("'.$kkk.'Preview/s8.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr9;src:url("'.$kkk.'Preview/s9.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr10;src:url("'.$kkk.'Preview/s10.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr11;src:url("'.$kkk.'Preview/s11.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr12;src:url("'.$kkk.'Preview/s12.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr13;src:url("'.$kkk.'Preview/s13.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr14;src:url("'.$kkk.'Preview/s14.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr15;src:url("'.$kkk.'Preview/s15.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr16;src:url("'.$kkk.'Preview/s16.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr17;src:url("'.$kkk.'Preview/s17.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr18;src:url("'.$kkk.'Preview/s18.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr19;src:url("'.$kkk.'Preview/s19.ttf");format("truetype");font-display:swap;}@font-face{font-family:pr20;src:url("'.$kkk.'Preview/s20.ttf");format("truetype");font-display:swap;}@font-face{font-family:prtitle;src:url("'.$kkk.'Preview/title.ttf");format("truetype");font-display:swap;}</style><strong style="font-size:30px;font-family:prtitle;"><font color="#00AEEF">Z</font><font color="#00AEDF">F</font><font color="#00AECF">o</font><font color="#00AEBF">n</font><font color="#00AEAF">t</font><font color="#00AE9F">s</font> <font color="#00AE8F">2</font><font color="#00AE7F">6</font><font color="#00AE6F">.</font><font color="#00AE5F">0</font> <font color="#00AE4F">设</font><font color="#00AE3F">置</font><font color="#00AE2F">面</font><font color="#00AE1F">板</font></strong>';
        if($ztfs=='JSON')
        {
            $jsex=json_decode($kkk);
            echo '<style type="text/css">.typecho-option span{margin-right:100%;}</style><link rel="stylesheet" href="'.$jsex->Styles[0]->s1.'"/><script src="'.$jsex->Styles[0]->s2.'"></script><style>@font-face{font-family:pr1;src:url("'.$jsex->Preview[0]->p1.'");format("truetype");font-display:swap;}@font-face{font-family:pr2;src:url("'.$jsex->Preview[0]->p2.'");format("truetype");font-display:swap;}@font-face{font-family:pr3;src:url("'.$jsex->Preview[0]->p3.'");format("truetype");font-display:swap;}@font-face{font-family:pr4;src:url("'.$jsex->Preview[0]->p4.'");format("truetype");font-display:swap;}@font-face{font-family:pr5;src:url("'.$jsex->Preview[0]->p5.'");format("truetype");font-display:swap;}@font-face{font-family:pr6;src:url("'.$jsex->Preview[0]->p6.'");format("truetype");font-display:swap;}@font-face{font-family:pr7;src:url("'.$jsex->Preview[0]->p7.'");format("truetype");font-display:swap;}@font-face{font-family:pr8;src:url("'.$jsex->Preview[0]->p8.'");format("truetype");font-display:swap;}@font-face{font-family:pr9;src:url("'.$jsex->Preview[0]->p9.'");format("truetype");font-display:swap;}@font-face{font-family:pr10;src:url("'.$jsex->Preview[0]->p10.'");format("truetype");font-display:swap;}@font-face{font-family:pr11;src:url("'.$jsex->Preview[0]->p11.'");format("truetype");font-display:swap;}@font-face{font-family:pr12;src:url("'.$jsex->Preview[0]->p12.'");format("truetype");font-display:swap;}@font-face{font-family:pr13;src:url("'.$jsex->Preview[0]->p13.'");format("truetype");font-display:swap;}@font-face{font-family:pr14;src:url("'.$jsex->Preview[0]->p14.'");format("truetype");font-display:swap;}@font-face{font-family:pr15;src:url("'.$jsex->Preview[0]->p15.'");format("truetype");font-display:swap;}@font-face{font-family:pr16;src:url("'.$jsex->Preview[0]->p16.'");format("truetype");font-display:swap;}@font-face{font-family:pr17;src:url("'.$jsex->Preview[0]->p17.'");format("truetype");font-display:swap;}@font-face{font-family:pr18;src:url("'.$jsex->Preview[0]->p18.'");format("truetype");font-display:swap;}@font-face{font-family:pr19;src:url("'.$jsex->Preview[0]->p19.'");format("truetype");font-display:swap;}@font-face{font-family:pr20;src:url("'.$jsex->Preview[0]->p20.'");format("truetype");font-display:swap;}@font-face{font-family:prtitle;src:url("'.$jsex->Preview[0]->p21.'");format("truetype");font-display:swap;}</style><strong style="font-size:30px;font-family:prtitle;"><font color="#00AEEF">Z</font><font color="#00AEDF">F</font><font color="#00AECF">o</font><font color="#00AEBF">n</font><font color="#00AEAF">t</font><font color="#00AE9F">s</font> <font color="#00AE8F">2</font><font color="#00AE7F">6</font><font color="#00AE6F">.</font><font color="#00AE5F">0</font> <font color="#00AE4F">设</font><font color="#00AE3F">置</font><font color="#00AE2F">面</font><font color="#00AE1F">板</font></strong>';
        }
        $ztitle=new Typecho_Widget_Helper_Layout();
        $ztitle->html(_t('<h4>基础配置</h4><hr>'));
        $form->addItem($ztitle);
        $form->addItem(new CustomLabel('<div class="mdui-panel mdui-panel-popout" mdui-panel>'));
        $QTOpen = new Radio(
            'QT',
            array(
                '0' => _t('关闭'),
                '1' => _t('开启'),
            ),
            '1',
            _t('前台字体美化'),
            _t('配置前台字体美化方式，默认开启')
        );
        $form->addInput($QTOpen);
        $QTFS = new Radio(
            'QTFS',
            array(
                '0' => _t('ZFonts字体库'),
                '1' => _t('GoogleFonts'),
                '2' => _t('有字库 [不支持PJAX]'),
                '3' => _t('自定义字体'),
            ),
            '0',
            _t('前台字体解析方式'),
            _t('配置前台字体解析方式，默认为ZFonts字体库')
        );
        $form->addInput($QTFS);
        $HTOpen = new Radio(
            'HT',
            array(
                '0' => _t('关闭'),
                '1' => _t('开启'),
            ),
            '1',
            _t('后台字体美化'),
            _t('配置后台字体美化方式，默认开启')
        );
        $form->addInput($HTOpen);
        $HTFS = new Radio(
            'HTFS',
            array(
                '0' => _t('ZFonts字体库'),
                '1' => _t('GoogleFonts'),
                '2' => _t('有字库 [不支持PJAX]'),
                '3' => _t('自定义字体'),
            ),
            '0',
            _t('后台字体解析方式'),
            _t('配置后台字体解析方式，默认为ZFonts字体库')
        );
        $form->addInput($HTFS);
        $ztitle = new Typecho_Widget_Helper_Layout();
        $ztitle->html(_t('<h4>ZFonts字体库配置</h4><hr>'));
        $form->addItem($ztitle);
        $QTMarket = new Radio(
            'QTMarket',
            array(
                '1' => '<a style="text-decoration:none;color:black;font-family:pr1;">楷体</a>',
                '2' => '<a style="text-decoration:none;color:black;font-family:pr2;">玩艺记趣体</a>',
                '3' => '<a style="text-decoration:none;color:black;font-family:pr3;">字体传奇南安体</a>',
                '4' => '<a style="text-decoration:none;color:black;font-family:pr4;">摄图摩登小方体</a>',
                '5' => '<a style="text-decoration:none;color:black;font-family:pr5;">杨任东竹石体</a>',
                '6' => '<a style="text-decoration:none;color:black;font-family:pr6;">字制区喜脉体</a>',
                '7' => '<a style="text-decoration:none;color:black;font-family:pr7;">江西拙楷</a>',
                '8' => '<a style="text-decoration:none;color:black;font-family:pr8;">悠哉字体</a>',
                '9' => '<a style="text-decoration:none;color:black;font-family:pr9;">沐瑶软笔手写体</a>',
                '10' => '<a style="text-decoration:none;color:black;font-family:pr10;">字体视界法棍体</a>',
                '11' => '<a style="text-decoration:none;color:black;font-family:pr11;">Webmo</a>',
                '12' => '<a style="text-decoration:none;color:black;font-family:pr12;">本墨悦亦</a>',
                '13' => '<a style="text-decoration:none;color:black;font-family:pr13;">汉仪唐美人</a>',
                '14' => '<a style="text-decoration:none;color:black;font-family:pr14;">汉仪魁肃</a>',
                '15' => '<a style="text-decoration:none;color:black;font-family:pr15;">汉仪新蒂棉花糖体</a>',
                '16' => '<a style="text-decoration:none;color:black;font-family:pr16;">走路带风小可爱</a>',
                '17' => '<a style="text-decoration:none;color:black;font-family:pr17;">方正锐正圆</a>',
                '18' => '<a style="text-decoration:none;color:black;font-family:pr18;">站酷快乐体</a>',
                '19' => '<a style="text-decoration:none;color:black;font-family:pr19;">落日飞行体</a>',
                '20' => '<a style="text-decoration:none;color:black;font-family:pr20;">汉仪细中圆</a>',
            ),
            '13',
            _t('前台ZFonts字体库配置'),
            _t('<p style="font-size:14px;color:rgb(153,153,153)">选择喜爱的字体，应用在网站中</p>')
        );
        if($ztfs=='JSON')
        $QTMarket = new Radio(
            'QTMarket',
            array(
                '1' => '<a style="text-decoration:none;color:black;font-family:pr1;">'.$jsex->Names[0]->n1.'</a>',
                '2' => '<a style="text-decoration:none;color:black;font-family:pr2;">'.$jsex->Names[0]->n2.'</a>',
                '3' => '<a style="text-decoration:none;color:black;font-family:pr3;">'.$jsex->Names[0]->n3.'</a>',
                '4' => '<a style="text-decoration:none;color:black;font-family:pr4;">'.$jsex->Names[0]->n4.'</a>',
                '5' => '<a style="text-decoration:none;color:black;font-family:pr5;">'.$jsex->Names[0]->n5.'</a>',
                '6' => '<a style="text-decoration:none;color:black;font-family:pr6;">'.$jsex->Names[0]->n6.'</a>',
                '7' => '<a style="text-decoration:none;color:black;font-family:pr7;">'.$jsex->Names[0]->n7.'</a>',
                '8' => '<a style="text-decoration:none;color:black;font-family:pr8;">'.$jsex->Names[0]->n8.'</a>',
                '9' => '<a style="text-decoration:none;color:black;font-family:pr9;">'.$jsex->Names[0]->n9.'</a>',
                '10' => '<a style="text-decoration:none;color:black;font-family:pr10;">'.$jsex->Names[0]->n10.'</a>',
                '11' => '<a style="text-decoration:none;color:black;font-family:pr11;">'.$jsex->Names[0]->n11.'</a>',
                '12' => '<a style="text-decoration:none;color:black;font-family:pr12;">'.$jsex->Names[0]->n12.'</a>',
                '13' => '<a style="text-decoration:none;color:black;font-family:pr13;">'.$jsex->Names[0]->n13.'</a>',
                '14' => '<a style="text-decoration:none;color:black;font-family:pr14;">'.$jsex->Names[0]->n14.'</a>',
                '15' => '<a style="text-decoration:none;color:black;font-family:pr15;">'.$jsex->Names[0]->n15.'</a>',
                '16' => '<a style="text-decoration:none;color:black;font-family:pr16;">'.$jsex->Names[0]->n16.'</a>',
                '17' => '<a style="text-decoration:none;color:black;font-family:pr17;">'.$jsex->Names[0]->n17.'</a>',
                '18' => '<a style="text-decoration:none;color:black;font-family:pr18;">'.$jsex->Names[0]->n18.'</a>',
                '19' => '<a style="text-decoration:none;color:black;font-family:pr19;">'.$jsex->Names[0]->n19.'</a>',
                '20' => '<a style="text-decoration:none;color:black;font-family:pr20;">'.$jsex->Names[0]->n20.'</a>',
            ),
            '13',
            _t('前台ZFonts字体库配置'),
            _t('<p style="font-size:14px;color:rgb(153,153,153)">选择喜爱的字体，应用在网站中</p>')
        );
        $form->addInput($QTMarket);
        $HTMarket = new Radio(
            'HTMarket',
            array(
                '1' => '<a style="text-decoration:none;color:black;font-family:pr1;">楷体</a>',
                '2' => '<a style="text-decoration:none;color:black;font-family:pr2;">玩艺记趣体</a>',
                '3' => '<a style="text-decoration:none;color:black;font-family:pr3;">字体传奇南安体</a>',
                '4' => '<a style="text-decoration:none;color:black;font-family:pr4;">摄图摩登小方体</a>',
                '5' => '<a style="text-decoration:none;color:black;font-family:pr5;">杨任东竹石体</a>',
                '6' => '<a style="text-decoration:none;color:black;font-family:pr6;">字制区喜脉体</a>',
                '7' => '<a style="text-decoration:none;color:black;font-family:pr7;">江西拙楷</a>',
                '8' => '<a style="text-decoration:none;color:black;font-family:pr8;">悠哉字体</a>',
                '9' => '<a style="text-decoration:none;color:black;font-family:pr9;">沐瑶软笔手写体</a>',
                '10' => '<a style="text-decoration:none;color:black;font-family:pr10;">字体视界法棍体</a>',
                '11' => '<a style="text-decoration:none;color:black;font-family:pr11;">Webmo</a>',
                '12' => '<a style="text-decoration:none;color:black;font-family:pr12;">本墨悦亦</a>',
                '13' => '<a style="text-decoration:none;color:black;font-family:pr13;">汉仪唐美人</a>',
                '14' => '<a style="text-decoration:none;color:black;font-family:pr14;">汉仪魁肃</a>',
                '15' => '<a style="text-decoration:none;color:black;font-family:pr15;">汉仪新蒂棉花糖体</a>',
                '16' => '<a style="text-decoration:none;color:black;font-family:pr16;">走路带风小可爱</a>',
                '17' => '<a style="text-decoration:none;color:black;font-family:pr17;">方正锐正圆</a>',
                '18' => '<a style="text-decoration:none;color:black;font-family:pr18;">站酷快乐体</a>',
                '19' => '<a style="text-decoration:none;color:black;font-family:pr19;">落日飞行体</a>',
                '20' => '<a style="text-decoration:none;color:black;font-family:pr20;">汉仪细中圆</a>',
            ),
            '13',
            _t('后台ZFonts字体库配置'),
            _t('<p style="font-size:14px;color:rgb(153,153,153)">选择喜爱的字体，应用在网站中</p>')
        );
        if($ztfs=='JSON')
        $HTMarket = new Radio(
            'HTMarket',
            array(
                '1' => '<a style="text-decoration:none;color:black;font-family:pr1;">'.$jsex->Names[0]->n1.'</a>',
                '2' => '<a style="text-decoration:none;color:black;font-family:pr2;">'.$jsex->Names[0]->n2.'</a>',
                '3' => '<a style="text-decoration:none;color:black;font-family:pr3;">'.$jsex->Names[0]->n3.'</a>',
                '4' => '<a style="text-decoration:none;color:black;font-family:pr4;">'.$jsex->Names[0]->n4.'</a>',
                '5' => '<a style="text-decoration:none;color:black;font-family:pr5;">'.$jsex->Names[0]->n5.'</a>',
                '6' => '<a style="text-decoration:none;color:black;font-family:pr6;">'.$jsex->Names[0]->n6.'</a>',
                '7' => '<a style="text-decoration:none;color:black;font-family:pr7;">'.$jsex->Names[0]->n7.'</a>',
                '8' => '<a style="text-decoration:none;color:black;font-family:pr8;">'.$jsex->Names[0]->n8.'</a>',
                '9' => '<a style="text-decoration:none;color:black;font-family:pr9;">'.$jsex->Names[0]->n9.'</a>',
                '10' => '<a style="text-decoration:none;color:black;font-family:pr10;">'.$jsex->Names[0]->n10.'</a>',
                '11' => '<a style="text-decoration:none;color:black;font-family:pr11;">'.$jsex->Names[0]->n11.'</a>',
                '12' => '<a style="text-decoration:none;color:black;font-family:pr12;">'.$jsex->Names[0]->n12.'</a>',
                '13' => '<a style="text-decoration:none;color:black;font-family:pr13;">'.$jsex->Names[0]->n13.'</a>',
                '14' => '<a style="text-decoration:none;color:black;font-family:pr14;">'.$jsex->Names[0]->n14.'</a>',
                '15' => '<a style="text-decoration:none;color:black;font-family:pr15;">'.$jsex->Names[0]->n15.'</a>',
                '16' => '<a style="text-decoration:none;color:black;font-family:pr16;">'.$jsex->Names[0]->n16.'</a>',
                '17' => '<a style="text-decoration:none;color:black;font-family:pr17;">'.$jsex->Names[0]->n17.'</a>',
                '18' => '<a style="text-decoration:none;color:black;font-family:pr18;">'.$jsex->Names[0]->n18.'</a>',
                '19' => '<a style="text-decoration:none;color:black;font-family:pr19;">'.$jsex->Names[0]->n19.'</a>',
                '20' => '<a style="text-decoration:none;color:black;font-family:pr20;">'.$jsex->Names[0]->n20.'</a>',
            ),
            '13',
            _t('后台ZFonts字体库配置'),
            _t('<p style="font-size:14px;color:rgb(153,153,153)">选择喜爱的字体，应用在网站中</p>')
        );
        $form->addInput($HTMarket);
        $ztitle = new Typecho_Widget_Helper_Layout();
        $ztitle->html(_t('<h4>GoogleFonts配置</h4><hr>'));
        $form->addItem($ztitle);
        $QTGI = new Text(
            'QTGI',
            null, null,
            '前台"嵌入字体"代码',
            '<p style="font-size:14px;color:rgb(153,153,153)">将GoogleFonts中的"嵌入字体"代码粘贴于此&nbsp;<a href="https://www.yuque.com/cne56w/oshxg3/mgrtz2#FiNT2">配置文档</a></p>');
        $form->addInput($QTGI);
        $QTGC = new Text(
            'QTGC',
            null, null,
            '前台"在CSS中指定字体"代码',
            '<p style="font-size:14px;color:rgb(153,153,153)">将GoogleFonts中的"在CSS中指定字体"代码粘贴于此&nbsp;<a href="https://www.yuque.com/cne56w/oshxg3/mgrtz2#FiNT2">配置文档</a></p>');
        $form->addInput($QTGC);
        $HTGI = new Text(
            'HTGI',
            null, null,
            '后台"嵌入字体"代码',
            '<p style="font-size:14px;color:rgb(153,153,153)">将GoogleFonts中的"嵌入字体"代码粘贴于此&nbsp;<a href="https://www.yuque.com/cne56w/oshxg3/mgrtz2#FiNT2">配置文档</a></p>');
        $form->addInput($HTGI);
        $HTGC = new Text(
            'HTGC',
            null, null,
            '后台"在CSS中指定字体"代码',
            '<p style="font-size:14px;color:rgb(153,153,153)">将GoogleFonts中的"在CSS中指定字体"代码粘贴于此&nbsp;<a href="https://www.yuque.com/cne56w/oshxg3/mgrtz2#FiNT2">配置文档</a></p>');
        $form->addInput($HTGC);
        $ztitle = new Typecho_Widget_Helper_Layout();
        $ztitle->html(_t('<h4>有字库配置</h4><hr>'));
        $form->addItem($ztitle);
        $QTYZK = new Text(
            'QTYZK',
            null, null,
            '前台有字库AccessKey',
            '<p style="font-size:14px;color:rgb(153,153,153)">在此填写有字库AccessKey&nbsp;<a href="https://www.yuque.com/cne56w/oshxg3/mgrtz2#nRPWk">配置文档</a></p>');
        $form->addInput($QTYZK);
        $HTYZK = new Text(
            'HTYZK',
            null, null,
            '后台有字库AccessKey',
            '<p style="font-size:14px;color:rgb(153,153,153)">在此填写有字库AccessKey&nbsp;<a href="https://www.yuque.com/cne56w/oshxg3/mgrtz2#nRPWk">配置文档</a></p>');
        $form->addInput($HTYZK);
        $ztitle = new Typecho_Widget_Helper_Layout();
        $ztitle->html(_t('<h4>自定义配置</h4><hr>'));
        $form->addItem($ztitle);
        $QTFontStyle = new Text(
            'QTFontStyle',
            null, null,
            '前台自定义字体',
            '<p style="font-size:14px;color:rgb(153,153,153)">请将字体存在网站根目录，仅支持ttf,woff,woff2三种字体格式，其他格式均无效&nbsp;<a href="https://www.yuque.com/cne56w/oshxg3/mgrtz2#CHFON">配置文档</a></p>');
        $form->addInput($QTFontStyle);
        $HTFontStyle = new Text(
            'HTFontStyle',
            null, null,
            '后台自定义字体',
            '<p style="font-size:14px;color:rgb(153,153,153)">请将字体存在网站根目录，仅支持ttf,woff,woff2三种字体格式，其他格式均无效&nbsp;<a href="https://www.yuque.com/cne56w/oshxg3/mgrtz2#CHFON">配置文档</a></p>');
        $form->addInput($HTFontStyle);
        $TYK = new Radio(
            'TYK',
            array(
                '0' => _t('JSON'),
                '1' => _t('CDN'),
            ),
            '1',
            _t('ZFonts静态文件加载方式'),
            _t('选择ZFonts文件加载方式')
        );
        $form->addInput($TYK);
        $fontUrl = Helper::options()->pluginUrl . '/ZFonts/libs/fonts/';
        $NewYs = new Textarea(
            'NewYs',
            null,$fontUrl,
            'ZFonts静态文件加载源',
            '<p style="font-size:14px;color:rgb(153,153,153)">在此填写ZFonts静态文件加载源&nbsp;<a href="https://www.yuque.com/cne56w/oshxg3/mgrtz2#TA8DY">配置文档</a></p>');
        $form->addInput($NewYs);
    }
    public static function personalConfig(Typecho_Widget_Helper_Form $form){}
    public static function frontdesk()
    {
        $open=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->QT;
        $fs=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->QTFS;
        $yzkey=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->QTYZK;
        $type=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->QTFontStyle;
        $gooi=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->QTGI;
        $goot=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->QTGC;
        $pubf=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->QTMarket;
        $newyy=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->NewYs;
        $tyk=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->TYK;
        ZFonts_Action::fro($type,$fs,$pubf,$open,$yzkey,$gooi,$goot,$newyy,$tyk);
    }
    public static function backstage()
    {
        $fs=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->HTFS;
        $yzkey=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->HTYZK;
        $type=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->HTFontStyle;
        $gooi=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->HTGI;
        $goot=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->HTGC;
        $pubf=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->HTMarket;
        $open=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->HT;
        $newyy=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->NewYs;
        $tyk=Typecho_Widget::widget('Widget_Options')->plugin('ZFonts')->TYK;
        ZFonts_Action::bac($type,$fs,$pubf,$open,$yzkey,$gooi,$goot,$newyy,$tyk);
    }
}

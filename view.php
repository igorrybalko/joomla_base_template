<?php
/**
 * @package joomla_base_template
 * @author Rybalko Igor
 * @version 0.9.1
 * @copyright (C) 2018 http://wolfweb.com.ua
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
*/
// no direct access
defined('_JEXEC') or die('Restricted access');
?>

<!doctype html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#fcb016">
    <link href="/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon" />
    <jdoc:include type="head" />
    <link href="<?php echo JURI::base() ?>templates/<?php echo $this->template ?>/css/style.css" type="text/css" rel="stylesheet">
    <script src="<?php echo JURI::base() ?>templates/<?php echo $this->template ?>/js/app.min.js"></script>
</head>

<body class="site <?php echo $bodyclass; ?>">

    <div class="globwrap">

            <header class="header">
                <div class="wrap">
                    <div class="logo">
                        <a href="<?php echo JURI::base(); ?>"></a>
                    </div>
                    <div class="topmenu">
                        <jdoc:include type="modules" name="topmenu" style="none" />
                    </div>
                    <div class="lang">
                        <jdoc:include type="modules" name="lang" style="none" />
                    </div>
                </div>
            </header>

            <main role="main" class="main">

                <?php if($this->countModules('bread')){ ?>
                    <div class="bread">
                        <div class="wrap">
                            <jdoc:include type="modules" name="bread" style="none" />
                        </div>
                    </div>
                <?php } ?>
                <div class="wrap main_wrap">

                    <div class="clearfix">
                        <div class="wrap_component <?php echo $sidebar; ?>">
                            <jdoc:include type="message" />
                            <jdoc:include type="component" />
                        </div>
                        <?php if($this->countModules('sidebar')){ ?>
                            <div class="sidebar">
                                <jdoc:include type="modules" name="sidebar" style="html5" />
                            </div>
                        <?php } ?>
                    </div>
                </div>

            </main>
        </div>
       
    </div>
    <footer class="footer">
        <div class="wrap">
            <div class="topfoot">
                <div class="footinfo">
                    <jdoc:include type="modules" name="footinfo" style="none" />
                </div>
            </div>
            <div class="botfoot">
                <div class="copy">
                    &reg; <?php echo JText::_('COPYRIGHT') . ' ' . date("Y");?>
                </div>
                <div class="footmenu">
                    <jdoc:include type="modules" name="footmenu" style="none" />
                </div>
        </div>
    </footer>
</body>
</html>
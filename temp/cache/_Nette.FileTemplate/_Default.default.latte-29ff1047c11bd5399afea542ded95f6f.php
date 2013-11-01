<?php //netteCache[01]000382a:2:{s:4:"time";s:21:"0.09323200 1383325344";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:60:"/var/www/si1/app/FrontModule/templates/Default/default.latte";i:2;i:1375917386;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: /var/www/si1/app/FrontModule/templates/Default/default.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'f364l62q6c')
;
// prolog Nette\Latte\Macros\UIMacros
//
// block content
//
if (!function_exists($_l->blocks['content'][] = '_lbdde1def8f4_content')) { function _lbdde1def8f4_content($_l, $_args) { extract($_args)
?><ul>
	<li><a href="<?php echo htmlSpecialChars($_control->link("addItem")) ?>"><code>addItem</code></a> - link to view <code>addItem</code> in current presenter</li>
	<li><a href="<?php echo htmlSpecialChars($_control->link("CatalogList:")) ?>"><code>CatalogList:</code></a> - link to presenter <code>CatalogList</code> in current module and view <code>default</code></li>
	<li><a href="<?php echo htmlSpecialChars($_control->link("Export:Default:xml")) ?>
"><code>Export:Default:xml</code></a> - link to presenter <code>Default</code> in <code>Export</code> submodule and view <code>xml</code></li>
	<li><a href="<?php echo htmlSpecialChars($_control->link(":Admin:Default:")) ?>
"><code>:Admin:Default:</code></a> - link to presenter <code>Default</code> in <code>Admin</code> module (view <code>default</code>)</li>
</ul>
<?php
}}

//
// end of blocks
//

// template extending and snippets support

$_l->extends = empty($template->_extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $template->_extended = $_extended = TRUE;


if ($_l->extends) {
	ob_start();

} elseif (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
if ($_l->extends) { ob_end_clean(); return Nette\Latte\Macros\CoreMacros::includeTemplate($_l->extends, get_defined_vars(), $template)->render(); }
call_user_func(reset($_l->blocks['content']), $_l, get_defined_vars()) ; 
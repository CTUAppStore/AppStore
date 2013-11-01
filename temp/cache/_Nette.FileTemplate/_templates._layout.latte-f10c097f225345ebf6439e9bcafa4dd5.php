<?php //netteCache[01]000374a:2:{s:4:"time";s:21:"0.59007700 1383325351";s:9:"callbacks";a:2:{i:0;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:9:"checkFile";}i:1;s:52:"/var/www/si1/app/AdminModule/templates/@layout.latte";i:2;i:1375917386;}i:1;a:3:{i:0;a:2:{i:0;s:19:"Nette\Caching\Cache";i:1;s:10:"checkConst";}i:1;s:25:"Nette\Framework::REVISION";i:2;s:30:"80a7e46 released on 2013-08-08";}}}?><?php

// source file: /var/www/si1/app/AdminModule/templates/@layout.latte

?><?php
// prolog Nette\Latte\Macros\CoreMacros
list($_l, $_g) = Nette\Latte\Macros\CoreMacros::initRuntime($template, 'd8xrax3gx3')
;
// prolog Nette\Latte\Macros\UIMacros

// snippets support
if (!empty($_control->snippetMode)) {
	return Nette\Latte\Macros\UIMacros::renderSnippets($_control, $_l, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Modules demo</title>
	<link rel="stylesheet" media="screen" href="<?php echo htmlSpecialChars($basePath) ?>/css/site.css" />
</head>

<body>
	<h1>Modules demo</h1>

	<div id="path">
		<span id="module"><?php echo Nette\Templating\Helpers::escapeHtml($moduleName, ENT_NOQUOTES) ?>
<span id="presenter"><?php echo Nette\Templating\Helpers::escapeHtml($presenterName, ENT_NOQUOTES) ?>
:<span id="view"><?php echo Nette\Templating\Helpers::escapeHtml($viewName, ENT_NOQUOTES) ?></span></span></span>
	</div>

	<fieldset>
		<legend>This is layout template <code><?php echo Nette\Templating\Helpers::escapeHtml($template->replace($template->getFile(), $root), ENT_NOQUOTES) ?></code></legend>

		<fieldset>
			<legend>This is content block template <code><?php echo Nette\Templating\Helpers::escapeHtml($template->replace($presenter->template->getFile(), $root), ENT_NOQUOTES) ?></code></legend>
<?php Nette\Latte\Macros\UIMacros::callBlock($_l, 'content', $template->getParameters()) ?>
		</fieldset>


		<h2>Absolute links</h2>
		<ul>
			<li><a href="<?php echo htmlSpecialChars($_control->link(":Front:Default:")) ?>
"><code>:Front:Default:</code></a> - link to presenter <code>Front:Default</code></li>
			<li><a href="<?php echo htmlSpecialChars($_control->link(":Admin:Default:")) ?>
"><code>:Admin:Default:</code></a> - link to presenter <code>Admin:Default</code></li>
		</ul>
	</fieldset>
</body>
</html>

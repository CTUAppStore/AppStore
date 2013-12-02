<?php

/*! \mainpage AppStore Dokumentace

    \section sect1 Popis
    Tato aplikace je semestrální projekt předmětu BI-SI1 na <a href="http://fit.cvut.cz">ČVUT FIT</a>.

    Webová aplikace umožnující nákup a následné stahování aplikací.<br/>
    Podmínkou k nákupu aplikací je registrace uživatele, která mu zároveň dovolí aplikace hodnotit a psát komentáře.<br/>
    V systému působí administrátoři, kteří spravují vkládané aplikace a dohlížejí na komentáře uživatelů.

    \section sect2 Použité technologie
    Aplikace je napsaná v jazyce PHP s pomocí <a href="http://nette.org/">Nette</a> frameworku.<br/>
    Ke běhu aplikace je také nutná MySQL databáze.

    \section sect4 Odkazy
    \li <a href="https://trac.project.fit.cvut.cz/AppStore">TracWiki</a> Wiki projektu
    \li <a href="https://svn.project.fit.cvut.cz/AppStore">SVN</a> Soukromý SVN repositář (obsahuje doplňující dokumentaci)
    \li <a href="https://github.com/CTUAppStore/AppStore/">GitHub</a> Veřejný Git repositář ve kterém probíhá vývoj samotné aplikace

    \section sect5 Autoři
    \li Jan Karafiát
    \li Michal Novák
    \li Filip Kodýtek
    \li Aleš Saska
    \li David Rosca

*/


// Load Nette Framework or autoloader generated by Composer
require __DIR__ . '/../libs/autoload.php';


$configurator = new Nette\Config\Configurator;

// Enable Nette Debugger for error visualisation & logging
//$configurator->setDebugMode(TRUE);
$configurator->enableDebugger(__DIR__ . '/../log');

// Specify folder for cache
$configurator->setTempDirectory(__DIR__ . '/../temp');

// Enable RobotLoader - this will load all classes automatically
$configurator->createRobotLoader()
	->addDirectory(__DIR__)
	->addDirectory(__DIR__ . '/../libs')
	->register();

// Create Dependency Injection container from config.neon file
$configurator->addConfig(__DIR__ . '/config/config.neon');
$configurator->addConfig(__DIR__ . '/config/config.local.neon', $configurator::NONE); // none section
$container = $configurator->createContainer();

return $container;

<?php

if (isset($_GET['page'])) {
	require_once './Twig/Autoloader.php';
	Twig_Autoloader::register();

	$loader = new Twig_Loader_Filesystem('./templates');
	$twig = new Twig_Environment($loader);
	$twig->addExtension(new Twig_Extensions_Extension_I18n());
	$twig->addExtension(new Twig_Extensions_Extension_Text());

	$template = $twig->loadTemplate($_GET['page'].'.html.twig');
	echo $template->render(array());
} else {
	$pages = array('home' => 'home /',
		'speakers' => 'speakers /speakers/',
		'speaker' => 'speaker /speaker/name-surname/',
		'archive' => 'archive /archive/[tag/[page/[?other-filters]]]',
		'article' => 'article /article-name/',
		'statements' => 'statements /statements/[tag/[page/[?other-filters]]]',
		'statement' => 'statement /statement/id/',
		'static-page' => 'static page /page-name/',
		'search' => 'search /search/?q=search-query[&other-filters]'
	);

	echo '<ul>';
	foreach($pages as $page => $desc) {
		list($name, $link) = explode(' ', $desc);
		echo '<li><a href="./?page='.$page.'">'.$name.'</a> '.$link.'</li>';
	}
	echo '</ul>';
}

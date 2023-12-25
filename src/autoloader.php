<?php

function autoloadGenFilename(string $className): ?string {
	$parts = explode('\\', $className);

	if (!$parts) return null;

    $filename = __DIR__ . '/' . implode('/', $parts) . '.php';

    if (file_exists($filename)) return $filename;

	return null;
}

spl_autoload_register(function (string $className) {
	$filename = autoloadGenFilename($className);

	if (!$filename) $filename = autoloadGenFilename($className, false);

	if ($filename) include_once($filename);
});

<?phprequire __DIR__ . '/../config.php';$value = 3666;$second = new \Nemundo\Core\Time\Second($value);(new \Nemundo\Core\Debug\Debug())->write($second->getText());
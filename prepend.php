<?php
require_once __DIR__.'/vendor/autoload.php';

use SebastianBergmann\CodeCoverage\CodeCoverage;

$coverage = new CodeCoverage;
//白名单配置，具体需要收集的目录
$coverage->filter()->addDirectoryToWhitelist(dirname($_SERVER['DOCUMENT_ROOT']).'/app');

$coverage->start($_SERVER['REQUEST_URI'] ?? "coverage");

register_shutdown_function(function (CodeCoverage $coverage){
    $coverage->stop();
    $cov = '<?php return unserialize('.var_export(serialize($coverage), true).');';
    file_put_contents(__DIR__.'/storage/coverage/site.'.date('U').'.'.uniqid().'.cov', $cov);
    //system(__DIR__."/vendor/bin/phpcov merge --html=".__DIR__."/storage/coverage_html ".__DIR__."/storage/coverage");
}, $coverage);

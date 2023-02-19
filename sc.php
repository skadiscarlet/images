<?php
    class Test {

    }
    $phar = new Phar('phar.phar');
    $phar -> startBuffering();
    $phar -> setStub('GIF89a'.'<?php __HALT_COMPILER();?>');   //设置stub，增加gif文件头
    $phar ->addFromString('test.gif','GIF89axxxxx');  //添加要压缩的文件
    $object = new Test();
    $phar -> setMetadata($object);  //将自定义meta-data存入manifest
    $phar -> stopBuffering();
?>
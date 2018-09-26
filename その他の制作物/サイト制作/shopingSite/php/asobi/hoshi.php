<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <title>あの星は！</title>
</head>
<body>

  <?php

    $mbango = $_POST['mbango'];

    $hoshi['M1'] = 'かに星雲';
    $hoshi['M31'] = 'アンドロメダ星雲';
    $hoshi['M42'] = 'オリオン星雲';
    $hoshi['M45'] = 'スバル';
    $hoshi['M57'] = 'ドーナツ星雲';

    foreach ($hoshi as $key => $value) {
      print $key. 'は' .$value;
      print '<br>';
    }
    print '<br>';
    print 'あなたが選んだ星は';
    print $hoshi[$mbango];

   ?>

</body>
</html>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?=$this->siteTitle(); ?></title>
    <link rel="stylesheet" href="<?=PROOT?>css/bootstrap.min.css" media="screen" title="no title" charset="utf-8">
    <link rel="stylesheet" href="<?=PROOT?>css/custom.css" media="screen" title="no title" charset="utf-8">
    <script src="<?=PROOT?>js/jQuery-3.3.1.min.js"></script>
    <script src="<?=PROOT?>js/bootstrap.min.js.map"></script>

    <?php echo $this->content('head'); ?>

  </head>
  <body>
    <?php echo $this->content('body'); ?>
  </body>
</html>

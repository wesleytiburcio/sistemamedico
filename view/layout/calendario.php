<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Calendario - datepicker</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" ></script>

    <link  href="css/bootstrap-datepicker.css" rel="stylesheet" type="text/css">
    <script src="js/bootstrap-datepicker.min.js"></script>
    <script src="js/bootstrap-datepicker.pt-BR.min.js"></script>
  </head>

  <body>
    <div class="container">
    <h4>Cadastrar Data</h4>
      
    <form class="form-horizontal" method="post">
      <div class="form-group">
        <label class="col-sm-2 col-form-label">Data</label>
        <div class="col-sm-10">
          <div class="input-group date">
            <input type="text" class="form-control" name="exemplo" id="exemplo">
            <div class="input-group-addon">
                <span class="glyphicon glyphicon-calendary"></span>
            </div>
          </div>
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-10">
          <button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button>
        </div>
      </div>
    </form>
    </div>

    <script type="text/javascript">
      $('#exemplo').datepicker({
      format: 'dd/mm/yyyy',
      language:"pt-BR",
      startDate:'+0d',
      daysOfWeekDisabled:'0,6',
      });
    </script>

    <?php 
    if (isset($_POST['cadastrar'])) {
      $exemplo = $_POST['exemplo'];
      echo $exemplo;
      
     }
    ?>
    
  </body>
</html>


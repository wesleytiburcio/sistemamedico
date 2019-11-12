<?php
require_once("../model/Medico.php");
$medico = new Medico();

$connect = new PDO("mysql:host=localhost;dbname=sistemamedico", "root", "");

?>


<!DOCTYPE html>
<html>
  <head>
    <title>Consulta Teste</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
  </head>
  <body>
    <br /><br />
    <div class="container" style="width:600px;">
      <h2 align="center">Consulta Teste</h2><br /><br />
      
      <form method="post" id="insert_data">
        <label for="">Médico</label>
        <br>
        <select name="medicos" id="medicos" class="form-control" required>
          <option value="">Selecione o Médico</option>
          <?php foreach ($medico->selectAll() as $key => $value): ?>
            <option value="<?php echo $value->id_medicos; ?>"><?php echo $value->nome_medicos; ?></option>
          <?php endforeach ?>
        </select>
        <br>
        <br/>
        <select name="especialidades" id="especialidades" class="form-control action">
          <option value="">Selecione Especialidade</option>
        </select>
        <br />
        
        <input type="submit" name="insert" id="action" class="btn btn-info" value="Insert" />
      </form>
    </div>
  </body>
</html>

<script>
$(document).ready(function(){

  $('#medicos').on('change', function(){
    var medicoID = $(this).val();
    console.log(medicoID);
    
    if (medicoID) {
      $.ajax({
      url:'Fetch.php',
      method:'POST',
      data:{medicoID:medicoID},
      success:function(data)
      {
        //alert(data);
        $('#especialidades').html(data);
      }
      })
    
    } else {
      $('#especialidades').html('<option>Selecione Especialidade primeiro</option>')
    }
  });
    

  $('#insert_data').on('submit', function(event){
    event.preventDefault();
    if($('#country').val() == '')
    {
      alert("Please Select Country");
      return false;
    }
    else if($('#state').val() == '')
    {
      alert("Please Select State");
      return false;
    }
    else if($('#city').val() == '')
    {
      alert("Please Select City");
      return false;
    }
    else
    {
      $('#hidden_city').val($('#city').val());
      $('#action').attr('disabled', 'disabled');
      var form_data = $(this).serialize();
      $.ajax({
        url:"insert.php",
        method:"POST",
        data:form_data,
        success:function(data)
        {
          $('#action').attr("disabled", "disabled");
          if(data == 'done')
          {
            $('#city').html('');
            $('#city').data('plugin_lwMultiSelect').updateList();
            $('#city').data('plugin_lwMultiSelect').removeAll();
            $('#insert_data')[0].reset();
            alert('Data Inserted');
          }
        }
      });
    }
  });

});

</script>




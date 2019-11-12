<?php
$conn = mysqli_connect("localhost", "root", "", "sistemamedico");

if (isset($_POST['medicoID'])) {
  $id = $_POST['medicoID'];
  $sql = "SELECT id_esp FROM medicosespecialidades WHERE id_med = '$id' ";

  $don = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($don);

  if ($count > 0) {
    while ($row = mysqli_fetch_array($don)) {
      $espec_id = $row['id_esp'];

      $sql_espec = "SELECT * FROM especialidades WHERE id_especialidades = '$espec_id' ";
      $do = mysqli_query($conn, $sql_espec);

      while ($row = mysqli_fetch_array($do)) {
        echo '<option value="'.$row['id_especialidades'].'">'.$row['nome_especialidades'].'</option>';
      }
    }
    
  } else {
    echo '<option>Não tem especialidades</option>';
  }

} else {
  echo '<h2>Erro<h2>';
}

?>
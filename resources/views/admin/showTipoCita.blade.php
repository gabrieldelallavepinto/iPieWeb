<div class="container">
  <h3>Usuario: <?php echo $tipocita->nombre; ?></h3>
  <h4>E-mail: <?php echo $tipocita->descripcion; ?></h4>
  <table>
    <tr>
      <th>Muestra del color</th>
      <td style="background-color: <?php $tipocita->color ?>; "></td>
    </tr>


  </table>
  <a href="{{url('/admin/formTipoCita/'.$tipocita->id)}}">Editar Cita</a>
  <a href="{{url('/admin/tipocitas')}}">Lista de Citas</a>
</div>

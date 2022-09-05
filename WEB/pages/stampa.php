<?php



function StampaLotti($rs)
{
  $fieldinfo = mysqli_fetch_fields($rs);
  echo "<TABLE class='table table-hover'><thead><TR class='table-info'>";
  foreach ($fieldinfo as $val)
    printf("<TH>%s</TH>", $val->name);
  echo "</TR></thead>";
  $NumCampi = mysqli_num_fields($rs);
  echo "<tbody>";
  while ($row = mysqli_fetch_row($rs)) {
    echo "<TR class='table-secondary'>";
    for ($j = 0; $j < $NumCampi; $j++) printf("<TD>%s</TD>", $row[$j]);
    echo "</TR>";
  }
  echo "</tbody></table>";
}




function StampaLotti2($rs)
{
  $fieldinfo = mysqli_fetch_fields($rs);
  echo "<TABLE class='table table-hover'><thead><TR class='table-info'>";
  foreach ($fieldinfo as $val)
    printf("<TH>%s</TH>", $val->name);
  echo "<TH>Scelta</TH>";
  echo "</TR></thead>";
  $NumCampi = mysqli_num_fields($rs);
  echo "<tbody>";
  while ($row = mysqli_fetch_row($rs)) {
    echo "<TR class='table-secondary'>";
    for ($j = 0; $j < $NumCampi; $j++) printf("<TD>%s</TD>", $row[$j]);
    echo "<TD><input type='radio' name='lotto' value='$row[0]' required></TD>";
    echo "</TR>";
  }
  echo "</tbody></table>";
}






function StampaLotti3($rs)
{
  $fieldinfo = mysqli_fetch_fields($rs);
  echo "<TABLE class='table table-hover'><thead><TR class='table-info'>";
  foreach ($fieldinfo as $val)
    printf("<TH>%s</TH>", $val->name);
  echo "<TH>Scelta</TH>";
  echo "</TR></thead>";
  $NumCampi = mysqli_num_fields($rs);
  echo "<tbody>";
  while ($row = mysqli_fetch_row($rs)) {
    echo "<TR class='table-secondary'>";
    for ($j = 0; $j < $NumCampi; $j++) printf("<TD>%s</TD>", $row[$j]);
    echo "<TD><input type='radio' name='lotto' value='$row[0]'></TD>";
    echo "</TR>";
  }
  echo "</tbody></table>";
}



function StampaInfoPaz($rs)
{

  $fieldinfo = mysqli_fetch_fields($rs);
  echo "<TABLE class='table table-hover'><thead><TR class='table-info'>";
  foreach ($fieldinfo as $val)
    printf("<TH>%s</TH>", $val->name);
  echo "</TR></thead>";
  $NumCampi = mysqli_num_fields($rs);
  echo "<tbody>";
  while ($row = mysqli_fetch_row($rs)) {
    echo "<TR class='table-secondary'>";
    for ($j = 0; $j < ($NumCampi-1); $j++) printf("<TD>%s</TD>", $row[$j]);
    if ($row[$j]==0) echo "<TD>NON PROTETTO</TD>";
    else echo "<TD>PROTETTO</TD>";
    echo "</TR>";
  }
  echo "</tbody></table>";
}

function StampaInfoPaz2($rs)
{
  $fieldinfo = mysqli_fetch_fields($rs);
  echo "<TABLE class='table table-hover'><thead><TR class='table-info'>";
  foreach ($fieldinfo as $val)
    if ($val->name != "Username") printf("<TH>%s</TH>", $val->name);
  echo "<TH>Scelta</TH>";
  echo "</TR></thead>";
  $NumCampi = mysqli_num_fields($rs);
  echo "<tbody>";
  while ($row = mysqli_fetch_row($rs)) {
    echo "<TR class='table-secondary'>";
    for ($j = 1; $j < ($NumCampi-1); $j++) printf("<TD>%s</TD>", $row[$j]);
    if ($row[$j]==0) echo "<TD>NON PROTETTO</TD>";
    else echo "<TD>PROTETTO</TD>";
    echo "<TD><input type='radio' name='paz' value='$row[0]' ></TD>";
    echo "</TR>";
  }
  echo "</tbody></table>";
}

function StampaRichiami($rs){

$fieldinfo = mysqli_fetch_fields($rs);
  echo "<TABLE class='table table-hover'><thead><TR class='table-info'>";
  foreach ($fieldinfo as $val)
    printf("<TH>%s</TH>", $val->name);
  echo "</TR></thead>";
  $NumCampi = mysqli_num_fields($rs);
  echo "<tbody>";
  $p=0;
  while ($row = mysqli_fetch_row($rs)) {
    echo "<TR class='table-secondary'>";
    for ($j = 0; $j < $NumCampi; $j++) printf("<TD>%s</TD>", $row[$j]);
    echo "<input type=hidden value=".$row[0]." name='utente[".$p."]'>";
    $p++;
    echo "</TR>";
  }
  echo "</tbody></table>";
}
?>

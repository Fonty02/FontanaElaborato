<html>
<?php

function calcola($dbname, $link, $cognome, $nome, $DG, $DMn, $DA, $gender, $comune)
{
      $DMn--;
      $vocali = array("A", "E", "I", "O", "U");
      $alfabetoMesi = array(
            'A', 'B', 'C', 'D', 'E',
            'H', 'L', 'M', 'P', 'R',
            'S', 'T'
      );

      $alfabeto = array(
            'A', 'B', 'C', 'D', 'E',
            'F', 'G', 'H', 'I', 'J',
            'K', 'L', 'M', 'N', 'O',
            'P', 'Q', 'R', 'S', 'T',
            'U', 'V', 'W', 'X', 'Y', 'Z'
      );

      // Caratteri posizione dispari
      $PD['0'] = 1;
      $PD['B'] = 0;
      $PD['M'] = 18;
      $PD['X'] = 25;
      $PD['1'] = 0;
      $PD['C'] = 5;
      $PD['N'] = 20;
      $PD['Y'] = 24;
      $PD['2'] = 5;
      $PD['D'] = 7;
      $PD['O'] = 11;
      $PD['Z'] = 23;
      $PD['3'] = 7;
      $PD['E'] = 9;
      $PD['P'] = 3;
      $PD['4'] = 9;
      $PD['F'] = 13;
      $PD['Q'] = 6;
      $PD['5'] = 13;
      $PD['G'] = 15;
      $PD['R'] = 8;
      $PD['6'] = 15;
      $PD['H'] = 17;
      $PD['S'] = 12;
      $PD['7'] = 17;
      $PD['I'] = 19;
      $PD['T'] = 14;
      $PD['8'] = 19;
      $PD['J'] = 21;
      $PD['U'] = 16;
      $PD['9'] = 21;
      $PD['K'] = 2;
      $PD['V'] = 10;
      $PD['A'] = 1;
      $PD['L'] = 4;
      $PD['W'] = 22;

      // Mesi
      $mese[0] = "Gennaio";
      $mese[1] = "Febbraio";
      $mese[2] = "Marzo";
      $mese[3] = "Aprile";
      $mese[4] = "Maggio";
      $mese[5] = "Giugno";
      $mese[6] = "Luglio";
      $mese[7] = "Agosto";
      $mese[8] = "Settembre";
      $mese[9] = "Ottobre";
      $mese[10] = "Novembre";
      $mese[11] = "Dicembre";
      $DM = null;
      for ($i = 0; $i < 12; $i++) if ($DMn == $i) $DM = $mese[$i];




      $query = "SELECT `city_name` FROM `cities` ORDER BY `city_name`";
      $result = mysqli_query($link, $query);

      // Il codice fiscale è formato da 7 parti
      $parte[0] = "";
      $parte[1] = "";
      $parte[2] = "";
      $parte[3] = "";
      $parte[4] = "";
      $parte[5] = "";
      $parte[6] = "";
      // CODICE PER IL COGNOME (consonanti n°1-2-3 + eventuali vocali)
      $cognome = strtoupper($cognome);
      $nvocali = preg_match_all('/[AEIOU]/i', $cognome, $matches1);
      $nconsonanti = preg_match_all('/[BCDFGHJKLMNPQRSTVWZXYZ]/i', $cognome, $matches2);
      if ($nconsonanti >= 3)  $parte[0] = $matches2[0][0] . $matches2[0][1] . $matches2[0][2];
      else {

            for ($i = 0; $i < $nconsonanti; $i++) {
                  $parte[0] = $parte[0] . $matches2[0][$i];
            }
            $n = 3 - strlen($parte[0]);
            for ($i = 0; $i < $n; $i++) {
                  $parte[0] = $parte[0] . $matches1[0][$i];
            }
            $n = 3 - strlen($parte[0]);
            for ($i = 0; $i < $n; $i++)  $parte[0] = $parte[0] . "X";
      }

      // CODICE PER IL NOME (consonanti n°1-3-4, oppure 1-2-3 se sono 3; se sono meno di 3: vocali)
      $nome = strtoupper($nome);
      $nvocali = preg_match_all('/[AEIOU]/i', $nome, $matches1);
      $nconsonanti = preg_match_all('/[BCDFGHJKLMNPQRSTVWZXYZ]/i', $nome, $matches2);
      if ($nconsonanti >= 4) $parte[1] = $matches2[0][0] . $matches2[0][2] . $matches2[0][3];
      else if ($nconsonanti == 3)  $parte[1] = $matches2[0][0] . $matches2[0][1] . $matches2[0][2];
      else {
            for ($i = 0; $i < $nconsonanti; $i++) {
                  $parte[1] = $parte[1] . $matches2[0][$i];
            }
            $n = 3 - strlen($parte[1]);
            for ($i = 0; $i < $n; $i++) {
                  $parte[1] = $parte[1] . $matches1[0][$i];
            }
            $n = 3 - strlen($parte[1]);
            for ($i = 0; $i < $n; $i++)  $parte[1] = $parte[1] . "X";
      }

      // CODICE ANNO (Ultime 2 cifre dell'anno)
      $arrAnno = str_split($DA);
      $parte[2] = $arrAnno[2] . $arrAnno[3];

      // CODICE MESE (A = Gennaio, B = Febbraio, ecc.)
      $m = array_search($DM, $mese);
      $parte[3] = $alfabetoMesi[$m];

      // CODICE GIORNO (se uomo; n. giorno (DD); altrimenti n. giorno + 40)
      if ($gender == "Maschile") $parte[4] = $DG;
      else $parte[4] = $DG + 40;
      if (strlen($parte[4]) == 1) $parte[4] = "0" . $parte[4];

      // CODICE COMUNE
      $query = "SELECT city_code_land FROM cities WHERE city_name = \"$comune\"";
      $result = mysqli_query($link, $query);
      while ($row = mysqli_fetch_row($result)) {
            $parte[5] = $row[0];
      }
      mysqli_free_result($result);

      // CODICE DI CONTROLLO ((caratteri posiz pari + posiz dispari) / 26 -> Carattere di controllo)
      $arrCOD = $parte[0] . $parte[1] . $parte[2] . $parte[3] . $parte[4] . $parte[5];
      $arrCOD = str_split($arrCOD);
      $index = count($arrCOD);
      /* posizione pari */
      $somma1 = 0;
      for ($i = 0; $i < 15; $i++)
            if (($i + 1) % 2 == 0) {
                  if (!in_array($arrCOD[$i], $alfabeto)) $somma1 += $arrCOD[$i];
                  else {
                        $n = array_search($arrCOD[$i], $alfabeto);
                        $somma1 += $n;
                  }
            }
      /* posizione dispari */
      $somma2 = 0;
      for ($i = 0; $i < 15; $i++)
            if (($i + 1) % 2 != 0) {
                  $somma2 += $PD["$arrCOD[$i]"];
            }
      $somma = $somma1 + $somma2;
      $parte[6] = ($somma % 26);
      $parte[6] = $alfabeto[$parte[6]];
      // OUTPUT
      $CF = $parte[0] . "" . $parte[1] . "" . $parte[2] . "" . $parte[3] . "" . $parte[4] . "" . $parte[5] . "" . $parte[6];
      return $CF;
} ?>

</body>

</html>
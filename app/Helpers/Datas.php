<?php

namespace App\Helpers;

use Carbon\Carbon;

class Datas
{

  static public function mesAtual()
  {
    return Carbon::now()->monthName;
  }

  static public function nomeDoDia()
  {
    date_default_timezone_set('America/Sao_Paulo');
    setlocale(LC_ALL, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');
    setlocale(LC_TIME, 'pt_BR.utf-8', 'ptb', 'pt_BR', 'portuguese-brazil', 'portuguese-brazilian', 'bra', 'brazil', 'br');

    $date = Carbon::now();
    return $date->localeDayOfWeek;
  }

  static public function nomeDiasDaSemana()
  {
    $dia = array();

    $dia = [
      "Segunda-feira",
      "Terça-feira",
      "Quarta-feira",
      "Quinta-feira",
      "Sexta-feira",
      "Sábado",
      "Domingo"
    ];

    $hoje = Carbon::now()->dayOfWeekIso;

    if ($hoje > 5) {
      $hoje = 0;
    }

    $diaLiberado = $hoje + 2;

    return $dia;
  }
}

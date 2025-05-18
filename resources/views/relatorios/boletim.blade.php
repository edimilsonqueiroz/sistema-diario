<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>SISEDU-DIARIO - Boletim</title>
    <style>
        *{
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }

        body h1{
            text-align: center;
        }

        .tabela-boletim, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }

        .tabela-identidade td{
             border-collapse: collapse;
        }

        header{
            text-align: center;
            padding-left: 180px;
        }

        .identificacao-municipio{
            text-align: center;
        }

        b{
            margin: 20px;
        }
        
    </style>
</head>

<body>
    <header>
        <img width="400" height="80" src="imagens/logopalmeirante.png" alt="" srcset="">
    </header>
    <div class="identificacao-municipio">
        <div>PREFEITURA MUNICIPAL DE PALMEIRANTE</div>
        <div>SECRETARIA MUNICIPAL DE EDUCAÇÃO</div>
    </div>
    
    <h1>BOLETIM ESCOLAR</h1>
    <table class="tabela-identidade">
        <tr>
            @foreach($turma->school()->get() as $school)
            <td style="text-align: left; border:0;"><b style="margin-left: 0;">ESCOLA:</b> {{$school->name}}</td>
            @endforeach
            
            <td style="text-align: left; border:0;"><b>ANO LETIVO:</b>{{$turma->year}} </td>
            
        </tr>
        <tr>
            <td style="text-align: left; border:0;"><b style="margin-left: 0;">NOME DO ALUNO:</b>{{$student->name}}</td>
            
            <td style="text-align: left; border:0;"><b>TURMA:</b> {{$turma->name}}</td>
            
        </tr>
    </table>
    <table class="tabela-boletim" style="width:100%">
        <tr>
            <th rowspan="2">Disciplinas</th>
            <td colspan="2">1º BIMESTRE</td>
            <td colspan="2">2º BIMESTRE</td>
            <td colspan="2">3º BIMESTRE</td>
            <td colspan="2">4º BIMESTRE</td>
            <td colspan="2" rowspan="2">MEDIA FINAL</td>
        </tr>
        <tr>
            <td>NOTA</td>
            <td>FALTA</td>
            <td>NOTA</td>
            <td>FALTA</td>
            <td>NOTA</td>
            <td>FALTA</td>
            <td>NOTA</td>
            <td>FALTA</td>
        </tr>
        @foreach($notas as $nota)
        <tr>
            <td style="text-align: left; padding-left: 5px;">{{$nota->discipline()->first()->name}}</td>
           
            <td>{{$nota->bimonthly_1}}</td><!-- NOTA -->
            <td>2</td><!-- FALTA -->
            
          
            <td>{{$nota->bimonthly_2}}</td><!-- NOTA -->
            <td>2</td><!-- FALTA -->
           
            
            <td>{{$nota->bimonthly_3}}</td><!-- NOTA -->
            <td>1</td><!-- FALTA -->
          
          
            <td>{{$nota->bimonthly_4}}</td><!-- NOTA -->
            <td>2</td><!-- FALTA -->
          
            <td colspan="2">{{$nota->average}}</td>
           
        </tr>
        @endforeach
    </table>

</body>
</html>
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
            @foreach($student->turmas()->get() as $turma_school)
            @foreach($turma_school->school()->get() as $school)
            <td style="text-align: left; border:0;"><b style="margin-left: 0;">ESCOLA:</b> {{$school->name}}</td>
            @endforeach
            @endforeach
            @foreach($student->turmas()->get() as $turma_ano)
            <td style="text-align: left; border:0;"><b>ANO LETIVO:</b> {{$turma_ano->year}}</td>
            @endforeach
        </tr>
        <tr>
            <td style="text-align: left; border:0;"><b style="margin-left: 0;">NOME DO ALUNO:</b>{{$student->name}}</td>
            @foreach($student->turmas()->get() as $turma)
            <td style="text-align: left; border:0;"><b>TURMA:</b> {{$turma->name}}</td>
            @endforeach
        </tr>
    </table>
    <table class="tabela-boletim" style="width:100%">
        <tr>
            <th rowspan="2">Disciplinas</th>
            <td colspan="2">1º BIMESTRE</td>
            <td colspan="2">2º BIMESTRE</td>
            <td colspan="2">3º BIMESTRE</td>
            <td colspan="2">4º BIMESTRE</td>
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
        <tr>
            <td style="text-align: left; padding-left: 5px;">Lingua Portuguesa</td>
            <td>8,5</td>
            <td>2</td>
            <td>7,5</td>
            <td>0</td>
            <td>7,5</td>
            <td>0</td>
            <td>7,5</td>
            <td>0</td>
        </tr>
        <tr>
            <td style="text-align: left; padding-left: 5px;">Matemática</td>
            <td>8,5</td>
            <td>2</td>
            <td>7,5</td>
            <td>0</td>
            <td>7,5</td>
            <td>0</td>
            <td>7,5</td>
            <td>0</td>
        </tr>
        <tr>
            <td style="text-align: left; padding-left: 5px;">História</td>
            <td>8,5</td>
            <td>2</td>
            <td>7,5</td>
            <td>0</td>
            <td>7,5</td>
            <td>0</td>
            <td>7,5</td>
            <td>0</td>
        </tr>
    </table>

</body>
</html>
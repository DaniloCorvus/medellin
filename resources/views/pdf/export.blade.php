<html>

<head>
    <style>
        body {
            font-family: sans-serif;
        }

        @page {
            margin: 160px 50px;
        }

        header {
            position: fixed;
            left: 0px;
            top: -110px;
            right: 0px;
            height: 100px;
            background-color: #ddd;
            text-align: center;
        }
        
        /* th {
            border: 1px solid black;
        } */
        
        table, th {
            border-collapse: collapse;
            border: 1px solid black;
            text-align: center;
        }

        .mycenter {
            text-align: center;
            width: 100%;
        }

        /* content {
            border: 1px solid #333;
            background-color: #ddd;
            text-align: center;
        } */


        .danger {
            background-color: rgb(235, 179, 179);
            padding: 3px
        }

        .corral {
            color: rgb(30, 73, 167);
            margin: 15px;
            display: block;
            width: 100%;
        }

        header h1 {
            margin: 30px 0;
        }

        header h2 {
            margin: 0 0 10px 0;
        }

    </style>

<body>
    <header>
        <h1>Reporte de animales por Corrales </h1>
    </header>

    <div id="content">
        @foreach ($barnyards as $item)

            <div class="mycenter"> <span class="corral">{{ $item->name }}</span>
                <div>

                    <table style="width:100%">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Edad</th>
                                <th>Peligroso?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($item->animals as $animal)
                                <tr class="{{ $animal->danger ? 'danger' : '' }} ">
                                    <td>{{ $animal->name }}</td>
                                    <td>{{ $animal->age }} años </td>
                                    <td>{{ $animal->danger ? 'Si' : 'No' }} </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        @endforeach
</body>

</html>

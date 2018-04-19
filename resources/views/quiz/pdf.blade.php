<!DOCTYPE html>
<html>
<head>
	<title>Report Hasil Quiz</title>
	<style type="text/css">
	table {
    border-collapse: collapse;
    border: 1px solid red;
    margin-bottom: 1em;
    width: auto;
    align : center;
}

table tr {
    page-break-inside: avoid;
}

table thead tr td {
    background-color: #F0F0F0;
    border: 1px solid #DDDDDD;
    min-width: 0.6em;
    padding: 5px;
    text-align: center;
    vertical-align: top;
    font-weight: bold;
}

table tbody tr td {
    border: 1px solid #DDDDDD;
    min-width: 0.6em;
    padding: 5px;
    vertical-align: top;
}

tbody tr.even td {
    background-color: transparent;

	</style>
</head>
<body>
<center>
<h3>Hasil Quiz {{ $quiz->judul }} </h3>

	<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Jumlah Benar</th>
            <th>Nilai</th>
            <th>Total Waktu</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($hasil as $item)
        <tr>
            <td class="text-center">{{ $loop->iteration }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ $item->jumlah_benar }}</td>
            <td>{{ $item->nilai }}</td>
            <td>{{ $item->total_waktu }} Detik</td>
        </tr>
    @endforeach
        
    </tbody>
</table>
</center>

</body>
</html>
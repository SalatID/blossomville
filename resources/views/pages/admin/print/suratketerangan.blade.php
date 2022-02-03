<html>
    <head>
        <title>Surat Keterangan</title>
    </head>
    <body>
        <table width="100%">
            <tr>
                <td colspan="2">
                    <img src="https://www.blossomvillecitraraya.com/dashboard/assets/img/kop-{{sprintf('%02d',$dataSurat->id_rt)}}.png" width="100%" alt="">
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <h1 style="text-align: center">Surat Keterangan</h1>
                    <p style="text-align: center">Nomor : {{$dataSurat->letter_no}}</p>
                    <p>
                        @php
                            $month = [
                                'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'
                            ];
                        @endphp
                        Yang bertanda tangan dibawah ini Ketua RT.02/RW.016 Blossomville,  Kel. Mekar Bakti Kec. Panongan menerangkan bahwa : <br>
                        <table>
                            <tr>
                                <td width="130px">Nama</td>
                                <td width="5px">:</td>
                                <td>{{$dataSurat->full_name}}</td>
                            </tr>
                            <tr>
                                <td width="130px">Tempat/ Tgl. Lahir</td>
                                <td width="5px">:</td>
                                <td>{{$dataSurat->place_birth}}/{{date('d',strtotime($dataSurat->date_birth))}} {{$month[(date('n',strtotime($dataSurat->date_birth))+1)]}} {{date('Y',strtotime($dataSurat->date_birth))}}</td>
                            </tr>
                            <tr>
                                <td width="130px">Jenis kelamin</td>
                                <td width="5px">:</td>
                                <td>{{$dataSurat->gende=='male'?'Laki-Laki':'Perempuan'}}</td>
                            </tr>
                            <tr>
                                <td width="130px">Nomor KTP</td>
                                <td width="5px">:</td>
                                <td>{{$dataSurat->nik}}</td>
                            </tr>
                            <tr>
                                <td width="130px">Kewarganegaraan</td>
                                <td width="5px">:</td>
                                <td>WNI / WNA</td>
                            </tr>
                            <tr>
                                <td width="130px">Agama</td>
                                <td width="5px">:</td>
                                <td>{{$dataSurat->religion}}</td>
                            </tr>
                            <tr>
                                <td width="130px">Status Perkawinan</td>
                                <td width="5px">:</td>
                                <td>{{$dataSurat->marriage}}</td>
                            </tr>
                            <tr>
                                <td width="130px">Pekerjaan</td>
                                <td width="5px">:</td>
                                <td>{{$dataSurat->job}}</td>
                            </tr>
                            <tr>
                                <td width="130px">Alamat</td>
                                <td width="5px">:</td>
                                <td>Blossomville Blok {{$dataSurat->block}}/ {{$dataSurat->house_number}} RT.{{sprintf('%03d',$dataSurat->id_rt)}}/RW.016
                                    Kel. Mekar Bakti, Kec. Panongan, Kab. Tangerang</td>
                            </tr>
                        </table>
                        <br>
Bahwa nama yang tersebut diatas adalah benar warga RT.{{sprintf('%03d',$dataSurat->id_rt)}}/RW016, Kel. Mekar Bakti, Kec. Panongan, Kab. Tangerang.
Demikian surat keterangan ini dibuat untuk dipergunakan sesuai dengan peruntukannya.

                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:right">Blossomville, {{date('d')}} {{$month[(date('n')+1)]}} {{date('Y')}} </td>
            </tr>
            <tr>
                <td> <br></td>
            </tr>
            <tr>
                <td style="text-align: center">
                    <b>Pemohon</b>
                    <br>
                    <br>
                    <br>
                    <br>
                    <b>{{strtoupper($dataSurat->full_name)}}</b>
                </td>
                <td style="text-align: center">
                    <b>Ketua RT {{sprintf('%03d',$dataSurat->id_rt)}} <br>
                    Blossom Ville</b>
                    <br>
                    <br>
                    <br>
                    <br>
                    <b>{{strtoupper($dataSurat->rt_name)}}</b>
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    <b>Mengetahui <br>
                    Ketua RW.016 BLOSSOMVILLE</b>
                    <br>
                    <br>
                    <br>
                    <br>
                    <b>AJI KUSNORO</b>
                </td>
            </tr>
        </table>
    </body>
</html>
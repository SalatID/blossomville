<html>
    <head>
        <title>Surat Keterangan</title>
    </head>
    <body>
        <table width="100%">
            <tr>
                <td colspan="2">
                    <img src="https://www.blossomvillecitraraya.com/dashboard/assets/img/kop-{{sprintf('%02d',$dataSurat->id_rt)}}.png" alt="">
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
Nama			 : {{$dataSurat->full_name}} <br>
Tempat/ Tgl. Lahir	 : {{$dataSurat->place_birth}}/{{date('d',strtotime($dataSurat->date_birth))}} {{$month[(date('n',strtotime($dataSurat->date_birth))+1)]}} {{date('Y',strtotime($dataSurat->date_birth))}}<br>
Jenis kelamin		 : {{$dataSurat->gende=='male'?'Laki-Laki':'Perempuan'}} <br>
Nomor KTP		 : {{$dataSurat->nik}} <br>
Kewarganegaraan	 : WNI / WNA <br>
Agama			 : {{$dataSurat->religion}} <br>
Status Perkawinan	 : {{$dataSurat->marriage}} <br>
Pekerjaan		 : {{$dataSurat->job}} <br>
Alamat			: Blossomville Blok {{$dataSurat->block}}/ {{$dataSurat->house_number}} RT.{{sprintf('%03d',$dataSurat->id_rt)}}/RW.016
			  Kel. Mekar Bakti, Kec. Panongan, Kab. Tangerang <br>
Bahwa nama yang tersebut diatas adalah benar warga RT.02/RW016, Kel. Mekar Bakti, Kec. Panongan, Kab. Tangerang.
Demikian surat keterangan ini dibuat untuk dipergunakan sesuai dengan peruntukannya.

                    </p>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">
                    Pemohon
                    <br>
                    <br>
                    <br>
                    <br>
                    {{strtoupper($dataSurat->full_name)}}
                </td>
                <td style="text-align: center">
                    Ketua RT {{sprintf('%03d',$dataSurat->id_rt)}} <br>
                    Blossom Ville
                    <br>
                    <br>
                    <br>
                    <br>
                    {{strtoupper($dataSurat->rt_name)}}
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: center">
                    Mengetahui <br>
                    Ketua RW.016 BLOSSOMVILLE
                    <br>
                    <br>
                    <br>
                    <br>
                    AJI KUSNORO
                </td>
            </tr>
        </table>
    </body>
</html>
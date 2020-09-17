<?php

use Illuminate\Database\Seeder;

use App\Member;

class MemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-090873-1006',
            'name' => 'I MADE ARIANTO',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);
        
        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-180464-1024',
            'name' => 'I KETUT ARYANA',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-220769-1002',
            'name' => 'NI PUTU LILIK ANDAYANI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-050667-1030',
            'name' => 'NI PUTU DEWI LEONI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-050703-1025',
            'name' => 'LUH ADE SARI CITRAWATI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-070899-1004',
            'name' => 'PUTU AGUS WIDIARTHA WIGUNA',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-100977-1014',
            'name' => 'I MADE GEDE PARIMARTA',
            'address' => 'test',
            'bank' => 'BRI',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-230469-1029',
            'name' => 'PUTU INDAH WAHYUNI SE',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-240476-1016',
            'name' => 'IDA AYU AGUNG EKASTUTI',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-040571-1031',
            'name' => 'NI MADE SUDERNI',
            'address' => 'test',
            'bank' => 'SINARMAS',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-230481-1032',
            'name' => 'PUTU ROBBY RUDITA',
            'address' => 'test',
            'bank' => 'BRI',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => '2',
            'name' => 'Posma',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF03-010495-1002',
            'name' => 'RATIH WULANDARI',
            'address' => 'test',
            'bank' => 'SIMAS-EMONEY',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-190472-1022',
            'name' => 'NI MADE RESMIATI. A. PAR.',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-110170-1027',
            'name' => 'MADE JUNIARI',
            'address' => 'test',
            'bank' => 'BPD',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-220603-1005',
            'name' => 'KENI',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => '1',
            'name' => 'AFRI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'RMF01-260699-1023',
            'name' => 'I KADEK YOGA ADI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            // 'code' => 'KTP',
            'name' => 'YOSEVINA',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'IR. LINAWATI CANDRA',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'KADEK WIRMANDIYANTHI',
            'address' => 'test',
            'bank' => 'BNI',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'ANAK AGUNG INTAN RATNASARI',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'ANNE KRISTANTI',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'GUSTI KOMANG ADITYA',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'NI KOMANG JULIANA',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'NYOMAN SUTRISNI HANDAYANI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'KADEK PENDY MULYAWATI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'BOGGIE AHMAD DWI PUTRA',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'ANTIE',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'NI MADE DEWI YANI',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'NI LUH GEDE SRI MARTINI',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'NGURAH GEDE ALAPURNA SE',
            'address' => 'test',
            'bank' => 'BRI',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'NI LUH PUTU KAMAYANI',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'NI PUTU SUWENDEWI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'ANDRIANA',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'PAK ERIK',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'I GEDE DEVA AGUS KRISNA',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'I KADEK AGUS LEONARDI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'I KADEK KRISNA ADI DARMAWAN',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'IDA AYU OKA SRI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'NI WAYAN NADILA PUTRI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'SALVINUS DARMIN',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'ANAK AGUNG AYU WARTINI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'PUTU SUDIASA',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'KLEMENSIUS BAHAL',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'I GST.LN.VIRA PARAMITHA',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'RITA HERLIANI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'NI MADE AGUSTINI / kadek tohpati',
            'address' => 'test',
            'bank' => 'BRI',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'I GUSTI AYU KASTILANI',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'DEBIE AGUSANTHI HARTONO',
            'address' => 'test',
            'bank' => '',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'I NYOMAN ADIANA',
            'address' => 'test',
            'bank' => 'BNI',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'CYNTHIA MIRANDA',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

        Member::create([
            'code' => Member::generateMemberCode('RS'),
            'name' => 'PUTU SINTYA ARTIKAYANTI',
            'address' => 'test',
            'bank' => 'BCA',
            'status' => 'Reseller'
        ]);

    }
}

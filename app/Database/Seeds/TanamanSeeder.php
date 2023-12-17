<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class TanamanSeeder extends Seeder
{
  public function run()
  {
    $data = [
      [
        'namaTanaman'          => 'Kangkung',
        'deskripsi' => 'Kangkung adalah sejenis sayuran hijau yang biasa dimasak sebagai lalap atau tumisan. Kangkung termasuk ke dalam suku tumbuhan berbunga, Amaranthaceae, yang berasal dari Asia Tenggara. Kangkung memiliki nama ilmiah Ipomoea aquatica.',
        'image'         => 'kangkung.jpg',
      ],
      [
        'namaTanaman'          => 'Bayam',
        'deskripsi' => 'Bayam adalah sejenis sayuran yang biasa dimasak sebagai lalap atau tumisan. Bayam termasuk ke dalam suku tumbuhan berbunga, Amaranthaceae, yang berasal dari Asia Tenggara. Bayam memiliki nama ilmiah Ipomoea aquatica.',
        'image'         => 'bayam.jpg',
      ],
      [
        'namaTanaman'   => 'Tauge Panjang',
        'deskripsi'     => 'Tauge panjang adalah tunas biji kecambah yang tumbuh dari kacang hijau (Vigna radiata). Tumbuhan ini termasuk dalam keluarga Fabaceae dan sering digunakan sebagai sumber protein nabati dalam berbagai hidangan kuliner di Asia.',
        'image'         => 'tauge_panjang.jpg',
    ],
    [
        'namaTanaman'   => 'Kentang Dieng Siomay',
        'deskripsi'     => 'Kentang Dieng Siomay merupakan varietas kentang dengan ciri khas tertentu yang sering dijadikan bahan utama dalam pembuatan siomay, hidangan kuliner khas Indonesia. Kentang (Solanum tuberosum) termasuk dalam keluarga Solanaceae.',
        'image'         => 'kentang.jpg',
    ],
    [
        'namaTanaman'   => 'Asparagus',
        'deskripsi'     => 'Asparagus (Asparagus officinalis) adalah tanaman yang menghasilkan batang halus yang biasa dikonsumsi sebagai sayuran. Tanaman ini termasuk dalam keluarga Asparagaceae dan dikenal karena rasa dan teksturnya yang lezat.',
        'image'         => 'asparagus.jpg',
    ],
    [
        'namaTanaman'   => 'Terong Ungu',
        'deskripsi'     => 'Terong ungu (Solanum melongena) adalah varietas terong yang ditandai dengan warna ungu pada kulitnya. Terong ini umumnya digunakan dalam berbagai masakan dan termasuk dalam keluarga Solanaceae.',
        'image'         => 'terong.jpg',
    ],
    [
        'namaTanaman'   => 'Bawang Merah',
        'deskripsi'     => 'Bawang merah (Allium cepa) adalah jenis bawang yang memiliki warna merah khas. Tanaman ini termasuk dalam keluarga Amaryllidaceae dan sering digunakan sebagai bumbu dalam masakan.',
        'image'         => 'bawang-merah.jpg',
    ],
    [
        'namaTanaman'   => 'Labu Acar',
        'deskripsi'     => 'Labu acar (Cucurbita pepo) adalah varietas labu yang sering digunakan untuk membuat acar, sebuah hidangan yang melibatkan proses fermentasi berbagai sayuran. Tanaman ini termasuk dalam keluarga Cucurbitaceae.',
        'image'         => 'labu-acar.jpg',
    ],
    [
        'namaTanaman'   => 'Buncis',
        'deskripsi'     => '(Phaseolus vulgaris) adalah jenis tanaman kacang-kacangan yang menghasilkan polong panjang. Tanaman ini termasuk dalam keluarga Fabaceae dan sering dimasak sebagai sayuran.',
        'image'         => 'buncis.jpg',
    ],
    [
        'namaTanaman'   => 'Sawi Putih',
        'deskripsi'     => 'Sawi putih (Brassica rapa subsp. pekinensis) adalah varietas sawi yang memiliki daun berwarna putih dan batang yang lembut. Tanaman ini termasuk dalam keluarga Brassicaceae dan umumnya digunakan dalam masakan Asia dan Eropa.',
        'image'         => 'sawi.jpg',
    ],
    [
        'namaTanaman'   => 'Brokoli',
        'deskripsi'     => 'Brokoli (Brassica oleracea var. italica) adalah sayuran yang memiliki kepala bunga yang kompak. Tanaman ini termasuk dalam keluarga Brassicaceae dan merupakan sumber nutrisi yang kaya.',
        'image'         => 'brokoli.jpg',
    ],
    [
        'namaTanaman'   => 'Wortel Barastagi',
        'deskripsi'     => 'Wortel Berastagi (Daucus carota) adalah varietas wortel yang dikenal dengan rasa manisnya. Wortel termasuk dalam keluarga Apiaceae dan sering dikonsumsi segar atau dimasak dalam berbagai hidangan.',
        'image'         => 'wortel.jpg',
    ],
    ];

    $this->db->table('tanaman')->insertBatch($data);
  }
}

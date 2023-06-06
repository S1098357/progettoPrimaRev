<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seeder_promozioni extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $aziende = DB::table('aziendas')->pluck('idAzienda');

        $oggettiCoupon = [
            'Sconto su prodotto specifico',
            'Sconto sull\'intero carrello',
            'Buono regalo',
            'Spedizione gratuita',
            'Omaggio aggiuntivo',
            'Sconto per l\'acquisto successivo',
            '3 per 2',
        ];
        $luoghiFruizione = [
            'Negozi fisici',
            'Sito web',
            'App mobile',
            'Punti vendita',
            'E-commerce',
        ];

        $nomePromozioni = [
          'promo1',
          'promo2',
          'promo3',
          'promo4',
          'promo5',
          'promo6',
          'promo7'

        ];

        for ($i = 1; $i <= 10; $i++) {
            $aziendaId = $aziende->random();
            $oggettoCoupon = $oggettiCoupon[array_rand($oggettiCoupon)];
            $modalitaSconto = $this->getModalitaSconto($oggettoCoupon);
            $scontistica = $this->getScontistica($modalitaSconto);
            $luogoFruizione = $luoghiFruizione[array_rand($luoghiFruizione)];
            $nomePromozione = $nomePromozioni[array_rand($nomePromozioni)];


            $tempoFruizione = mt_rand(1, 30) . ' giorni'; // Genera un valore casuale di fruizione da 1 a 30 giorni


            DB::table('promozione')->insert([
                'idAzienda' => $aziendaId,
                'oggetto' => $oggettoCoupon,
                'modalità' => $modalitaSconto,
                'scontistica' => $scontistica,
                'luogoFruizione' => $luogoFruizione,
                'dataScadenza' => '12/12/2023',
                'nomePromozione'=> $nomePromozione

            ]);
        }
    }

    /**
     * Ottieni la modalità di sconto in base all'oggetto del coupon.
     *
     * @param string $oggettoCoupon
     * @return string
     */
    private function getModalitaSconto($oggettoCoupon)
    {
        return match ($oggettoCoupon) {
            'Sconto su prodotto specifico' => 'Sconto percentuale',
            'Sconto sull\'intero carrello' => 'Sconto percentuale',
            'Buono regalo' => 'Importo fisso',
            'Spedizione gratuita' => 'Sconto fisso',
            'Omaggio aggiuntivo' => 'Omaggio',
            'Sconto per l\'acquisto successivo' => 'Sconto percentuale',
            '3 per 2' => 'Sconto multiplo',
            default => '',
        };
    }

    /**
     * Ottieni il valore di scontistica in base alla modalità di sconto.
     *
     * @param string $modalitaSconto
     * @return string
     */
    private function getScontistica($modalitaSconto)
    {
        return match ($modalitaSconto) {
            'Sconto percentuale' => mt_rand(0, 100) . '%',
            'Importo fisso' => '€' . mt_rand(1, 100),
            'Sconto fisso' => '€' . mt_rand(1, 10),
            'Omaggio' => 'Omaggio aggiuntivo',
            'Sconto multiplo' => '3 per 2',
            default => '',
        };
    }
}



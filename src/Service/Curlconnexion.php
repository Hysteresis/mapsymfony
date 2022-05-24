<?php
// src/Service/curlconnexion.php
namespace App\Service;

class Curlconnexion
{
    /**
     * retourne une ville et un code postal
     *
     * @param string $town
     * @param string $codepostal
     * @return array
     */
    public function connexionapi($town, $codepostal): array
    {
        

        $url = 'https://nominatim.openstreetmap.org/search?country=france&city=' . $town . '&postalcode=' . $codepostal .'&format=json'; //url à laquelle on fait la demande et qui renverra une réponse

            $ch = curl_init(); //initialisation du cURL

            curl_setopt($ch, CURLOPT_URL, $url); //On pointe vers l'URL
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); //On demande qu'une réponse soit retournée
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Permet de retirer la vérification SSL (si il y en a une)
            curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Linux; Android 6.0; Nexus 5 Build/MRA58N) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/101.0.4951.67 Mobile Safari/537.36');
            $reponse = curl_exec($ch); // On stock la réponse retournée dans une variable
            
            if($reponse === false){ //Verifie l'erreur retournée
                echo 'Error : ' . curl_error($ch);
            } 

            $status = curl_getinfo($ch, CURLINFO_HTTP_CODE); // Code du status de la réponse (200 si ça marche)
            echo $status;
            curl_close($ch); // Fermeture du cURL (ne pas le faire provoque une fuite de données et une utilisation de la mémoire du serveur)

            $reponse = json_decode($reponse, true); // La réponse est en json on la décode

            // dd($reponse);

        return $reponse;
    }
}
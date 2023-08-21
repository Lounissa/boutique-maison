<?php
namespace App\EntityEventListener;

use App\Entity\User;


class UserPersistEventListener{

    //=================propriétés ===================//

    private $encryptSecret;

    //======================constructeur ============//

    public function __construct(string $encryptSecret)
    {
        $this->encryptSecret = $encryptSecret;

    }

    //========================méthodes ==================//
    public function prePersist(User $user): void {
        // on déclarel'algorithme de cryptage 
        $cypher = "aes-256-gcm";
        $key = $this->encryptSecret;
        // on crée une clé d'encryption spécifique à l'utilisateur
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($cypher));
        // on ajoute la clé (iv) à l'utilisateur
        $user->setSecretIv(base64_encode($iv)); // on encode en base64 pour pouvoir le 
        // stocker en BDD parce que la clé contient des caractères spéciaux instockables dans une BDD
        // on crypte le prénom de l'utilisateur
        if(!is_null($user->getPrenom())){
            $prenom = $user->getPrenom();
            $prenomCrypte = openssl_encrypt($prenom, $cypher, $key, 0, $iv, $tag);
            $finalPrenomCrypte = base64_encode($tag.$prenomCrypte);
            $user->setPrenom($finalPrenomCrypte);
        }
        if(!is_null($user->getNom())){
            $nom = $user->getNom();
            $nomCrypte = openssl_encrypt($nom, $cypher, $key, 0, $iv, $tag);
            $finalNomCrypte = base64_encode($tag.$nomCrypte);
            $user->setNom($finalNomCrypte);
        }

    }

}
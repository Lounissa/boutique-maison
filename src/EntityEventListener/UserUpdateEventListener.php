<?php
namespace App\EntityEventListener;

use App\Entity\User;


class UserUpdateEventListener{

    //=================propriétés ===================//

    private $encryptSecret;

    //======================constructeur ============//

    public function __construct(string $encryptSecret)
    {
        $this->encryptSecret = $encryptSecret;

    }

    //========================méthodes ==================//
    public function preUpdate(User $user): void {
        // on déclarel'algorithme de cryptage 
        $cypher = "aes-256-gcm";
        $key = $this->encryptSecret;
               // on récupère la clé d'encryption spécifique a l'utilisateur
        $iv = base64_decode($user->getSecretIv());
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
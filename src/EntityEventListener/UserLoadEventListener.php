<?php

namespace App\EntityEventListener;

use App\Entity\User;

class UserLoadEventListener 
{
    //=====================propriétés ================//

    private $encryptSecret;

    //==================constructeur =====================//

    public function __construct(string $encryptSecret)
    {
        $this->encryptSecret = $encryptSecret;
    }
    //===================méthodes ====================//

    public function postLoad(User $user){
        $key = $this->encryptSecret;
        $cypher = "aes-256-gcm";
        // on  récupère la clé d'encryption spécifique à l'utilisateur 
        $iv = base64_decode($user->getSecretIv());
        // on décrypte ce qui a été crypté 
        if(!is_null($user->getPrenom())){
            $datas = base64_decode($user->getPrenom());
            // on récupère le tag qui a servi à crypter 
            $tag = substr($datas, 0, 16);
            $prenomCrypte = substr($datas, 16);
            // on décrypte 
            $prenom = openssl_decrypt($prenomCrypte, $cypher, $key, 0, $iv, $tag);
            $user->setPrenom($prenom);

        }

        if(!is_null($user->getNom())){
            $datas = base64_decode($user->getNom());
            // on récupère le tag qui a servi à crypter 
            $tag = substr($datas, 0, 16);
            $nomCrypte = substr($datas, 16);
            // on décrypte 
            $nom = openssl_decrypt($nomCrypte, $cypher, $key, 0, $iv, $tag);
            $user->setNom($nom);

        }
    }

}
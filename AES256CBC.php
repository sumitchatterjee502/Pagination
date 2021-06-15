<?php

class AES256CBC{
    
    public static function encryption($data){
        
        // CREATE ENCRYPTION KEY
        $encryptionKey = openssl_random_pseudo_bytes(32);
        
        // CONVERT ENCRYPTION KEY BIN TO HEX
        $encryptionKeyHex = bin2hex($encryptionKey);
        
        // SET ENCRYPTION KEY TO SESSION
        //$_SESSION['AESEncryptionKey'] = $encryptionKeyHex;
        
        // CREATE IV
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
        
        // CONVERT IV KEY BIN TO HEX
        $ivHex = bin2hex($iv);
        
        // ENCRYPTED DATA
        $encryptedData = openssl_encrypt($data, 'aes-256-cbc', $encryptionKey, 0, $iv);
        
        // BASE64 ENCODE
        $returnData = base64_encode($encryptedData."|".$encryptionKeyHex."|".$ivHex);

        return $returnData;
    } 
    
    public static function decryption($data){
        
        // DECODE BASE64 DECODE
        $data = base64_decode($data);
       
        // EXPLODE ORIGINAL DATA
        $arrayData = explode("|", $data);
        
        // FETCH ENCRYPTED DATA FROM ARRAY
        $encryptedData = $arrayData[0];
        
        // FETCH ENCRYPTED KEY FROM ARRAY (HEX FORMAT)
        $encryptionKeyHex = $arrayData[1];
        
        // CONVERT ENCRYPTED KEY HEX TO BIN
        $encryptionKey = hex2bin($encryptionKeyHex);
        
        // FETCH IV FROM ARRAY (HEX FORMAT)
        $ivHex = $arrayData[2];
        
        // CONVERT IV HEX TO BIN
        $iv = hex2bin($ivHex);
        
        $decryptedData = openssl_decrypt($encryptedData, 'aes-256-cbc', $encryptionKey, 0, $iv);
        
        return $decryptedData;
    }
}
?>

<?php
    const salt = 'информации о более сложной обработке строк обратитесь';

    function passwordHasher($password){
        return sha1(salt . $password . salt);
    }
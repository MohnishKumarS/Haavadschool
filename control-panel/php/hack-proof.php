<?php
    // Hack proof 
    function hackProof ($data) {
        $data = trim ($data);
        $data = htmlspecialchars ($data);
        return $data;
    }
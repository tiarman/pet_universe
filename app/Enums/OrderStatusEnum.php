<?php
    namespace App\Enums;

    enum OrderStatusEnum{
        const ACTIVE        = 'accept';
        const CANCEL        = 'cancel';
        const PENDING       = 'pending';
        const DELIVERED     = 'delivered';
    }
?>
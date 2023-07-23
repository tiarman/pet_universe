<?php
    namespace App\Enums;

    enum OrderStatusEnum{
        const ACTIVE        = 'accept';
        const CANCEL        = 'cancel';
        const INREVIEW      = 'in-review';
        const DELIVERED     = 'delivered';
    }
?>
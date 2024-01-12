<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;
use App\Filters\PelangganAuthFilter;
use App\Filters\StaffAuthFilter;
use CodeIgniter\Filters\CSRF;
use CodeIgniter\Filters\DebugToolbar;
use CodeIgniter\Filters\Honeypot;
use CodeIgniter\Filters\InvalidChars;
use CodeIgniter\Filters\SecureHeaders;

class Filters extends BaseConfig
{
    public array $aliases = [
        'csrf'          => CSRF::class,
        'toolbar'       => DebugToolbar::class,
        'honeypot'      => Honeypot::class,
        'invalidchars'  => InvalidChars::class,
        'secureheaders' => SecureHeaders::class,
        'pelanggan'     => PelangganAuthFilter::class,
        'staff'         => StaffAuthFilter::class,
    ];

    public array $globals = [
        'before' => [
            // ...
        ],
        'after' => [
            // ...
        ],
    ];

    public array $methods = [];

    public array $filters =  
    [
        'staff' => ['before' => ['admin/staff*','admin/pelanggan*','admin/produk*','admin/galerifoto*','admin/testimoni*','admin/omset*','admin/transaksi*' ]],
        'pelanggan' => ['before' => ['/checkout','/riwayatedit']],
    ];    
}


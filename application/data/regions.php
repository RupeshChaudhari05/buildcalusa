<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Approximate residential construction labor-cost index by region
 * (U.S. national average = 1.00). Derived from relative construction
 * trade wages; used only to scale the default labor rates.
 * Format: code => [label, index]
 */
return [
    'US' => ['U.S. national average', 1.00],
    'AL' => ['Alabama', 0.85], 'AK' => ['Alaska', 1.25], 'AZ' => ['Arizona', 0.95],
    'AR' => ['Arkansas', 0.84], 'CA' => ['California', 1.25], 'CO' => ['Colorado', 1.05],
    'CT' => ['Connecticut', 1.15], 'DE' => ['Delaware', 1.05], 'DC' => ['District of Columbia', 1.20],
    'FL' => ['Florida', 0.93], 'GA' => ['Georgia', 0.90], 'HI' => ['Hawaii', 1.30],
    'ID' => ['Idaho', 0.92], 'IL' => ['Illinois', 1.15], 'IN' => ['Indiana', 0.95],
    'IA' => ['Iowa', 0.93], 'KS' => ['Kansas', 0.90], 'KY' => ['Kentucky', 0.90],
    'LA' => ['Louisiana', 0.88], 'ME' => ['Maine', 0.97], 'MD' => ['Maryland', 1.05],
    'MA' => ['Massachusetts', 1.22], 'MI' => ['Michigan', 1.00], 'MN' => ['Minnesota', 1.08],
    'MS' => ['Mississippi', 0.83], 'MO' => ['Missouri', 0.98], 'MT' => ['Montana', 0.95],
    'NE' => ['Nebraska', 0.90], 'NV' => ['Nevada', 1.08], 'NH' => ['New Hampshire', 1.02],
    'NJ' => ['New Jersey', 1.20], 'NM' => ['New Mexico', 0.90], 'NY' => ['New York', 1.25],
    'NC' => ['North Carolina', 0.88], 'ND' => ['North Dakota', 0.95], 'OH' => ['Ohio', 0.98],
    'OK' => ['Oklahoma', 0.87], 'OR' => ['Oregon', 1.10], 'PA' => ['Pennsylvania', 1.05],
    'RI' => ['Rhode Island', 1.10], 'SC' => ['South Carolina', 0.87], 'SD' => ['South Dakota', 0.88],
    'TN' => ['Tennessee', 0.89], 'TX' => ['Texas', 0.92], 'UT' => ['Utah', 0.95],
    'VT' => ['Vermont', 0.98], 'VA' => ['Virginia', 0.98], 'WA' => ['Washington', 1.15],
    'WV' => ['West Virginia', 0.92], 'WI' => ['Wisconsin', 1.00], 'WY' => ['Wyoming', 0.95],
    'CA-INTL' => ['Canada', 1.05], 'GB' => ['United Kingdom', 1.10], 'IE' => ['Ireland', 1.10],
    'EU' => ['Europe (Western avg.)', 1.12], 'AU' => ['Australia', 1.15], 'NZ' => ['New Zealand', 1.05],
];

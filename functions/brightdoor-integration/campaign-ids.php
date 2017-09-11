<?php

    $source_url = $entry['source_url'];

    switch (true) {
        case (preg_match("/Beach-Bungalow/i", $source_url)):
            $primary_lead_source_id = 123;
            break;
        case (preg_match("/Beach-House/i", $source_url)):
            $primary_lead_source_id = 124;
            break;
        case (preg_match("/Brand/i", $source_url)):
            $primary_lead_source_id = 125;
            break;
        case (preg_match("/Bungalow/i", $source_url)):
            $primary_lead_source_id = 126;
            break;
        case (preg_match("/Condos/i", $source_url)):
            $primary_lead_source_id = 127;
            break;
        case (preg_match("/Cottages/i", $source_url)):
            $primary_lead_source_id = 128;
            break;
        case (preg_match("/Custom-Home/i", $source_url)):
            $primary_lead_source_id = 129;
            break;
        case (preg_match("/Home-Listing/i", $source_url)):
            $primary_lead_source_id = 130;
            break;
        case (preg_match("/Homes-for-Sale/i", $source_url)):
            $primary_lead_source_id = 132;
            break;
        case (preg_match("/Land-for-Sale/i", $source_url)):
            $primary_lead_source_id = 133;
            break;
        case (preg_match("/Luxury-Homes/i", $source_url)):
            $primary_lead_source_id = 134;
            break;
        case (preg_match("/Mansion-for-Sale/i", $source_url)):
            $primary_lead_source_id = 135;
            break;
        case (preg_match("/New-Homes/i", $source_url)):
            $primary_lead_source_id = 136;
            break;
        case (preg_match("/Plantation-Homes/i", $source_url)):
            $primary_lead_source_id = 137;
            break;
        case (preg_match("/Property-for-Sale/i", $source_url)):
            $primary_lead_source_id = 138;
            break;
        case (preg_match("/Real-Estate/i", $source_url)):
            $primary_lead_source_id = 139;
            break;
        case (preg_match("/Resort-Homes/i", $source_url)):
            $primary_lead_source_id = 140;
            break;
        case (preg_match("/Vacation-Homes/i", $source_url)):
            $primary_lead_source_id = 141;
            break;
        case (preg_match("/Villas/i", $source_url)):
            $primary_lead_source_id = 142;
            break;
        default:
            $primary_lead_source_id = 32;
    }
?>
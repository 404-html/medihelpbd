<?php

$invoices = array(
    array(
        'id' => 2,
        'invoice_number' => '1234/2015',
        'invoice_date' => '06.03.2016',
        'invoice_due_date' => '20.03.2016',
        'invoice_from_company' => 'Bailey-Lynch',
        'invoice_from_address_1' => '2808 Robson St',
        'invoice_from_address_2' => 'Vancouver, BC V6B 3K9',
        'invoice_to_company' => 'Price Ltd',
        'invoice_to_address_1' => '2894 Bond Street',
        'invoice_to_address_2' => 'Providence, RI 02908',
        'invoice_total_value' => '$3,751.50',
        'invoice_vat_value' => '$862.85',
        'invoice_services' => array(
            array(
                'service_name' => 'Website design & development',
                'service_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.',
                'service_rate' => '$25.00',
                'service_hours' => '32',
                'service_vat' => '23%',
                'service_total' => '$984.00'
            ),
            array(
                'service_name' => 'Search engine optimization',
                'service_description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab blanditiis cupiditate delectus deserunt.',
                'service_rate' => '$50.00',
                'service_hours' => '20',
                'service_vat' => '23%',
                'service_total' => '$1,230.00'
            ),
            array(
                'service_name' => 'Consulting service',
                'service_description' => 'Lorem ipsum dolor sit amet, consectetur.',
                'service_rate' => '$100.00',
                'service_hours' => '12.5',
                'service_vat' => '23%',
                'service_total' => '$1,537.50'
            )
        ),
        'invoice_payment_info' => 'BANK XYZ<br/>IBAN 123 123 123 123',
        'invoice_payment_due' => '14',
        'overdue' => true
    )
);


if(isset($_POST['invoice_id'])) {
    $invoice = array(
        'invoice' => $invoices[0]
    );
    print_r( json_encode($invoice) );
}

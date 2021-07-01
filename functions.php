add_filter( 'woocommerce_checkout_fields' , 'codeithub_add_email_verification_field_checkout' );
   
function codeithub_add_email_verification_field_checkout( $fields ) {
  
$fields['billing']['billing_email']['class'] = array( 'form-row-first' );
  
$fields['billing']['billing_em_ver'] = array(
    'label' => 'Confirm mail Address',
    'required' => true,
    'class' => array( 'form-row-last' ),
    'clear' => true,
    'priority' => 999,
);
  
return $fields;
}
  
  
add_action('woocommerce_checkout_process', 'codeithub_matching_email_addresses');
  
function codeithub_matching_email_addresses() { 
    $email1 = $_POST['billing_email'];
    $email2 = $_POST['billing_em_ver'];
    if ( $email2 !== $email1 ) {
        wc_add_notice( 'Your email addresses do not match', 'error' );
    }
}

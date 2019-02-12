<?php
/**
 * SAML 2.0 remote IdP metadata for SimpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-remote
 */

$env = (isset($_ENV['PANTHEON_ENVIRONMENT'])) ? $_ENV['PANTHEON_ENVIRONMENT'] : 'dev';

switch ($env) {
  case 'test':

    $metadata['https://fedauth.pg.com'] = array (
      'entityid' => 'https://fedauth.pg.com',
      'contacts' =>
      array (
        0 =>
        array (
          'contactType' => 'administrative',
          'company' => 'Procter and Gamble',
        ),
      ),
      'metadata-set' => 'saml20-idp-remote',
      'SingleSignOnService' =>
      array (
        0 =>
        array (
          'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
          'Location' => 'https://fedauth.pg.com/idp/SSO.saml2',
        ),
        1 =>
        array (
          'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
          'Location' => 'https://fedauth.pg.com/idp/SSO.saml2',
        ),
      ),
      'SingleLogoutService' =>
      array (
        0 =>
        array (
          'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
          'Location' => 'https://fedauth.pg.com/idp/SLO.saml2',
        ),
        1 =>
        array (
          'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
          'Location' => 'https://fedauth.pg.com/idp/SLO.saml2',
        ),
      ),
      'ArtifactResolutionService' =>
      array (
      ),
      'NameIDFormats' =>
      array (
        0 => 'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress',
      ),
      'keys' =>
      array (
        0 =>
        array (
          'encryption' => false,
          'signing' => true,
          'type' => 'X509Certificate',
          'X509Certificate' => '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',
        ),
      ),
    );

    break;
  case 'live':

    $metadata['https://fedauth.pg.com'] = array (
      'entityid' => 'https://fedauth.pg.com',
      'contacts' =>
      array (
        0 =>
        array (
          'contactType' => 'administrative',
          'company' => 'Procter and Gamble',
        ),
      ),
      'metadata-set' => 'saml20-idp-remote',
      'SingleSignOnService' =>
      array (
        0 =>
        array (
          'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
          'Location' => 'https://fedauth.pg.com/idp/SSO.saml2',
        ),
        1 =>
        array (
          'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
          'Location' => 'https://fedauth.pg.com/idp/SSO.saml2',
        ),
      ),
      'SingleLogoutService' =>
      array (
        0 =>
        array (
          'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
          'Location' => 'https://fedauth.pg.com/idp/SLO.saml2',
        ),
        1 =>
        array (
          'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
          'Location' => 'https://fedauth.pg.com/idp/SLO.saml2',
        ),
      ),
      'ArtifactResolutionService' =>
      array (
      ),
      'NameIDFormats' =>
      array (
        0 => 'urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress',
      ),
      'keys' =>
      array (
        0 =>
        array (
          'encryption' => false,
          'signing' => true,
          'type' => 'X509Certificate',
          'X509Certificate' => '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',
        ),
      ),
    );


    break;
  default:

    $metadata['https://fedauth.pg.com'] = array (
      'entityid' => 'https://fedauth.pg.com',
      'contacts' =>
      array (
        0 =>
        array (
          'contactType' => 'administrative',
          'company' => 'Procter and Gamble',
        ),
      ),
      'metadata-set' => 'saml20-idp-remote',
      'SingleSignOnService' =>
      array (
        0 =>
        array (
          'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
          'Location' => 'https://fedauth.pg.com/idp/SSO.saml2',
        ),
        1 =>
        array (
          'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
          'Location' => 'https://fedauth.pg.com/idp/SSO.saml2',
        ),
      ),
      'SingleLogoutService' =>
      array (
        0 =>
        array (
          'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
          'Location' => 'https://fedauth.pg.com/idp/SLO.saml2',
        ),
        1 =>
        array (
          'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
          'Location' => 'https://fedauth.pg.com/idp/SLO.saml2',
        ),
      ),
      'ArtifactResolutionService' =>
      array (
      ),
      'NameIDFormats' =>
      array (
        0 => 'urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified',
      ),
      'keys' =>
      array (
        0 =>
        array (
          'encryption' => false,
          'signing' => true,
          'type' => 'X509Certificate',
          'X509Certificate' => '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',
        ),
      ),
    );

    break;


}

/*
 $metadata['pg_sso_drupal'] = array (
  'SingleLogoutService' =>
  array (
    0 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://developer-dev.pg.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
    ),
    1 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:SOAP',
      'Location' => 'https://developer-dev.pg.com/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
    ),
  ),
  'AssertionConsumerService' =>
  array (
    0 =>
    array (
      'index' => 0,
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-POST',
      'Location' => 'https://developer-dev.pg.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
    ),
    1 =>
    array (
      'index' => 1,
      'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:browser-post',
      'Location' => 'https://developer-dev.pg.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp',
    ),
    2 =>
    array (
      'index' => 2,
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Artifact',
      'Location' => 'https://developer-dev.pg.com/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
    ),
    3 =>
    array (
      'index' => 3,
      'Binding' => 'urn:oasis:names:tc:SAML:1.0:profiles:artifact-01',
      'Location' => 'https://developer-dev.pg.com/simplesaml/module.php/saml/sp/saml1-acs.php/default-sp/artifact',
    ),
  ),
);


$metadata['https://developer-dev.pg.com:443/simplesaml/saml2/idp/metadata.php'] = array (
  'metadata-set' => 'saml20-idp-remote',
  'entityid' => 'https://developer-dev.pg.com:443/simplesaml/saml2/idp/metadata.php',
  'SingleSignOnService' =>
  array (
    0 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://developer-dev.pg.com:443/simplesaml/saml2/idp/SSOService.php',
    ),
  ),
  'SingleLogoutService' =>
  array (
    0 =>
    array (
      'Binding' => 'urn:oasis:names:tc:SAML:2.0:bindings:HTTP-Redirect',
      'Location' => 'https://developer-dev.pg.com:443/simplesaml/saml2/idp/SingleLogoutService.php',
    ),
  ),
  'certData' => 'MIID0jCCAroCCQCQtFcuf1CCOjANBgkqhkiG9w0BAQsFADCBqjELMAkGA1UEBhMCTVgxEzARBgNVBAgMCk51ZXZvIExlb24xEjAQBgNVBAcMCU1vbnRlcnJleTESMBAGA1UECgwJQWNjZW50dXJlMRMwEQYDVQQLDApUZWNobm9sb2d5MRYwFAYDVQQDDA1hY2NlbnR1cmUuY29tMTEwLwYJKoZIhvcNAQkBFiJyLmxhLnRvcnJlLmNlcnZhbnRlc0BhY2NlbnR1cmUuY29tMB4XDTE4MDgxMzE5NTI1NloXDTI4MDgxMjE5NTI1NlowgaoxCzAJBgNVBAYTAk1YMRMwEQYDVQQIDApOdWV2byBMZW9uMRIwEAYDVQQHDAlNb250ZXJyZXkxEjAQBgNVBAoMCUFjY2VudHVyZTETMBEGA1UECwwKVGVjaG5vbG9neTEWMBQGA1UEAwwNYWNjZW50dXJlLmNvbTExMC8GCSqGSIb3DQEJARYici5sYS50b3JyZS5jZXJ2YW50ZXNAYWNjZW50dXJlLmNvbTCCASIwDQYJKoZIhvcNAQEBBQADggEPADCCAQoCggEBALibvMlxNaJM1juA1OIBU+1ZMYyJJ4gtWIbxhUE+hLschk6Psr2+qN3+InMqvPxDmf9Ubbs0vXjD/x0hCg/n1G6xzHUMq52fJj6d7IicXEFekfgCUsXRmS3Yw4W1bEuM8RRH70J2w9EntL2klm4kEJHk9GMJkEbbJgcxGRF7xVk8hTLqyvlWNJjxu6eWlOI4Zq92/yN+DVXdB+rAOcfMCQ2EwqBYAiaFFyigmfaO4xeF9mRZAR1p/DwlSQ56HkVfJQhYLTOAGm4MmchkbFyoWIr5LTShifGT6r7mJQTvXBjpOLXEYwOhCcgz+tHO6+5D4Uwe6vJq4cbxeAnQnEO5EhsCAwEAATANBgkqhkiG9w0BAQsFAAOCAQEAp8cquyXRVJqhR4+yaS8z5B3veS4G5qX68lExMcmCE1il6dTHf6l2d+iqzMs6kmp7k+RoUtm1Ji+dxpfdOs7LDTiCiiS5Z09XdWdljjQzWpEzisk7A/Y+0M9bwmJuBntiZ1JOVNk+lUKUfAkFyYI1gLh+vfDZ792twoa9g6OPZ/lidUmesrZAQu79TaVxCmvxQSlcrViN//GUXjzQAGTJm5HKKXULrkKVpU1Xih8a1ZQBkD93qnpJhEUveTYMhuc7k4At5I6JwYZ1owVTP/YJt2P3VKl1ZQuiaD1H7GyM/IuBtpi85ZbhnAuDwFB6RnfEg+Yi4/Jcj44APt5hBGP2Yg==',
  'NameIDFormat' => 'urn:oasis:names:tc:SAML:2.0:nameid-format:transient',
);
*/

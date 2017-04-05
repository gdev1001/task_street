1. Install your mediawiki

2. Add line $wgGroupPermissions['*']['delete']=true; to your LocalSettings.php

3. Add line

return true;

before line

if ( $tokenObj->match( $token ) )

in file includes/api/ApiBase.php
   (1286 line in file)

4. Add path to your mediawiki api (file config/app.php)
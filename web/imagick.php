<?php
$original_image = new Imagick('uploads/images/companies/logos/kitchen-appliance-centre.gif');
		    
// Process the thumbnail
$thumbnail = $original_image->clone();
$thumbnail->thumbnailImage(80, 80, true);
$thumbnail->writeImage('uploads/images/companies/logos/MINI-kitchen-appliance-centre.gif');

echo '<p><img src="/uploads/images/companies/logos/kitchen-appliance-centre.gif" /></p>';

echo '<p><img src="/uploads/images/companies/logos/MINI-kitchen-appliance-centre.gif" /></p>';
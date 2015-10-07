<?php

/**
 * @author lolkittens
 * @copyright 2014
 */

include('../class/config.php');
include('../class/class_subject_load.php');
$id=$_GET['id'];
$load = new SubjectLoad();

?>
<?php foreach($load->sectionData($id) as $a): ?>
<option value="<?php echo $a['section_id'] ?>"><?php echo $a['name'] ?></option>
<?php endforeach; ?>
<h3>This is my own Area </h3>
<p><?= $this->input("description") ?></p>


<?php if($this->dataArray) { ?>

<table class="basetable mybasetable">
   <?php $data = $this->dataArray[0]; ?>

   <thead><tr>
   <?php foreach($data as $title => $value) { ?>
      <td><?= $title ?> </td>
   <?php } ?>
   </tr></thead>

   <?php foreach($this->dataArray as $data) { ?>
      <tr>
         <?php foreach($data as $title => $value) { ?>
             
            <?php if(is_array($value)) { ?>
               <td><?= implode(", ", $value) ?></td>
            <?php } else { ?>
               <td><?= $value ?></td>
            <?php } ?>


         <?php } ?>
      </tr>

   <?php } ?>
</table>

<?php } ?>
<div class="gridRecord">
  <div class="photo">
      <img src="templates/imgs/<?=conDisplay($row, "strPhoto")?>">
  </div>
  <!-- we moved our isset check into a function in our main.php file -->
  <span><?=conDisplay($row, "strName")?></span>
  <span><?=conDisplay($row, "nPrice")?></span>
  <span><?=conDisplay($row, "strBody")?></span>


</div>
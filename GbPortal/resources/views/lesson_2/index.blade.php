<h2>Вывод цифр от 0 до 10.</h2>
<?php if(isset($digitalList)){
foreach($digitalList as $digital): ?>
    <h4 style="margin-left: 80px;"><?=$digital;?></h4>
<?php endforeach;
} ?>


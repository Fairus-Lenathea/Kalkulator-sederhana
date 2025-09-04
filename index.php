<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kalkulator Mini</title>
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="calc-shell">
  <div class="screen" id="display"></div>
  <form method="post" id="calcForm">
    <div class="buttons">
      <button class="num" type="button" onclick="press('7')">7</button>
      <button class="num" type="button" onclick="press('8')">8</button>
      <button class="num" type="button" onclick="press('9')">9</button>
      <button class="op"  type="button" onclick="press('/')">/</button>

      <button class="num" type="button" onclick="press('4')">4</button>
      <button class="num" type="button" onclick="press('5')">5</button>
      <button class="num" type="button" onclick="press('6')">6</button>
      <button class="op"  type="button" onclick="press('*')">×</button>

      <button class="num" type="button" onclick="press('1')">1</button>
      <button class="num" type="button" onclick="press('2')">2</button>
      <button class="num" type="button" onclick="press('3')">3</button>
      <button class="op"  type="button" onclick="press('-')">−</button>

      <button class="num" type="button" onclick="press('0')">0</button>
      <button class="clr" type="button" onclick="clr()">C</button>
      <button class="eq"  type="submit" name="hitung">=</button>
      <button class="op"  type="button" onclick="press('+')">+</button>
    </div>
    <input type="hidden" id="exp" name="exp">
  </form>
</div>

<script>
  const dsp = document.getElementById('display');
  const exp = document.getElementById('exp');
  function press(val){
    exp.value += val;
    dsp.innerText = exp.value;
  }
  function clr(){
    exp.value = '';
    dsp.innerText = '';
  }
</script>

<?php
  if(isset($_POST['hitung'])){
    $exp = $_POST['exp'];
    // evaluasi ekspresi dengan aman
    if(preg_match('/^[0-9+\-*\/]+$/',$exp)){
      eval('$hasil = '.$exp.';');
      echo "<script>
              document.getElementById('display').innerText='".$hasil."';
              document.getElementById('exp').value='".$hasil."';
            </script>";
    }else{
      echo "<script>
              document.getElementById('display').innerText='Error';
              document.getElementById('exp').value='';
            </script>";
    }
  }
?>
</body>
</html>
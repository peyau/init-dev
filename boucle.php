<?php

$nombre = 1;

echo 'Avec while:' . '<br>';
while ($nombre <= 10)
{
  echo $nombre . '<br>';
  $nombre++;
}
echo '<br>';

echo 'Avec for:' . '<br>';
for ($nombre2=1;$nombre2<=10;$nombre2++)
  {
    echo $nombre2 . '<br>';
  }
  echo '<br>';

echo 'Incrémentation par 0,5' . '<br>';
for ($i=0;$i<=10;$i+=0.5)
  {
    echo $i . '<br>';
  }
  echo '<br>';
//------------------------------------------------------------------------------
/*
for($facteur = 1; $facteur<=10; $facteur++)
{
echo 'Table de ' . $facteur . '<br>';
  for ($multiplicateur = 0; $multiplicateur<=10; $multiplicateur++) // Dans for (initialisation; condition; incrémentation)
  {
    echo $facteur . ' * ' . $multiplicateur . ' = ' . ($facteur*$multiplicateur) . '<br>';
  }
echo '<br>';
}
*/

//------------------------------------------------------------------------------
do{ // se renseigner sur do while éventuellement
  echo 'test';
}while(false); // affiche un résultat (1 seule fois)

while(false){
  echo 'test2'; // n'affiche pas de résultat
}

//------------------------------------------------------------------------------
echo '<br>' . '<br>';

for ($i=1;$i<=5;$i++)
{
  for ($n=1;$n<=5;$n++)
  {
    echo 'O';
  }
  echo '<br>';
}

//------------------------------------------------------------------------------
echo '<br>' . '<br>';

$i=1;
while ($i <= 5)
{
  $n=1;
  while ($n <= 5)
  {
    echo 'O';
    $n++;
  }
  echo '<br>';
  $i++;
}
echo '<br>' . '<br>';

//------------------------------------------------------------------------------
echo '<div align="center">';
echo '*' . '<br>';
for ($i=1;$i<=5;$i++)
{
  echo "/";
  for ($n=1;$n<=$i;$n++)
  {
    echo "O";
  }
  echo "\\";
  echo '<br>';
}
echo '<br>' . '<br>';
echo '</div>';

//------------------------------------------------------------------------------
echo '<br>' . '<br>';


for ($i=0;$i<=6;$i++)
{
  for ($n=1;$n<=6;$n++)
  {
    echo $i;
  }
  echo '<br>';
}
//------------------------------------------------------------------------------
echo '<br>' . '<br>';


for ($i=0;$i<=7;$i++)
{
  for ($n=1;$n<=7;$n++)
  {
    if ($n<=$i)
    {
    echo $i;
    }
    else
    {
    echo '0';
    }
  }
  echo '<br>';
}
//------------------------------------------------------------------------------
echo '<br>' . '<br>';

$i=20;
$n=0;
while ($i > 0)
{
  echo $i . ' ';
  $i--;
  $n++;
  if ($n == 3)
  {
    echo '<br>';
    $n=0;
  }
}
//------------------------------------------------------------------------------
echo '<br>' . '<br>';

$i=20;
while ($i > 0)
{
  echo $i . ' ';
  if ($i%3 == 0)
  {
    echo '<br>';
  }
  $i--;
}
//------------------------------------------------------------------------------
echo '<br>' . '<br>';

for ($i=20;$i>0;$i--)
{
  echo $i . ' ';
  if ($i%3 == 0)
  {
    echo '<br>';
  }
}

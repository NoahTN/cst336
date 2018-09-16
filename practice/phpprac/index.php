<?php



echo "<table>";

echo "<tr>";
    echo "<th>Num</th>";
    echo "<th>Parity</th>";
echo "</tr>";

$sum = 0;

for ($n=0;$n < 9; $n++) {
    echo "<tr>";
        $k = rand(0, 15);
        echo"<td>$k</td>";
        $even = ($k%2==0)? "Even":"Odd";
        echo"<td>$even</td>";
    echo "</tr";
    echo "<br>";
    $sum += $k;
}
echo "<br>";

echo"</table>";
echo "Sum: $sum";
echo "<br>";

$sum /= 9;
echo "Average: $sum";

echo "";
?>

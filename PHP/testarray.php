<?php
	$m = array('���������','�������','35','��. �������������� �������� �. 7','125-89-63');
	print_r($m);

	// ������� ������ ������ 
$massiv = array(); 
// ������� ������ � ���������� 
$man = array('name' => 'Alex', 'age' => 20); 
// ����� �� ����� ����������� �������� 
print_r($massiv);
echo '<br>';
print_r($man);


echo "<br>";
// ������� ������ ������
$massiv = array();
// ������� ������ � ����������
$man = array('name' => 'Alex', 'age' => 20);
// ��������� ������� � 1-�� ������� 
$massiv[] = '1-�� ������� �������'; 
// ��������� ������� �� 2-�� �������
$man['car'] = 'bmw';
// ����� �� ����� ����������� ��������
print_r($massiv);
print_r($man['car']);


// 2-� ������ ������ 
// sex - ���, age - �������, height - ����. 
$peoples = array( 1 => array('sex' => 'male', 'age' => 19), 2 => array('sex' => 'female', 'age' => 18, 'height' => 170));
// ������ � �������� ���������� ������� 
echo "���������� � ������ ��������: <br />";
echo "���: " . $peoples[1]['sex'] . "<br />";
echo "�������: " . $peoples[1]['age'] . "<br />";
?>
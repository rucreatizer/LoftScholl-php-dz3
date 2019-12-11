<?php
//function task1() {
//    $fileData = file_get_contents('./data.xml');
//    $xml = new SimpleXMLElement($fileData);
//    $zakazNum = $xml -> attributes() -> PurchaseOrderNumber;
//    $zakazDate = $xml -> attributes() -> OrderDate;
//    $zakazName = $xml -> Address[0] -> Name;
//    $zakazAdres = $xml -> Address[0] -> Zip -> __toString() . ", " . $xml -> Address -> Country -> __toString() . ", " . $xml -> Address -> State -> __toString();
//    $zakazAdres .= ", " . $xml -> Address[0] -> City -> __toString();
//    $zakazAdres .= ", " . $xml -> Address[0] -> Street -> __toString();
//
//    $billingName = $xml -> Address[1] -> Name -> __toString() . ", ";
//    $billingAdres = $xml -> Address[1] -> Zip -> __toString() . ", ";
//    $billingAdres .= $xml -> Address[1] -> Country -> __toString() . ", ";
//    $billingAdres .= $xml -> Address[1] -> State -> __toString() . ", ";
//    $billingAdres .= $xml -> Address[1] -> City -> __toString() . ", ";
//    $billingAdres .= $xml -> Address[1] -> Street -> __toString();
//
//    $shippingNotes = $xml -> DeliveryNotes -> __toString();
//    echo "Номер заказ: № $zakazNum<br>";
//    echo "Дата заказа: $zakazDate<br>";
//    echo "Место доставки: $zakazAdres<br>";
//    echo "Кому доставить: $zakazName<br><br>";
//    echo "Кто будет оплачивать: $billingName<br>";
//    echo "Адрес выставления счёта: $billingAdres<br>";
//    echo "Примечание к доставке: $shippingNotes <br><br>";
//
//    echo "Заказ:<br>";
//    echo "--------------<br>";
//    $totalPrice = 0;
//    foreach ($xml -> Items -> Item as $oneItem) {
//        $itemNum = $oneItem -> attributes() ->PartNumber;
//        $itemName = $oneItem -> ProductName -> __toString();
//        $itemQuan = $oneItem -> Quantity -> __toString();
//        $itemPrice = $oneItem ->USPrice -> __toString();
//        $itemComment = $oneItem -> Comment -> __toString();
//        $itemDate = $oneItem -> ShipDate -> __toString();
//        $totalPrice += $itemPrice;
//        echo "ID: $itemNum<br>";
//        echo "Название: $itemName<br>";
//        echo "Количество: $itemQuan<br>";
//        echo "Цена: $itemPrice<br>";
//        echo "Комментарий: $itemComment<br>";
//        echo "Дата доставки: $itemDate<br>";
//        echo "--------------<br>";
//    }
//    echo "--------------<br><br>";
//    echo "Итого: $totalPrice<br>";
//}
function task2()
{
    $mas = [
        [1, 2, 3],
        [2, 3, 4],
        ["a", "b", "c"]
    ];

    $masjson = json_encode($mas);
    file_put_contents('./output.json', $masjson);
    $masjson2 = file_get_contents('./output.json');
    if (rand(0, 1)) {
        echo "Меняем!<br>";
        $mas2 = [];
        $i = 0;
        foreach ($mas as $el) {
            $el[0] = rand(0, 999);
            $el[1] = rand(0, 999);
            $el[2] = rand(0, 999);
            $mas2[$i] = [$el[0], $el[1], $el[2]];
            $i++;
        }
    } else {
        $mas2 = $mas;
    }
    $masjson3 = json_encode($mas2);
    file_put_contents('./output2.json', $masjson3);

    $masjson10 = json_decode(file_get_contents('./output.json'));
    $masjson20 = json_decode(file_get_contents('./output2.json'));

//    var_dump("<pre>");
//    var_dump($masjson10);;
//    var_dump($masjson20);;
//    echo $masjson20 . "<br>";
    $i = 0;
    foreach ($masjson10 as $el) {
        if ($el[0] !== $masjson20[$i][0]) {
            echo "Элементы с индексами [$i][0] не равны<br>";
        };
        if ($el[1] !== $masjson20[$i][1]) {
            echo "Элементы с индексами [$i][1] не равны<br>";
        };
        if ($el[2] !== $masjson20[$i][2]) {
            echo "Элементы с индексами [$i][2] не равны<br>";
        };
        $i++;
    };

}
